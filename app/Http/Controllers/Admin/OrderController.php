<?php

namespace App\Http\Controllers\Admin;

use App\BillingAddress;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderItem;
use App\ShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
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
        return view('admin.orders.index', ['title' => 'Orders List']);
    }

    public function getOrders(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'order_no',
            2 => 'order_status',
            3 => 'payment_status',
            4 => 'created_at',
            5 => 'action'
        );

        $totalData = Order::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $orders = Order::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Order::count();
        } else {
            $search = $request->input('search.value');
            $orders = Order::where('order_no', 'like', "%{$search}%")
                ->orWhere('created_at', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Order::where('order_no', 'like', "%{$search}%")
                ->orWhere('created_at', 'like', "%{$search}%")
                ->count();
        }
        $data = array();
        if ($orders) {
            foreach ($orders as $r) {
                $edit_url = route('orders.edit', $r->id);
                $show_detail = route('admin.getOrder', $r->id);
                $nestedData['id'] = '
                                <td>
                                <div class="checkbox checkbox-success m-0">
                                        <input id="checkbox_' . $r->id . '" type="checkbox" name="orders[]" value="' . $r->id . '">
                                        <label for="checkbox_' . $r->id . '"></label>
                                    </div>
                                </td>
                            ';
                $nestedData['order_no'] = $r->order_no;
                if ($r->order_status == "pending") {
                    $nestedData['order_status'] = '<span class="btn btn-xs btn-warning">PENDING</span>';
                } elseif ($r->order_status == "cancelled") {
                    $nestedData['order_status'] = '<span class="btn btn-xs btn-danger">CANCELLED</span>';
                } elseif ($r->order_status == "completed") {
                    $nestedData['order_status'] = '<span class="btn btn-xs btn-success">COMPLETED</span>';
                }
                if ($r->payment_status == "pending") {
                    $nestedData['payment_status'] = '<span class="btn btn-xs btn-warning">PENDING</span>';
                } elseif ($r->payment_status == "cancelled") {
                    $nestedData['payment_status'] = '<span class="btn btn-xs btn-danger">CANCELLED</span>';
                } elseif ($r->payment_status == "completed") {
                    $nestedData['payment_status'] = '<span class="btn btn-xs btn-success">COMPLETED</span>';
                }
                $nestedData['created_at'] = date('d-m-Y', strtotime($r->created_at));
                $nestedData['action'] = '
                                <div>
                                    <td>
                                    <a title="Show Details" class="btn btn-primary btn-circle"
                                           href="' . $show_detail . '"> <i class="fa fa-eye"></i>
                                     </a>
                                     <a class="btn btn-danger btn-circle" onclick="event.preventDefault();del(' . $r->id . ');" title="Delete Order" href="javascript:void(0)">
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
        $categories = Category::pluck('name', 'id');
        return view('admin.categories.create', ['title' => 'Add Categories', 'categories' => $categories]);
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
            'name' => 'required|unique:categories,name|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg'
        ]);
        $input = $request->all();
        $category = new Category();
        $category->name = $input['name'];
        $category->slug = $this->createSlug($request->input('name'));
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $this->validate($request, [
                    'image' => 'required|image|mimes:jpeg,png,jpg'
                ]);
                $file = $request->file('image');
                $destinationPath = "uploads/images";
                $extension = $file->getClientOriginalExtension();
                $fileName = $file->getClientOriginalName();
                $fileName = rand() . $fileName;
                //renaming image
                $request->file('image')->move($destinationPath, $fileName);
                $category->image = $fileName;
                $category->save();
            }
        }
        $category->save();
        Session::flash('success_message', 'Great! Categories has been saved successfully!');
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
        $categories = Category::findOrFail($id);
        return view('admin.categories.edit', ['title' => 'Update Category Details', 'categories' => $categories]);
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
        $category = Category::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg'
        ]);
        $input = $request->all();
        $category->name = $input['name'];
        $category->slug = $this->createSlug($request->input('name'));
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $this->validate($request, [
                    'image' => 'required|image|mimes:jpeg,png,jpg'
                ]);
                $file = $request->file('image');
                $destinationPath = "uploads/images";
                $extension = $file->getClientOriginalExtension();
                $fileName = $file->getClientOriginalName();
                $fileName = rand() . $fileName;
                //renaming image
                $request->file('image')->move($destinationPath, $fileName);
                $delete_old_file = "uploads/images/" . $category->image;
                File::delete($delete_old_file);
                $category->image = $fileName;
                $category->save();
            }
        }
        $category->save();
        Session::flash('success_message', 'Great! Category successfully updated!');
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
        $order = Order::findOrFail($id);
        $order->delete();
        Session::flash('success_message', 'Order successfully deleted!');
        return redirect()->route('orders.index');
    }

    public function deleteSelectedOrders(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'orders' => 'required',

        ]);
        foreach ($input['orders'] as $index => $id) {

            $order = Order::findOrFail($id);
            $order->delete();

        }
        Session::flash('success_message', 'Orders successfully deleted!');
        return redirect()->back();

    }

    public function orderDetail($id)
    {
        $order = Order::findOrFail($id);
        $order_items = OrderItem::where('order_id', $order->id)->first();
        $order_items = json_decode($order_items->items, true);
        $billing_address = BillingAddress::where('order_id', $order->id)->first();
        $shipping_address = ShippingAddress::where('order_id', $order->id)->first();
        return view('admin.orders.single', ['title' => 'Orders Detail', 'order' => $order, 'order_items' => $order_items, 'billing_address' => $billing_address, 'shipping_address' => $shipping_address]);
    }
}
