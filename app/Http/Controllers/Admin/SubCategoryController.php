<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\InnerSubCategory;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use File;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $category = Category::findorfail($id);
        return view('admin.sub_categories.index', ['title' => 'Sub Category List', 'category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('id', 'name');
        return view('admin.sub_categories.create', ['title' => 'Sub Category create', 'categories' => $categories]);
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
            'category' => 'required',
            'name' => 'required|unique:sub_categories,name|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg'
        ]);
        $input = $request->all();
        $category = new SubCategory();
        $category->name = $input['name'];
        $category->category_id = $input['category'];
        $category->slug = $this->createSlug($request->input('name'));
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $this->validate($request, [
                    'image' => 'required|image|mimes:jpeg,png,jpg'
                ]);
                $file = $request->file('image');
                $destinationPath = "uploads/images";
                $extension = $file->getClientOriginalExtension('image');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $all_categories = Category::pluck('id', 'name');
        $categories = SubCategory::findOrFail($id);
        return view('admin.sub_categories.edit', ['title' => 'Update Category Details', 'categories' => $categories, 'all_categories' => $all_categories]);
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
        $category = SubCategory::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|max:255',
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
        $category = SubCategory::findOrFail($id);
        $category->delete();
        Session::flash('success_message', 'SubCategory successfully deleted!');
        return redirect()->back();
    }

    public function deleteSelectedCategories(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'categories_id' => 'required',

        ]);
        foreach ($input['categories_id'] as $index => $id) {

            $category = SubCategory::findOrFail($id);
            $category->delete();

        }
        Session::flash('success_message', 'Sub Categories successfully deleted!');
        return redirect()->back();

    }

    public function categoryDetail(Request $request)
    {
        $categories = SubCategory::findOrFail($request->input('id'));
        return view('admin.sub_categories.single', ['title' => 'Categories Detail', 'categories' => $categories]);
    }


    public function createSlug($title, $id = 0)
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
        return SubCategory::select('slug')->where('slug', 'like', $slug . '%')
            ->where('id', '<>', $id)
            ->get();
    }
}
