@include('admin.layouts.header')
@include('admin.layouts.nav')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Course</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">DashBoard</a></li>
                    <li class="breadcrumb-item active">Courses</li>
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
                <h3 class="card-title">Courses ({{ $CourseCount }})</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap table-bordered table-extra" id="rtable"
                    style="font-size: 14px !important;">
                    <thead>
                        <tr>
                            <th>Sl.No</th>
                            <th>Department</th>
                            <th>Course Year</th>
                            <th>Image</th>
                            <th>Course Name</th>
                            <th>Batch</th>
                            <th>Duration</th>
                            <th>University</th>
                            <th>Time Table</th>
                            <th>Enroll Now</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Courses as $course)
                            @php
                                $iteration = ($Courses->currentPage() - 1) * $Courses->perPage() + $loop->index + 1;
                            @endphp
                            <tr>
                                <td align="center">{{ $iteration }}</td>
                                <td align="center">{{ $course->GetDepartment->departments }}</td>
                                <td align="center">{{ $course->getCourseYear->course_year }}</td>
                                <td align="center"><img src="{{ $course->image }}" alt="" width="60px"
                                        height="60px"></td>
                                <td align="center">{{ $course->course_name }}</td>
                                <td align="center">{{ $course->batch }}</td>
                                <td align="center">{{ $course->duration }}</td>
                                <td align="center">{{ $course->university }}</td>
                                <td align="center"><a href="{{ asset($course->time_table) }}" target="_blank"><i
                                            style="font-size: 25px;" class="fa-solid fa-file-pdf"></i></a></i></td>
                                <td align="center">{{ $course->enroll_now }}</td>
                                <td align="center">
                                    <a href="{{ route('courseedit', $course->id) }}"
                                        class="btn btn-info btn-sm">Edit</a>
                                    <a href="{{ route('coursedestroy', $course->id) }}"
                                        class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                {{ $Courses->links() }}
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- Add new user link -->
<a href="{{ route('addcourse') }}" title="Add New Internship">
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
