<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\UserInformationRequest;
use App\User;
use App\UserInformation;



class UsersController extends Controller
{
    public function index(){
      // $Auth = Auth::user()->user_informations();
      $Auth = Auth::user();
      $Auth_id = Auth::id();
      $user_information = UserInformation::where('user_id',$Auth_id)->first();
      // dd($user_information);

      return view('auth.info')
      ->with([
        'Auth' => $Auth,
        'user_information' => $user_information,
      ]);
    }

    public function create(){
      $Auth = Auth::user();
      return view('auth.info_create')
      ->with([
        'Auth' => $Auth,
      ]);
    }

    public function edit(){
      $Auth = Auth::user();
      $birthday = $Auth->user_informations->birthday;
      $birthday = date('Y-n-j', strtotime($birthday)); //date()で０なしのyyyy-m-dに直す
      list($year, $month, $day) = explode('-', $birthday);//'-'で分轄する
      return view('auth.info_edit')
      ->with([
        'Auth' => $Auth,
        'year' => $year,
        'month' => $month,
        'day' => $day,
      ]);
    }



    public function store(UserInformationRequest $request){
      // dd($request);
      $user_information = new UserInformation();
      $user_information->birthday = $request->birthday;
      $user_information->gender = $request->gender;
      $user_information->comment = $request->comment;
      $user_information->save();
      return redirect('/users/{Auth}');
    }
    public function update(UserInformationRequest $request){
      // dd($request);
      $yaar = $request->year;
      $month = $request->month;
      $day = $request->day;
      $birthday = $yaar."-".$month."-".$day;
      $user_information = UserInformation::where('user_id',$request->user_id)->first();
      $user_information->birthday = $birthday;
      $user_information->gender = $request->gender;
      $user_information->comment = $request->comment;
      $user_information->save();
      return redirect('/users/{Auth}');
    }



    // public function store(Request $request){
    //   $this->validate($request,[
    //
    //   ]);
    //   $user_id = $request->user_id;
    //
    //   if(UserInformation::where('user_id',$user_id)->exists()){
    //     $user_information = UserInformation::where('user_id',$user_id)->first();
    //   }else{
    //     $user_information = new UserInformation();
    //     $user_information->user_id = $user_id;
    //   }
    //   $user_information->birthday = $request->birthday;
    //   $user_information->gender = $request->gender;
    //   $user_information->comment = $request->comment;
    //   $user_information->save();
    //   return redirect('/users/{Auth}/show');
    // }
}
