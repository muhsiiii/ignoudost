@include('admin.layouts.header')
@include('admin.layouts.nav')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add Blog Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">DashBoard</a></li>

                    <li class="breadcrumb-item active">Add Blog Category</li>
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
                <h3 class="card-title">Add Blog Category</h3>
            </div>
            <form id="departmentform">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title" class="form-label text-right">Blog Category<span
                                        class="text-danger">*</span> :</label>
                                <input class="form-control" placeholder="Enter Course Year"
                                    type="text" value="" id="blogcat">
                                    <div class="coursename_error" style="color:red;font-size:16px"></div>

                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a class="btn btn-default " href="{{ route('blogcatlist') }}">Back</a>&emsp;
                        <button type="button" id="addBtn" class="btn btn-primary float-right"
                            onclick="BlogCatSave()"> Save </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@include('admin.layouts.footer')

<script>
    function BlogCatSave() {

        var BlogCat = $('input#blogcat').val();
        // alert(CourseYear);
        // return false;


        if (BlogCat == '') {
            $('#blogcat').focus();
            $('#blogcat').css({
                'border': '1px solid red'
            });
            $('.coursename_error').show();
            $('.coursename_error').css('color', 'red');
            $('.coursename_error').text("enter blog category*");
            return false;
        } else

            $('#blogcat').css({
                'border': '1px solid #CCC'
            });
        $('.coursename_error').hide();



        data = new FormData();


        data.append('blogcat', BlogCat);
        data.append('_token', '{{ csrf_token() }}');
        $.ajax({

            type: "POST",
            url: "/blog-category-save",
            data: data,
            dataType: "json",
            contentType: false,
            //cache: false,
            processData: false,

            success: function(data) {
                if (data['success']) {
                    Swal.fire({
                        title: 'Blog Category Added Success',
                        // text: "You won't be able to revert this!",
                        icon: 'success',
                        // showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '/blog-category-list';
                        }
                    })
                }
            }
        })
    }
</script>
