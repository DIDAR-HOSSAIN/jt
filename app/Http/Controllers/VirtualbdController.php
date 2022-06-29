<?php

namespace App\Http\Controllers;

use App\Virtualbd;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VirtualbdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $virtualbdData = Virtualbd::orderby('date','desc')->paginate(15);
        return view('backend.virtualbd.index',compact('virtualbdData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formType = 'create';
        return view('backend.virtualbd.create',compact('formType'));
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
            $virtualbdData = $request->except('date');
            $virtualbdData ['date'] = date('Y-m-d', strtotime($request-> date));
            Virtualbd::create($virtualbdData);

            return redirect()->route('virtualbd.create')->with('message','Virtualbd Added Successfully');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Virtualbd  $virtualbd
     * @return \Illuminate\Http\Response
     */
    public function show(Virtualbd $virtualbd)
    {
        return view('backend.virtualbd.show',compact('virtualbd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Virtualbd  $virtualbd
     * @return \Illuminate\Http\Response
     */
    public function edit(Virtualbd $virtualbd)
    {
        $formType = 'edit';
        return view('backend.virtualbd.create',compact('formType','virtualbd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Virtualbd  $virtualbd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Virtualbd $virtualbd)
    {
        try {
            $date = date('Y-m-d', strtotime($request->date));
            $virtualbdData = $request->except('date');
            $virtualbdData['date'] = $date;
            $virtualbdData['user_name'] = Auth::user()->id;
            $virtualbd->update($virtualbdData);
            return redirect()->route('virtualbd.index')->with('message','Virtualbd Updated Successfully');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Virtualbd  $virtualbd
     * @return \Illuminate\Http\Response
     */
    public function destroy(Virtualbd $virtualbd)
    {
        try {
             $virtualbd->delete();
             return redirect()->route('virtualbd.index')->with('message','Virtual B/D Deleted Successfully');
             }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
}
    }

}
