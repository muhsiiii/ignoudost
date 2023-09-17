@include('admin.layouts.header')
@include('admin.layouts.nav')

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Parent Folder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="">Parent Folder Name</label>
                <input class="form-control" placeholder="Enter Parent Folder Title" type="text"
                    id="parentfolder_name">
                <div class="parentfolder_error" style="color:red;font-size:16px"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="FreeResourceSave()">Save changes</button>
            </div>
        </div>
    </div>
</div>


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Free Resource</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">DashBoard</a></li>
                    <li class="breadcrumb-item active">Free Resource</li>
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
                <h3 class="card-title">Parent Folder ({{ $FreeResourceCount }})</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap table-bordered table-extra" id="rtable"
                    style="font-size: 14px !important;">
                    <thead>
                        <tr>
                            <th>Sl.No</th>
                            <th>Folder Title</th>
                            <th>Sub Folders</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($FreeResources as $FreeResource)
                            @php
                                $iteration = ($FreeResources->currentPage() - 1) * $FreeResources->perPage() + $loop->index + 1;
                            @endphp
                            <tr>
                                <td align="center">{{ $iteration }}</td>
                                <td align="center">{{ $FreeResource->folder_title }}</td>
                                <td align="center"><a href="{{ route('subfolderssub', $FreeResource->id) }}"
                                        class="btn btn-primary btn-sm">Sub Folders</a></td>
                                <td align="center">
                                    <a href="{{ route('freeresourceedit', $FreeResource->id) }}"
                                        class="btn btn-info btn-sm">Edit</a>
                                    <a onclick="FreeResourseDelete('{{ $FreeResource->id }}')"
                                        class="btn btn-danger btn-sm text-light">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                {{ $FreeResources->links() }}
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
    function FreeResourseDelete(ParentFolderId) {

        // alert(ParentFolderId);
        data = new FormData();

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
                    url: "/free-resource-destroy",
                    data: data,
                    dataType: "json",
                    contentType: false,
                    //cache: false,
                    processData: false,

                    success: function(data) {
                        if (data['success']) {

                            Swal.fire({
                                title: 'Parent Folder Deleted SuccessFully',
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

    function FreeResourceSave() {
        // alert('ddsa');
        var ParentName = $('input#parentfolder_name').val();

        if (ParentName == '') {
            $('#parentfolder_name').focus();
            $('#parentfolder_name').css({
                'border': '1px solid red'
            });
            $('.parentfolder_error').show();
            $('.parentfolder_error').text("enter parent folder name*");
            return false;
        } else

            $('#parentfolder_name').css({
                'border': '1px solid #CCC'
            });
        $('.parentfolder_error').hide();




        data = new FormData();


        data.append('parent_name', ParentName);


        data.append('_token', '{{ csrf_token() }}');
        $.ajax({

            type: "POST",
            url: "/free-resource-save-modal",
            data: data,
            dataType: "json",
            contentType: false,
            //cache: false,
            processData: false,

            success: function(data) {
                if (data['success']) {

                    Swal.fire({
                        title: 'Parent Folder Added Success',
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
</script>
