<?php

namespace App\Http\Controllers;

use App\Balancebd;
use App\Balancecash;
use App\Income;
use App\Incomecategory;
use App\Incomedetails;
use App\Virtualbd;
use App\Virtualcash;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomes = Income::orderby('date','desc')->paginate(15);
        return view('backend.incomes.index',compact('incomes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formType = 'create';
        $incomecategories  = Incomecategory::pluck('income_type','income_type');
        return view('backend.incomes.create',compact('formType','incomecategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->date);
        try{
            $date = date('Y-m-d', strtotime($request->date));
            $incomeData = $request->except('date');
            $incomeData['date'] = $date;
            $incomeData['user_name'] = Auth::user()->id;
            $income_id = Income::create($incomeData);

            if($request->income_type == "Deposit Commission")
            {
                Virtualbd::create([
                    'date'=>$date,
                    'cash_in'=>$request->income_amount,
                    'income_id' => $income_id->id
                ]);

            }

            if($request->income_type == "ORO Commission")
            {
                Virtualbd::create([
                    'date'=>$date,
                    'cash_in'=>$request->income_amount,
                    'income_id' => $income_id->id
                ]);
            }

            if($request->income_type == "KYC Commission")
            {
                Virtualbd::create([
                    'date'=>$date,
                    'cash_in'=>$request->income_amount,
                    'income_id' =>$income_id->id
                    ]);  //+
            }

            if($request->income_type == "DSR Cash In")
            {
                Virtualbd::create([
                    'date'=>$date,
                    'cash_out'=>$request->income_amount,
                    'income_id' => $income_id->id
                ]);   //-
            }

            if($request->income_type == "DSR Cash Out")
            {
                Virtualbd::create([
                    'date'=>$date,
                    'cash_in'=>$request->income_amount,
                    'income_id' => $income_id->id
                ]);   //+
            }

            if($request->income_type == "Cash Deposit")
            {
                Virtualbd::create([
                    'date'=>$date,
                    'cash_out'=>$request->income_amount,
                    'income_id' => $income_id->id
                ]);   //-
                Balancebd::create([
                    'date'=>$date,
                    'cash_in'=>$request->income_amount,
                    'income_id' => $income_id->id
                ]);   //+
            }

            if($request->income_type == "Cash Withdraw")
            {
                Balancebd::create([
                    'date'=>$date,
                    'cash_out'=>$request->income_amount,
                    'income_id' => $income_id->id
                ]);   //-
                Virtualbd::create([
                    'date'=>$date,
                    'cash_in'=>$request->income_amount,
                    'income_id' => $income_id->id

                ]);   //+
            }

            if($request->income_type == "Bill Pay")
            {
                Balancebd::create([
                    'date'=>$date,
                    'cash_in'=>$request->income_amount,
                    'income_id' => $income_id->id
                ]);   //+
            }

            if($request->income_type == "Commission")
            {
                Virtualbd::create([
                    'date'=>$date,
                    'cash_in'=>$request->income_amount,
                    'income_id' => $income_id->id
                ]);   //+
            }


            if($request->income_type == "Remitance Disbursement")
            {
                Virtualbd::create([
                    'date'=>$date,
                    'cash_in'=>$request->income_amount,
                    'income_id' => $income_id->id
                ]);   //+
                Balancebd::create([
                    'date'=>$date,
                    'cash_out'=>$request->income_amount,
                    'income_id' => $income_id->id
                ]);   //-
            }


//            Rocket

            if($request->income_type == "Cash Deposit Rocket")
            {
                Balancebd::create([
                    'date'=>$date,
                    'cash_in'=>$request->income_amount,
                    'income_id' => $income_id->id
                ]);   //+
                Virtualcash::create([
                    'date'=>$date,
                    'cash_out'=>$request->income_amount,
                    'income_id' => $income_id->id
                ]);   //-
            }

            if($request->income_type == "Cash Withdraw Rocket")
            {
            Virtualcash::create([
                'date'=>$date,
                'cash_in'=>$request->income_amount,
                'income_id' => $income_id->id
            ]);   //+

                Balancebd::create([
                    'date'=>$date,
                    'cash_out'=>$request->income_amount,
                    'income_id' => $income_id->id
                ]);   //-
            }

            if($request->income_type == "Rocket Commission")
            {
                Virtualcash::create([
                    'date'=>$date,
                    'cash_in' => $request->income_amount,
                    'income_id' => $income_id->id
                ]);   //+
            }


            return redirect()->route('incomes.create')->with('message', 'Data Added Successfully');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {
        return view('backend.incomes.show',compact('income'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income)
    {
        $formType = 'edit';
        $incomecategories  = Incomecategory::pluck('income_type','income_type');
        return view('backend.incomes.create',compact('formType','income','incomecategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Income $income)
    {
        try{
            $date = date('Y-m-d', strtotime($request->date));
            $incomeData = $request->except('date');
            $incomeData['date'] = $date;
            $incomeData['user_name'] = Auth::user()->id;
            $income->Update($incomeData);
            return redirect()->route('incomes.index')->with('message', 'Data Updated Successfully');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {
        try{
        $income->delete();
        return redirect()->route('incomes.index')->with('message', "Category Deleted Successfully");
    }catch(QueryException $e){
        return redirect()->back()->withInput()->withErrors($e->getMessage());
}
}

}
