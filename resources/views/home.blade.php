@extends('layouts.app')
@section('title', 'Profile')
@section('content')
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-8 ">
            <div class="card my-4 shadow-lg p-3 mb-5 bg-white rounded-3 ">
                <div class="card-body bg-light text-dark text-center">
                    <div>
                        <img src="{{ $employee->profile_img_path() }}" class="profile_img" alt="">
                        </br>
                        </br>
                        <h5> @ {{ $employee->employee_id }} | <span
                                style="color:rgb(8, 218, 8)">{{ $employee->phone }}</span></h5>
                        <h6><span class="badge badge-warning">{{ $employee->department->name ?? '-' }}</span></h6>
                    </div><br>
                </div>
            </div>
        </div>
    </div>
@endsection
