<?php

namespace App\Http\Controllers\Admin;

use App\Font;
use App\Http\Controllers\Controller;
use App\Subscriber;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $obj_user;

    public function __construct(Subscriber $userObject)
    {
        $this->middleware('auth:admin');
        $this->obj_user = $userObject;
    }

    public function index()
    {
        return view('admin.subscribers.index', ['title' => 'Registered subscribers List']);
    }

    public function getSubscribers(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'email',
            2 => 'created_at',
            3 => 'action'
        );

        $totalData = Subscriber::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $subscribers = Subscriber::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Subscriber::count();
        } else {
            $search = $request->input('search.value');
            $subscribers = Subscriber::where('email', 'like', "%{$search}%")
                ->orWhere('created_at', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Subscriber::where('email', 'like', "%{$search}%")
                ->orWhere('created_at', 'like', "%{$search}%")
                ->count();
        }
        $data = array();

        if ($subscribers) {
            foreach ($subscribers as $r) {
                $edit_url = route('subscribers.edit', $r->id);
                $nestedData['id'] = '
                                <td>
                                <div class="checkbox checkbox-success m-0">
                                        <input id="checkbox3' . $r->id . '" type="checkbox" name="subscribers[]" value="' . $r->id . '">
                                        <label for="checkbox3' . $r->id . '"></label>
                                    </div>
                                </td>
                            ';
                $nestedData['email'] = $r->email;
                $nestedData['created_at'] = date('d-m-Y', strtotime($r->created_at));
                $nestedData['action'] = '
                                <div>
                                <td>
                                    <a class="btn btn-info btn-circle" onclick="event.preventDefault();viewInfo(' . $r->id . ');" title="View Subscriber" href="javascript:void(0)">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a title="Edit Subscriber" class="btn btn-primary btn-circle"
                                       href="' . $edit_url . '">
                                       <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-circle" onclick="event.preventDefault();del(' . $r->id . ');" title="Delete Subscriber" href="javascript:void(0)">
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
        return view('admin.subscribers.create', ['title' => 'Registered Subscriber']);
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
            'email' => 'required|unique:subscribers,email',
        ]);

        $input = $request->all();
        $subscriber = new Subscriber();
        $subscriber->email = $input['email'];
        $subscriber->save();
        Session::flash('success_message', 'Great! Subscriber has been saved successfully!');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $subscriber = $this->obj_user->findOrFail($id);


        return view('admin.subscribers.edit', ['title' => 'Update Subscriber Details', 'subscriber' => $subscriber]);
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
        $subscriber = $this->obj_user->findOrFail($id);
        $this->validate($request, [
            'email' => 'required|unique:subscribers,email,'.$id,

        ]);
        $input = $request->all();
        $subscriber->email = $input['email'];
        $subscriber->save();
        Session::flash('success_message', 'Great! Subscriber successfully updated!');
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
        $font = $this->obj_user->findOrFail($id);
        $font->delete();
        Session::flash('success_message', 'Subscriber successfully deleted!');
        return redirect()->route('subscribers.index');
    }

    public function DeleteSelectedSubscribers(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'subscribers' => 'required',

        ]);
        foreach ($input['subscribers'] as $index => $id) {
            $user = $this->obj_user->findOrFail($id);
            $user->delete();

        }
        Session::flash('success_message', 'Subscribers successfully deleted!');
        return redirect()->back();

    }

    public function subscriberDetail(Request $request)
    {

        $subscriber = Subscriber::findOrFail($request->input('id'));


        return view('admin.subscribers.single', ['title' => 'Subscriber Detail', 'subscriber' => $subscriber]);
    }
}
