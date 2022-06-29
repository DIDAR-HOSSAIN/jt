<?php

namespace App\Http\Controllers;

use App\Balancebd;
use App\Customer;
use App\Expense;
use App\Income;
use App\Virtualbd;
use App\Virtualcash;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//BalanceBD
        $lastDayBalanceCashIn = Balancebd::where('cash_in', '!=', "")->where('date', '<', Carbon::now())->sum('cash_in');
//        dd($lastDayBalanceCashIn);
        $lastDayBalanceCashOut = Balancebd::where('cash_out', '!=', "")->where('date','<', Carbon::now()->subDays(1))->sum('cash_out');
        $lastDayExpense = Expense::where('date', '<', Carbon::now()->subDays(1))->sum('expense_amount');
        $balanceBd = ($lastDayBalanceCashIn - $lastDayBalanceCashOut)-$lastDayExpense;

//VirutualBD
        $virtualCashIn = Virtualbd::all(['cash_in'])->sum('cash_in');
        $virtualCashOut = Virtualbd::all(['cash_out'])->sum('cash_out');
        $virtualBd = $virtualCashIn - $virtualCashOut;
//Rocket
        $virtualCashInRocket =Virtualcash::all(['cash_in'])->sum('cash_in');
        $virtualCashOutRocket =Virtualcash::all(['cash_out'])->sum('cash_out');
        $virtualcash = $virtualCashInRocket - $virtualCashOutRocket;

//        $totalExpense = Expense::where('date', '<=', Carbon::today())->sum('expense_amount');
//        dd($expenseAmount);

        $totalCustomer = Customer::all()->count();
//        dd($totalCustomer);
        return view('backend.elements.dashboard',compact('balanceBd','virtualBd','virtualcash','handCash','totalCustomer'));

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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
