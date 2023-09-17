@include('admin.layouts.header')
@include('admin.layouts.nav')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Blogs</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">DashBoard</a></li>
                    <li class="breadcrumb-item active">
                        <a href="http://127.0.0.1:8000/admin/career notifications">Edit Blogs</a>
                    </li>
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
                <h3 class="card-title">Edit Blog</h3>
            </div>
            <form>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label for="text" class="form-label text-right">Choose Category<span
                                        class="text-danger">*</span> :</label>
                                <select class="form-control select2bs4" id="blogcatedit" style="width: 100%;">
                                    <option value="">Select Category</option>
                                    @foreach ($BlogCategories as $BlogCategory)
                                        <option value="{{ $BlogCategory->id }}" @if($BlogCategory->id==$data->blog_category) selected @endif>{{ $BlogCategory->category }}</option>
                                    @endforeach


                                </select>
                                <div class="blogcatediterror" style="color:red;font-size:16px;"></div>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <label for="image" class="form-label text-right">Blog Image<span
                                    class="text-danger">*</span> :</label>
                            <div class="form-group row">
                                <div class="col-md-10 col-8">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input class="custom-file-input" id="blogimage" name="image"
                                                type="file">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="imageerror" style="color:red;font-size:16px"></div>
                                </div>

                                <div class="col-md-2 col-4">
                                    <button type="button" class="btn btn-secondary btn-tooltip float-left"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Image with 1:1 Aspet Raio Required. ie Image with Resolution 300 x 300px, 250 x 250px ..etc.">
                                        <i class="fa fa-info" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                            <img src="{{ asset($data->image) }}" alt="" width="60px" height="60px">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title" class="form-label text-right">Blog Title<span
                                        class="text-danger">*</span> :</label>
                                <input class="form-control" placeholder="Enter Blog Title" name="title" type="text"
                                    value="{{ $data->title }}" id="blogtitle">
                                <div class="titleerror" style="color:red;font-size:16px"></div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="content" class="form-label text-right">Blog Description<span
                                        class="text-danger">*</span> :</label>
                                <textarea class="form-control" placeholder="Enter Blog Description" name="content" type="text" value=""
                                    id="blogdescription" rows="4">{{ $data->description }}</textarea>
                                <div class="descriptionerror" style="color:red;font-size:16px"></div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="image" class="form-label text-right">Admin Dp<span
                                    class="text-danger">*</span> :</label>
                            <div class="form-group row">
                                <div class="col-md-10 col-8">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input class="custom-file-input" id="admindp" name="image"
                                                type="file">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="dperror" style="color:red;font-size:16px"></div>
                                </div>

                                <div class="col-md-2 col-4">
                                    <button type="button" class="btn btn-secondary btn-tooltip float-left"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Image with 1:1 Aspet Raio Required. ie Image with Resolution 300 x 300px, 250 x 250px ..etc.">
                                        <i class="fa fa-info" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                            <img src="{{ asset($data->dp) }}" alt="" width="60px" height="60px">
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="url" class="form-label text-right">Admin Name<span
                                        class="text-danger">*</span> :</label>
                                <input class="form-control" placeholder="Enter Admin Name" name="text"
                                    type="text"value="{{ $data->name }}" id="adminname">
                                <div class="nameerror" style="color:red;font-size:16px"></div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="url" class="form-label text-right">Blog About<span
                                        class="text-danger">*</span> :</label>
                                <textarea class="form-control ckeditor" placeholder="Enter Blog Description" name="content" type="text"
                                    id="adminaboutedit" rows="4">{{ $data->about_bloger }}</textarea>
                                <div class="adminaboutediterror" style="color:red;font-size:16px"></div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="url" class="form-label text-right">Date<span
                                        class="text-danger">*</span> :</label>
                                <input class="form-control" placeholder="Enter Date" name="text" type="date"
                                    value="{{ $data->date }}" id="date">
                                <div class="dateerror" style="color:red;font-size:16px"></div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="card-footer">
                    <a class="btn btn-default " href="{{ route('blog') }}">Back</a>&emsp;
                    <button type="button" id="addBtn" class="btn btn-primary float-right"
                        onclick="BlogUpdate()"> Update </button>
                </div>
            </form>

        </div>
    </div>
</div>
</div>
@include('admin.layouts.footer')

<script>
    function BlogUpdate() {


        var BlogCategory = $('select#blogcatedit').val();
        var BlogImage = $('input#blogimage').val();
        var BlogTitle = $('input#blogtitle').val();
        var BlogDescription = $('#blogdescription').val();
        var AdminDp = $('input#admindp').val();
        var AdminName = $('input#adminname').val();
        var Date = $('input#date').val();
        var ADminAbout = CKEDITOR.instances.adminaboutedit.getData();




        if (BlogCategory == '') {
            $('#blogcatedit').focus();
            $('#blogcatedit').css({
                'border': '1px solid red'
            });
            $('.blogcatediterror').show();
            $('.blogcatediterror').text("choose category*");
            return false;
        } else

            $('#blogcatedit').css({
                'border': '1px solid #CCC'
            });

        $('.blogcatediterror').hide();

        if (ADminAbout == '') {
            $('#adminaboutedit').focus();
            $('#adminaboutedit').css({
                'border': '1px solid red'
            });
            $('.adminaboutediterror').show();
            $('.adminaboutediterror').text("choose category*");
            return false;
        } else

            $('#adminaboutedit').css({
                'border': '1px solid #CCC'
            });

        $('.adminaboutediterror').hide();

        if (BlogTitle == '') {
            $('#blogtitle').focus();
            $('#blogtitle').css({
                'border': '1px solid red'
            });
            $('.titleerror').show();
            $('.titleerror').text("enter blog tittle*");
            return false;
        } else

            $('#blogtitle').css({
                'border': '1px solid #CCC'
            });

        $('.titleerror').hide();


        if (BlogDescription == '') {
            $('#blogdescription').focus();
            $('#blogdescription').css({
                'border': '1px solid red'
            });
            $('.descriptionerror').show();
            $('.descriptionerror').text("enter blog description*");
            return false;
        } else

            $('#blogdescription').css({
                'border': '1px solid #CCC'
            });

        $('.descriptionerror').hide();



        if (AdminName == '') {
            $('#adminname').focus();
            $('#adminname').css({
                'border': '1px solid red'
            });
            $('.nameerror').show();
            $('.nameerror').text("enter admin name*");
            return false;
        } else

            $('#adminname').css({
                'border': '1px solid #CCC'
            });

        $('.nameerror').hide();

        if (Date == '') {
            $('#date').focus();
            $('#date').css({
                'border': '1px solid red'
            });
            $('.dateerror').show();
            $('.dateerror').text("choose date*");
            return false;
        } else

            $('#date').css({
                'border': '1px solid #CCC'
            });

        $('.dateerror').hide();

        data = new FormData();


        data.append('image', $('#blogimage')[0].files[0]);
        data.append('title', BlogTitle);
        data.append('description', BlogDescription);
        data.append('dp', $('#admindp')[0].files[0]);
        data.append('name', AdminName);
        data.append('about', ADminAbout);
        data.append('date', Date);
        data.append('blogid', '{{ $data->id }}');
        data.append('blog_id', BlogCategory);

        data.append('_token', '{{ csrf_token() }}');
        $.ajax({

            type: "POST",
            url: "/blog-update",
            data: data,
            dataType: "json",
            contentType: false,
            //cache: false,
            processData: false,

            success: function(data) {
                if (data['success']) {

                    Swal.fire({
                        title: 'Blog Update Success',
                        // text: "You won't be able to revert this!",
                        icon: 'success',
                        // showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '/blog-table';
                        }
                    })
                }
            }
        })
    }
</script>
