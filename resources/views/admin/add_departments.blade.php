@include('admin.layouts.header')
@include('admin.layouts.nav')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add Department</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">DashBoard</a></li>

                    <li class="breadcrumb-item active">Add Department</li>
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
                <h3 class="card-title">Add Department Tittle</h3>
            </div>
            <form id="departmentform">
                @csrf
                <input type="hidden" name="_token" value="0CTEDd7tSf668sWAAPwwCVkJTt0WFvNlMCrqS2VJ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title" class="form-label text-right">Department Title<span
                                        class="text-danger">*</span> :</label>
                                <input class="form-control" placeholder="Enter Department Title" name="department"
                                    type="text" value="" id="department">
                                <div class="departmenterror"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label for="text" class="form-label text-right">Choose Status<span
                                        class="text-danger">*</span> :</label>
                                <select class="form-control select2bs4" id="department_status" style="width: 100%;">
                                    <option value="">Choose Status</option>
                                    <option value="1">Active</option>
                                    <option value="2">Coming Soon</option>
                                </select>
                                <div class="department_statuserror" style="color:red;font-size:16px"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-default " href="{{ route('department') }}">Back</a>&emsp;
                        <button type="button" id="addBtn" class="btn btn-primary float-right"
                            onclick="DepartmentSave()"> Save </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@include('admin.layouts.footer')

<script>
    function DepartmentSave() {

        var Department = $('input#department').val();
        var Status = $('select#department_status').val();


        if (Department == '') {
            $('#department').focus();
            $('#department').css({
                'border': '1px solid red'
            });
            $('.departmenterror').show();
            $('.departmenterror').css('color', 'red');
            $('.departmenterror').text("enter department title*");
            return false;
        } else

            $('#department').css({
                'border': '1px solid #CCC'
            });
        $('.departmenterror').hide();

        if (Status == '') {
            $('#department_status').focus();
            $('#department_status').css({
                'border': '1px solid red'
            });
            $('.department_statuserror').show();
            $('.department_statuserror').css('color', 'red');
            $('.department_statuserror').text("enter department title*");
            return false;
        } else

            $('#department_status').css({
                'border': '1px solid #CCC'
            });
        $('.department_statuserror').hide();



        data = new FormData();


        data.append('department', Department);
        data.append('status', Status);
        data.append('_token', '{{ csrf_token() }}');
        $.ajax({

            type: "POST",
            url: "/departments-save",
            data: data,
            dataType: "json",
            contentType: false,
            //cache: false,
            processData: false,

            success: function(data) {
                if (data['success']) {
                    Swal.fire({
                        title: 'Department Added Success',
                        // text: "You won't be able to revert this!",
                        icon: 'success',
                        // showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '/departments';
                        }
                    })
                }
            }
        })
    }
</script>
