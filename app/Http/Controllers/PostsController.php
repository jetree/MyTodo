<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Friend;

class PostsController extends Controller
{
    public function index(){
      $Auth = Auth::user();
      $id = Auth::id();
      $posts = Post::all();
      $users = User::whereNotIn('id',[$id])->get();
      // dd($users);
      if ($Auth != null){
        $follow_friends = Auth::user()->follow_friends()->get();
        $follower_friends = Auth::user()->follower_friends()->get();
      }else {
        $follow_friends = [];
        $follower_friends = [];
      }
        return view('posts.index')
        ->with([
          'posts' => $posts,
          'Auth' => $Auth,
          'users' => $users,
          'follow_friends' => $follow_friends,
          'follower_friends' => $follower_friends,
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
