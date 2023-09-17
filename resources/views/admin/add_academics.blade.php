@include('admin.layouts.header')
@include('admin.layouts.nav')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Academics</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">DashBoard</a></li>

                    <li class="breadcrumb-item active">Add Academics</li>
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
                <h3 class="card-title">Add Academics</h3>
            </div>

            <form>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="image" class="form-label text-right">Academic Image<span
                                    class="text-danger">*</span> :</label>
                            <div class="form-group row">
                                <div class="col-md-10 col-8">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input class="custom-file-input" id="image" name="image"
                                                type="file" onchange="Acadimage()">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="imageerror" style="color:red;font-size:16px"></div>
                                </div>

                                <div class="col-md-2 col-4">
                                    <button type="button" class="btn btn-secondary btn-tooltip float-left"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Image with Aspect Dimension Required. Image should have a resolution of 454 x 594 pixels.">
                                        <i class="fa fa-info" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <p style="color: red;font-size:14px;">-> required pixel:width-454px and height:594px!!
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title" class="form-label text-right">Academic Title<span
                                    class="text-danger">*</span> :</label>
                            <input class="form-control" placeholder="Enter Academic Title" id="title" name="title"
                                type="text">
                            <div class="titleerror" style="color:red;font-size:16px"></div>
                        </div>
                    </div>



                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="content" class="form-label text-right">Academic Description<span
                                    class="text-danger">*</span> :</label>
                            <textarea class="form-control ckeditor" placeholder="Enter Academic Description" type="text" id="description1"
                                rows="4"></textarea>
                            <div class="descriptionerror" style="color:red;font-size:16px"></div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title" class="form-label text-right">Name<span class="text-danger">*</span>
                                :</label>
                            <input class="form-control" placeholder="Enter Academic Title" id="name" name="name"
                                type="text">
                            <div class="nameerror" style="color:red;font-size:16px"></div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title" class="form-label text-right">Position<span
                                    class="text-danger">*</span> :</label>
                            <input class="form-control" placeholder="Enter Position" id="position" name="position"
                                type="text">
                            <div class="positionerror" style="color:red;font-size:16px"></div>
                        </div>
                    </div>


                </div>


                <div class="row">
                    <div class="col-6">
                        <img id="showImage" class="img-thumbnail hide" width="100%" height="auto"
                            style="max-width:300px;">
                    </div>
                </div>

        </div>
        <div class="card-footer">
            <a class="btn btn-default " href="{{ route('academics') }}">Back</a>&emsp;
            <button type="button" id="addacademicBtn" class="btn btn-primary float-right" onclick="AcademicSave()">
                Save </button>
        </div>
        </form>

    </div>
</div>
</div>
</div>
@include('admin.layouts.footer')

<script>
    function AcademicSave() {

        // var AcademicImage = $('#image').get(0).files[0];
        var AcademicTitle = $('input#title').val();
        // var AcademicDescription = $('#description').val();
        var Name = $('input#name').val();
        var Position = $('input#position').val();

        var AcademicDescription = CKEDITOR.instances.description1.getData();

        // if (AcademicImage) {
        //     var img = new Image();
        //     img.src = URL.createObjectURL(AcademicImage);

        //     img.onload = function() {
        //         var desiredWidth = 454;
        //         var desiredHeight = 594;

        //         if (img.width !== desiredWidth || img.height !== desiredHeight) {
        //             $('#image').focus();
        //             $('#image').css('border', '1px solid red');
        //             $('.imageerror').show();
        //             $('.imageerror').text('Please select an image with dimensions ' + desiredWidth + 'x' +
        //                 desiredHeight + ' pixels.');
        //             return false;
        //         } else {
        //             $('#image').css('border', '1px solid #CCC');
        //             $('.imageerror').hide();
        //         }
        //     };

        // } else {
        //     $('#image').focus();
        //     $('#image').css('border', '1px solid red');
        //     $('.imageerror').show();
        //     $('.imageerror').text('Please select an image.');
        //     return false;
        // }


        if (AcademicTitle == '') {
            $('#title').focus();
            $('#title').css({
                'border': '1px solid red'
            });
            $('.titleerror').show();
            $('.titleerror').text("enter Academic Tittle*");
            return false;
        } else

            $('#title').css({
                'border': '1px solid #CCC'
            });

        $('.titleerror').hide();

        if (AcademicDescription == '') {
            $('#description').focus();
            $('#description').css({
                'border': '1px solid red'
            });
            $('.descriptionerror').show();
            $('.descriptionerror').text("enter Academic Description*");
            return false;
        } else

            $('#description').css({
                'border': '1px solid #CCC'
            });

        $('.descriptionerror').hide();

        if (Name == '') {
            $('#name').focus();
            $('#name').css({
                'border': '1px solid red'
            });
            $('.nameerror').show();
            $('.nameerror').text("Enter Name*");
            return false;
        } else

            $('#name').css({
                'border': '1px solid #CCC'
            });

        $('.nameerror').hide();


        if (Position == '') {
            $('#position').focus();
            $('#position').css({
                'border': '1px solid red'
            });
            $('.positionerror').show();
            $('.positionerror').text("enter admin name*");
            return false;
        } else

            $('#position').css({
                'border': '1px solid #CCC'
            });

        $('.positionerror').hide();


        data = new FormData();


        data.append('image', $('#image')[0].files[0]);
        data.append('title', AcademicTitle);
        data.append('description', AcademicDescription);
        data.append('name', Name);
        data.append('position', Position);

        data.append('_token', '{{ csrf_token() }}');
        $.ajax({

            type: "POST",
            url: "/academic-save",
            data: data,
            dataType: "json",
            contentType: false,
            //cache: false,
            processData: false,

            success: function(data) {
                if (data['success']) {

                    Swal.fire({
                        title: 'Academic Added Success',
                        // text: "You won't be able to revert this!",
                        icon: 'success',
                        // showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '/academics';
                        }
                    })
                }
            }
        })

    }


    function Acadimage() {

        $('.imageerror').hide();

        var name = document.getElementById("image").files[0].name;
        var form_data = new FormData();
        var ext = name.split('.').pop().toLowerCase();

        if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            $('.imageerror').show();
            $('.imageerror').text('Please select a valid image.');
            $('input#image').val("");
            return false;
        }

        var oFReader = new FileReader();
        oFReader.onload = function(oFREvent) {
            var img = new Image();
            img.src = oFREvent.target.result;

            img.onload = function() {
                var width = img.width;
                var height = img.height;
                var desiredWidth = 454;
                var desiredHeight = 594;

                if (width !== desiredWidth || height !== desiredHeight) {
                    $('.imageerror').show();
                    $('.imageerror').text('Please select an image with dimensions ' + desiredWidth + 'x' +
                        desiredHeight + ' pixels.');
                    $('input#image').val("");
                    return false;
                }

                // Additional code for image size check
                var f = document.getElementById("image").files[0];
                var fsize = f.size || f.fileSize;
                if (fsize > 6000000) {
                    $('.imageerror').show();
                    $('.imageerror').text('Please select a 6MB image.');
                    $('input#image').val("");
                    return false;
                }

                // If all validations pass, you can continue with form submission or other actions
            };
        };
        oFReader.readAsDataURL(document.getElementById("image").files[0]);
    }
</script>
