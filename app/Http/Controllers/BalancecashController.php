<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Balancecash;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class BalancecashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $balancecashData = Balancecash::orderby('id','desc')->paginate(15);
        return view('backend.balance_cash.index',compact('balancecashData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

//        $role = Role::create(['name' => 'Administer']);
//        $permission = Permission::create(['name' => 'Administer roles & permissions']);
        auth()->user()->assignRole('admin');
        auth()->user()->givePermissionTo('admin');
//        dd($role,$permission);
//        $formType = 'create'
        return view('backend.balance_cash.create',compact('formType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $balancecashData = $request->all();
            Balancecash::create($balancecashData);
            return redirect()->route('balancecash.create')->with('message','Balance Cash Added Successfully');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Balancecash  $balancecash
     * @return \Illuminate\Http\Response
     */
    public function show(Balancecash $balancecash)
    {
        return view('backend.balance_cash.show',compact('balancecash'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Balancecash  $balancecash
     * @return \Illuminate\Http\Response
     */
    public function edit(Balancecash $balancecash)
    {
        $formType ='edit';
        return view('backend.balance_cash.create',compact('formType','balancecash'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Balancecash  $balancecash
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Balancecash $balancecash)
    {
        try {
            $balancecashData = $request->all();
            $balancecash->update($balancecashData);
            return redirect()->route('balancecash.index')->with('message','Balance Cash Updated Successfully');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Balancecash  $balancecash
     * @return \Illuminate\Http\Response
     */
    public function destroy(Balancecash $balancecash)
    {
        try {
            $balancecash->delete();
            return redirect()->route('balancecash.index')->with('message','Balance Cash Deleted Successfully');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
}
