<?php

namespace App\Http\Controllers;

use App\Balancebd;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalancebdController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('permission:balancebd_index|balancebd_show', ['only' => ['index','show']]);
//        $this->middleware('permission:balancebd_create', ['only' => ['create','store']]);
//        $this->middleware('permission:balancebd_edit', ['only' => ['edit','update']]);
//        $this->middleware('permission:balancebd_delete', ['only' => ['destroy']]);
//    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $balancebdData = Balancebd::orderby('date','desc')->paginate(15);
        return view('backend.balancebd.index',compact('balancebdData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formType = 'create';
        return view('backend.balancebd.create',compact('formType'));
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
            $balancebdData = $request->except('date');
            $balancebdData ['date'] = date('Y-m-d', strtotime($request-> date));
            $balancebdData['user_name'] = Auth::user()->id;
            Balancebd::create($balancebdData);

            return redirect()->route('balancebd.create')->with('message','Balance B/D Added Successfully');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Balancebd  $balancebd
     * @return \Illuminate\Http\Response
     */
    public function show(Balancebd $balancebd)
    {
        return view('backend.balancebd.show',compact('balancebd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Balancebd  $balancebd
     * @return \Illuminate\Http\Response
     */
    public function edit(Balancebd $balancebd)
    {
        $formType ='edit';
        return view('backend.balancebd.create',compact('formType','balancebd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Balancebd  $balancebd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Balancebd $balancebd)
    {
        try {
            $date = date('Y-m-d', strtotime($request->date));
            $balancebdData = $request->except('date');
            $balancebdData['date'] = $date;
            $balancebdData['user_name'] = Auth::user()->id;
            $balancebd->update($balancebdData);
            return redirect()->route('balancebd.index')->with('message','Balance B/D Updated Successfully');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Balancebd  $balancebd
     * @return \Illuminate\Http\Response
     */
    public function destroy(Balancebd $balancebd)
    {
        try {
            $balancebd->delete();
            return redirect()->route('balancebd.index')->with('message','Balance B/D Deleted Successfully');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
}
