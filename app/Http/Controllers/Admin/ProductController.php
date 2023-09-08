<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\CategoryProduct;
use App\Height;
use App\Http\Controllers\Controller;
use App\Image;
use App\InnerSubCategory;
use App\PriceHeight;
use App\Pricing;
use App\Product;
use App\SubCategory;
use App\Thickness;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProductController extends Controller
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
        return view('admin.products.index', ['title' => 'Product List']);
    }

    public function getProducts(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'status',
            3 => 'created_at',
            4 => 'action'
        );

        $totalData = Product::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = Product::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Product::count();
        } else {
            $search = $request->input('search.value');
            $posts = Product::where('name', 'like', "%{$search}%")
                ->orWhere('created_at', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Product::where('name', 'like', "%{$search}%")
                ->orWhere('created_at', 'like', "%{$search}%")
                ->count();
        }

        $data = array();

        if ($posts) {
            foreach ($posts as $r) {
                $edit_url = route('products.edit', $r->id);
                $nestedData['id'] = '
                                <td>
                                <div class="checkbox checkbox-success m-0">
                                        <input id="checkbox_' . $r->id . '" type="checkbox" name="products[]" value="' . $r->id . '">
                                        <label for="checkbox_' . $r->id . '"></label>
                                    </div>
                                </td>
                            ';
                $nestedData['name'] = $r->name;
                if ($r->status == '1') {
                    $nestedData['status'] = '<span class="btn btn-xs btn-success">Published</span>';
                } else {
                    $nestedData['status'] = '<span class="btn btn-xs btn-warning">Not Published</span>';
                }
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
        $categories = Category::pluck('name', 'id');
        return view('admin.products.create', ['title' => 'Add Product', 'categories' => $categories]);
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
            'name' => 'required|unique:products,name|max:255',
            'description' => 'required|max:3000',
            'categories' => 'required|max:255',
            'sub_categories' => 'required|max:255',
            'inner_sub_categories' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            /*  'price' => 'required|max:255',
              'image' => 'required|image|mimes:jpeg,png,jpg'*/
        ]);
        $input = $request->all();
        $product = new Product();
        $product->name = $input['name'];
        $product->slug = $this->createSlug($request->input('name'));
        $product->description = $input['description'];
        $res = array_key_exists('status', $input);
        if ($res == false) {
            $product->status = 0;
        } else {
            $product->status = 1;
        }
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $this->validate($request, [
                    'image' => 'required|image|mimes:jpeg,png,jpg'
                ]);
                $file = $request->file('image');
                $destinationPath = "uploads/products";
                $extension = $file->getClientOriginalExtension();
                $fileName = $file->getClientOriginalName();
                $fileName = rand() . $fileName;
                //renaming image
                $request->file('image')->move($destinationPath, $fileName);
                $product->image = $fileName;
            }
        }
        $product->save();
        $category_id = $request->inner_sub_categories;
        $product->categories()->sync($category_id);
        /* if ($request->inner_sub_category) {
            $category = InnerSubCategory::find($request->inner_sub_category);
            $category->products()->save($product);
        } elseif ($request->sub_category) {
            $category = SubCategory::find($request->sub_category);
            $category->products()->save($product);
        } else if ($request->category) {
            $category = Category::find($request->category);
            $category->products()->save($product);
        }*/
        if (array_key_exists('uploadedImages', $input)) {
            foreach ($request->uploadedImages as $key => $picture) {
                $product_image = new Image();
                $product_image->product_id = $product->id;
                $product_image->image = $picture;
                $product_image->save();
            }
        }
        Session::flash('success_message', 'Great! Products has been stored successfully!');
        return redirect()->route('step_three_form', $product->id);
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $categories = Category::pluck('name', 'id');
        $product = Product::findOrFail($id);
        return view('admin.products.edit', ['title' => 'Update Product Details', 'product' => $product, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        if($request->inner_sub_categories){
            $category_product = CategoryProduct::get();
            foreach ($category_product as $i) {
                foreach ($request->inner_sub_categories as $key => $value)
                    if ($i->category_id == $value && $i->product_id == $id) {
                        Session::flash('error_message', 'Sorry! This product is already exist in one of the selected category!');
                        return redirect()->back();
                    }
            }
        }

        $this->validate($request, [
            'name' => 'required|unique:products,name,' . $id,
            'description' => 'required|max:3000',
        ]);
        $input = $request->all();
        $product = Product::findorfail($id);
        $product->name = $input['name'];
        $product->slug = $this->updateSlug($request->input('name'), $id);
        $product->description = $input['description'];
        $res = array_key_exists('status', $input);
        if ($res == false) {
            $product->status = 0;
        } else {
            $product->status = 1;
        }
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $this->validate($request, [
                    'image' => 'required|image|mimes:jpeg,png,jpg'
                ]);
                $file = $request->file('image');
                $destinationPath = "uploads/products";
                $extension = $file->getClientOriginalExtension();
                $fileName = $file->getClientOriginalName();
                $fileName = rand() . $fileName;
                //renaming image
                $request->file('image')->move($destinationPath, $fileName);
                $delete_old_file = "uploads/products/" . $product->image;
                File::delete($delete_old_file);
                $product->image = $fileName;
            }
        }
        $product->save();
        if ($request->inner_sub_categories) {
            $category_id = $request->inner_sub_categories;
            $product->categories()->attach($category_id);
        }

        if (array_key_exists('uploadedImages', $input)) {
            foreach ($request->uploadedImages as $key => $picture) {
                $product_image = new Image();
                $product_image->product_id = $product->id;
                $product_image->image = $picture;
                $product_image->save();
            }
        }
        Session::flash('success_message', 'Great! Products has been updated successfully!');
        return redirect()->route('step_three_form', $product->id);
//        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Product::findOrFail($id);
        $post->delete();
        Session::flash('success_message', 'Product successfully deleted!');
        return redirect()->route('products.index');
    }

    public function deleteSelectedRows(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'products' => 'required',

        ]);

        foreach ($input['products'] as $index => $id) {
            $post = Product::findOrFail($id);
            $post->delete();
        }
        Session::flash('success_message', 'Products successfully deleted!');
        return redirect()->back();

    }

    public function productDetail(Request $request)
    {
        $product = Product::findOrFail($request->input('id'));
        return view('admin.products.single', ['title' => 'Product Detail', 'product' => $product,]);
    }

    public function subCategories(Request $request)
    {
        $sub_categories = SubCategory::whereIn('category_id', $request->categories)->pluck('name', 'id');
        /*$sub_categories = DB::table("sub_categories")
            ->where("category_id", $id)
            ->lists("name", "id");*/
        return json_encode($sub_categories);
    }

    public function innerSubCategories(Request $request)
    {
        $inner_sub_categories = InnerSubCategory::whereIn('sub_category_id', $request->categories)->pluck('name', 'id');
        return json_encode($inner_sub_categories);
    }

    public function createSlug($title, $id = '')
    {
        // Normalize the title
        $slug = Str::slug($title);

        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugs($slug, $id);

        // If we haven't used it before then we are all good.
        if (!$allSlugs->contains('slug', $slug)) {
            return $slug;
        }

        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }

        throw new \Exception('Can not create a unique slug');
    }

    public function updateSlug($title, $id)
    {
        // Normalize the title
        $slug = Str::slug($title);

        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugs($slug, $id);

        // If we haven't used it before then we are all good.
        if (!$allSlugs->contains('slug', $slug)) {
            return $slug;
        }

        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }

        throw new \Exception('Can not create a unique slug');
    }

    protected function getRelatedSlugs($slug, $id = 0)
    {
        return Product::select('slug')->where('slug', 'like', $slug . '%')
            ->where('id', '<>', $id)
            ->get();
    }

    public function form()
    {
        $categories = Category::pluck('name', 'id');
        return view('admin.products.step_one_form', ['title' => 'Step One Form', 'categories' => $categories]);
    }

    public function stepTwoForm($id)
    {
        $product = Product::findorfail($id);
        return view('admin.products.step_two_form', ['title' => 'Step Two Form', 'product' => $product]);
    }

    public function stepThreeForm($id)
    {
        $product = Product::findorfail($id);
        if (
            $product->slug == 'mild-steel-metal' or
            $product->slug == 'galvanized-steel-metal-letters' or
            $product->slug == 'rustic-metal-letters'
        ) {
            $product = Product::where('slug', $product->slug)->first();
            $height = array(
                '1',
                '1.5',
                '2',
                '3',
                '4',
                '5',
                '6',
                '7',
                '8',
                '9',
                '10',
                '11',
                '12',
                '13',
                '14',
                '15',
                '16',
                '17',
                '18',
                '19',
                '20',
                '21',
                '22',
                '23',
                '24',
                '25',
                '26',
                '27',
                '28',
                '29',
                '30',
                '31',
                '32',
                '33',
                '34',
                '35',
                '36',
                '37',
                '38',
                '39',
                '40',
                '41',
                '42',
                '43',
                '44',
                '45',
                '46',
            );
            return view('admin.products.pricing_height', [
                'title' => 'Add Pricing',
                'product' => $product,
                'height' => $height,
            ]);
        } else {
            $height = array(
                '1',
                '1.5',
                '2',
                '3',
                '4',
                '5',
                '6',
                '7',
                '8',
                '9',
                '10',
                '11',
                '12',
                '13',
                '14',
                '15',
                '16',
                '17',
                '18',
                '19',
                '20',
                '21',
                '22',
                '23',
                '24',
                '25',
                '26',
                '27',
                '28',
                '29',
                '30',
                '31',
                '32',
                '33',
                '34',
                '35',
                '36',
                '37',
                '38',
                '39',
                '40',
                '41',
                '42',
                '43',
                '44',
                '45',
                '46',
            );
            $thickness = array(
                '1/8',
                '1/4',
                '3/8',
                '1/2',
                '3/4',
                '1',
            );
            return view('admin.products.step_three_form', [
                'title' => 'Step Three Form',
                'product' => $product,
                'height' => $height,
                'thickness' => $thickness,
            ]);
        }

    }

    public function storeFormOne(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:products,name|max:255',
            'description' => 'required|max:3000',
            'category' => 'required|max:255',
        ]);
        $input = $request->all();
        $product = new Product();
        $product->name = $input['name'];
        $product->slug = $this->createSlug($request->input('name'));
        $product->description = $input['description'];
        $res = array_key_exists('status', $input);
        if ($res == false) {
            $product->status = 0;
        } else {
            $product->status = 1;
        }
        if ($request->inner_sub_category) {
            $category = InnerSubCategory::find($request->inner_sub_category);
            $category->products()->save($product);
        } elseif ($request->sub_category) {
            $category = SubCategory::find($request->sub_category);
            $category->products()->save($product);
        } else if ($request->category) {
            $category = Category::find($request->category);
            $category->products()->save($product);
        }
        if (array_key_exists('uploadedImages', $input)) {
            foreach ($request->uploadedImages as $key => $picture) {
                $product_image = new Image();
                $product_image->product_id = $product->id;
                $product_image->image = $picture;
                $product_image->save();
            }
        }
        Session::flash('success_message', 'Great! Products has been stored successfully!');
        return redirect()->route('step_two_form', $product->id);
    }

    public function storeFormTwo(Request $request)
    {
        $this->validate($request, [
            'height' => 'required',
            'thickness' => 'required',
        ]);
        foreach ($request->height as $key => $value) {
            $height = new Height();
            if ($value != null) {
                $height->product_id = $request->product_id;
                $height->height = $value;
                $height->save();
            }
        }
        foreach ($request->thickness as $key => $value) {
            $thickness = new Thickness();
            if ($value != null) {
                $thickness->product_id = $request->product_id;
                $thickness->thickness = $value;
                $thickness->save();
            }
        }
        Session::flash('success_message', 'Great! Data has been stored successfully!');
//        return view('admin.products.step_form');
        return redirect(route('step_three_form', $request->product_id, $height, $thickness));
    }

    public function storeFormThree(Request $request)
    {
        $product = Product::findorfail($request->product_id);
        if (
            $product->slug == 'steel-metal-signs' or
            $product->slug == 'galvanized-steel-metal-letters' or
            $product->slug == 'rustic-metal-letters' or
            $product->slug == 'painted-steel-metal-signs' or
            $product->slug == 'flat-metal-wall-letter' or
            $product->slug == 'architectural-cast-metal-letters' or
            $product->slug == 'standard-block-bronze-letters' or
            $product->slug == 'craw-clarendon-condensed-cast-metal-lettering' or
            $product->slug == 'metal-faced-wood-letters' or
            $product->slug == 'charcoal-metal-wood-letters' or
            $product->slug == 'metal-faced-wood-letters-1'
        ) {
            $pricing = PriceHeight::where('height', $request->height)
                ->where('product_id', $request->product_id)->first();
            if ($pricing != null) {
                $pricing->product_id = $request->product_id;
                $pricing->height = $request->height;
                $pricing->price = $request->price;
                $pricing->save();
                Session::flash('success_message', 'Great! Data has been stored successfully!');
                return redirect(route('step_three_form', $pricing->product_id));
            }
            $pricing = new PriceHeight();
            $pricing->product_id = $request->product_id;
            $pricing->height = $request->height;
            $pricing->price = $request->price;
            $pricing->save();
            Session::flash('success_message', 'Great! Data has been stored successfully!');
//        return view('admin.products.step_form');
            return redirect(route('step_three_form', $pricing->product_id));
        } else {
            $pricing = Pricing::where('height', $request->height)
                ->where('thickness', $request->thickness)
                ->where('product_id', $request->product_id)->first();
            if ($pricing != null) {
                $pricing->product_id = $request->product_id;
                $pricing->height = $request->height;
                $pricing->thickness = $request->thickness;
                $pricing->price = $request->price;
                $pricing->save();
                Session::flash('success_message', 'Great! Data has been stored successfully!');
                return redirect(route('step_three_form', $pricing->product_id));
            }
            $pricing = new Pricing();
            $pricing->product_id = $request->product_id;
            $pricing->height = $request->height;
            $pricing->thickness = $request->thickness;
            $pricing->price = $request->price;
            $pricing->save();
            Session::flash('success_message', 'Great! Data has been stored successfully!');
//        return view('admin.products.step_form');
            return redirect(route('step_three_form', $pricing->product_id));
        }

    }

    public function saveProductsImages(Request $request)
    {
        $image = $request->file('file');
        //$imageName = time() . $image->getClientOriginalName();
        $imageName = rand() . $image->getClientOriginalName();
//        $imageName = time().$imageName;
        $image->move('uploads/products', $imageName);
        $id = $this->clean($imageName);
        return response()->json(['imageName' => $imageName, 'id' => $id]);
    }

    public function deleteImage($id)
    {
        $name = explode('.', $id);
        $delete_old_file = "uploads/products/" . $id;
        File::delete($delete_old_file);
        $id = $this->clean($id);
        return response()->json(['id' => $id]);
    }

    public function clean($string)
    {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

    public function deleteProductImage($id)
    {
        $productImage = Image::where('id', $id)->first();
        if ($productImage) {
            $productImage->delete();
            $delete_old_file = "uploads/products/" . $productImage->image;
            File::delete($delete_old_file);
        }
        return redirect()->back()->withSuccess('Product image has been deleted successfuly.');
    }

}
