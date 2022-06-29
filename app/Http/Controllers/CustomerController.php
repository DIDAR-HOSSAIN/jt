<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Relation;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::orderBy('id','DESC')->paginate(15);
        return view('backend.customer_info.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formType = 'create';
        $relations  = Relation::pluck('relation_type','relation_type');
        return view('backend.customer_info.create',compact('formType','relations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $this->validate($request, [
            'opening_date' => 'required',
            'account_name' => 'required',
            'account_no' => 'required',
            'account_type' => 'required',
            'mobile_no' => 'required',
            'customer_id_no' => 'required',
            'finger_print' => 'required',
            'nominee_name' => 'required',
            'nominee_mobile_no' => 'required',
            'relationship_with_account_holder' => 'required',
            'opening_deposit' => 'required',
//            'dps_no' => 'required',
//            'dps_amount_date' => 'required',
//            'fdr_No' => 'required',
//            'fdr_amount' => 'required',
        ]);


        try{
            $customers = $request->except('opening_date');
            $customers['opening_date'] = date('Y-m-d', strtotime($request->opening_date));
            $customers['user_name'] = Auth::user()->id;
            Customer::create($customers);

            return redirect()->route('customers.create')->with('message', 'Data Inserted Successfully');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('backend.customer_info.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $formType = 'edit';
        $relations  = Relation::pluck('relation_type','relation_type');
        return view('backend.customer_info.create', compact('formType','customer','relations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        try{
            $date = date('Y-m-d', strtotime($request->opening_date));
            $customers = $request->except('opening_date');
            $customers['opening_date'] = $date;
            $customers['user_name'] = Auth::user()->id;
            $customer->update($customers);
            return redirect()->route('customers.index')->with('message', "Customer Info updated successfully");
        }catch(QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        try{
            $customer->delete();
            return redirect()->route('customers.index')->with('message', 'Customers has been deleted successfully');
        }catch(QueryException $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function search (Request $request)
    {
        $search = $request->get('search');
        $customers = DB::table ('customers')->orderBy('id','desc')->where('mobile_no','like','%'.$search.'%')->paginate(15);
        return view('backend.customer_info.index',['customers' =>$customers]);
    }


}
