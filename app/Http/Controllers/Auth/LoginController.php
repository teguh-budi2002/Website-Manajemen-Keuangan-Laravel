<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
      return view('auth.login');
    }

    public function loginSend(Request $req) {
      $validation = $req->validate([
        'username' => 'required',
        'password' => 'required'
      ]);

      $getValidUser = User::where('username', $req->username)->first();
      if (!$getValidUser) {
        return redirect()->back()->with("not-valid", "User Tidak Ditemukan");
      }

      if ($getValidUser->isAdmin) {
        $remember_me = $req->remember_me ? true : false;
        if (Auth::attempt($validation, $remember_me)) {
          $req->session()->regenerate();

          return redirect()->intended("dashboard");
        }
      }

      return redirect("home");
    }
}
