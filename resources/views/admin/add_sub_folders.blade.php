@include('admin.layouts.header')
@include('admin.layouts.nav')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Career Notifications</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">DashBoard</a></li>
                    <li class="breadcrumb-item active">Add Career Notifications</li>
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
                <h3 class="card-title">Add New Notification</h3>
            </div>
            <form method="POST" action="http://127.0.0.1:8000/admin/course-notification" accept-charset="UTF-8"
                role="form" id="addForm" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="0CTEDd7tSf668sWAAPwwCVkJTt0WFvNlMCrqS2VJ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label for="text" class="form-label text-right">Choose Parent Folder<span
                                        class="text-danger">*</span> :</label>
                                <select class="form-control select2bs4" id="parentfolder" style="width: 100%;">
                                    <option value="">Select Parent Folder</option>
                                    @foreach ($ParentFolders as $ParentFolder)
                                        <option value="{{ $ParentFolder->id }}">{{ $ParentFolder->folder_title }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="parentfoldererror" style="color:red;font-size:16px"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="url" class="form-label text-right">Sub Folder Title<span
                                        class="text-danger">*</span> :</label>
                                <input class="form-control" placeholder="Enter Sub Folder Name" name="url"
                                    type="text" value="" id="sub_folder_title">
                                <div class="subfoldererror" style="color:red;font-size:16px"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-default " href="{{ route('subfolders') }}">Back</a>&emsp;
                        <button type="button" id="addBtn" class="btn btn-primary float-right"
                            onclick="SubFolderSave()"> Save </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@include('admin.layouts.footer')

<script>
    function SubFolderSave() {

        var ParentFolder = $('select#parentfolder').val();
        var SubFolder = $('input#sub_folder_title').val();


        if (ParentFolder === '') {
            $('#parentfolder').focus();
            $('#parentfolder').css('border', '1px solid red');
            $('.parentfoldererror').show();
            $('.parentfoldererror').text('Choose a Parent Folder*');
            return false;
        } else {
            $('#parentfolder').css('border', '1px solid #CCC');
        }

        $('.parentfoldererror').hide();

        if (SubFolder === '') {
            $('#sub_folder_title').focus();
            $('#sub_folder_title').css('border', '1px solid red');
            $('.subfoldererror').show();
            $('.subfoldererror').text('Enter Sub Folder Title*');
            return false;
        } else {
            $('#sub_folder_title').css('border', '1px solid #CCC');
        }

        $('.subfoldererror').hide();


        data = new FormData();

        data.append('parent_folder', ParentFolder);
        data.append('sub_folder', SubFolder);

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

                    Swal.fire({
                        title: 'Sub Folder Added Success',
                        // text: "You won't be able to revert this!",
                        icon: 'success',
                        // showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '/sub-folders';
                        }
                    })
                }
            }
        })
    }
</script>
