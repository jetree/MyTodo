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
      // $a = Friend::all();
      // dd($a->toArray());
      $Auth = Auth::user();
      $id = Auth::id();
      $posts = Post::all();
      $users = User::whereNotIn('id',[$id])->get();
      // dd($users);
      if ($Auth != null){
        // 全てのフォローしたユーザー
        $all_follow_friends = Auth::user()->follow_friends()->get();
        // 全てのフォローを受けたユーザー
        $all_follower_friends = Auth::user()->follower_friends()->get();
        // 相互フォロー状態を抽出
        $friends = $all_follower_friends->intersect($all_follow_friends);
        // 全てのフォローしたユーザー + 全てのフォローを受けたユーザー
        $merge_friends = $all_follow_friends->merge($all_follower_friends);
        // 相互フォローから全てのフォローを受けたユーザーを除外
        $follow_friends = $merge_friends->diff($all_follower_friends);
        // 相互フォローから全てのフォローしたユーザーを除外
        $follower_friends = $merge_friends->diff($all_follow_friends);
        // dd($all_follow_friends);
      }else {
        $follow_friends = [];
        $follower_friends = [];
        $friends = [];
      }
        return view('posts.index')
        ->with([
          'posts' => $posts,
          'Auth' => $Auth,
          'users' => $users,
          'follow_friends' => $follow_friends,
          'follower_friends' => $follower_friends,
          'friends' => $friends,
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
      $post->friend_id = $request->friend_id;
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
