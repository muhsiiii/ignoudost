@include('admin.layouts.header')
@include('admin.layouts.nav')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Change Password</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">DashBoard</a></li>
                    <li class="breadcrumb-item active">Change Password</li>
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
                <h3 class="card-title">Change Password</h3>
            </div>
            <form id="addForm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title" class="form-label text-right">Old Password<span
                                        class="text-danger">*</span> :</label>
                                <input class="form-control" placeholder="Enter Old Password" type="password"
                                    id="oldpwd">
                                <div class="olderror" style="color:red;font-size:16px"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title" class="form-label text-right">New Password<span
                                        class="text-danger">*</span> :</label>
                                <input class="form-control" placeholder="Enter New Password" type="password"
                                    id="newpwd">
                                <div class="newpwderror" style="color:red;font-size:16px"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title" class="form-label text-right">Confirm Password<span
                                        class="text-danger">*</span> :</label>
                                <input class="form-control" placeholder="Confirm Password" type="password"
                                    id="cpwd">
                                <div class="cpwderror" style="color:red;font-size:16px"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <a class="btn btn-default " href="">Back</a>&emsp;
                    <button type="button" id="addBtn" class="btn btn-primary float-right" onclick="changePWD()"> Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('admin.layouts.footer')
@include('admin.layouts.messages')

<script>
    
    function changePWD() {

        var OldPassword = $('#oldpwd').val();
        var NewPassword = $('#newpwd').val();
        var confirmPassword = $('#cpwd').val();

        if (OldPassword === '') {
            $('#oldpwd').focus();
            $('#oldpwd').css('border', '1px solid red');
            $('.olderror').show();
            $('.olderror').text('Enter old password*');
            return false;
        } else {
            $('#oldpwd').css('border', '1px solid #CCC');
        }

        $('.olderror').hide();

        if (NewPassword === '' || confirmPassword === '') {
            $('#newpwd').focus();
            $('#newpwd').css('border', '1px solid red');
            $('#cpwd').css('border', '1px solid red');
            $('.newpwderror').show();
            $('.newpwderror').css('color', 'red');
            $('.newpwderror').text('Enter Password');
            $('.cpwderror').hide();
            return false;
        } else if (NewPassword.length < 6) {
            $('#newpwd').focus();
            $('#newpwd').css('border', '1px solid red');
            $('#cpwd').css('border', '1px solid #CCC');
            $('.newpwderror').show();
            $('.newpwderror').css('color', 'red');
            $('.newpwderror').text('Password should be at least 6 characters');
            $('.cpwderror').hide();
            return false;
        } else if (NewPassword !== confirmPassword) {
            $('#newpwd').css('border', '1px solid red');
            $('#cpwd').css('border', '1px solid red');
            $('.newpwderror').hide();
            $('.cpwderror').show();
            $('.cpwderror').css('color', 'red');
            $('.cpwderror').text('Passwords do not match');
            return false;
        } else {
            $('#newpwd').css('border', '1px solid #CCC');
            $('#cpwd').css('border', '1px solid #CCC');
            $('.newpwderror').hide();
            $('.cpwderror').hide();
        }


        data = new FormData();

        data.append('oldpwd', OldPassword);
        data.append('newpwd', NewPassword);

        data.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: "POST",
            url: "/password-save",
            data: data,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function(data) {
                if (data['success']) {
                    toastr.success('Password Changed successfully');

                } else {
                    toastr.error('incorrect old password');

                }
            }
        });
    }
</script>
