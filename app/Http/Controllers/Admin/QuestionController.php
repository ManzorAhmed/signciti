<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Question;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $obj_user;

    public function __construct(Question $userObject)
    {
        $this->middleware('auth:admin');
        $this->obj_user = $userObject;
    }

    public function index()
    {
        $questions = Question::orderBy('show_order', 'asc')->get();
        return view('admin.questions.index', ['title' => 'Questions List', 'questions' => $questions]);
    }

    public function getQuestions(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'question',
            3 => 'status',
            4 => 'created_at',
            5 => 'action'
        );

        $totalData = Question::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $users = Question::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Question::count();
        } else {
            $search = $request->input('search.value');
            $users = Question::where('questions', 'like', "%{$search}%")
                ->orWhere('status', 'like', "%{$search}%")
                ->orWhere('created_at', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = User::where('questions', 'like', "%{$search}%")
                ->orWhere('status', 'like', "%{$search}%")
                ->orWhere('created_at', 'like', "%{$search}%")
                ->count();
        }


        $data = array();

        if ($users) {
            foreach ($users as $r) {
                $edit_url = route('questions.edit', $r->id);
                $nestedData['id'] = '
                                <td>
                                <div class="checkbox checkbox-success m-0">
                                        <input id="checkbox3' . $r->id . '" type="checkbox" name="questions[]" value="' . $r->id . '">
                                        <label for="checkbox3' . $r->id . '"></label>
                                    </div>
                                </td>
                            ';
                $nestedData['question'] = stripslashes(substr(strip_tags($r->question), 0, 300)) . "....";
                if ($r->status) {
                    $nestedData['status'] = '<span class="btn btn-xs btn-success">Published</span>';
                } else {
                    $nestedData['status'] = '<span class="btn btn-xs btn-warning">Not Published</span>';
                }

                $nestedData['created_at'] = date('m-d-Y', strtotime($r->created_at));
                $nestedData['action'] = '
                                <div>
                                <td>
                                    <a class="btn btn-info btn-circle" onclick="event.preventDefault();viewInfo(' . $r->id . ');" title="View User" href="javascript:void(0)">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a title="Edit Row" class="btn btn-primary btn-circle"
                                       href="' . $edit_url . '">
                                       <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-circle" onclick="event.preventDefault();del(' . $r->id . ');" title="Delete Row" href="javascript:void(0)">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                </div> 
                            ';
                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );

        echo json_encode($json_data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.questions.create', ['title' => 'Register Questions']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'question' => 'required|max:1000',
            'answer' => 'required|max:2000',
        ]);

        $input = $request->all();
        $question = new Question();
        $question->question = $input['question'];
        $question->answer = $input['answer'];
        $res = array_key_exists('status', $input);
        if ($res == false) {
            $question->status = 0;
        } else {
            $question->status = 1;

        }
        $question->save();

        Session::flash('success_message', 'Great! Question has been saved successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->obj_user->findOrFail($id);
        return view('admin.users.profile-setting', ['title' => 'Edit Profile'])->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = $this->obj_user->findOrFail($id);
        return view('admin.questions.edit', ['title' => 'Update Question Details', 'question' => $question]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $question = $this->obj_user->findOrFail($id);
        $this->validate($request, [
            'question' => 'required|max:1000',
            'answer' => 'required|max:2000',
        ]);
        $input = $request->all();
        $question->question = $input['question'];
        $question->answer = $input['answer'];
        $res = array_key_exists('status', $input);
        if ($res == false) {
            $question->status = 0;
        } else {
            $question->status = 1;

        }
        $question->save();

        Session::flash('success_message', 'Great! Question successfully updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $question = $this->obj_user->findOrFail($id);
        $question->delete();
        Session::flash('success_message', 'Question successfully deleted!');
        return redirect()->route('questions.index');
    }

    public function deleteSelectedQuestions(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'questions' => 'required',

        ]);
        foreach ($input['questions'] as $index => $id) {

            $user = $this->obj_user->findOrFail($id);
            $user->delete();

        }
        Session::flash('success_message', 'Users successfully deleted!');
        return redirect()->back();

    }

    public function questionDetail(Request $request)
    {

        $question = Question::findOrFail($request->input('id'));


        return view('admin.questions.single', ['title' => 'User Detail', 'question' => $question]);
    }

    public function updateQuestionsOrder(Request $request)
    {
        $input = $request->all();
        $counter = 1;
        foreach ($input['order'] as $key => $val) {
            $seat = new Question();
            $seat = $seat->findOrFail($val);
            $seat->show_order = $counter;
            $seat->save();
            $counter++;
        }
    }
}
