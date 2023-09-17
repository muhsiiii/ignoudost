@include('admin.layouts.header')
<style>
    .sub {
        display: flex;
        align-items: center;
        justify-content: center;
        padding-top: 20%;
    }

    .dashboard-sub {
        text-align: center;
    }
</style>

@include('admin.layouts.nav')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <div class="container sub">
                    <div class="dashboard-sub">
                        <img src="{{ asset('home/images/logo-only.png') }}" alt="PEPP-Logo"
                            class="brand-image img-circle" style="opacity:1; width:36px;">
                        <span class="brand-text ignou"><b>IGNOU<span class="dost">DOST</span></b></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div @include('admin.layouts.footer')
