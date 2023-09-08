<?php

namespace App\Http\Controllers\Admin;

use App\Font;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $obj_user;

    public function __construct(Font $userObject)
    {
        $this->middleware('auth:admin');
        $this->obj_user = $userObject;
    }

    public function index()
    {
        return view('admin.fonts.index', ['title' => 'Registered fonts List']);
    }

    public function getFonts(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'approx_width',
            3 => 'created_at',
            4 => 'action'
        );

        $totalData = Font::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $users = Font::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Font::count();
        } else {
            $search = $request->input('search.value');
            $users = Font::where('name', 'like', "%{$search}%")
                ->orWhere('approx_width', 'like', "%{$search}%")
                ->orWhere('created_at', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Font::where('name', 'like', "%{$search}%")
                ->orWhere('approx_width', 'like', "%{$search}%")
                ->orWhere('created_at', 'like', "%{$search}%")
                ->count();
        }


        $data = array();

        if ($users) {
            foreach ($users as $r) {
                $edit_url = route('fonts.edit', $r->id);
                $nestedData['id'] = '
                                <td>
                                <div class="checkbox checkbox-success m-0">
                                        <input id="checkbox3' . $r->id . '" type="checkbox" name="fonts[]" value="' . $r->id . '">
                                        <label for="checkbox3' . $r->id . '"></label>
                                    </div>
                                </td>
                            ';
                $nestedData['name'] = $r->name;
                $nestedData['approx_width'] = $r->approx_width;
                $nestedData['created_at'] = date('d-m-Y', strtotime($r->created_at));
                $nestedData['action'] = '
                                <div>
                                <td>
                                    <a class="btn btn-info btn-circle" onclick="event.preventDefault();viewInfo(' . $r->id . ');" title="View Font" href="javascript:void(0)">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a title="Edit Font" class="btn btn-primary btn-circle"
                                       href="' . $edit_url . '">
                                       <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-circle" onclick="event.preventDefault();del(' . $r->id . ');" title="Delete Font" href="javascript:void(0)">
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
        return view('admin.fonts.create', ['title' => 'Registered Font']);
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
            'name' => 'required|max:255',
//            'approx_width' => 'required|max:255',
        ]);

        $input = $request->all();
        $font = new Font();
        $font->name = $input['name'];
        $font->approx_width = $input['approx_width'];
        $font->save();
        Session::flash('success_message', 'Great! Font has been saved successfully!');
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

        $font = $this->obj_user->findOrFail($id);


        return view('admin.fonts.edit', ['title' => 'Update Font Details', 'font' => $font]);
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
        $font = $this->obj_user->findOrFail($id);
        $this->validate($request, [
            'name' => 'required|max:255',
            'approx_width' => 'required|max:255',
        ]);
        $input = $request->all();
        $font->name = $input['name'];
        $font->approx_width = $input['approx_width'];
        $font->save();
        Session::flash('success_message', 'Great! Font successfully updated!');
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
        Session::flash('success_message', 'Font successfully deleted!');
        return redirect()->route('fonts.index');
    }

    public function DeleteSelectedFonts(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'fonts' => 'required',

        ]);
        foreach ($input['fonts'] as $index => $id) {
            $user = $this->obj_user->findOrFail($id);
            $user->delete();

        }
        Session::flash('success_message', 'Fonts successfully deleted!');
        return redirect()->back();

    }

    public function fontDetail(Request $request)
    {

        $font = Font::findOrFail($request->input('id'));


        return view('admin.fonts.single', ['title' => 'Font Detail', 'font' => $font]);
    }


}
