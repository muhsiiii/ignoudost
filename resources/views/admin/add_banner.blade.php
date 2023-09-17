@include('admin.layouts.header')
@include('admin.layouts.nav')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add Banner</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">DashBoard</a></li>
                    <li class="breadcrumb-item active">Add Banner</li>
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
                <h3 class="card-title">Banner</h3>
            </div>
            <form method="POST" action="{{ route('bannerSave') }}" accept-charset="UTF-8" role="form" id="addForm"
                enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <label for="image" class="form-label text-right">Add Banner<span
                                    class="text-danger">*</span> :</label>
                            <div class="form-group row">
                                <div class="col-md-10 col-8">
                                    <div class="input-group">
                                        <div class="custom-file">

                                            <input class="custom-file-input" id="image" name="banner"
                                                type="file">

                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-4">
                                    <button type="button" class="btn btn-secondary btn-tooltip float-left"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Image with 1:1 Aspet Raio Required. ie Image with Resolution 300 x 300px, 250 x 250px ..etc.">
                                        <i class="fa fa-info" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                            @error('banner')
                                <p class="alert-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <p style="color: red;font-size:16px;">-> required pixel:width-1920px and height:384px!!</p>
                </div>
                <div class="card-footer">
                    <a class="btn btn-default " href="{{ route('banner') }}">Back</a>&emsp;
                    <button type="submit" id="addBtn" class="btn btn-primary float-right"> Save </button>
                </div>
            </form>

        </div>
    </div>
</div>
</div>
@include('admin.layouts.footer')
