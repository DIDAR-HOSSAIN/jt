<?php

namespace App\Http\Controllers;

use App\Incomecategory;
use Illuminate\Http\Request;
use PDF;
class IncomecategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomecategories = Incomecategory::orderby('id','asc')->paginate(15);
        return view('backend.income_categories.index',compact('incomecategories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formType = 'create';
        return view('backend.income_categories.create',compact('formType'));
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
            $incomecategories = $request->all();
            Incomecategory::create($incomecategories);

            return redirect()->route('incomecategories.create')->with('message', 'Category Added Successfully');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Incomecategory  $incomecategory
     * @return \Illuminate\Http\Response
     */
    public function show(Incomecategory $incomecategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Incomecategory  $incomecategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Incomecategory $incomecategory)
    {
        $formType = 'edit';
//        dd($Incomecategory);
        return view('backend.income_categories.create', compact('formType','incomecategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Incomecategory  $incomecategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incomecategory $incomecategory)
    {
        try{
            $incomecategories = $request->all();
            $incomecategory->update($incomecategories);
            return redirect()->route('incomecategories.index')->with('message', "Category updated successfully");
        }catch(QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Incomecategory  $incomecategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incomecategory $incomecategory)
    {
        try{
            $incomecategory->delete();
            return redirect()->route('incomecategories.index')->with('message', "Category Deleted successfully");
        }catch(QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

}
