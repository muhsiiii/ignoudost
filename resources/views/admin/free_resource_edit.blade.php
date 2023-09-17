@include('admin.layouts.header')
@include('admin.layouts.nav')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add Folder</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">DashBoard</a></li>

                    <li class="breadcrumb-item active">Add Folder</li>
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
                <h3 class="card-title">Add Folder</h3>
            </div>

            <form>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title" class="form-label text-right">Folder Title<span
                                        class="text-danger">*</span> :</label>
                                <input class="form-control" placeholder="Enter Folder Title" name="title"
                                    type="text" value="{{ $FreeResources->folder_title }}" id="folder_title">
                                <input type="hidden" name="" id="id" value="{{ $FreeResources->id }}">
                                <div class="freeresourceerror" style="color:red;font-size:16px"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-default " href="{{ route('freeresource') }}">Back</a>&emsp;
                        <button type="button" id="addBtn" class="btn btn-primary float-right"
                            onclick="FreeResourceUpdate()"> Update </button>
                    </div>
            </form>

        </div>
    </div>
</div>
</div>
@include('admin.layouts.footer')

<script>
    function FreeResourceUpdate() {


        var FolderTitle = $('#folder_title').val();
        var ParentFolderID = $('#id').val();

        if (FolderTitle === '') {
            $('#folder_title').focus();
            $('#folder_title').css('border', '1px solid red');
            $('.freeresourceerror').show();
            $('.freeresourceerror').text('Enter Folder Title*');
            return false;
        } else {
            $('#folder_title').css('border', '1px solid #CCC');
        }

        $('.freeresourceerror').hide();

        data = new FormData();


        data.append('folder_title', FolderTitle);
        data.append('parent_id', ParentFolderID);


        data.append('_token', '{{ csrf_token() }}');
        $.ajax({

            type: "POST",
            url: "/free-resource-update",
            data: data,
            dataType: "json",
            contentType: false,
            //cache: false,
            processData: false,

            success: function(data) {
                if (data['success']) {

                    Swal.fire({
                        title: 'Folder Title Updated Success',
                        // text: "You won't be able to revert this!",
                        icon: 'success',
                        // showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '/free-resource';
                        }
                    })
                }
            }
        })
    }
</script>
