<?php

namespace App\Http\Controllers\Admin;

use App\BlogCategory;
use App\BlogPost;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Image;

class BlogPostController extends Controller
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
        return view('admin.blog_posts.index', ['title' => 'Post List']);
    }

    public function getBlogPosts(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'title',
            2 => 'slug',
            3 => 'created_at',
            4 => 'action'
        );

        $totalData = BlogPost::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = BlogPost::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = BlogPost::count();
        } else {
            $search = $request->input('search.value');
            $posts = BlogPost::where('title', 'like', "%{$search}%")
                ->orWhere('slug', 'like', "%{$search}%")
                ->orWhere('created_at', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = BlogPost::where('title', 'like', "%{$search}%")
                ->orWhere('slug', 'like', "%{$search}%")
                ->orWhere('created_at', 'like', "%{$search}%")
                ->count();
        }

        $data = array();

        if ($posts) {
            foreach ($posts as $r) {
                $edit_url = route('blog-posts.edit', $r->id);
                $nestedData['id'] = '
                                <td>
                                <div class="checkbox checkbox-success m-0">
                                        <input id="checkbox_' . $r->id . '" type="checkbox" name="posts[]" value="' . $r->id . '">
                                        <label for="checkbox_' . $r->id . '"></label>
                                    </div>
                                </td>
                            ';
                $nestedData['title'] = stripslashes(substr(strip_tags($r->title), 0, 30)) . "....";
                $nestedData['slug'] = stripslashes(substr(strip_tags($r->slug), 0, 30)) . "....";
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
                                    <a class="btn btn-danger btn-circle" onclick="event.preventDefault();del(' . $r->id . ');" title="Delete Post" href="javascript:void(0)">
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
        $categories = BlogCategory::pluck('name', 'id');
        return view('admin.blog_posts.create', ['title' => 'Add Post', 'categories' => $categories]);
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
            /*'meta_title' => 'required|max:255',
            'meta_description' => 'required|max:500',*/
            'title' => 'required|max:255',
            'paragraph1' => 'required',
            'paragraph2' => 'required',
            'paragraph3' => 'required',
            'categories' => 'required',
            'featured_image' => 'required',
           /* 'blog_image' => 'required',
            'blog_image2' => 'required',*/
        ]);
        $input = $request->all();
        $post = new BlogPost();
        $post->author_id = Auth::user()->id;
        $post->title = $input['title'];
        $post->slug = $this->createSlug($request->input('title'));
        $post->paragraph1 = $input['paragraph1'];
        $post->paragraph2 = $input['paragraph2'];
        $post->paragraph3 = $input['paragraph3'];
        $post->blog_category_id = $input['categories'];
        if ($request->hasFile('featured_image')) {
            if ($request->file('featured_image')->isValid()) {
                $this->validate($request, [
                    'featured_image' => 'required|image|mimes:jpeg,png,jpg'
                ]);
                $file = $request->file('featured_image');
                $destinationPath = "uploads/post";
                $extension = $file->getClientOriginalExtension('featured_image');
                $fileName = $file->getClientOriginalName('featured_image');
                $fileName = rand() . $fileName;
                //renaming image
                $request->file('featured_image')->move($destinationPath, $fileName);
                $post->featured_image = $fileName;
                $post->save();
                /*$newImage = public_path() . "/uploads/post/" . $post->featured_image;
                  $thumb_image = Image::make($newImage);
                  $thumb_image->fit(300);
                  $newThumb = public_path() . "/uploads/thumbnail/" . $post->featured_image;
                  $thumb_image->save($newThumb);*/
            }
        }

        if ($request->hasFile('blog_image')) {
            if ($request->file('blog_image')->isValid()) {
                $this->validate($request, [
                    'blog_image' => 'required|image|mimes:jpeg,png,jpg'
                ]);
                $file = $request->file('blog_image');
                $destinationPath = "uploads/post";
                $extension = $file->getClientOriginalExtension();
                $fileName = $file->getClientOriginalName();
                $fileName = rand() . $fileName;
                //renaming image
                $request->file('blog_image')->move($destinationPath, $fileName);
                $post->blog_image = $fileName;
                $post->save();
            }
        }

        if ($request->hasFile('blog_image2')) {
            if ($request->file('blog_image2')->isValid()) {
                $this->validate($request, [
                    'blog_image2' => 'required|image|mimes:jpeg,png,jpg'
                ]);
                $file = $request->file('blog_image');
                $destinationPath = "uploads/post";
                $extension = $file->getClientOriginalExtension();
                $fileName = $file->getClientOriginalName();
                $fileName = rand() . $fileName;
                //renaming image
                $request->file('blog_image')->move($destinationPath, $fileName);
                $post->blog_image2 = $fileName;
                $post->save();
            }
        }
        $post->save();
        /* if (isset($request->tags)) {
             $post->tags()->sync($request->tags);
         } else {
             $post->tags()->sync(array());
         }*/
        Session::flash('success_message', 'Great! Posts has been saved successfully!');
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
        $categories = BlogCategory::pluck('name', 'id');
        $post = BlogPost::findOrFail($id);
        return view('admin.blog_posts.edit', ['title' => 'Update Post Details', 'post' => $post, 'categories' => $categories]);
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
            'title' => 'required|max:255',
            'paragraph1' => 'required',
            'paragraph2' => 'required',
            'paragraph3' => 'required',
            'categories' => 'required',
           /* 'blog_image' => 'required',
            'blog_image2' => 'required',*/
        ]);

        $input = $request->all();
        $post = BlogPost::findOrFail($id);
        $post->author_id = Auth::user()->id;
        $post->title = $input['title'];
        $post->slug = $this->createSlug($request->input('title'));
        $post->paragraph1 = $input['paragraph1'];
        $post->paragraph2 = $input['paragraph2'];
        $post->paragraph3 = $input['paragraph3'];
        $post->blog_category_id = $input['categories'];
        if ($request->hasFile('featured_image')) {
            if ($request->file('featured_image')->isValid()) {
                $this->validate($request, [
                    'featured_image' => 'required|image|mimes:jpeg,png,jpg'
                ]);
                $file = $request->file('featured_image');
                $destinationPath = "uploads/post";
                $extension = $file->getClientOriginalExtension('featured_image');
                $fileName = $file->getClientOriginalName('featured_image');
                $fileName = rand() . $fileName;
                //renaming image
                $request->file('featured_image')->move($destinationPath, $fileName);
                $delete_old_original_image = "uploads/post/" . $post->featured_image;
                $delete_old_thumbnail_image = "uploads/thumbnail/" . $post->featured_image;
                File::delete($delete_old_original_image, $delete_old_thumbnail_image);
                $post->featured_image = $fileName;
                $post->save();
                /*$newImage = public_path() . "/uploads/post/" . $post->featured_image;
                $thumb_image = Image::make($newImage);
                $thumb_image->fit(300);
                $newThumb = public_path() . "/uploads/thumbnail/" . $post->featured_image;
                $thumb_image->save($newThumb);*/
            }
        }
        if ($request->hasFile('blog_image')) {
            if ($request->file('blog_image')->isValid()) {
                $this->validate($request, [
                    'blog_image' => 'required|image|mimes:jpeg,png,jpg'
                ]);
                $file = $request->file('blog_image');
                $destinationPath = "uploads/post";
                $extension = $file->getClientOriginalExtension();
                $fileName = $file->getClientOriginalName();
                $fileName = rand() . $fileName;
                //renaming image
                $request->file('blog_image')->move($destinationPath, $fileName);
                $delete_old_original_image = "uploads/post/" . $post->blog_image;
                File::delete($delete_old_original_image);
                $post->blog_image = $fileName;
                $post->save();
            }
        }
        if ($request->hasFile('blog_image2')) {
            if ($request->file('blog_image2')->isValid()) {
                $this->validate($request, [
                    'blog_image2' => 'required|image|mimes:jpeg,png,jpg'
                ]);
                $file = $request->file('blog_image2');
                $destinationPath = "uploads/post";
                $extension = $file->getClientOriginalExtension();
                $fileName = $file->getClientOriginalName();
                $fileName = rand() . $fileName;
                //renaming image
                $request->file('blog_image2')->move($destinationPath, $fileName);
                $delete_old_original_image = "uploads/post/" . $post->blog_image2;
                File::delete($delete_old_original_image);
                $post->blog_image2 = $fileName;
                $post->save();
                /*$newImage = public_path() . "/uploads/post/" . $post->featured_image;
                $thumb_image = Image::make($newImage);
                $thumb_image->fit(300);
                $newThumb = public_path() . "/uploads/thumbnail/" . $post->featured_image;
                $thumb_image->save($newThumb);*/
            }
        }
        $res = array_key_exists('status', $input);
        if ($res == false) {
            $post->status = 0;
        } else {
            $post->status = 1;
        }
        $post->save();
        Session::flash('success_message', 'Great! Post successfully updated!');
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
        $category = BlogPost::findOrFail($id);
        $category->delete();
        Session::flash('success_message', 'Post successfully deleted!');
        return redirect()->route('blog-posts.index');
    }

    public function deleteSelectedBlogPosts(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'posts' => 'required',

        ]);

        foreach ($input['posts'] as $index => $id) {

            $post = BlogPost::findOrFail($id);
            $post->delete();
        }
        Session::flash('success_message', 'Posts successfully deleted!');
        return redirect()->back();

    }

    public function blogPostDetail(Request $request)
    {
        $post = BlogPost::findOrFail($request->input('id'));
        return view('admin.blog_posts.single', ['title' => 'Post Detail', 'post' => $post,]);
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
        return BlogPost::select('slug')->where('slug', 'like', $slug . '%')
            ->where('id', '<>', $id)
            ->get();
    }
}
