@include('admin.layouts.header')
@include('admin.layouts.nav')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Career Notifications</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">DashBoard</a></li>
                    <li class="breadcrumb-item active">
                        <a href="http://127.0.0.1:8000/admin/career notifications">Career Notifications</a>
                    </li>
                    <li class="breadcrumb-item active">Add Career Notifications</li>
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
                <h3 class="card-title">Add New Notification</h3>
            </div>
            <form method="POST" action="http://127.0.0.1:8000/admin/course-notification" accept-charset="UTF-8"
                role="form" id="addForm" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="0CTEDd7tSf668sWAAPwwCVkJTt0WFvNlMCrqS2VJ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title" class="form-label text-right">Notifications Title<span
                                        class="text-danger">*</span> :</label>
                                <input class="form-control" placeholder="Enter Notifications Title" name="title"
                                    type="text" value="" id="title">
                                <div class="invalid-feedback">Notifications Title Required.</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="url" class="form-label text-right">Notifications Link<span
                                        class="text-danger">*</span> :</label>
                                <input class="form-control" placeholder="Enter Notifications Link" name="url"
                                    type="url" value="" id="title">
                                <div class="invalid-feedback">Notifications Link Required.</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="content" class="form-label text-right">Notifications Content<span
                                        class="text-danger">*</span> :</label>
                                <textarea class="form-control" placeholder="Enter Notifications Content" name="content" type="text" value=""
                                    id="content" rows="4"></textarea>
                                <div class="invalid-feedback">Notifications Content Required.</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="image" class="form-label text-right">Notifications Image<span
                                    class="text-danger">*</span> :</label>
                            <div class="form-group row">
                                <div class="col-md-10 col-8">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input class="custom-file-input" id="image" name="image"
                                                type="file">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                    <span class="error hide text-danger" id="helpImage">Notifications Image
                                        Required.</span>
                                </div>

                                <div class="col-md-2 col-4">
                                    <button type="button" class="btn btn-secondary btn-tooltip float-left"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Image with 1:1 Aspet Raio Required. ie Image with Resolution 300 x 300px, 250 x 250px ..etc.">
                                        <i class="fa fa-info" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <img id="showImage" class="img-thumbnail hide" width="100%" height="auto"
                                style="max-width:300px;">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-default " href="http://127.0.0.1:8000/admin/course-notification">Back</a>&emsp;
                    <button type="button" id="addBtn" class="btn btn-primary float-right"> Save </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@include('admin.layouts.footer')
