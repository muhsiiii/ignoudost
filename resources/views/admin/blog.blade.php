@include('admin.layouts.header')
@include('admin.layouts.nav')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Blog</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">DashBoard</a></li>
                    <li class="breadcrumb-item active">Blogs</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@if (session()->has('message'))
    <h5 class="alert-success">{{ session()->get('message') }}</h>
@endif
<div class="row m-10">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Blog ({{ $blogCount }})</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap table-bordered table-extra" id="rtable"
                    style="font-size: 14px !important;">
                    <thead>
                        <tr>
                            <th>Sl.No</th>
                            <th>Category</th>
                            <th>Blog Image</th>
                            <th>Blog Title</th>
                            <th>Blog Description</th>
                            <th>Admin Dp</th>
                            <th>Bloger Name</th>
                            <th>Bloger About</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                            @php
                                $Date = date('M d, Y', strtotime($blog->date));
                                $iteration = ($blogs->currentPage() - 1) * $blogs->perPage() + $loop->index + 1;
                            @endphp
                            <tr>
                                <td align="center">{{ $iteration }}</td>
                                <td align="center">{{ $blog->GetCategory->category }}</td>
                                <td align="center"><img src="{{ asset($blog->image) }}" alt="" width="60px"
                                        height="60px"></td>
                                <td align="center">{{ $blog->title }}</td>
                                <td align="center">{{$blog->description}}</td>
                                <td align="center"><img src="{{ asset($blog->dp) }}" alt="" width="60px"
                                        height="60px"></td>
                                <td align="center">{{ $blog->name }}</td>
                                <td align="center">{!! $blog->about_bloger !!}</td>
                                <td align="center">{{ $Date }}</td>
                                <td align="center">
                                    <a href="{{ route('blogedit', $blog->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    <a class="btn btn-danger btn-sm text-light"
                                        onclick="BlogDelete('{{ $blog->id }}')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                {{ $blogs->links() }}
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- Add new user link -->
<a href="{{ route('addblog') }}" title="Add New Internship">
    <i class="fa fa-plus-circle fa-add-new" aria-hidden="true"></i>
</a>
</div>
@include('admin.layouts.footer')

<script>
    function BlogDelete(Bid) {

        data = new FormData();


        data.append('Bid', Bid);

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
                    url: "/blog-delete",
                    data: data,
                    dataType: "json",
                    contentType: false,
                    //cache: false,
                    processData: false,

                    success: function(data) {
                        if (data['success']) {

                            Swal.fire({
                                title: 'Blog Deleted SuccessFully',
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
