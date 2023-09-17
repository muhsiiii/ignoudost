@include('admin.layouts.header')
@include('admin.layouts.nav')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add FAQ</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">DashBoard</a></li>

                    <li class="breadcrumb-item active">Add FAQ</li>
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
                <h3 class="card-title">Add FAQ</h3>
            </div>
            <form id="addForm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title" class="form-label text-right">FAQ Title<span
                                        class="text-danger">*</span> :</label>
                                <input class="form-control" placeholder="Enter FAQ Title" name="faqtitle" type="text"
                                    value="" id="faqtitle">
                                <div class="faqtitleerror" style="color:red;font-size:16px"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="url" class="form-label text-right">FAQ Description<span
                                        class="text-danger">*</span> :</label>
                                <textarea class="form-control" placeholder="Enter Notifications Content" name="faqdescription" type="text"
                                    value="" id="faqdescription" rows="4"></textarea>
                                <div class="faqdescriptionerror" style="color:red;font-size:16px"></div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="card-footer">
                    <a class="btn btn-default " href="{{ route('faq') }}">Back</a>&emsp;
                    <button type="button" id="addBtn" class="btn btn-primary float-right" onclick="FAQSave()"> Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@include('admin.layouts.footer')

<script>
    function FAQSave() {


        var FAQTitle = $('input#faqtitle').val();
        var FAQDescription = $('#faqdescription').val();

        if (FAQTitle === '') {
            $('#faqtitle').focus();
            $('#faqtitle').css('border', '1px solid red');
            $('.faqtitleerror').show();
            $('.faqtitleerror').text('Enter FAQ Title*');
            return false;
        } else {
            $('#faqtitle').css('border', '1px solid #CCC');
        }

        $('.faqtitleerror').hide();

        if (FAQDescription === '') {
            $('#faqdescription').focus();
            $('#faqdescription').css('border', '1px solid red');
            $('.faqdescriptionerror').show();
            $('.faqdescriptionerror').text('Enter FAQ Description*');
            return false;
        } else {
            $('#faqdescription').css('border', '1px solid #CCC');
        }

        $('.faqdescriptionerror').hide();

        data = new FormData();


        data.append('title', FAQTitle);
        data.append('description', FAQDescription);


        data.append('_token', '{{ csrf_token() }}');
        $.ajax({

            type: "POST",
            url: "/faq-save",
            data: data,
            dataType: "json",
            contentType: false,
            //cache: false,
            processData: false,

            success: function(data) {
                if (data['success']) {

                    Swal.fire({
                        title: 'FAQ Added Success',
                        // text: "You won't be able to revert this!",
                        icon: 'success',
                        // showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '/faq';
                        }
                    })
                }
            }
        })
    }
</script>
