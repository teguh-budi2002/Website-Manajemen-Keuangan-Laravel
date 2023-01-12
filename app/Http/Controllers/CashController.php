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
        // Saldo Selama Ini
      $cash_in = Cash::select("id", "balance")
                          ->where('user_id', Auth::id())
                          ->where('status_cash', "Debit")
                          ->sum("balance");
      $cash_out = Cash::select("id", "balance")
                          ->where('user_id', Auth::id())
                          ->where('status_cash', "Credit")
                          ->sum("balance");
      $cashBalance = (int)$cash_in - (int)$cash_out;

      $getCategories = Category::get();
      return view("dashboard.cash.cash_out", [
        'balances' => $cashBalance,
        'categories' => $getCategories
      ]);
    }

    public function cashOut(Request $req) {
      $validation = $req->validate([
        'cash_out' => 'required',
        'category_id' => 'required',
        'description' => 'required'
      ]);

      // Saldo Selama Ini
      $cash_in = Cash::select("id", "balance")
                          ->where('user_id', Auth::id())
                          ->where('status_cash', "Debit")
                          ->sum("balance");
      $cash_out = Cash::select("id", "balance")
                          ->where('user_id', Auth::id())
                          ->where('status_cash', "Credit")
                          ->sum("balance");
      $balanceCash = (int)$cash_in - (int)$cash_out;

      //Check Jika Saldo Tidak Cukup, Maka Tidak Boleh Ada Pengeluaran Uang
      if((int)$req->balance > $balanceCash) {
        return redirect()->back()->with('to_many_request', "Saldo Tidak Cukup");
      }

      $isCashOut = Cash::create([
        'balance' => $req->cash_out,
        'category_id' => $req->category_id,
        'description' => $req->description,
        'user_id' => Auth::id(),
        'status_cash' => 'Credit',
        'published_at' => Carbon::now()
      ]);

      $reportAdded = Report::create([
        'balance_report' => $req->cash_out,
        'category_id' => $req->category_id,
        'user_id' => Auth::id(),
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
      $validation['status_cash'] = "Debit";

      $balanceAdded = Cash::create($validation);
      $reportAdded = Report::create([
        'balance_report' => $req->balance,
        'description_report' => $req->description,
        'category_id' => $req->category_id,
        'user_id' => Auth::id(),
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
        'user_id' => Auth::id(),
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
}
