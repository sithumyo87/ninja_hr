@extends('layouts.app')
@section('title','Employee Detail')
@section('content')
     <div class="row">
        <div class="col-md-12 col-sm-12 offset-md-2 table-responsive ">
            <a href="{{ route('employee.index') }}"><button class="btn btn-main rounded-1"><i class="fa-solid fa-chevron-left"></i> Back</button></a>
             <div class="card">
                <div class="card-body bg-transparent text-dark"  >
                     <div class="col-md-6">
                            <img src="{{ $employee->profile_img_path() }}" class="profile_img" alt="">
                        </div>
                    <div class="row">
                       
                    <div class="col-md-5">
                        <div>
                            <p><h5><i class="fa-brands fa-gg"></i> Employee Id </h5>
                           <h6>   {{ $employee->employee_id }}</h6></p>
                        </div><br>

                         <div>
                            <p><h5><i class="fa-brands fa-gg"></i> Phone </h5>
                           <h6>   {{ $employee->phone ?? '-'}}</h6></p>
                        </div><br>

                        <div>
                            <p><h5><i class="fa-brands fa-gg"></i> Birthday</h5>
                           <h6>   {{ $employee->birthday ?? '-' }}</h6></p>
                        </div><br>

                        <div>
                            <p><h5><i class="fa-brands fa-gg"></i> NRC Number</h5>
                           <h6>   {{ $employee->nrc_number ?? '-' }}</h6></p>
                        </div><br>

                        <div>
                            <p><h5><i class="fa-brands fa-gg"></i> Department </h5>
                           <h6>   {{ $employee->department->name ?? '-'}}</h6></p>
                        </div><br>

                        <div>
                            <p><h5><i class="fa-brands fa-gg"></i> Is Present </h5>
                           <h6>   @if ($employee->is_present == 1)
                                <span class="badge badge-pill badge-success">Present</span>
                            @else
                                <span class="badge badge-pill badge-danger">Leave</span>
                           @endif</h6></p>
                        </div><br>
                    </div>
                    <div class="col-md-5">
                        <div>
                            <p><h5><i class="fa-brands fa-gg"></i>Name </h5>
                           <h6>   {{ $employee->name ?? '-'}}</h6></p>
                        </div><br>

                        <div>
                            <p><h5><i class="fa-brands fa-gg"></i> Email</h5>
                           <h6>   {{ $employee->email ?? '-'}}</h6></p>
                        </div><br>

                        <div>
                            <p><h5><i class="fa-brands fa-gg"></i>Gender </h5>
                           <h6>   {{ $employee->gender ?? '-'}}</h6></p>
                        </div><br>

                        <div>
                            <p><h5><i class="fa-brands fa-gg"></i> Address </h5>
                           <h6>   {{ $employee->address ?? '-'}}</h6></p>
                        </div><br>

                          <div>
                            <p><h5><i class="fa-brands fa-gg"></i> Date Of Join </h5>
                           <h6>   {{ $employee->date_of_join ?? '-'}}</h6></p>
                        </div><br>
                    </div>
                    </div>
                </div>
             </div>
        </div>
     </div>
@endsection