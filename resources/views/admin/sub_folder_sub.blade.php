@include('admin.layouts.header')
@include('admin.layouts.nav')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Sub Folder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="">sub folder name</label>
                <input class="form-control" placeholder="Enter Sub Folder Title" type="text" id="subfolder_name">
                <div class="subfolder_error" style="color:red;font-size:16px"></div>
                <input type="hidden" name="" id="parent_id" value="{{ $id }}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="SubfolderSave()">Save changes</button>
            </div>
        </div>
    </div>
</div>


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Sub Folders</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">DashBoard</a></li>
                    <li class="breadcrumb-item active">Sub Folders</li>
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
                <h3 class="card-title">Sub Folders</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap table-bordered table-extra" id="rtable"
                    style="font-size: 14px !important;">
                    <thead>
                        <tr>
                            <th>Sl.No</th>
                            <th>Parent Folder</th>
                            <th>Sub Folder</th>
                            <th>Files Uploaded</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($SubFolders as $SubFolder)
                            <tr>
                                <td align="center">{{ $loop->iteration }}</td>
                                <td align="center">{{ $SubFolder->GetParentFolders->folder_title }}</td>
                                <td align="center">{{ $SubFolder->sub_folder }}</td>
                                <td align="center"><a href="{{ route('subfolderfilelist', $SubFolder->id) }}"
                                        class="btn btn-primary btn-sm">Uploaded Files</a></td>
                                <td align="center">
                                    <a href="{{ route('subfolderssubedit', $SubFolder->id) }}"
                                        class="btn btn-info btn-sm">Edit</a>
                                    <a onclick="SubFolderDelete('{{ $SubFolder->id }}','{{ $SubFolder->parent_folder }}')"
                                        class="btn btn-danger btn-sm">Delete</a>
                                </td>
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
    function SubfolderSave() {
        // alert('ddsa');
        var subfoldername = $('input#subfolder_name').val();
        var parent_id = $('input#parent_id').val();



        if (subfoldername == '') {
            $('#subfolder_name').focus();
            $('#subfolder_name').css({
                'border': '1px solid red'
            });
            $('.subfolder_error').show();
            $('.subfolder_error').text("enter sub folder name*");
            return false;
        } else

            $('#subfolder_name').css({
                'border': '1px solid #CCC'
            });
        $('.subfolder_error').hide();




        data = new FormData();


        data.append('subfolder_name', subfoldername);
        data.append('parent_id', parent_id);


        data.append('_token', '{{ csrf_token() }}');
        $.ajax({

            type: "POST",
            url: "/sub-folders-save",
            data: data,
            dataType: "json",
            contentType: false,
            //cache: false,
            processData: false,

            success: function(data) {
                if (data['success']) {

                    window.location.href = window.location.href;


                }
            }
        })
    }



    function SubFolderDelete(Subfolder_Id, ParentFolderId) {

        data = new FormData();


        data.append('subfolder_id', Subfolder_Id);
        data.append('parentfolder_id', ParentFolderId);
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
                    url: "/sub-folders-destroy",
                    data: data,
                    dataType: "json",
                    contentType: false,
                    //cache: false,
                    processData: false,

                    success: function(data) {
                        if (data['success']) {

                            Swal.fire({
                                title: 'Sub Folder Deleted SuccessFully',
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
