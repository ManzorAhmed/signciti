<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\CategoryProduct;
use App\Http\Controllers\Controller;

use App\Admin;
use App\InnerSubCategory;
use App\Product;
use App\Question;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::get();
        $total_categories = Category::count();
        $total_sub_categories = SubCategory::count();
        $total_inner_sub_categories = InnerSubCategory::count();
        $total_questions = Question::count();
        $total_products = CategoryProduct::count();
        return view('admin.dashboard.index',
            [
                'admin' => $admin,
                'total_categories'=>$total_categories,
                'total_sub_categories'=>$total_sub_categories,
                'total_inner_sub_categories'=>$total_inner_sub_categories,
                'total_questions'=>$total_questions,
                'total_products'=>$total_products,
            ]);
    }

    public function edit()
    {
        $admin = Auth::user();
        return view('admin.admin.edit', ['title' => 'Edit Admin'])->withAdmin($admin);
    }

    public function update(Request $request)
    {
        $admin = Auth::user();
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|unique:admins,email,' . $admin->id,
        ]);
        $input = $request->all();
        if (empty($input['password'])) {
            $input['password'] = $admin->password;
        } else {
            $input['password'] = bcrypt($input['password']);
        }
        $admin->fill($input)->save();
        Session::flash('success_message', 'Great! admin successfully updated!');
        return redirect()->back();
    }

    public function configCache()
    {
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
        return redirect()->back();
    }
}
