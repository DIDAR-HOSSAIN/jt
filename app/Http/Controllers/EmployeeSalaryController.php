<?php

namespace App\Http\Controllers;

use App\Employee_Salary;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class EmployeeSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empSalaries = Employee_Salary::orderBy('id','desc')->paginate(15);
        return view('backend.payroll.employee_salary.index',compact('empSalaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formType = 'create';
        return view('backend.payroll.employee_salary.create',compact('formType'));
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
            $empSalaries = $request->all();
            Employee_Salary::create($empSalaries);
            return redirect()->route('increments.create')->with('message','Employee & Salary Added Successfully');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee_Salary  $employee_Salary
     * @return \Illuminate\Http\Response
     */
    public function show(Employee_Salary $employee_Salary)
    {
        return view('backend.payroll.employee_salary.show',compact('employee_Salary'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee_Salary  $employee_Salary
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee_Salary $employee_Salary)
    {
        $formType = 'edit';
        return view('backend.payroll.employee_salary.create',compact('employee','formType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee_Salary  $employee_Salary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee_Salary $employee_Salary)
    {
        try{
            $empSalaries = $request->all();
            $employee_Salary->update($empSalaries);

            return redirect()->route('empSalaries.index')->with('message','Employee & Salary Updated Successfully');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee_Salary  $employee_Salary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee_Salary $employee_Salary)
    {
        try{
            $employee_Salary->delete();

            return redirect()->route('empSalaries.index')->with('message','Employee & Salary Deleted Successfully');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

}
