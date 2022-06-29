<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Expensecategory;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::orderby('date','DESC')->paginate(15);
        return view('backend.expenses.index',compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formType = 'create';
        $expensecategories  = Expensecategory::pluck('expense_type','expense_type');
        return view('backend.expenses.create',compact('formType','expensecategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $expenses= $request->except('date');
            $expenses ['date'] = date('Y-m-d', strtotime($request-> date));
            Expense::create($expenses);

            return redirect()->route('expenses.create')->with('message','Data Added Successfully');
        }catch (QueryException $e){
         return redirect()->back()->withInput()->withErrors($e->getMessage());
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        return view('backend.expenses.show',compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        $formType = 'edit';
        $expensecategories  = Expensecategory::pluck('expense_type','expense_type');
        return view('backend.expenses.create',compact('formType','expense','expensecategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        try{
            $date = date('Y-m-d', strtotime($request->date));
            $expenses = $request->except('date');
            $expenses['date'] = $date;
            $expenses['user_name'] = Auth::user()->id;
            $expense->update($expenses);
            return redirect()->route('expenses.index')->with('message','Data Updated Successfully');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        try{
            $expense->delete();
            return redirect()->route('expenses.index')->with('message','Data Deleted Successfully');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
}
