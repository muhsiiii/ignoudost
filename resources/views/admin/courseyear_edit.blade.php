@include('admin.layouts.header')
@include('admin.layouts.nav')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Department</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">DashBoard</a></li>

                    <li class="breadcrumb-item active">Edit Department</li>
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
                <h3 class="card-title">Edit Department Tittle</h3>
            </div>

            <form id="departmentform">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title" class="form-label text-right">Course Year<span
                                        class="text-danger">*</span> :</label>
                                <input class="form-control" placeholder="Enter Course Year" type="text" value="{{ $CourseYear->course_year }}" id="courseyr">
                                 <input type="hidden" value="{{ $CourseYear->id }}" id="courseid">
                                <div class="courseyrerror"></div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title" class="form-label text-right">Display Order<span
                                        class="text-danger">*</span> :</label>
                                <input class="form-control" placeholder="Enter Display Order"
                                    type="text" value="{{ $CourseYear->id }}" id="displayorder">
                                <div class="displayordererror"></div>
                            </div>
                        </div>

                    </div>


                    <div class="card-footer">
                        <a class="btn btn-default " href="{{ route('courseyearlist') }}">Back</a>&emsp;
                        <button type="button" id="addBtn" class="btn btn-primary float-right"
                            onclick="CourseYRUpdate()"> Update </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
</div>
@include('admin.layouts.footer')


<script>
    function CourseYRUpdate() {

        var CourseYear = $('input#courseyr').val();
        var CourseYearID = $('input#courseid').val();
        var DisplayOrder = $('input#displayorder').val();
        // alert(CourseYear);
        // return false;


        if (CourseYear == '') {
            $('#courseyr').focus();
            $('#courseyr').css({
                'border': '1px solid red'
            });
            $('.courseyrerror').show();
            $('.courseyrerror').css('color', 'red');
            $('.courseyrerror').text("enter course year*");
            return false;
        } else

            $('#courseyr').css({
                'border': '1px solid #CCC'
            });
        $('.courseyrerror').hide();

        if (DisplayOrder == '') {
            $('#displayorder').focus();
            $('#displayorder').css({
                'border': '1px solid red'
            });
            $('.displayordererror').show();
            $('.displayordererror').css('color', 'red');
            $('.displayordererror').text("enter display order*");
            return false;
        } else

            $('#displayorder').css({
                'border': '1px solid #CCC'
            });
        $('.displayordererror').hide();


        data = new FormData();


        data.append('courseyr', CourseYear);
        data.append('courseyrid', CourseYearID);
        data.append('displayorder', DisplayOrder);
        data.append('_token', '{{ csrf_token() }}');
        $.ajax({

            type: "POST",
            url: "/course-year-update",
            data: data,
            dataType: "json",
            contentType: false,
            //cache: false,
            processData: false,

            success: function(data) {
                if (data['success']) {
                    Swal.fire({
                        title: 'Course Year Updated Success',
                        // text: "You won't be able to revert this!",
                        icon: 'success',
                        // showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '/course-year-list';
                        }
                    })
                }
            }
        })
    }
</script>
