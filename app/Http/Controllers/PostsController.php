<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index(){
      $id = Auth::id();
      $posts = Post::all();
      // dd($id);
      // dd($posts->toArray());
      return view('posts.index')
      ->with([
        'posts' => $posts,
        'id' => $id,
      ]);
    }

    public function store(Request $request){
      $this->validate($request,[
        'todo' => 'required',
      ]);
      $post = new Post();
      $post->todo = $request->todo;
      $post->user_id = $request->user_id;
      $post->status = 0;
      $post->save();
      return redirect('/');
    }

    public function destroy(Post $post){
      $post->delete();
      return redirect('/');
    }

    public function update(Request $request, Post $post){
      $this->validate($request,[
        'todo' => 'required'
      ]);
      $post->todo = $request->todo;
      $post->save();
      return redirect('/');
    }


}
