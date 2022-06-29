<?php

namespace App\Http\Controllers;

use App\Virtualcash;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VirtualcashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $virtualcashData = Virtualcash::orderBy('date','desc')->paginate(15);
        return view('backend.virtual_cash.index',compact('virtualcashData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formType = 'create';
        return view('backend.virtual_cash.create',compact('formType'));
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
            $virtualcashData = $request->except('date');
            $virtualcashData ['date'] = date('Y-m-d', strtotime($request-> date));
            Virtualcash::create($virtualcashData);

            return redirect()->route('virtualcash.create')->with('message','Virtual Cash Added Successfully');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Virtualcash  $virtualcash
     * @return \Illuminate\Http\Response
     */
    public function show(Virtualcash $virtualcash)
    {
        return view('backend.virtual_cash.show',compact('virtualcash'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Virtualcash  $virtualcash
     * @return \Illuminate\Http\Response
     */
    public function edit(Virtualcash $virtualcash)
    {
        $formType = 'edit';
        return view('backend.virtual_cash.create',compact('formType','virtualcash'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Virtualcash  $virtualcash
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Virtualcash $virtualcash)
    {
        try {
            $date = date('Y-m-d', strtotime($request->date));
            $virtualcashData = $request->except('date');
            $virtualcashData['date'] = $date;
            $virtualcashData['user_name'] = Auth::user()->id;
            $virtualcash->update($virtualcashData);
            return redirect()->route('virtualcash.index')->with('message','Virtual Cash Updated Successfully');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Virtualcash  $virtualcash
     * @return \Illuminate\Http\Response
     */
    public function destroy(Virtualcash $virtualcash)
    {
        try {
            $virtualcash->delete();
            return redirect()->route('virtualcash.index')->with('message','Virtual Cash Deleted Successfully');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

}
