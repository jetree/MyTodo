<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;


class UsersController extends Controller
{
    public function index(){
      $Auth = Auth::user();
      // dd($Auth);

      return view('auth.info')
      ->with([
        'Auth' => $Auth,
      ]);
    }
}
