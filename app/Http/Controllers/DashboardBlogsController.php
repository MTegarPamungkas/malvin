<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Blogs;
use App\Models\Likes;
use Illuminate\Http\Request;

class DashboardBlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.blogs.index", [
            "blogs" => Blogs::where( "user_id", auth()->user()->id )->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.blogs.create", [
            "categories" => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            "title" => "required|max:255",
            "slug" => "required|unique:blogs",
            "category_id" => "required",
            "image" => "image|file|max:1024",
            "body" => "required"
        ]);

        if($request->file('image')) {
            $validatedData["image"] = $request->file("image")->store('blogs-image');
        }

        $validatedData["user_id"] = auth()->user()->id;
        
        Blogs::create($validatedData);

        return redirect("/dashboard/blogs")->with("success", "Your new blog has been uploaded publicly !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $blogs = Blogs::where( "slug", $slug )->get();

        return view("dashboard.blogs.show", [
            "title" => $blogs[0]->title,
            "category_slug" => $blogs[0]->category->slug,
            "category_name" => $blogs[0]->category->name,
            "author_name" => $blogs[0]->user->name,
            "body" => $blogs[0]->body,
            "blog_slug" => $blogs[0]->slug,
            "blogs_image" => $blogs[0]->image
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $blogs = Blogs::where( "slug", $slug )->get();

        return view("dashboard.blogs.edit", [
            "title" => $blogs[0]->title,
            "blog_slug" => $blogs[0]->slug,
            "categories" => Category::all(),
            "body" => $blogs[0]->body,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $blogs = Blogs::where( "slug", $slug )->get();

        $rules = [
            "title" => "required|max:255",
            "category_id" => "required",
            "body" => "required",
        ];

        if($request->slug != $blogs[0]->slug) {
            $rules["slug"] = 'required|unique:blogs';
        }

        $validatedData = $request->validate($rules);
        
        $validatedData["user_id"] = auth()->user()->id;
        
        Blogs::where( "slug", $slug )->update($validatedData);

        return redirect("/dashboard/blogs")->with("success", "Your new blog has been updated publicly !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $blogs = Blogs::where( "slug", $slug )->get();
        Blogs::destroy($blogs);

        return redirect("/dashboard/blogs")->with("success", "Your blog has been deleted !");
    }

    // public function checkSlug(Request $request) {
    //     $slug = SlugService::createSlug(Blogs::class, 'slug', $request->title);
    //     return response()->json(["slug" => $slug]);
    // }
}
