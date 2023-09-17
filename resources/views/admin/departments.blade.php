@include('admin.layouts.header')
@include('admin.layouts.nav')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Departments</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">DashBoard</a></li>
                    <li class="breadcrumb-item active">Departments</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<div class="row m-10">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Departments List ({{ $DepartmentCount }})</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap table-bordered table-extra" id="rtable"
                    style="font-size: 14px !important;">
                    <thead>
                        <tr>
                            <th>Sl.No</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Departments as $Department)
                            @php
                                $iteration = ($Departments->currentPage() - 1) * $Departments->perPage() + $loop->index + 1;
                            @endphp
                            <tr>
                                <td align="center">{{ $iteration }}</td>

                                <td align="center">{{ $Department->departments }}</td>
                                @if ($Department->status == 1)
                                    <td align="center" style="color: green; font-weight: bold;">active</td>
                                @elseif($Department->status == 2)
                                    <td align="center" style="color:orangered; font-weight: bold;">coming soon</td>
                                @endif

                                <td align="center">
                                    <a href="{{ route('departmentedit', $Department->id) }}"
                                        class="btn btn-info btn-sm">Edit</a>
                                    <a href="{{ route('departmentdestroy', $Department->id) }}"
                                        class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                {{ $Departments->links() }}
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- Add new user link -->
<a href="{{ route('adddepartment') }}" title="Add New Internship">
    <i class="fa fa-plus-circle fa-add-new" aria-hidden="true"></i>
</a>
</div>
@include('admin.layouts.footer')

@if (session('success'))
    <script>
        Swal.fire({
            title: 'Success',
            text: `{{ session('success') }}`,
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
    </script>
@endif
