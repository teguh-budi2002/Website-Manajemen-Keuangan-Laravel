<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cash;
use App\Models\User;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Saldo Selama Ini
        $cash_in = Cash::select("id", "balance")
                            ->where('user_id', Auth::id())
                            ->where('status_cash', "Debit")
                            ->sum("balance");
        $cash_out = Cash::select("id", "balance")
                            ->where('user_id', Auth::id())
                            ->where('status_cash', "Credit")
                            ->sum("balance");
        $balances = (int)$cash_in - (int)$cash_out;

        // Get Member
        $getMember = User::where("isAdmin", FALSE)->count();

        //Saldo Selama Bulan Ini
        $cash_in_month = Report::select("cash_in")
                                ->whereYear('created_at', Carbon::now()->year)
                                ->whereMonth("created_at", Date::now()->month)
                                ->where("cash_in", TRUE)
                                ->sum("balance_report");

        $cash_out_report = Report::select("cash_in")
                            ->whereYear('created_at', Carbon::now()->year)
                            ->whereMonth("created_at", Date::now()->month)
                            ->where("cash_in", FALSE)
                            ->sum("balance_report");
        $totalCashInMonth = (int)$cash_in_month - (int)$cash_out_report;

        return view('dashboard.index', [
          'balances' => $balances,
          'members' => $getMember,
          'month_balance' => $totalCashInMonth
        ]);
    }
}
