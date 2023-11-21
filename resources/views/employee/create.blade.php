@extends('layouts.app')
@section('title', 'Create Employee')
@section('content')
   <form action="{{ route('employee.store') }}" method="POST" id="my-form">
    @csrf
     <div class="row">
        <div class="col-8">
            <div class="row">
                <label  class="col-md-4 col-form-label text-md-end">Employee ID</label>
                <div class="col-md-8">
                    <input type="text" class="form-control " name="employee_id">
                </div>
            </div>
        </div>

         <div class="col-8 mt-3">
            <div class="row">
                <label class="col-md-4 col-form-label text-md-end">Name</label>
                <div class="col-md-8">
                    <input  type="text" class="form-control " name="name">
                </div>
            </div>
        </div>

        <div class="col-8 mt-3">
            <div class="row">
                <label class="col-md-4 col-form-label text-md-end">Phone</label>
                <div class="col-md-8">
                    <input  type="text" class="form-control " name="phone">
                </div>
            </div>
        </div>

         <div class="col-8 mt-3">
            <div class="row">
                <label class="col-md-4 col-form-label text-md-end">Email</label>
                <div class="col-md-8">
                    <input  type="email" class="form-control " name="email">
                </div>
            </div>
        </div>

         <div class="col-8 mt-3">
            <div class="row">
                <label class="col-md-4 col-form-label text-md-end">Password</label>
                <div class="col-md-8">
                    <input  type="number" class="form-control " name="password">
                </div>
            </div>
        </div>

         <div class="col-8 mt-3">
            <div class="row">
                <label class="col-md-4 col-form-label text-md-end">NRC Number</label>
                <div class="col-md-8">
                    <input  type="text" class="form-control " name="nrc_number">
                </div>
            </div>
        </div>

        <div class="col-8 mt-3">
            <div class="row">
                <label class="col-md-4 col-form-label text-md-end">Birthday</label>
                <div class="col-md-8">
                    <input  id="datepicker" type="text" class="form-control " name="birthday">
                </div>
            </div>
        </div>

         <div class="col-8 mt-3">
            <div class="row">
                <label class="col-md-4 col-form-label text-md-end">Gender</label>
                <div class="col-8">
                <select name="gender" id="" class="form-control">
                <option value="" readonly diabled>Choose Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                </select>
                </div>
            </div>
        </div>

         <div class="col-8 mt-3">
            <div class="row">
                <label class="col-md-4 col-form-label text-md-end">address</label>
                <div class="col-md-8">
                    <textarea name="address" id="" cols="20" rows="3" class="form-control"></textarea>
                </div>
            </div>
        </div>

        
         <div class="col-8 mt-3">
            <div class="row">
                <label class="col-md-4 col-form-label text-md-end">Department</label>
                <div class="col-md-8">
                    <select name="department_id" id="" class="form-control">
                        <option value="">Choose Department</option>
                    @foreach ($departments as  $d)
                      <option value="{{ $d->id }}">{{ $d->name }}</option>  
                    @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-8 mt-3">
            <div class="row">
                <label class="col-md-4 col-form-label text-md-end">Date of Join</label>
                <div class="col-md-8">
                    <input  type="text" class="form-control " name="date_of_join" id="join_of_date">
                </div>
            </div>
        </div>

        <div class="col-8 mt-3">
            <div class="row">
                <label class="col-md-4 col-form-label text-md-end">Is Present</label>
                <div class="col-md-8">
                    <select name="is_present" id="" class="form-control">
                        <option value="1">Yes</option>
                      <option value="0">No</option>  
                    </select>
                </div>
            </div>
        </div>
        

        <div class="col-10 offset-1 mt-3 ">
            <div class="offset-2">
            <button type="submit" class="btn btn-main">Submit</button>
            </div>
        </div>

        {{-- <hr class="mt-3"> --}}
        

        
    </div>
   </form>
@endsection

@section('extra_script')
{!! JsValidator::formRequest('App\Http\Requests\StoreEmployee', '#my-form'); !!}
<script>
        $(function() {
 $('#datepicker').daterangepicker({
    "singleDatePicker": true,
    "showDropdowns": true,
    "autoApply": true,
    "maxDate" :moment(),
    "locale" :{
        "format":"YYYY-MM-DD"
    }
});

$('#join_of_date').daterangepicker({
    "singleDatePicker": true,
    "showDropdowns": true,
    "autoApply": true,
    "maxDate" :moment(),
    "locale" :{
        "format":"YYYY-MM-DD"
    }
});
});
</script>


@endsection
