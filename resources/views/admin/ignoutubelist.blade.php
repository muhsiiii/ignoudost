@include('admin.layouts.header')
@include('admin.layouts.nav')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Ignoutube</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">DashBoard</a></li>
                    <li class="breadcrumb-item active">Ignoutube</li>
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
                <h3 class="card-title">Ignoutube List ({{ $IgnouTubeCount }})</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap table-bordered table-extra" id="rtable"
                    style="font-size: 14px !important;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Playlist</th>
                            <th>Embed Url</th>
                            <th>Title</th>
                            <th>Youtube Url</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($IgnouTubes as $IgnouTube)
                            @php
                                $iteration = ($IgnouTubes->currentPage() - 1) * $IgnouTubes->perPage() + $loop->index + 1;
                            @endphp
                            <tr>
                                <td align="center">{{ $loop->iteration }}</td>

                                <td align="center">{{ $IgnouTube->GetPlaylist->playlist }}</td>
                                <td align="center">{{ $IgnouTube->embeded_url }}</td>
                                <td align="center">{{ $IgnouTube->title }}</td>
                                <td align="center">{{ $IgnouTube->youtube_link }}</td>
                                <td align="center">{{ $IgnouTube->name }}</td>
                                <td align="center">
                                    <a href="{{ route('ignoutubeedit', $IgnouTube->id) }}"
                                        class="btn btn-info btn-sm">Edit</a>
                                    <a class="btn btn-danger btn-sm text-light"
                                        onclick="IgnouTube('{{ $IgnouTube->id }}')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                {{ $IgnouTubes->links() }}
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- Add new user link -->
<a href="{{ route('ignoutubeadd') }}" title="Add New Internship">
    <i class="fa fa-plus-circle fa-add-new" aria-hidden="true"></i>
</a>
</div>
@include('admin.layouts.footer')

<script>
    function IgnouTube(ignoutube_Id) {

        // alert(ParentFolderId);
        data = new FormData();

        data.append('ignoutube_Id', ignoutube_Id);
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
                    url: "/ignoutube-delete",
                    data: data,
                    dataType: "json",
                    contentType: false,
                    //cache: false,
                    processData: false,

                    success: function(data) {
                        if (data['success']) {

                            Swal.fire({
                                title: 'Ignoutube Deleted SuccessFully',
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
