<?php

namespace App\Http\Controllers;

use App\Relation;
use Illuminate\Http\Request;

class RelationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $relations = Relation::orderby('id','asc')->paginate(15);
        return view('backend.relation_categories.index',compact('relations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formType = 'create';
        return view('backend.relation_categories.create',compact('formType'));
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
            $relations = $request->all();
            Relation::create($relations);

            return redirect()->route('relations.create')->with('message', 'Category Added Successfully');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Relation  $relation
     * @return \Illuminate\Http\Response
     */
    public function show(Relation $relation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Relation  $relation
     * @return \Illuminate\Http\Response
     */
    public function edit(Relation $relation)
    {
        $formType = 'edit';
//        dd($Incomecategory);
        return view('backend.relation_categories.create', compact('formType','relation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Relation  $relation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Relation $relation)
    {
        try{
            $relations = $request->all();
            $relation->update($relations);
            return redirect()->route('relations.index')->with('message', "Category updated successfully");
        }catch(QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Relation  $relation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Relation $relation)
    {
        try{
            $relation->delete();
            return redirect()->route('relations.index')->with('message', "Category Deleted successfully");
        }catch(QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
}
