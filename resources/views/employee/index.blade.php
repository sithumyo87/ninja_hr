@extends('layouts.app')
@section('title', 'Employee')
@section('content')
    <div class="row">
        <div class="col-md-9 col-sm-12 offset-md-2 table-responsive ">
            <a href="{{ route('employee.create') }}"><button class="btn btn-main mb-5">Create Employee</button></a>
            <table class="table table-bordered user_datatable mt-2 display" style="width: 100%">
                <thead>
                    <tr>
                        <th class="no-sort"></th>
                        <th class="no-sort">Name</th>
                        <th>EmployeeID</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Department</th>
                        <th>Present</th>
                        <th>‌action</th>
                        <th class="hidden">Update At</th>
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
        $(function() {
            var table = $('.user_datatable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "/employee/datatable/ssd",
                columns: [{
                        data: 'plus-icon',
                        name: 'plus-icon'
                    },
                    {
                        data: 'employee_id',
                        name: 'employee_id'
                    },
                    {
                        data: 'profile_img',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'department_name',
                        name: 'department_name'
                    },
                    {
                        data: 'is_present',
                        name: 'is_present'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at'
                    },
                ],
                columnDefs: [{
                        target: 6,
                        // visible: false,
                        // searchable: false
                    },
                    {
                        target: 0,
                        class: "control",
                        // searchable: false,
                        // orderable:false
                    },
                    {
                        target: 1,
                       orderable: false,
                    },
                    {
                        target: 'hidden',
                        visible: false,
                    },
                    {
                        orderable: false,
                        target: 0
                    },
                ],
                "language": {
                    "paginate": {
                        "previous": "<i class='far fa-arrow-alt-circle-left'></i>",
                        "next": "<i class='far fa-arrow-alt-circle-right'></i>",
                    },
                    "processing": "<img src='/image/loading.gif' style='width:200px' /><p class='my-3'>loading...</p>"
                },
                order: [
                    [1, 'asc']
                ]
            });

             $(document).ready(function() {
            $(document).on('click', '.delete-btn', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                // console.log(id)
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                                method: "DELETE",
                                url: `/employee/${id}`,
                            })
                            .done(function(msg) {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    icon: "success"
                                });
                                table.ajax.reload();
                            });
                    }
                });
            })
        })
        });
       
    </script>


@endsection
