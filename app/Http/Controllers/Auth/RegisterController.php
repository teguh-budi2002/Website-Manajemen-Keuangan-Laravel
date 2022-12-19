<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index() {
      return view('auth.register');
    }

    public function regProcess(Request $req) {
      $validation = $req->validate([
        'name' => 'required',
        'username' => 'required|min:10',
        'email' => 'required|email:dns',
        'password' => 'required',
        'age' => 'required',
        'address' => 'required'
      ], [
        'username.min' => "Minimal Username Adalah 10 Karakter"
      ]);
      try {
        DB::beginTransaction();
        $isCreated = User::create($validation);
        DB::commit();

        return redirect()->back()->with("success", "Pendaftaran Berhasil");
      } catch (\Throwable $th) {
        DB::rollback();
        return redirect()->back()->with("error", "Kesalahan Pada Sisi Server");
      }
    }
}
