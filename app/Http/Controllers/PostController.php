<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
   

class PostController extends Controller
{
    //
    
    public function __construct(){
       
     } 
     
     public function index() 
     {
         $posts = Post::all();
          
         return Inertia::render('Posts/Index', ['posts' => $posts]);
     }
 
     public function test(){
         dd("Here");
         return 0;
     }

     public function create()
    {
        return Inertia::render('Posts/Create');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['required'],
            'body' => ['required'],
        ])->validate();
   
        Post::create($request->all());
    
        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        return Inertia::render('Posts/Edit', [
            'post' => $post
        ]);
    }
    

    public function update($id, Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['required'],
            'body' => ['required'],
        ])->validate();
    
        Post::find($id)->update($request->all());
        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect()->route('posts.index');
    }
  
}
