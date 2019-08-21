<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\UserInformation;



class UsersController extends Controller
{
    public function index(){
      // $Auth = Auth::user()->user_informations();
      $Auth = Auth::user();
      // dd($Auth);

      return view('auth.info')
      ->with([
        'Auth' => $Auth,
      ]);
    }

    public function show(){
      $Auth = Auth::user();
      // dd($Auth);

      return view('auth.info_edit')
      ->with([
        'Auth' => $Auth,
      ]);
    }

    public function store(Request $request){
      // dd($request);
      $this->validate($request,[

      ]);
      $user_id = $request->user_id;

      if(UserInformation::where('user_id',$user_id)->exists()){
        $user_information = UserInformation::where('user_id',$user_id)->first();
      }else{
        $user_information = new UserInformation();
        $user_information->user_id = $user_id;
      }
      $user_information->birthday = $request->birthday;
      $user_information->gender = $request->gender;
      $user_information->comment = $request->comment;
      $user_information->save();
      return redirect('/users/{Auth}/show');
    }
}
