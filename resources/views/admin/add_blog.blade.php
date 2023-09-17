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
                        <a href="#">Blogs</a>
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
                <h3 class="card-title">Add New Blog</h3>
            </div>
            <form>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label for="text" class="form-label text-right">Choose Category<span
                                        class="text-danger">*</span> :</label>
                                <select class="form-control select2bs4" id="blogcat" style="width: 100%;">
                                    <option value="">Select Category</option>
                                    @foreach ($BlogCategories as $BlogCategory)
                                        <option value="{{ $BlogCategory->id }}">{{ $BlogCategory->category }}</option>
                                    @endforeach
                                </select>
                                <div class="blogcaterror" style="color:red;font-size:16px;"></div>
                            </div>
                        </div>


                        <div class="col-md-10">
                            <label for="image" class="form-label text-right">Blog Image<span
                                    class="text-danger">*</span> :</label>
                            <div class="form-group row">
                                <div class="col-md-10 col-8">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input class="custom-file-input" id="courseimage" type="file"
                                                onchange="abc()">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>

                                    <div class="imageerror" style="color:red;font-size:16px"></div>

                                </div>

                                <div class="col-md-2 col-4">
                                    <button type="button" class="btn btn-secondary btn-tooltip float-left"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Image with Aspect Dimension Required. Image should have a resolution of 368 x 207 pixels.">
                                        <i class="fa fa-info" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p style="color: red;font-size:14px;">-> required pixel:width-368px and height:207px!!</p>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title" class="form-label text-right">Blog Title<span
                                        class="text-danger">*</span> :</label>
                                <input class="form-control" placeholder="Enter Blog Title" name="title" type="text"
                                    value="" id="blogtitle">
                                <div class="titleerror" style="color:red;font-size:16px"></div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="content" class="form-label text-right">Blog Description<span
                                        class="text-danger">*</span> :</label>
                                <textarea class="form-control" placeholder="Enter Blog Description" name="content" type="text" value=""
                                    id="blogdescription" rows="4"></textarea>
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
                                                type="file" onchange="dpcheck()">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="adminerror" style="color:#ff0000;font-size:16px"></div>
                                    <div class="dperror" style="color:#ff0000;font-size:16px"></div>
                                </div>

                                <div class="col-md-2 col-4">
                                    <button type="button" class="btn btn-secondary btn-tooltip float-left"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Image with Aspect Dimension Required. Image should have a resolution of 24 x 24 pixels.">
                                        <i class="fa fa-info" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p style="color: red;font-size:14px;">-> required pixel:width-24px and height:24px!!</p>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="url" class="form-label text-right">Blog Name<span
                                    class="text-danger">*</span> :</label>
                            <input class="form-control" placeholder="Enter Admin Name" name="text" type="text"
                                value="" id="adminname">
                            <div class="nameerror" style="color:red;font-size:16px"></div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="url" class="form-label text-right">Blog About<span
                                    class="text-danger">*</span> :</label>
                            <textarea class="form-control ckeditor" placeholder="Enter Blog Description" name="content" type="text" value=""
                                id="adminabout" rows="4"></textarea>
                            <div class="adminabouterror" style="color:red;font-size:16px"></div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="url" class="form-label text-right">Date<span
                                    class="text-danger">*</span> :</label>
                            <input class="form-control" placeholder="Enter Date" name="text" type="date"
                                value="" id="date">
                            <div class="dateerror" style="color:red;font-size:16px"></div>
                        </div>
                    </div>
                </div>


        </div>
        <div class="card-footer">
            <a class="btn btn-default " href="{{ route('blog') }}">Back</a>&emsp;
            <button type="button" id="addBtn" class="btn btn-primary float-right" onclick="BlogSave()">
                Save </button>
        </div>
        </form>

    </div>
</div>
</div>
</div>
@include('admin.layouts.footer')

<script>
    function BlogSave() {


        var BlogImage = $('input#courseimage').val();
        var BlogDescription = $('textarea#blogdescription').val();
        var BlogTitle = $('input#blogtitle').val();
        var AdminDp = $('input#admindp').val();
        var AdminName = $('input#adminname').val();
        var Date = $('input#date').val();
        // var ADminAbout = $('#adminabout').val();
        var Blogcategory = $('select#blogcat').val();
        var ADminAbout = CKEDITOR.instances.adminabout.getData();

        if (BlogImage == '') {
            $('#courseimage').focus();
            $('#courseimage').css({
                'border': '1px solid red'
            });
            $('.imageerror').show();
            $('.imageerror').text("choose image*");
            return false;
        } else

            $('#courseimage').css({
                'border': '1px solid #CCC'
            });
        $('.imageerror').hide();

        if (AdminDp == '') {
            $('#admindp').focus();
            $('#admindp').css({
                'border': '1px solid red'
            });
            $('.dperror').show();
            $('.dperror').text("choose image*");
            return false;
        } else

            $('#admindp').css({
                'border': '1px solid #CCC'
            });
        $('.dperror').hide();


        if (Blogcategory == '') {
            $('#blogcat').focus();
            $('#blogcat').css({
                'border': '1px solid red'
            });
            $('.blogcaterror').show();
            $('.blogcaterror').text("choose category*");
            return false;
        } else

            $('#blogcat').css({
                'border': '1px solid #CCC'
            });
        $('.blogcaterror').hide();


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

        if (ADminAbout == '') {
            $('#adminabout').focus();
            $('#adminabout').css({
                'border': '1px solid red'
            });
            $('.adminabouterror').show();
            $('.adminabouterror').text("enter about*");
            return false;
        } else

            $('#adminabout').css({
                'border': '1px solid #CCC'
            });
        $('.adminabouterror').hide();



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

        data.append('image', $('#courseimage')[0].files[0]);
        data.append('title', BlogTitle);
        data.append('description', BlogDescription);
        data.append('dp', $('#admindp')[0].files[0]);
        data.append('name', AdminName);
        data.append('date', Date);
        data.append('blogabout', ADminAbout);
        data.append('blogcat', Blogcategory);

        data.append('_token', '{{ csrf_token() }}');
        $.ajax({

            type: "POST",
            url: "/blog-save",
            data: data,
            dataType: "json",
            contentType: false,
            //cache: false,
            processData: false,

            success: function(data) {
                if (data['success']) {

                    Swal.fire({
                        title: 'Blog Added Success',
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

    function abc() {

        $('.imageerror').hide();

        var name = document.getElementById("courseimage").files[0].name;
        var form_data = new FormData();
        var ext = name.split('.').pop().toLowerCase();

        if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            $('.imageerror').show();
            $('.imageerror').text('Please select a valid image.');
            $('input#courseimage').val("");
            return false;
        }

        var oFReader = new FileReader();
        oFReader.onload = function(oFREvent) {
            var img = new Image();
            img.src = oFREvent.target.result;

            img.onload = function() {
                var width = img.width;
                var height = img.height;
                var desiredWidth = 368;
                var desiredHeight = 207;

                if (width !== desiredWidth || height !== desiredHeight) {
                    $('.imageerror').show();
                    $('.imageerror').text('Please select an image with dimensions ' + desiredWidth + 'x' +
                        desiredHeight + ' pixels.');
                    $('input#courseimage').val("");
                    return false;
                }

                // Additional code for image size check
                var f = document.getElementById("courseimage").files[0];
                var fsize = f.size || f.fileSize;
                if (fsize > 6000000) {
                    $('.imageerror').show();
                    $('.imageerror').text('Please select a 6MB image.');
                    $('input#courseimage').val("");
                    return false;
                }

                // If all validations pass, you can continue with form submission or other actions
            };
        };
        oFReader.readAsDataURL(document.getElementById("courseimage").files[0]);
    }

    // function dpcheck() {

    //     $('.dperror').hide();

    //     var name = document.getElementById("admindp").files[0].name;
    //     var form_data = new FormData();
    //     var ext = name.split('.').pop().toLowerCase();

    //     if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
    //         $('.dperror').show();
    //         $('.dperror').text('Please select a valid image.');
    //         $('input#admindp').val("");
    //         return false;
    //     }

    //     var oFReader = new FileReader();
    //     oFReader.onload = function(oFREvent) {
    //         var img = new Image();
    //         img.src = oFREvent.target.result;

    //         img.onload = function() {
    //             var width = img.width;
    //             var height = img.height;
    //             var desiredWidth = 24;
    //             var desiredHeight = 24;

    //             if (width !== desiredWidth || height !== desiredHeight) {
    //                 $('.dperror').show();
    //                 $('.dperror').text('Please select an image with dimensions ' + desiredWidth + 'x' +
    //                     desiredHeight + ' pixels.');
    //                 $('input#admindp').val("");
    //                 return false;
    //             }

    //             // Additional code for image size check
    //             var f = document.getElementById("admindp").files[0];
    //             var fsize = f.size || f.fileSize;
    //             if (fsize > 6000000) {
    //                 $('.dperror').show();
    //                 $('.dperror').text('Please select a 6MB image.');
    //                 $('input#admindp').val("");
    //                 return false;
    //             }

    //             // If all validations pass, you can continue with form submission or other actions
    //         };
    //     };
    //     oFReader.readAsDataURL(document.getElementById("admindp").files[0]);
    // }
</script>
