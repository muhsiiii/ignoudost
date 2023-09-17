@include('admin.layouts.header')
@include('admin.layouts.nav')

<div class="modal fade" id="learners-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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


                <label for="">title</label>
                <input class="form-control" placeholder="Enter title" type="text" id="title">
                <input type="hidden" id="lid">
                <div class="titleerror" style="color:red;font-size:16px"></div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="LearnersUpdate()">Update changes</button>
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
                <h3 class="card-title">Form Dropdowns List ()</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap table-bordered table-extra" id="rtable"
                    style="font-size: 14px !important;">
                    <thead>
                        <tr>
                            <th>Sl.No</th>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Learners as $Learner)
                            <tr>
                                <td align="center">{{ $loop->iteration }}</td>

                                <td align="center"><img src="{{ $Learner->icon }}" alt=""></td>
                                <td align="center">{{ $Learner->title }}</td>
                                <td align="center">
                                    <a class="btn btn-info btn-sm text-light"
                                        onclick="LearnersModalShow('{{ $Learner->id }}','{{ $Learner->title }}')">Update</a>

                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">

            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- Add new user link -->
</div>
@include('admin.layouts.footer')


<script>
    function LearnersModalShow(Lid,Title) {


        $('#learners-edit').modal('show')
        $('#title').val(Title);
        $('#lid').val(Lid);

    }

    function LearnersUpdate()
    {
        var Lid=$('#lid').val();
        var Title=$('#title').val();



        data = new FormData();

        data.append('lid', Lid);
        data.append('title', Title);

        data.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: "POST",
            url: "/learners-update",
            data: data,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function(data) {
                if (data['success']) {
                    toastr.options.onHidden = function() {
                        window.location.href =
                            '/learnerslist';
                    };
                    toastr.success('Learners Title Updated successfully', '', {
                        timeOut: 1000,

                    });
                } else {
                    toastr.error('Something Went Wrong');
                }
            }
        });
    }
</script>
