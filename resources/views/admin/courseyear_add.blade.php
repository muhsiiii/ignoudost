@include('admin.layouts.header')
@include('admin.layouts.nav')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add Course Year</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">DashBoard</a></li>

                    <li class="breadcrumb-item active">Add Course Year</li>
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
                <h3 class="card-title">Add Course Year</h3>
            </div>
            <form id="departmentform">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title" class="form-label text-right">Course Year<span
                                        class="text-danger">*</span> :</label>
                                <input class="form-control" placeholder="Enter Course Year"
                                    type="text" value="" id="courseyr">
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
                                    type="text" value="" id="displayorder">
                                <div class="displayordererror"></div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <a class="btn btn-default " href="{{ route('courseyearlist') }}">Back</a>&emsp;
                        <button type="button" id="addBtn" class="btn btn-primary float-right"
                            onclick="CourseYRSave()"> Save </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@include('admin.layouts.footer')

<script>
    function CourseYRSave() {

        var CourseYear = $('input#courseyr').val();
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
            $('.displayordererror').text("enter course year*");
            return false;
        } else

            $('#displayorder').css({
                'border': '1px solid #CCC'
            });
        $('.displayordererror').hide();


        data = new FormData();


        data.append('courseyr', CourseYear);
        data.append('displayorder', DisplayOrder);
        data.append('_token', '{{ csrf_token() }}');
        $.ajax({

            type: "POST",
            url: "/course-year-save",
            data: data,
            dataType: "json",
            contentType: false,
            //cache: false,
            processData: false,

            success: function(data) {
                if (data['success']) {
                    Swal.fire({
                        title: 'Course Year Added Success',
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
