@include('admin.layouts.header')
@include('admin.layouts.nav')

<div class="modal fade" id="dropdown-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Dropdowns</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="">Type</label>
                <select class="form-control select2bs4" id="type" style="width: 100%;">
                    <option value="">Select Type</option>

                    <option value="1">qualification</option>
                    <option value="2">program/course</option>
                    <option value="3">reason</option>

                </select>
                <div class="typeerror" style="color:red;font-size:16px"></div>
                <br>

                <label for="">Dropdown Content</label>
                <input class="form-control" placeholder="Enter Dropdown Content" type="text" id="content">
                <div class="contenterror" style="color:red;font-size:16px"></div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="DropdownSave()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="dropdown-edit" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Dropdowns</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="">Type</label>
                <select class="form-control select2bs4" id="type1" style="width: 100%;">
                    <option value="">Select Type</option>

                    <option value="1">qualification</option>
                    <option value="2">program/course</option>
                    <option value="3">reason</option>

                </select>
                <div class="type1error" style="color:red;font-size:16px"></div>
                <br>

                <label for="">Dropdown Content</label>
                <input class="form-control" placeholder="Enter Dropdown Content" type="text" id="content1">
                <input type="hidden" id="did1">
                <div class="content1error" style="color:red;font-size:16px"></div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="DropdownUpdate()">Update changes</button>
            </div>
        </div>
    </div>
</div>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Form Dropdowns</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">DashBoard</a></li>
                    <li class="breadcrumb-item active">Form Dropdowns</li>
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
                <h3 class="card-title">Form Dropdowns List ({{ $Dropdowns->total() }})</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap table-bordered table-extra" id="rtable"
                    style="font-size: 14px !important;">
                    <thead>
                        <tr>
                            <th>Sl.No</th>
                            <th>Type</th>
                            <th>Contents</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Dropdowns as $Dropdown)
                            @php
                                $iteration = ($Dropdowns->currentPage() - 1) * $Dropdowns->perPage() + $loop->index + 1;
                            @endphp
                            <tr>
                                <td align="center">{{ $iteration }}</td>
                                @if ($Dropdown->type == 1)
                                    <td align="center">qualification</td>
                                @elseif ($Dropdown->type == 2)
                                    <td align="center">program/course</td>
                                @else
                                    <td align="center">reason</td>
                                @endif
                                <td align="center">{{ $Dropdown->content }}</td>
                                <td align="center">
                                    <a class="btn btn-info btn-sm text-light"
                                        onclick="DropdownEdit('{{ $Dropdown->id }}','{{ $Dropdown->type }}','{{ $Dropdown->content }}')">Edit</a>
                                    <a class="btn btn-danger btn-sm text-light"
                                        onclick="DropdownDelete('{{ $Dropdown->id }}')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                {{ $Dropdowns->links() }}
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- Add new user link -->
<a onclick="DropdownModalShow()">
    <i class="fa fa-plus-circle fa-add-new"></i>
</a>
</div>
@include('admin.layouts.footer')

@if (session('success'))
    <script>
        Swal.fire({
            title: 'Success',
            text: `{{ session('success') }}`,
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
    </script>
@endif

<script>
    function CourseYearEdit(CourseYearID) {
        var profileUrl = '/course-year-edit/' + CourseYearID;

        window.location.href = profileUrl;
    }

    function CourseYRdelete(CourseID) {
        // alert(CourseID);
        data = new FormData();

        data.append('courseid', CourseID);
        data.append('_token', '{{ csrf_token() }}');

        Swal.fire({
            title: 'Do You Want To Delete..??',
            // text: "You won't be able to revert this!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({

                    type: "POST",
                    url: "/course-year-delete",
                    data: data,
                    dataType: "json",
                    contentType: false,
                    //cache: false,
                    processData: false,

                    success: function(data) {
                        if (data['success']) {

                            Swal.fire({
                                title: 'Course Year Deleted SuccessFully',
                                // text: "You won't be able to revert this!",
                                icon: 'success',
                                // showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = window.location.href;
                                }
                            })
                        }
                    }
                })
            }
        })
    }

    function DropdownModalShow() {
        $('#dropdown-add').modal('show');
    }

    function DropdownSave() {
        var Type = $('#type').val();
        var Content = $('#content').val();

        if (Type == '') {
            $('#type').focus();
            $('#type').css({
                'border': '1px solid red'
            });
            $('.typeerror').show();
            $('.typeerror').css('color', 'red');
            $('.typeerror').text("choose type*");
            return false;
        } else

            $('#type').css({
                'border': '1px solid #CCC'
            });
        $('.typeerror').hide();

        if (Content == '') {
            $('#content').focus();
            $('#content').css({
                'border': '1px solid red'
            });
            $('.contenterror').show();
            $('.contenterror').css('color', 'red');
            $('.contenterror').text("enter dropdown content*");
            return false;
        } else

            $('#content').css({
                'border': '1px solid #CCC'
            });
        $('.contenterror').hide();

        data = new FormData();

        data.append('type', Type);
        data.append('content', Content);

        data.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: "POST",
            url: "/dropdowns-save",
            data: data,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function(data) {
                if (data['success']) {
                    toastr.options.onHidden = function() {
                        window.location.href =
                            '/dropdownslist';
                    };
                    toastr.success('Dropdown Added successfully', '', {
                        timeOut: 1000,

                    });
                } else {
                    toastr.error('Something Went Wrong');
                }
            }
        });
    }

    function DropdownEdit(Did, Type, Content) {
        $('#dropdown-edit').modal('show');

        $('#type1').val(Type);
        $('#did1').val(Did);
        $('#content1').val(Content);

    }

    function DropdownUpdate() {

        var Did = $('#did1').val();
        var Type = $('#type1').val();
        var Content = $('#content1').val();

        if (Type == '') {
            $('#type1').focus();
            $('#type1').css({
                'border': '1px solid red'
            });
            $('.type1error').show();
            $('.type1error').css('color', 'red');
            $('.type1error').text("choose type*");
            return false;
        } else

            $('#type1').css({
                'border': '1px solid #CCC'
            });
        $('.type1error').hide();

        if (Content == '') {
            $('#content1').focus();
            $('#content1').css({
                'border': '1px solid red'
            });
            $('.content1error').show();
            $('.content1error').css('color', 'red');
            $('.content1error').text("Enter Dropdown Content*");
            return false;
        } else

            $('#content1').css({
                'border': '1px solid #CCC'
            });
        $('.content1error').hide();

        data = new FormData();

        data.append('did', Did);
        data.append('type', Type);
        data.append('content', Content);

        data.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: "POST",
            url: "/dropdowns-update",
            data: data,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function(data) {
                if (data['success']) {
                    toastr.options.onHidden = function() {
                        window.location.href =
                            '/dropdownslist';
                    };
                    toastr.success('Dropdown Updted successfully', '', {
                        timeOut: 1000,

                    });
                } else {
                    toastr.error('Something Went Wrong');
                }
            }
        });
    }

    function DropdownDelete(Did) {


        data = new FormData();


        data.append('did', Did);

        data.append('_token', '{{ csrf_token() }}');

        Swal.fire({
            title: 'Do You Want To Delete..??',
            // text: "You won't be able to revert this!",
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({

                    type: "POST",
                    url: "/dropdowns-delete",
                    data: data,
                    dataType: "json",
                    contentType: false,
                    //cache: false,
                    processData: false,

                    success: function(data) {
                        if (data['success']) {

                            Swal.fire({
                                title: 'Dropdown Deleted SuccessFully',
                                // text: "You won't be able to revert this!",
                                icon: 'success',
                                // showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = window.location.href;
                                }
                            })
                        }
                    }
                })
            }
        })
    }
</script>
