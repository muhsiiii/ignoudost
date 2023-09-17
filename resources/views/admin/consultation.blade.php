@include('admin.layouts.header')
@include('admin.layouts.nav')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Consultation</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">DashBoard</a></li>
                    <li class="breadcrumb-item active">Consultation</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@if (session()->has('message'))
    <h5 class="alert-success">{{ session()->get('message') }}</h5>
@endif
<form action="{{ route('consultexcel') }}" method="post" style="width: 100%" class="row ml-2">
    @csrf
    <div class="col-sm-3 mb-1">
        <input type="date" name="from" placeholder="Search Something here..." value="" class="form-control">
    </div>
    <div class="col-sm-3 mb-1">
        <input type="date" name="to" placeholder="Search Something here..." value="" class="form-control">
    </div>
    <div class="col-sm-1 ">
        <input type="submit" id="searchBtn" class="btn btn-primary btn-block slava-primary-bg" value="submit">
    </div>
</form>


<div class="row m-10">
    <div class="col-12 mt-2">
        <div class="card card-primary">
            {{-- <div class="card-header">
                <h3 class="card-title">Consultation ({{ $consultationCount }})</h3>
            </div> --}}
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap table-bordered table-extra" id="consulttable"
                    style="font-size: 14px !important;">
                    <thead>
                        <tr>
                            <th>Sl.No</th>
                            <th>Name</th>
                            <th>Qualification</th>
                            <th>Course Selected</th>
                            <th>Reason</th>
                            <th>Phone Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($consultations as $consult)
                            @php
                                $iteration = ($consultations->currentPage() - 1) * $consultations->perPage() + $loop->index + 1;
                            @endphp
                            <tr>
                                <td align="center">{{ $iteration }}</td>
                                <td align="center">{{ $consult->name }}</td>
                                <td align="center">{{ $consult->qualification }}</td>
                                <td align="center">{{ $consult->course }}</td>
                                <td align="center">{{ $consult->reason }}</td>
                                <td align="center">{{ $consult->mobile }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                {{ $consultations->links() }}
            </div>
        </div>
    </div>
</div>
</div>
@include('admin.layouts.footer')
