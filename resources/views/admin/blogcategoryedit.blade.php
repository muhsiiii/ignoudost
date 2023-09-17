@include('admin.layouts.header')
@include('admin.layouts.nav')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">DashBoard</a></li>

                    <li class="breadcrumb-item active">Edit Category</li>
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
                <h3 class="card-title">Edit Category</h3>
            </div>

            <form id="departmentform">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title" class="form-label text-right">Course Year<span
                                        class="text-danger">*</span> :</label>
                                <input class="form-control" placeholder="Enter Department Title" type="text" value="{{ $BlogCat->category }}" id="category">
                                 <input type="hidden" value="{{ $BlogCat->id }}" id="catid">
                                <div class="courseyrerror"></div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <a class="btn btn-default " href="{{ route('blogcatlist') }}">Back</a>&emsp;
                        <button type="button" id="addBtn" class="btn btn-primary float-right"
                            onclick="CatUpdate()"> Update </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
</div>
@include('admin.layouts.footer')


<script>
    function CatUpdate() {

        var Category = $('input#category').val();
        var CatID = $('input#catid').val();


        if (Category == '') {
            $('#category').focus();
            $('#category').css({
                'border': '1px solid red'
            });
            $('.courseyrerror').show();
            $('.courseyrerror').css('color', 'red');
            $('.courseyrerror').text("enter category*");
            return false;
        } else

            $('#category').css({
                'border': '1px solid #CCC'
            });
        $('.courseyrerror').hide();


        data = new FormData();

        data.append('category', Category);
        data.append('cat_id', CatID);
        data.append('_token', '{{ csrf_token() }}');
        $.ajax({

            type: "POST",
            url: "/blog-category-update",
            data: data,
            dataType: "json",
            contentType: false,
            //cache: false,
            processData: false,

            success: function(data) {
                if (data['success']) {
                    Swal.fire({
                        title: 'Category Updated Success',
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
