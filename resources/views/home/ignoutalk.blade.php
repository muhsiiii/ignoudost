@include('home.layouts.header')
@include('home.layouts.nav')
<!-- swipper slider home  -->
<div class="container-main">
<swiper-container class="mySwiper" pagination="true" pagination-dynamic-bullets="true">
    @foreach($banners as $banner)
    <swiper-slide><img class="" src="{{asset('/Banner/'.$banner->banner)}}" alt="First slide"></swiper-slide>
    @endforeach
</swiper-container>
</div>
<!-- swipper slider home end -->
<!-- join wtspp grp  -->
<div class="container-main">
	<div class="row">
		<div class="col-lg-12">
			<div class="talk-dv">
				<h1 class="text-center join-wtsp-grp ">Join IGNOU Dost WhatsApp Groups</h1>
				<h5 class="text-center join-wtsp-grip-sub-text">Take your IGNOU experience to a whole new level. Welcome to the IGNOU Community WhatsApp groups. Let's learn together!
                </h5>
			</div>
		</div>
		@foreach($Ignoutalk as $Ignou)
		<div class="col-md-4 col-sm-4 col-6">
			<div class="btn-talk-ignou">
				<a href="{{$Ignou->whatsapp_link}}" target="_blank" class="ignou-primary-bg btn-ignou-talk"><i style="vertical-align: middle;" class="ri-whatsapp-fill"></i> {{$Ignou->name}}</a>
			</div>
		</div>
	@endforeach
		<div class="col-lg-12 mb-3">
			<div class="telegram-btn">
				<a href="https://t.me/ignoudost" target="_blank" class="telegram-nav-btn"><i style="vertical-align: middle;" class="ri-telegram-fill"></i> Join Telegram</a>
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
<!-- footer section  -->
@include('home.layouts.footer')
