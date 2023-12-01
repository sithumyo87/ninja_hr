<?php

namespace App\Http\Controllers;

use DataTables;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Employee;
use App\Models\Deparment;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployee;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateEmployee;
use Illuminate\Support\Facades\Storage;

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
        return Datatables::of($employees)
        ->filterColumn('department_name',function($query,$keyword){
            $query->whereHas('department',function($q1) use ($keyword){
                $q1->where('name','like','%'.$keyword.'%');
            });
        })->addColumn('department_name',function($each){
            return $each->department ? $each->department->name : '-';
        })
        ->editColumn('profile_img',function($each){
            return  '<img src="'.$each->profile_img_path().'" alt="" class="profile_thumbnail"><p>'.$each->name.'</p>';
        })
        ->editColumn('is_present',function($each){
             if($each->is_present == 1){
                return '<span class="badge badge-pill badge-success  border border-success">Present</span>';
             }else{
                return '<span class="badge badge-pill badge-danger borderborder-danger">Leave</span>';
             }
        })
        ->editColumn('updated_at',function($each){
            return Carbon::parse($each->updated_at)->format('Y-m-d H:i:s');
        })->addColumn('action',function($each){
            $edit_icon = '<a href="'.route('employee.edit',$each->id).'" class="text-warning"><i class="fas fa-edit"></i>';
            $show_icon = '<a href="'.route('employee.show',$each->id).'" class="text-primary"><i class="fas fa-info-circle"></i>';
            $delete_icon = '<a href="#" class="text-danger delete-btn" data-id="'.$each->id.'"><i class="fas fa-trash"></i>';
            return '<div class="action-icon">'.$edit_icon. $show_icon. $delete_icon .'</div>';
        })
        ->addColumn('plus-icon',function($each){
            return null;
        })
        ->rawColumns(['profile_img','is_present','action'])
        
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
        $profile_img_name = null;
        if($request->hasFile('profile_img')){
            $profile_img_file = $request->file('profile_img');
            // dd($profile_img_file);
            $profile_img_name =  uniqid() . '_'.time() . '.' . $profile_img_file->getClientOriginalExtension();
            Storage::disk('public')->put('employee/'.$profile_img_name,file_get_contents($profile_img_file));
        }
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
        $employee->profile_img = $profile_img_name;
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
    public function show($id)
    {
        $employee = User::findOrFail($id);
        return view('employee.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $departments = Deparment::orderBy('name')->get();
        $employee = User::findOrFail($id);
        return view('employee.edit',compact('employee','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployee $request,$id)
    {
        
         $employee = User::findOrFail($id);

         $profile_img_name = $employee->profile_img;
         if($request->hasFile('profile_img')){
            Storage::disk('public')->delete('employee/'. $employee->profile_img);
            $profile_img_file = $request->file('profile_img');
            // dd($profile_img_file);
            $profile_img_name =  uniqid() . '_'.time() . '.' . $profile_img_file->getClientOriginalExtension();
            Storage::disk('public')->put('employee/'.$profile_img_name,file_get_contents($profile_img_file));
        }
        $employee->employee_id = $request->employee_id;
        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->password = $request->password ? Hash::make($request->password) : $employee->password;
        $employee->email = $request->email;
        $employee->nrc_number = $request->nrc_number;
        $employee->gender = $request->gender;
        $employee->birthday = $request->birthday;
        $employee->address = $request->address;
        $employee->department_id = $request->department_id;
        $employee->date_of_join = $request->date_of_join;
        $employee->profile_img = $profile_img_name;
        $employee->is_present = $request->is_present;
        $employee->update();

        return redirect()->route('employee.index')->with('update','Employee is Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $employee = User::findOrFail($id);
       $employee->delete();
       return "Success";
    }
}