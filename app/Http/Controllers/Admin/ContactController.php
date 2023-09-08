<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.contacts.index', ['title' => 'Contacts List']);
    }

    public function getContacts(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'email',
            3 => 'created_at',
            4 => 'action'
        );

        $totalData = Contact::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $categories = Contact::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Contact::count();
        } else {
            $search = $request->input('search.value');
            $categories = Contact::where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('created_at', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Contact::where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('created_at', 'like', "%{$search}%")
                ->count();
        }


        $data = array();

        if ($categories) {
            foreach ($categories as $r) {
                $edit_url = route('contacts.edit', $r->id);
                $nestedData['id'] = '
                                <td>
                                <div class="checkbox checkbox-success m-0">
                                        <input id="checkbox_' . $r->id . '" type="checkbox" name="contacts_id[]" value="' . $r->id . '">
                                        <label for="checkbox_' . $r->id . '"></label>
                                    </div>
                                </td>
                            ';
                $nestedData['name'] = $r->name;
                $nestedData['email'] = $r->email;
                /* <a class="btn btn-info btn-circle" onclick="event.preventDefault();viewInfo(' . $r->id . ');" title="View Details" href="javascript:void(0)">
                                         <i class="fa fa-eye"></i>
                                     </a>*/
                $nestedData['created_at'] = date('d-m-Y', strtotime($r->created_at));
                $nestedData['action'] = '
                                <div>
                                    <td>
                                        <a class="btn btn-info btn-circle" onclick="event.preventDefault();viewInfo(' . $r->id . ');" title="View Details" href="javascript:void(0)">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a title="Edit Row" class="btn btn-primary btn-circle"
                                           href="' . $edit_url . '">
                                           <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="btn btn-danger btn-circle" onclick="event.preventDefault();del(' . $r->id . ');" title="Delete Contact" href="javascript:void(0)">
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
        return view('admin.contacts.create', ['title' => 'Add Contacts']);
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
            'email' => 'required|max:255',
            'subject' => 'required|max:255',
            'message' => 'required|max:1000',
        ]);
        $input = $request->all();
        $contact = new Contact();
        $contact->name = $input['name'];
        $contact->email = $input['email'];
        $contact->subject = $input['subject'];
        $contact->message = $input['message'];
        $contact->save();
        Session::flash('success_message', 'Great! Contact has been saved successfully!');
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
        $contact = Contact::findOrFail($id);
        return view('admin.contacts.edit', ['title' => 'Update Contact Details', 'contact' => $contact]);
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
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'subject' => 'required|max:255',
            'message' => 'required|max:1000',
        ]);
        $contact = Contact::findOrFail($id);
        $input = $request->all();
        $contact->name = $input['name'];
        $contact->email = $input['email'];
        $contact->subject = $input['subject'];
        $contact->message = $input['message'];
        $contact->save();
        Session::flash('success_message', 'Great! Contact successfully updated!');
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
        $category = Contact::findOrFail($id);
        $category->delete();
        Session::flash('success_message', 'Contact successfully deleted!');
        return redirect()->route('contacts.index');
    }

    public function deleteSelectedContacts(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'contacts_id' => 'required',

        ]);
        foreach ($input['contacts_id'] as $index => $id) {

            $category = Contact::findOrFail($id);
            $category->delete();

        }
        Session::flash('success_message', 'Categories successfully deleted!');
        return redirect()->back();

    }

    public function contactDetail(Request $request)
    {
        $contact = Contact::findOrFail($request->input('id'));
        return view('admin.contacts.single', ['title' => 'Contact Detail', 'contact' => $contact]);
    }
}
