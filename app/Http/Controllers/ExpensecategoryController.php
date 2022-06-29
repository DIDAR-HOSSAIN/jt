<?php

namespace App\Http\Controllers;

use App\Expensecategory;
use Illuminate\Http\Request;

class ExpensecategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expensecategories = Expensecategory::orderby('id','asc')->paginate(15);
        return view('backend.expense_categories.index',compact('expensecategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formType = 'create';
        return view('backend.expense_categories.create',compact('formType'));
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
            $expensecategories = $request->all();
            Expensecategory::create($expensecategories);

            return redirect()->route('expensecategories.create')->with('message', 'Category Added Successfully');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expensecategory  $expensecategory
     * @return \Illuminate\Http\Response
     */
    public function show(Expensecategory $expensecategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expensecategory  $expensecategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Expensecategory $expensecategory)
    {
        $formType = 'edit';
//        dd($expensecategory);
        return view('backend.expense_categories.create', compact('formType','expensecategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expensecategory  $expensecategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expensecategory $expensecategory)
    {
        try{
            $data = $request->all();
            $expensecategory->update($data);
            return redirect()->route('expensecategories.index')->with('message', "Category updated successfully");
        }catch(QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expensecategory  $expensecategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expensecategory $expensecategory)
    {
        try{
        $expensecategory->delete();
        return redirect()->route('expensecategories.index')->with('message', "Category Deleted successfully");
    }catch(QueryException $e){
return redirect()->back()->withInput()->withErrors($e->getMessage());
}
    }
}
