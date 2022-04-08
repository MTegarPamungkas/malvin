<?php

namespace App\Http\Controllers;
use App\Models\Blogs;
use App\Models\Category;
use App\Models\Comments;
use App\Models\Likes;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function home() {
        return view("home", [
            "name" => "V-Blogs",
            "pageName" => "Home" 
        ]);
    }

    public function blogs(Blogs $blogs) {       
        
        $title = "";

        if(request("category")) {
            $category = Category::firstWhere("slug", request("category"));
            $title = " in " . $category->name;
        }

        if(request("user")) {
            $user = User::firstWhere("name", request("user"));
            $title = " by " . $user->name;
        }

        return view("blogs", [
            "name" => "V-Blogs",
            "pageName" => "Blogs",
            "blogs" => Blogs::latest()->filter(request(["search", "category", "user"]))->paginate(7)->withQueryString(),
            "title" => $title,
            "likes" => $blogs->likes,
            "comments" => $blogs->comments
        ]);
    }

    public function blog(Blogs $blogs) {
        $liker_qty = Likes::where('liked_blogs', '=', $blogs->id)->where('liker_email', '=', auth()->user()->email )->get()->count();
        $likes_total = Likes::where('liked_blogs', $blogs->id)->get()->count();

        $comments = Comments::where("blog_id", $blogs->id)->get();

        return view("blog", [
            "blog_id" => $blogs->id,
            "name" => $blogs->user->name,
            "author" => $blogs->user,
            "pageName" => $blogs->title,
            "body" => $blogs->body,
            "category" => $blogs->category,
            "slug" => $blogs->slug,
            "image" => $blogs->image,
            "liker_qty" => $liker_qty,
            "likes_total" => $likes_total,
            "comments" => $comments
        ]);
    }

    public function developer() {
        return view("developer", [
            "name" => "V-Blogs",
            "pageName" => "Developer" 
        ]);
    }

    public function user(User $user) {
        return view("authors", [
            "name" => "V-Blogs",
            "blogs" => $user->blogs->load('category', 'user'),
            "pageName" => $user->name
        ]);
    }

    public function categories() {
        return view("categories", [
            "name" => "V-Blogs",
            "pageName" => "Categories",
            "categories" => Category::all()
        ]);
    }

    public function like(Blogs $blogs) {

        $liker_qty = Likes::where('liked_blogs', '=', $blogs->id)->where('liker_email', '=', auth()->user()->email )->get()->count();
        
        if ($liker_qty == 0) {
            Likes::create([
                "liked_blogs" => $blogs->id,
                "liker_email" => auth()->user()->email
            ]);
        } else {
            Likes::where('liked_blogs', '=', $blogs->id)->where('liker_email', '=', auth()->user()->email )->delete();
        }

        $updater_likes = Likes::where('liked_blogs', '=', $blogs->id)->get()->count();

        Blogs::where("id", "=", $blogs->id)->update(["likes" => $updater_likes]);
        
        return redirect("/blogs/$blogs->slug");
    }

    public function comments(Request $request, Blogs $blogs) {
        $request->validate([
            "body" => "required"
        ]);

        Comments::create([
            "user_id" => auth()->user()->id,
            "blog_id" => $blogs->id,
            "body" => $request->body
        ]);

        $updater_comments = Comments::where('blog_id', '=', $blogs->id)->get()->count();
        Blogs::where("id", "=", $blogs->id)->update(["comments" => $updater_comments]);

        return redirect("/blogs/$blogs->slug")->with("success", "Your comment has been uploaded publicly !");
    }
}
