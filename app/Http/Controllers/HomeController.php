<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Friend;
use Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function store(Request $request){
      Log::debug($request);
      $friend = new Friend();
      $friend->user_id = $request->Auth_id;
      $friend->friend_id = $request->user_id;
      $friend->save();
      return response()->json(
            [
                'data' =>1
            ],
            200,[],
            JSON_UNESCAPED_UNICODE
        );


    }

}
