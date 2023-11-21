<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\User;
use App\Models\Employee;
use App\Models\Deparment;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee.index');
}

 public function ssd(Request $request)
    {
        $employees = User::with('department');
        // dd($employees);
        return Datatables::of($employees)->addColumn('department_name',function($each){
            return $each->department ? $each->department->name : '-';
        })->editColumn('is_present',function($each){
             if($each->is_present == 1){
                return '<span class="badge badge-pill badge-success  border border-success">Present</span>';
             }else{
                return '<span class="badge badge-pill badge-danger borderborder-danger">Leave</span>';
             }
        })->rawColumns(['is_present'])
        
        ->make(true);
        
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Deparment::orderBy('name')->get();
        return view('employee.create',compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployee $request)
    {
        // dd($request->all());
        $employee = new User();
        $employee->employee_id = $request->employee_id;
        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->password = $request->password;
        $employee->email = $request->email;
        $employee->nrc_number = $request->nrc_number;
        $employee->gender = $request->gender;
        $employee->birthday = $request->birthday;
        $employee->address = $request->address;
        $employee->department_id = $request->department_id;
        $employee->date_of_join = $request->date_of_join;
        $employee->is_present = $request->is_present;
        $employee->save();

        return redirect()->route('employee.index')->with('create','Employee is Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}