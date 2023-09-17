@include('admin.layouts.header')
@include('admin.layouts.nav')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add Testimonial</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">DashBoard</a></li>
                    <li class="breadcrumb-item active">Add Testimonial</li>
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
                <h3 class="card-title">Add Testimonial</h3>
            </div>
            <form>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title" class="form-label text-right">User Name<span
                                        class="text-danger">*</span> :</label>
                                <input class="form-control" placeholder="Enter User Name" name="title" type="text"
                                    value="" id="user_name">
                                <div class="usernameerror" style="color:red;font-size:16px"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="url" class="form-label text-right">User University<span
                                        class="text-danger">*</span> :</label>
                                <input class="form-control" placeholder="Enter User University" name="url"
                                    type="text" value="" id="user_university">
                                <div class="useruniversityerror" style="color:red;font-size:16px"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="content" class="form-label text-right">User Content<span
                                        class="text-danger">*</span> :</label>
                                <textarea class="form-control" name="content" type="text" value="" id="user_content" rows="4"></textarea>
                                <div class="usercontenterror" style="color:red;font-size:16px"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-default "
                            href="">Back</a>&emsp;
                        <button type="button" id="addBtn" class="btn btn-primary float-right"
                            onclick="TestimonialSave()"> Save </button>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
@include('admin.layouts.footer')

<script>
    function TestimonialSave() {

        var UserName = $('input#user_name').val();
        var UserUniversity = $('input#user_university').val();
        var UserContent = $('textarea#user_content').val();

        // alert(UserContent);

        if (UserName == '') {
            $('#user_name').focus();
            $('#user_name').css({
                'border': '1px solid red'
            });
            $('.usernameerror').show();
            $('.usernameerror').css('color', 'red');
            $('.usernameerror').text("enter user name*");
            return false;
        } else

            $('#user_name').css({
                'border': '1px solid #CCC'
            });
        $('.usernameerror').hide();

        if (UserUniversity == '') {
            $('#user_university').focus();
            $('#user_university').css({
                'border': '1px solid red'
            });
            $('.useruniversityerror').show();
            $('.useruniversityerror').css('color', 'red');
            $('.useruniversityerror').text("enter user university*");
            return false;
        } else

            $('#user_university').css({
                'border': '1px solid #CCC'
            });
        $('.useruniversityerror').hide();

        if (UserContent == '') {
            $('#user_content').focus();
            $('#user_content').css({
                'border': '1px solid red'
            });
            $('.usercontenterror').show();
            $('.usercontenterror').css('color', 'red');
            $('.usercontenterror').text("enter user content*");
            return false;
        } else

            $('#user_content').css({
                'border': '1px solid #CCC'
            });
        $('.usercontenterror').hide();



        data = new FormData();


        data.append('name', UserName);
        data.append('university', UserUniversity);
        data.append('content', UserContent);
        data.append('_token', '{{ csrf_token() }}');
        $.ajax({

            type: "POST",
            url: "/testimonial-save",
            data: data,
            dataType: "json",
            contentType: false,
            //cache: false,
            processData: false,

            success: function(data) {
                if (data['success']) {
                    Swal.fire({
                        title: 'Testimonial Added Success',
                        // text: "You won't be able to revert this!",
                        icon: 'success',
                        // showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '/testimonial-list';
                        }
                    })
                }
            }
        })
    }
</script>
