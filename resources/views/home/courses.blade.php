@include('home.layouts.header')
@include('home.layouts.nav')
<!-- join community  -->
<div class="container-main mt-5 mb-5">
	<div class="join-community" style="background-image: url(./home/images/bg-ignoutube.png);background-repeat: no-repeat;background-size: 100% auto;background-position: center;background-repeat: no-repeat;background-size: cover;">
		<div class="row">
			<div class="col-lg-12">
				<div class="join-commuinity-div">
					<div class="join-comnty-dub">
						<h2 class="community-head text-white mb-3">Join the Vibrant Learning Community of IGNOU Dost on WhatsApp!</h2>
						<p class="community-sub-head text-white">Hello IGNOU Learners,</p>
						<p class="community-sub-head text-white">Are you currently pursuing a program at IGNOU, or considering joining one? Are you looking to connect with like-minded individuals who share the same passion for learning as you do? We have just the platform for you!</p>
						<p class="community-sub-head text-white">We invite you to join the IGNOU Community WhatsApp groups. This is a thriving ecosystem of curious and enthusiastic learners just like you, who are continually seeking knowledge and personal growth.</p>
						<p class="community-sub-head text-white">Don't miss out on this opportunity to join the dynamic community of IGNOU learners. Be part of the conversation, be part of the community, be part of the learning journey. Click the link below and step into the world of collaborative learning.
                            <p class="community-sub-head text-white">Happy Learning!</p>
						<a href="{{route('ignoutalk')}}" class="btn-join-community btn outline-btn text-white "><i style="vertical-align: middle;" class="ri-whatsapp-fill"></i> Join WhatsApp Groups
                        </a>
						<a href="{{route('freeresources')}}" class="btn-join-community community-resources  pink-bg btn ml-3 ">Get Free Resources</a>
					</div>
					<div class="join-comnty-dub">
						<img class="community-img" src="/home/images/Untitled-1 1.png" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end join community  -->
@include('home.layouts.footer')
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
