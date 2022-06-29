<?php

namespace App\Http\Controllers;

use App\Increment;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class IncrementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $increments = Increment::orderBy('id','desc')->paginate(15);
        return view('backend.payroll.increments.index',compact('increments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formType = 'create';
        return view('backend.payroll.increments.create',compact('formType'));
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
            $increments = $request->all();
            Increment::create($increments);
            return redirect()->route('increments.create')->with('message','Increment Salary Added Successfully');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Increment  $increment
     * @return \Illuminate\Http\Response
     */
    public function show(Increment $increment)
    {
        return view('backend.payroll.increments.show',compact('increment'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Increment  $increment
     * @return \Illuminate\Http\Response
     */
    public function edit(Increment $increment)
    {
        $formType = 'edit';
        return view('backend.payroll.increments.create',compact('increment','formType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Increment  $increment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Increment $increment)
    {
        try{
            $increments = $request->all();
            $increment->update($increments);

            return redirect()->route('increments.index')->with('message','Increment Salary Updated Successfully');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Increment  $increment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Increment $increment)
    {
        try{
            $increment->delete();

            return redirect()->route('increments.index')->with('message','Increment Salary Deleted Successfully');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

}
