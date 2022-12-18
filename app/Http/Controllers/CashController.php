<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cash;
use App\Models\Report;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getCategories = Category::get();
        return view("dashboard.cash.create", ['categories' => $getCategories]);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexCashOut() {
      $cashBalance = Cash::with('category')->where('user_id', Auth::id())->get();
      return view("dashboard.cash.cash_out", [
        'balances' => $cashBalance
      ]);
    }

    public function cashOut(Request $req, $id) {
      $validation = $req->validate([
        'balance' => 'required',
        'category_id' => 'required',
        'description' => 'required'
      ]);

      $cashBalance = Cash::select("id", "balance")->where('user_id', Auth::id())->first();

      if((int)$req->balance > $cashBalance->balance) {
        return redirect()->back()->with('to_many_request', "Saldo Tidak Cukup");
      }

      $cashOut = $cashBalance->balance - (int)$req->balance;
      $isUpdated = Cash::where('id', $id)->update([
        'balance' => $cashOut
      ]);
      $reportAdded = Report::create([
        'balance_report' => $req->balance,
        'category_id' => $req->category_id,
        'description_report' => $req->description,
        'status' => "Uang Keluar",
        'cash_in' => FALSE
      ]);

      return redirect("dashboard")->with('success-cashout', "Saldo Berhasil Di Keluarkan");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
      $checkBalanceUser = Cash::where('user_id', Auth::id())->first();

      if ($checkBalanceUser !== NULL) {
         return redirect()->back()->with('exists', 'Tidak Bisa Menambah Saldo Lagi');
      }

      $validation = $req->validate([
        'balance' => 'required|numeric',
        'category_id' => 'required',
        'description' => 'required',
      ], [
        'balance.required' => "Saldo Tidak Boleh Kosong",
        'balance.numeric' => "Saldo Harus Berupa Angka",
        'category_id.required' => "Kategori Harus Dipilih",
        'description.required' => "Keterangan Tidak Boleh Kosong"
      ]);

      $validation['user_id'] = Auth::id();
      $validation['published_at'] = Carbon::now();

      $balanceAdded = Cash::create($validation);
      $reportAdded = Report::create([
        'balance_report' => $req->balance,
        'description_report' => $req->description,
        'category_id' => $req->category_id,
        'status' => "Uang Masuk",
        'cash_in' => TRUE
      ]);

      return redirect("dashboard")->with('success', "Saldo Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
      $validation = $req->validate([
        'balance' => 'required|numeric',
      ], [
        'balance.required' => "Saldo Tidak Boleh Kosong",
        'balance.numeric' => "Saldo Harus Berupa Angka"
      ]);

      $currentBalance = Cash::select('balance')->where('user_id', Auth::id())->first();
      $updatedBalance = $currentBalance->balance + (int)$req->get('balance');

      $isUpdated = Cash::where('id', $id)->update([
        'balance' =>$updatedBalance
      ]);
      $reportAdded = Report::create([
        'balance_report' => $req->balance,
        'category_id' => $req->category_id,
        'status' => "Tambah Saldo",
        'cash_in' => TRUE
      ]);

      return redirect()->back()->with('success', "Saldo Sukses Di Tambahkan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getCurrentBalance() {
      try {
        $getBalance = Cash::with(['category' => function($q) {
            $q->select("id");
        }])->where("user_id", Auth::id())->first();

        return response()->json([
          'data' => $getBalance,
          'status' => "success"
        ], 200);

      } catch (\Throwable $th) {
        return response()->json($th, 500);
      }

    }
}
