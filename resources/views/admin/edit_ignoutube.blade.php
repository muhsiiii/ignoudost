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
                    <li class="breadcrumb-item active">Add Ignoutube</li>
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
                <h3 class="card-title">Add Ignoutube</h3>
            </div>
            <form>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group ">
                                <label for="text" class="form-label text-right">Choose Playlist<span
                                        class="text-danger">*</span> :</label>
                                <select class="form-control select2bs4" id="playlist" style="width: 100%;">
                                    <option value="">Select Playlist</option>
                                    @foreach ($Playlists as $Playlist)
                                        <option value="{{ $Playlist->id }}" @if($Playlist->id==$Ignoutube->playlist) selected @endif>{{ $Playlist->playlist }}</option>
                                    @endforeach
                                </select>
                                <div class="playlisterror" style="color:red;font-size:16px"></div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="url" class="form-label text-right">Embed Video Url<span
                                        class="text-danger">*</span> :</label>
                                <input class="form-control" placeholder="Enter Embed Video Url" name="video_url"
                                    type="text" value="{{ $Ignoutube->embeded_url }}" id="video_url">
                                <div class="videourlerror" style="color:red;font-size:16px"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="url" class="form-label text-right">Video Title<span
                                        class="text-danger">*</span> :</label>
                                <input class="form-control" placeholder="Enter Video Title " name=""
                                    type="text" value="{{ $Ignoutube->title }}" id="video_title">
                                <div class="videotitleerror" style="color:red;font-size:16px"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="url" class="form-label text-right">Youtube Video Url<span
                                        class="text-danger">*</span> :</label>
                                <input class="form-control" placeholder="Enter Youtube Video Url" name="video_url"
                                    type="url" value="{{ $Ignoutube->youtube_link }}" id="youtube_video_url">
                                <div class="youtubevideoerror" style="color:red;font-size:16px"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="url" class="form-label text-right">Name<span
                                        class="text-danger">*</span> :</label>
                                <input class="form-control" placeholder="Enter Name " name="" type="text"
                                    value="{{ $Ignoutube->name }}" id="name">
                                <input type="hidden" name="ignoutube_id" id="ignoutube_id"
                                    value="{{ $Ignoutube->id }}">
                                <div class="nameerror" style="color:red;font-size:16px"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-default " href="{{ route('ignoutubelist') }}">Back</a>&emsp;
                    <button type="button" id="addBtn" class="btn btn-primary float-right"
                        onclick="IgnouTubeUpdate()"> Update </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@include('admin.layouts.footer')

<script>
    function IgnouTubeUpdate() {


        var EmbedUrl = $('input#video_url').val();
        var VideoTitle = $('input#video_title').val();
        var YoutubeUrl = $('input#youtube_video_url').val();
        var Name = $('input#name').val();
        var Ignoutube_Id = $('input#ignoutube_id').val();
        var Playlist = $('select#playlist').val();


        // alert(VideoTitle);
        // alert(YoutuubeUrl);
        // alert(Name);


        if (EmbedUrl == '') {
            $('#video_url').focus();
            $('#video_url').css({
                'border': '1px solid red'
            });
            $('.videourlerror').show();
            $('.videourlerror').css('color', 'red');
            $('.videourlerror').text("enter embed video url*");
            return false;
        } else

            $('#video_url').css({
                'border': '1px solid #CCC'
            });
        $('.videourlerror').hide();

        if (VideoTitle == '') {
            $('#video_title').focus();
            $('#video_title').css({
                'border': '1px solid red'
            });
            $('.videotitleerror').show();
            $('.videotitleerror').css('color', 'red');
            $('.videotitleerror').text("enter video title*");
            return false;
        } else

            $('#video_title').css({
                'border': '1px solid #CCC'
            });
        $('.videotitleerror').hide();

        if (YoutubeUrl == '') {
            $('#youtube_video_url').focus();
            $('#youtube_video_url').css({
                'border': '1px solid red'
            });
            $('.youtubevideoerror').show();
            $('.youtubevideoerror').css('color', 'red');
            $('.youtubevideoerror').text("enter youtube video url*");
            return false;
        } else

            $('#youtube_video_url').css({
                'border': '1px solid #CCC'
            });
        $('.youtubevideoerror').hide();

        if (Name == '') {
            $('#name').focus();
            $('#name').css({
                'border': '1px solid red'
            });
            $('.nameerror').show();
            $('.nameerror').css('color', 'red');
            $('.nameerror').text("enter name*");
            return false;
        } else

            $('#name').css({
                'border': '1px solid #CCC'
            });
        $('.nameerror').hide();

        if (Playlist == '') {
            $('#playlist').focus();
            $('#playlist').css({
                'border': '1px solid red'
            });
            $('.playlisterror').show();
            $('.playlisterror').css('color', 'red');
            $('.playlisterror').text("choose playlist*");
            return false;
        } else

            $('#playlist').css({
                'border': '1px solid #CCC'
            });
        $('.playlisterror').hide();


        data = new FormData();


        data.append('embed_url', EmbedUrl);
        data.append('video_title', VideoTitle);
        data.append('youtube_url', YoutubeUrl);
        data.append('name', Name);
        data.append('ignoutube_id', Ignoutube_Id);
        data.append('playlist', Playlist);

        data.append('_token', '{{ csrf_token() }}');
        $.ajax({

            type: "POST",
            url: "/ignoutube-update",
            data: data,
            dataType: "json",
            contentType: false,
            //cache: false,
            processData: false,

            success: function(data) {
                if (data['success']) {
                    Swal.fire({
                        title: 'IgnouTube Updated Success',
                        // text: "You won't be able to revert this!",
                        icon: 'success',
                        // showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '/ignoutube-list';
                        }
                    })
                }
            }
        })
    }
</script>
