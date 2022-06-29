<?php

namespace App\Http\Controllers;

use App\Rocket;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RocketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rocketData = Rocket::orderBy('date','desc')->paginate(15);
        return view('backend.rocket.index',compact('rocketData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formType = 'create';
        return view('backend.rocket.create',compact('formType'));
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
            $rocketData = $request->except('date');
            $rocketData ['date'] = date('Y-m-d', strtotime($request-> date));
            Rocket::create($rocketData);

            return redirect()->route('Rocket.create')->with('message','Rocket Cash Added Successfully');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Rocket $rocket)
    {
        return view('backend.rocket.show',compact('rocket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Rocket $rocket)
    {
        $formType = 'edit';
        return view('backend.rocket.create',compact('formType','rocket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rocket $rocket)
    {
        try {
            $date = date('Y-m-d', strtotime($request->date));
            $rocketData = $request->except('date');
            $rocketData['date'] = $date;
            $rocketData['user_name'] = Auth::user()->id;
            $rocket->update($rocketData);
            return redirect()->route('Rocket.index')->with('message','Rocket Cash Updated Successfully');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rocket $rocket)
    {
        try {
            $rocket->delete();
            return redirect()->route('Rocket.index')->with('message','Rocket Cash Deleted Successfully');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

}
