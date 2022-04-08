<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize("isAdmin");

        return view("dashboard.categories.index",[
            "categories" => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            "name" => "required|max:255",
            "slug" => "required"
        ];

        $validatedData = $request->validate($rules);
        
        // $validatedData["id"] = $category[0]->id;
        
        Category::create($validatedData);

        return redirect("/dashboard/categories")->with("success", "New category has been uploaded publicly !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $category = Category::where( "slug", $slug )->get();

        return view("dashboard.categories.edit", [
            "category_name" => $category[0]->name,
            "category_slug" => $category[0]->slug,
            // "categories" => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $category = Category::where( "slug", $slug )->get();

        $rules = [
            "name" => "required|max:255",
            "slug" => "required"
        ];

        $validatedData = $request->validate($rules);
        
        $validatedData["id"] = $category[0]->id;
        
        Category::where( "slug", $slug )->update($validatedData);

        return redirect("/dashboard/categories")->with("success", "A category has been updated publicly !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $category = Category::where( "slug", $slug )->get();
        Category::destroy($category);

        return redirect("/dashboard/categories")->with("success", "A category has been deleted !");
    }
}

