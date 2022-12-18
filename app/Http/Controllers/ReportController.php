<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function cashIn(){
      $getDataReports = Report::with('category')
                                ->where("status", "Uang Masuk")
                                ->orWhere("status", "Tambah Saldo")
                                ->get();
      return view("dashboard.report.cash_in", ['reports' => $getDataReports]);
    }

    public function cashOut(){
      $getDataReports = Report::with('category')->where("status", "Uang Keluar")->get();
      return view("dashboard.report.cash_out", ['reports' => $getDataReports]);
    }
}
