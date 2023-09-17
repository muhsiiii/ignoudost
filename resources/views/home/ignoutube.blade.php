@include('home.layouts.header')
@include('home.layouts.nav')
@php
    use Carbon\Carbon;
@endphp
<div class="tube-bg-img"
    style="background-image: url(/home/images/img_top_color.png);width:100%;position: absolute; top:0px;z-index:10;background-repeat: no-repeat;background-size: 100% auto;background-position: center;background-repeat: no-repeat;background-size: cover;">
    <div class="container-main" style="">
        <div class="row">
            <div class="col-lg-6">
                <div class="img-bg-cmptr">
                    <img class="computer-img" src="/home/images/computer.png" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ignou-tube-content">
                    <h1 class="head-bg-bnr">IGNOUTube – Your Video Guide to Thriving at IGNOU!
                    </h1>
                    <p class="grey-text sub-head-bg-bnr">Welcome to IGNOUTube, the epicenter of IGNOU's video content, crafted to guide, inspire, and equip you for success. Our platform covers every facet of your IGNOU journey, from the latest notifications and admission processes to academic insights, resource utilization, study tips, and motivational content.
                    </p>
                    <p class="grey-text sub-head-bg-bnr">Whether you are a prospective student, a current learner, or an inquisitive mind, the IGNOUTube offers valuable insights for everyone. So dive in and start exploring now. Let's make your IGNOU journey a visual learning experience!
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-main ignoutube-main-container-main" style="margin-top: 430px">
    <div class="row">
        <div class="col-lg-12">
            <div class="head-tube">
                <h1 class="text-center ignou-tube-head-pg">IGNOUTube</h1>

            </div>
        </div>
        <div class="col-lg-12 mb-4">
            <div class="filter-box-ignou-tube">
                <select name="cars" id="cars" class="filter-btn" onchange="GetPlaylist(this.value)">
                    <option value="" selected disabled>Filter</option>
                    <option value="all">All</option>
                    @foreach ($Playlists as $Playlist)
                        <option value="{{ $Playlist->id }}">{{ $Playlist->playlist }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
<div class="container-main">
    <div class="row" id="igouid">
        @foreach ($IgnouTubes as $IgnouTube)
        @php
            $videoTimestamp = Carbon::parse($IgnouTube->updated_at);
            $timeAgo = $videoTimestamp->diffForHumans();
        @endphp
<div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
    <div class="ignoutube-page">
        {!! $IgnouTube->embeded_url !!}
        <h3 class="ignoutube-head pt-2">{{ $IgnouTube->title }}</h3>
        <h4 class="ignoutube-sub-head">{{ $IgnouTube->name }}</h4>
        <div class="time-nd-btn">
            <p class="mb-0">{{ $timeAgo }}</p>
            <a href="{{ $IgnouTube->youtube_link }}" target="_blank" class="ignou-primary-bg btn">Watch
                now</a>
        </div>
    </div>
</div>
    @endforeach
    </div>
</div>
<div class="container-main">
    <div class="row">
        <div class="col-lg-12">
            <div class="see-more-dv">
                <a href="https://youtube.com/@ignoudost" target="_blank">
                    <h3 class="see-more-btn ignou-primary-bg btn">See More</h3>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="call-btn-mobile">
    <div class="half-btn">
        <a href="tel:7594939297">
            <h5 class="call-now mb-0"><i class="ri-phone-fill"></i> Call Now</h5>
        </a>
    </div>
    <div class="half-btn">
        <a href="https://wa.me/+917594939297">
            <h5 class="whtspp-now mb-0"><i class="ri-whatsapp-fill"></i>WhatsApp</h5>
        </a>
    </div>
</div>
@include('home.layouts.footer')
<script>
    function GetPlaylist(Pid) {

        // alert(val);
        // return false;
        $.post("/get-playlist", {
            pid: Pid,
            _token: "{{ csrf_token() }}"
        }, function(result) {

            $('#igouid').html(result);
        });
    }
</script>
