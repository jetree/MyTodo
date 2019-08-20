<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;


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

    }
}
