@include('home.layouts.header')
@include('home.layouts.nav')
<!-- sidebar end  -->
<div class="container-main">
    <div class="banner-pages">
        <img src="{{ asset('home/images/Default.jpg') }}" alt="">
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="blog-width-half">
                <h1 class="blog-head-main">{{ $BlogDetails->title }}</h1>
                <div class="blog-box mt-3">
                    <div class="blog-box-inner mt-2">
                        <img class="profile-img" src="/{{ $BlogDetails->dp }}" alt="">
                    </div>
                    <div class="blog-box-inner rgt-blog mt-2 pl-3">
                        <h2 class="blog-author-name">by {{ $BlogDetails->name }}</h2>
                        <p class="grey-text blog-author-desc mb-0">{{ $BlogDetails->description }}</p>
                    </div>
                </div>
                <h3 class="blog-date mt-4 mb-4">LAST UPDATED: {{ date('M d, Y', strtotime($BlogDetails->date)) }}</h3>
                <p class="grey-text blog-content">{!! $BlogDetails->about_bloger !!}</p>
                <div class="share-blog">
                    <h2>Want to share this article?</h2>
                    <div class="icons-social-media">
                        <a href="https://youtube.com/@ignoudost" target="_blank"><img class="social-icon mr-2"
                                src="/home/images/1384060.png" alt=""></a>
                        <a href="https://wa.me/+917594939297" target="_blank"><img class="social-icon mr-2"
                                src="/home/images/whatsapp--v1.png" alt=""></a>
                        <a href="https://www.instagram.com/ignou_dost/" target="_blank"><img class="social-icon mr-2"
                                src="/home/images/Instagram_icon.png" alt=""></a>
                    </div>
                </div>
                <div class="leave-box">
                    <h1 class="leave-comment-head">Leave a comment</h1>
                    <p class="grey-text">Your mobile number will not be published. Required fields are marked *</p>
                </div>
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Comments*</label>
                        <textarea class="form-control" id="comments" rows="5"></textarea>
                        <div class="commentserror" style="color: red;font-size: 14px;"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Name*</label>
                                <input type="text" class="form-control" id="name" placeholder="enter your name">
                                <div class="nameerror" style="color: red;font-size: 14px;"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Mobile </label>
                                <input type="tel" class="form-control" id="email"
                                    placeholder="enter your mobile">
                                <div class="emailerror" style="color: red;font-size: 14px;"></div>
                            </div>
                        </div>
                        <button class="btn ignou-primary-bg btn-submit-home mt-3 mb-4" type="button"
                            onclick="CommentSave()">SUBMIT</button>
                </form>
            </div>
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
<!-- slider  -->
<div class="container-main">
    <div class="row">
        <div class="col-lg-12">
            <div class="explore-courses">
                <h2 class="explore-course-heading">Recent Articles</h2>
            </div>
        </div>
        <swiper-container style="cursor: pointer;" class="mySwiper blog-page-sld" navigation="true"
            pagination-clickable="true" space-between="30" slides-per-view="4">
            @foreach ($BlogsSliders as $BlogSlide)
                <swiper-slide>
                    <div class="">
                        <div class="blog-main-box">
                            <a href="{{ route('blogdetail', $BlogSlide->id) }}">
                                <div class="blog-image">
                                    <img class="blog-pic" src="/{{ $BlogSlide->image }}" alt="">
                                </div>
                                <div class="blog-content">
                                    <h2 class="blog-main-head">{{ $BlogSlide->title }}</h2>
                                    <p class="blog-sub-head-main">{!! $BlogSlide->description !!}</p>
                                    <div class="blog-own">
                                        <div class="img-name-blog">
                                            <img class="blog-user-profile" src="/{{ $BlogSlide->dp }}" alt="">
                                            <p class="ml-1">by {{ $BlogSlide->name }}</p>
                                        </div>
                                        <p>{{ date('M d, Y', strtotime($BlogSlide->date)) }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </swiper-slide>
            @endforeach
        </swiper-container>
    </div>
</div>
<!-- footer section  -->
@include('home.layouts.footer')
<script>
    function CommentSave() {

        var Comments = $('textarea#comments').val();
        var Name = $('input#name').val();
        var Email = $('input#email').val();


        // alert(Comments);
        if (Comments == '') {
            $('#comments').focus();
            $('#comments').css({
                'border': '1px solid red'
            });
            $('.commentserror').show();
            $('.commentserror').text("enter your comments here*");
            return false;
        } else

            $('#comments').css({
                'border': '1px solid #CCC'
            });
        $('.commentserror').hide();


        if (Name == '') {
            $('#name').focus();
            $('#name').css({
                'border': '1px solid red'
            });
            $('.nameerror').show();
            $('.nameerror').text("enter your name here*");
            return false;
        } else

            $('#name').css({
                'border': '1px solid #CCC'
            });
        $('.nameerror').hide();


        // if (Email == '') {
        // 	$('#email').focus();
        // 	$('#email').css({
        // 		'border': '1px solid red'
        // 	});
        // 	$('.emailerror').show();
        // 	$('.emailerror').text("enter your email here*");
        // 	return false;
        // } else

        // 	$('#email').css({
        // 		'border': '1px solid #CCC'
        // 	});
        // $('.emailerror').hide();


        data = new FormData();


        data.append('comment', Comments);
        data.append('name', Name);
        data.append('email', Email);

        data.append('_token', '{{ csrf_token() }}');
        $.ajax({

            type: "POST",
            url: "/blog-comments-save",
            data: data,
            dataType: "json",
            contentType: false,
            //cache: false,
            processData: false,

            success: function(data) {
                if (data['success']) {
                    Toastify({
                        text: "Submitted Successfully",
                        duration: 3000,
                        newWindow: true,
                        // close: true,
                        gravity: "top", // `top` or `bottom`
                        position: "right", // `left`, `center` or `right`
                        stopOnFocus: true, // Prevents dismissing of toast on hover
                        style: {
                            background: "linear-gradient(to right, #12a00f, #12a00f)",
                        },
                        callback: function() {
                            // alert("sss");
                            window.location.href = window.location.href
                        },
                    }).showToast();
                } else {
                    Toastify({
                        text: "Some Thing Went Wrong",
                        duration: 3000,
                        newWindow: true,
                        // close: true,
                        gravity: "top", // `top` or `bottom`
                        position: "right", // `left`, `center` or `right`
                        stopOnFocus: true, // Prevents dismissing of toast on hover
                        style: {
                            background: "linear-gradient(to right, red, red)",
                        },
                        callback: function() {
                            // alert("sss");
                            window.location.href = window.location.href
                        },
                    }).showToast();
                }
            }
        })
    }
</script>
