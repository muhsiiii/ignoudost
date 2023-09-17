@include('admin.layouts.header')
@include('admin.layouts.nav')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Study Materials</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="">pdf title</label>
                <input class="form-control" placeholder="Enter Pdf Title" type="text" id="pdf_title">
                <div class="pdftitle_error" style="color:red;font-size:16px"></div><br>

                <label for="image" class="form-label text-right">Study Materials<span class="text-danger">*</span>
                    :</label>
                <div class="form-group row">
                    <div class="col-md-10 col-8">
                        <div class="input-group">
                            <div class="custom-file">
                                <input class="custom-file-input" id="file" name="image" type="file"
                                    onchange="pdf()">
                                <input type="hidden" name="" id="subfolder_id" value="{{ $id }}">

                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                        <div class="File_error" style="color:red;font-size:16px"></div>
                    </div>


                </div>
                <p style="color: #FF5F15;font-size:14px;">-> required PDF file!!</p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="FileSave()">Save changes</button>
            </div>
        </div>
    </div>
</div>


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">File Folders</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">DashBoard</a></li>
                    <li class="breadcrumb-item active">File Folders</li>
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
                <h3 class="card-title">File Folders</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap table-bordered table-extra" id="rtable"
                    style="font-size: 14px !important;">
                    <thead>
                        <tr>
                            <th>Sl.No</th>
                            <th>Sub Folder</th>
                            <th>File Title</th>
                            <th>Files Uploaded</th>
                            <th>File Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($FileUploads as $FileUpload)
                            <tr>
                                <td align="center">{{ $loop->iteration }}</td>
                                <td align="center">{{ $FileUpload->GetSubFolders->sub_folder }}</td>
                                <td align="center">{{ $FileUpload->title }}</td>
                                <td align="center"><a href="{{ asset($FileUpload->files) }}" target="_blank"><i
                                            style="font-size: 25px;" class="fa-solid fa-file-pdf"></i></a></i></td>
                                <td align="center">
                                    <a href="{{ route('subfoldersfile', $FileUpload->id) }}"
                                        class="btn btn-info btn-sm">Edit</a>
                                    <a onclick="FileDelete('{{ $FileUpload->id }}','{{ $FileUpload->sub_folder }}')"
                                        class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- Add new user link -->
<a href="#" data-toggle="modal" data-target="#exampleModal" title="Add New Internship">
    <i class="fa fa-plus-circle fa-add-new" aria-hidden="true"></i>
</a>
</div>
@include('admin.layouts.footer')

<script>
    function pdf() {

        $('.exampleModal').hide();

        var name = document.getElementById("file").files[0].name;
        var form_data = new FormData();
        var ext = name.split('.').pop().toLowerCase();

        if (jQuery.inArray(ext, ['pdf']) == -1) {
            $('.File_error').show();
            $('.File_error').text('Please select a valid pdf file.');
            $('input#file').val("");
            return false;
        }
        var f = document.getElementById("file").files[0];
        var fsize = f.size || f.fileSize;

        if (fsize > 6000000) {
            $('.File_error').show();
            $('.File_error').text('Please select a 6MB image.');
            $('input#file').val("");
            return false;
        }
    };



    function FileSave() {

        $('.File_error').hide();
        // var StudyMaterial = $('#studymaterial').get(0).files[0];

        var subfolder_id = $('input#subfolder_id').val();
        var PdfTitle = $('input#pdf_title').val();

        if (PdfTitle == '') {
            $('#pdf_title').focus();
            $('#pdf_title').css({
                'border': '1px solid red'
            });
            $('.pdftitle_error').show();
            $('.pdftitle_error').text("enter sub folder name*");
            return false;
        } else

            $('#pdf_title').css({
                'border': '1px solid #CCC'
            });
        $('.pdftitle_error').hide();


        // alert(SubFolderID);

        data = new FormData();
        // alert("hi");

        data.append('pdf', $('#file')[0].files[0]);
        data.append('subfolder_id', subfolder_id);
        data.append('pdf_title', PdfTitle);

        data.append('_token', '{{ csrf_token() }}');
        $.ajax({

            type: "POST",
            url: "/sub-folders-file-save",
            data: data,
            dataType: "json",
            contentType: false,
            //cache: false,
            processData: false,

            success: function(data) {
                if (data['success']) {

                    Swal.fire({
                        title: 'File Upload Success',
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

    function FileDelete(File_ID, Subfolder_Id) {

        // alert(File_ID);
        // alert(Subfolder_Id);

        data = new FormData();


        data.append('subfolder_id', Subfolder_Id);
        data.append('file_id', File_ID);
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
                    url: "/file-delete",
                    data: data,
                    dataType: "json",
                    contentType: false,
                    //cache: false,
                    processData: false,

                    success: function(data) {
                        if (data['success']) {

                            Swal.fire({
                                title: 'File Deleted SuccessFully',
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
