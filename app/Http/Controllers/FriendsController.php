<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Friend;
use Log;

class FriendsController extends Controller
{
    //
    public function store(Request $request){
      Log::debug($request);
      $friend = new Friend();
      $friend->user_id = $request->Auth_id;
      $friend->friend_id = $request->user_id;
      $friend->save();
      return response()->json(
            [
                'data' => 'ともだち申請を送りました'
            ],
          );
    }
    public function destroy(Request $request){
      Log::debug($request);
      $friend = Friend::where([
        ['user_id',$request->Auth_id],
        ['friend_id',$request->user_id],
      ])->first();
      $friend->delete();
      return response()->json(
            [
                'data' => '解除しました'
            ],
          );
    }
}
