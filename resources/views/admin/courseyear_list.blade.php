@include('admin.layouts.header')
@include('admin.layouts.nav')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Course Year</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">DashBoard</a></li>
                    <li class="breadcrumb-item active">Course Year</li>
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
                <h3 class="card-title">Course Year List ({{ $CourseYears->total() }})</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap table-bordered table-extra" id="rtable"
                    style="font-size: 14px !important;">
                    <thead>
                        <tr>
                            <th>Sl.No</th>
                            <th>Display Order</th>
                            <th>Course Year</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($CourseYears as $CourseYear)
                            @php
                                $iteration = ($CourseYears->currentPage() - 1) * $CourseYears->perPage() + $loop->index + 1;
                            @endphp
                            <tr>
                                <td align="center">{{ $iteration }}</td>
                                <td align="center">{{ $CourseYear->display_order }}</td>
                                <td align="center">{{ $CourseYear->course_year }}</td>
                                <td align="center">
                                    <a class="btn btn-info btn-sm"
                                        onclick="CourseYearEdit('{{ $CourseYear->id }}')">Edit</a>
                                    <a class="btn btn-danger btn-sm text-light"
                                        onclick="CourseYRdelete('{{ $CourseYear->id }}')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                {{ $CourseYears->links() }}
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- Add new user link -->
<a href="{{ route('courseyearadd') }}" title="Add New Internship">
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

<script>
    function CourseYearEdit(CourseYearID) {
        var profileUrl = '/course-year-edit/' + CourseYearID;

        window.location.href = profileUrl;
    }

    function CourseYRdelete(CourseID) {
        // alert(CourseID);
        data = new FormData();

        data.append('courseid', CourseID);
        data.append('_token', '{{ csrf_token() }}');

        Swal.fire({
            title: 'Do You Want To Delete..??',
            // text: "You won't be able to revert this!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({

                    type: "POST",
                    url: "/course-year-delete",
                    data: data,
                    dataType: "json",
                    contentType: false,
                    //cache: false,
                    processData: false,

                    success: function(data) {
                        if (data['success']) {

                            Swal.fire({
                                title: 'Course Year Deleted SuccessFully',
                                // text: "You won't be able to revert this!",
                                icon: 'success',
                                // showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = window.location.href;
                                }
                            })
                        }
                    }
                })
            }
        })
    }
</script>
