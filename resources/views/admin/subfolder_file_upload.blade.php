@include('admin.layouts.header')
@include('admin.layouts.nav')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add Study Materials</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">DashBoard</a></li>

                    <li class="breadcrumb-item active">Add Study Materials</li>
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
                <h3 class="card-title">Add Study Materials</h3>
            </div>
            <form>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title" class="form-label text-right">Pdf Title<span
                                        class="text-danger">*</span> :</label>
                                <input class="form-control" placeholder="Enter Pdf Title" id="pdf_title"
                                    value="{{ $FreeResourceFile->title }}" />
                                <div class="pdftittleerror"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="image" class="form-label text-right">Study Materials<span
                                    class="text-danger">*</span> :</label>
                            <div class="form-group row">

                                <div class="col-md-10 col-8">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input class="custom-file-input" id="studymaterial" name="image"
                                                type="file" onchange="pdf()">
                                            <input type="hidden" name="id" id="file_id"
                                                value="{{ $FreeResourceFile->id }}">
                                            <input type="hidden" name="id" id="subfolder_id"
                                                value="{{ $FreeResourceFile->sub_folder }}">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="studymaterialerror" style="color:red;font-size:16px"></div>
                                </div>

                                <div class="col-md-2 col-4">
                                    <button type="button" class="btn btn-secondary btn-tooltip float-left"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Image with 1:1 Aspet Raio Required. ie Image with Resolution 300 x 300px, 250 x 250px ..etc.">
                                        <i class="fa fa-info" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <a class="btn btn-default " href="">Back</a>&emsp;
                    <button type="button" id="addBtn" class="btn btn-primary float-right"
                        onclick="FileUploadUpdate()"> update </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@include('admin.layouts.footer')

<script>
    function pdf() {

        $('.studymaterialerror').hide();

        var name = document.getElementById("studymaterial").files[0].name;
        var form_data = new FormData();
        var ext = name.split('.').pop().toLowerCase();

        if (jQuery.inArray(ext, ['pdf']) == -1) {
            $('.studymaterialerror').show();
            $('.studymaterialerror').text('Please select a valid image.');
            $('input#studymaterial').val("");
            return false;
        }
        var f = document.getElementById("studymaterial").files[0];
        var fsize = f.size || f.fileSize;

        if (fsize > 6000000) {
            $('.studymaterialerror').show();
            $('.studymaterialerror').text('Please select a 6MB image.');
            $('input#studymaterial').val("");
            return false;
        }
    };



    function FileUploadUpdate() {


        var StudyMaterial = $('#studymaterial').get(0).files[0];
        var FileID = $('input#file_id').val();
        var SubFolder_ID = $('input#subfolder_id').val();
        var PdfTitle = $('#pdf_title').val();



        if (PdfTitle == '') {
            $('#pdf_title').focus();
            $('#pdf_title').css({
                'border': '1px solid red'
            });
            $('.pdftittleerror').show();
            $('.pdftittleerror').css('color', 'red');
            $('.pdftittleerror').text("enter department title*");
            return false;
        } else

            $('#pdf_title').css({
                'border': '1px solid #CCC'
            });
        $('.pdftittleerror').hide();

        // alert(SubFolderID);

        data = new FormData();
        // alert("hi");

        data.append('pdf', $('#studymaterial')[0].files[0]);
        data.append('file_id', FileID);
        data.append('pdf_title', PdfTitle);
        data.append('_token', '{{ csrf_token() }}');
        $.ajax({

            type: "POST",
            url: "/file-update",
            data: data,
            dataType: "json",
            contentType: false,
            //cache: false,
            processData: false,

            success: function(data) {
                if (data['success']) {

                    Swal.fire({
                        title: 'File Updated Success',
                        // text: "You won't be able to revert this!",
                        icon: 'success',
                        // showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '/sub-folders-filelist/' + SubFolder_ID;
                        }
                    })
                }
            }
        })
    }
</script>
