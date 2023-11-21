@extends('layouts.app')
@section('title','Employee')
@section('content')
     <div class="row">
        <div class="col-8 offset-3 table-responsive ">
            <a href="{{ route('employee.create') }}"><button class="btn btn-main mb-5">Create Employee</button></a>
            <table class="table table-bordered user_datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Department</th>
                        <th>Present</th>
                        {{-- <th width="100px">Action</th> --}}
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection

@section('extra_script')
    <script type="text/javascript">
  $(function () {
    var table = $('.user_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/employee/datatable/ssd",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'phone', name: 'phone'},
            {data: 'department_name', name: 'deparment_name'},
            {data: 'is_present', name: 'is_present'},
        ]
    });
  });
</script>  


@endsection 