@extends('layouts.app')
@section('title', 'Create Employee')
@section('content')
   <form action="{{ route('employee.update', $employee->id )}}" method="post"  id="my-form" enctype="multipart/form-data">
    @csrf
    @method('PUT')
     <div class="row">
        <div class="col-8">
            <div class="row">
                <label  class="col-md-4 col-form-label text-md-end">Employee ID</label>
                <div class="col-md-8">
                    <input type="text" class="form-control " name="employee_id" value="{{ $employee->employee_id }}">
                </div>
            </div>
        </div>

         <div class="col-8 mt-3">
            <div class="row">
                <label class="col-md-4 col-form-label text-md-end">Name</label>
                <div class="col-md-8">
                    <input  type="text" class="form-control " name="name" value="{{ $employee->name }}">
                </div>
            </div>
        </div>

        <div class="col-8 mt-3">
            <div class="row">
                <label class="col-md-4 col-form-label text-md-end">Phone</label>
                <div class="col-md-8">
                    <input  type="text" class="form-control " name="phone" value="{{ $employee->phone }}" >
                </div>
            </div>
        </div>

         <div class="col-8 mt-3">
            <div class="row">
                <label class="col-md-4 col-form-label text-md-end">Email</label>
                <div class="col-md-8">
                    <input  type="email" class="form-control " name="email" value="{{ $employee->email }}">
                </div>
            </div>
        </div>

         <div class="col-8 mt-3">
            <div class="row">
                <label class="col-md-4 col-form-label text-md-end">Password</label>
                <div class="col-md-8">
                    <input  type="number" class="form-control " name="password" value="{{ $employee->password }}">
                </div>
            </div>
        </div>

         <div class="col-8 mt-3">
            <div class="row">
                <label class="col-md-4 col-form-label text-md-end">NRC Number</label>
                <div class="col-md-8">
                    <input  type="text" class="form-control " name="nrc_number" value="{{ $employee->nrc_number }}">
                </div>
            </div>
        </div>

        <div class="col-8 mt-3">
            <div class="row">
                <label class="col-md-4 col-form-label text-md-end">Birthday</label>
                <div class="col-md-8">
                    <input  id="datepicker" type="text" class="form-control " name="birthday" value="{{ $employee->birthday }}">
                </div>
            </div>
        </div>

         <div class="col-8 mt-3">
            <div class="row">
                <label class="col-md-4 col-form-label text-md-end">Gender</label>
                <div class="col-8">
                <select name="gender" id="" class="form-control">
                <option value="" readonly diabled>Choose Gender</option>
                <option value="male" @if ($employee->gender == "male") 
                    selected
                    
                @endif>Male</option>
                <option value="female"  @if ($employee->gender == "female") 
                    selected
                    
                @endif>Female</option>
                </select>
                </div>
            </div>
        </div>

         <div class="col-8 mt-3">
            <div class="row">
                <label class="col-md-4 col-form-label text-md-end">address</label>
                <div class="col-md-8">
                    <textarea name="address" id="" cols="20" rows="3" class="form-control" >{{ $employee->address }}</textarea>
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
                      <option value="{{ $d->id }}" @if($d->id == $employee->department_id) selected @endif >{{ $d->name }}</option>  
                    @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-8 mt-3">
            <div class="row">
                <label class="col-md-4 col-form-label text-md-end">Date of Join</label>
                <div class="col-md-8">
                    <input  type="text" class="form-control " name="date_of_join" id="join_of_date" value="{{ $employee->date_of_join }}">
                </div>
            </div>
        </div>

         <div class="col-8 mt-3">
            <div class="row">
                <label class="col-md-4 col-form-label text-md-end" for="profile_img">Image Upload</label>
                <div class="col-md-8">
                    <input  type="file" class="form-control " name="profile_img" id="profile_img">
                     <div class="preview_img">
                        @if ($employee->profile_img)
                            <img src="{{ $employee->profile_img_path() }}" alt="">
                        @endif
                </div>
                </div>
                
            </div>
            
        </div>

        <div class="col-8 mt-3">
            <div class="row">
                <label class="col-md-4 col-form-label text-md-end">Is Present</label>
                <div class="col-md-8">
                    <select name="is_present" id="" class="form-control">
                        <option value="1" @if($employee->is_present == "1") selected @endif>Yes</option>
                      <option value="0" @if($employee->is_present == "0") selected @endif>No</option>  
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
{!! JsValidator::formRequest('App\Http\Requests\UpdateEmployee', '#my-form'); !!}
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

$('#profile_img').on('change',function(){
    var file_length = document.getElementById('profile_img').files.length;
    // console.log(file_length);
       $('.preview_img').html('');
    for(var i=0;i < file_length;i++){
        $('.preview_img').append(`<img src="${URL.createObjectURL(event.target.files[i])}"/>`)
    }
})
</script>


@endsection
