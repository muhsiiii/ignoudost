@include('admin.layouts.header')
@include('admin.layouts.nav')

<div class="modal fade" id="ignouplay-add" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Playlist</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="">Playlist Title</label>
                <input class="form-control" placeholder="Enter title" type="text" id="pltitle">
                <div class="pltitleerror" style="color:red;font-size:16px"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="PlaylistSave()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ignouplay-edit" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Playlist</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="">Playlist Title</label>
                <input class="form-control" placeholder="Enter title" type="text" id="pltitle1">
                <input type="hidden" id="pid">
                <div class="pltitle1error" style="color:red;font-size:16px"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="PlaylistUpdate()">Update changes</button>
            </div>
        </div>
    </div>
</div>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Playlist Title List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">DashBoard</a></li>
                    <li class="breadcrumb-item active">Playlist Title List</li>
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
                <h3 class="card-title">Playlist Title List ({{ $playlists->total() }})</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap table-bordered table-extra" id="rtable"
                    style="font-size: 14px !important;">
                    <thead>
                        <tr>
                            <th>Sl.No</th>
                            <th>Playlist Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($playlists as $playlist)
                            @php
                                $iteration = ($playlists->currentPage() - 1) * $playlists->perPage() + $loop->index + 1;
                            @endphp
                            <tr>
                                <td align="center">{{ $iteration }}</td>
                                <td align="center">{{ $playlist->playlist }}</td>
                                <td align="center">
                                    <a class="btn btn-info btn-sm text-light"
                                        onclick="PlaylistEdit('{{ $playlist->id }}','{{ $playlist->playlist }}')">Edit</a>
                                    <a class="btn btn-danger btn-sm text-light"
                                        onclick="Playlistdelete('{{ $playlist->id }}')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                {{ $playlists->links() }}
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- Add new user link -->
<a onclick="playModalShow()">
    <i class="fa fa-plus-circle fa-add-new" aria-hidden="true"></i>
</a>
</div>
@include('admin.layouts.footer')

<script>
    function playModalShow() {
        $('#ignouplay-add').modal('show');
    }

    function PlaylistSave() {
        var PlayTitle = $('#pltitle').val();
        // alert(PlayTitle);


        if (PlayTitle == '') {
            $('#pltitle').focus();
            $('#pltitle').css({
                'border': '1px solid red'
            });
            $('.pltitleerror').show();
            $('.pltitleerror').css('color', 'red');
            $('.pltitleerror').text("enter playlist title*");
            return false;
        } else

            $('#pltitle').css({
                'border': '1px solid #CCC'
            });
        $('.pltitleerror').hide();

        data = new FormData();

        data.append('playlist', PlayTitle);

        data.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: "POST",
            url: "/ignou-playlist-save",
            data: data,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function(data) {
                if (data['success']) {
                    toastr.options.onHidden = function() {
                        window.location.href =
                            '/ignou-playlist';
                    };
                    toastr.success('Playlist Added successfully', '', {
                        timeOut: 1000,

                    });
                } else {
                    toastr.error('Something Went Wrong');
                }
            }
        });
    }

    function PlaylistEdit(Pid, PlayTitle) {
        $('#ignouplay-edit').modal('show');

        $('#pltitle1').val(PlayTitle);
        $('#pid').val(Pid);

    }

    function PlaylistUpdate() {

        var Pid = $('#pid').val();
        var PlayTitle = $('#pltitle1').val();

        if (PlayTitle == '') {
            $('#pltitle1').focus();
            $('#pltitle1').css({
                'border': '1px solid red'
            });
            $('.pltitle1error').show();
            $('.pltitle1error').css('color', 'red');
            $('.pltitle1error').text("enter playlist title*");
            return false;
        } else

            $('#pltitle1').css({
                'border': '1px solid #CCC'
            });
        $('.pltitle1error').hide();

        data = new FormData();

        data.append('pid', Pid);
        data.append('playlist', PlayTitle);

        data.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: "POST",
            url: "/ignou-playlist-update",
            data: data,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function(data) {
                if (data['success']) {
                    toastr.options.onHidden = function() {
                        window.location.href =
                            '/ignou-playlist';
                    };
                    toastr.success('Playlist Updated successfully', '', {
                        timeOut: 1000,

                    });
                } else {
                    toastr.error('Something Went Wrong');
                }
            }
        });
    }

    function Playlistdelete(Pid) {
        data = new FormData();

        data.append('pid', Pid);
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
                    url: "/ignou-playlist-delete",
                    data: data,
                    dataType: "json",
                    contentType: false,
                    //cache: false,
                    processData: false,

                    success: function(data) {
                        if (data['success']) {

                            Swal.fire({
                                title: 'Playlist Deleted SuccessFully',
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
