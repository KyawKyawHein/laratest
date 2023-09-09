<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        return view('blogs.index',[
            "blogs" => Blog::latest()->filter(request(['search','category','author']))->paginate(3)->withQueryString(),
        ]);
    }

    public function show(Blog $blog){    
        return view("blogs.show",[
            "blog" => $blog,
            "randomBlogs" => Blog::inRandomOrder()->take(3)->get(),
        ]);
    }

    public function subscribeHandler(Blog $blog){
        if(User::find(auth()->id())->isSubscribed($blog)){
            $blog->unSubscribe();
        }else{
            $blog->subscribe();
        }
        return back();
    }

    // protected function getBlogs(){
    //     $query=Blog::latest();
    //     if(request('search')){
    //         $query = $query->filter(request(["search"]));
    //     }
    //     return $query->get();
    //     // $query = Blog::latest();
    //     // $query->when(request("search"),function($query,$search){
    //     //     $query = $query->where("title","LIKE","%".$search."%")
    //     //                    ->orWhere("body","LIKE","%".$search."%");
    //     // });
    //     // return $query->get();
    // }
}
