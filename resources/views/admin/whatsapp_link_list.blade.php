@include('admin.layouts.header')
@include('admin.layouts.nav')

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Whatasapp Link</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="">Add Whtasapp Link</label>
        <input class="form-control" placeholder="Enter Whatasapp Link" type="url" id="whatsapplink">
        <div class="url_error" style="color:red;font-size:16px"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="URLSave()">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Whatsapp Links</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">DashBoard</a></li>
                    <li class="breadcrumb-item active">Whatsapp Links</li>
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
                <h3 class="card-title">Whatsapp Link List</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap table-bordered table-extra" id="rtable" style="font-size: 14px !important;">
                <input type="hidden" id="parent_id" value="{{$id}}">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Whatsapp Link</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($WhatsappLinks as $WhatsappLink)
                        <tr>
                            <td align="center">{{$loop->iteration}}</td>
                            <td align="center">{{$WhatsappLink->whatsapp_link}}</td>
                            <td align="center">
                                <a href="" class="btn btn-primary btn-sm">Update</a>
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
@if()
<a href="#" data-toggle="modal" data-target="#exampleModal" title="Add New Internship">
    <i class="fa fa-plus-circle fa-add-new" aria-hidden="true"></i>
</a>
@endif
</div>
@include('admin.layouts.footer')

<script>
     function URLSave() {


    var Whatsapplink = $('input#whatsapplink').val();
    var Parent_ID = $('input#parent_id').val();



    if (Whatsapplink == '') {
      $('#whatsapplink').focus();
      $('#whatsapplink').css({
        'border': '1px solid red'
      });
      $('.url_error').show();
      $('.url_error').text("enter whatsapp link*");
      return false;
    } else

      $('#whatsapplink').css({
        'border': '1px solid #CCC'
      });
    $('.url_error').hide();

    data = new FormData();

    data.append('link', Whatsapplink);
    data.append('parent_id', Parent_ID);

    data.append('_token', '{{ csrf_token() }}');
    $.ajax({

      type: "POST",
      url: "/whatsapp-link-save",
      data: data,
      dataType: "json",
      contentType: false,
      //cache: false,
      processData: false,

      success: function(data) {
        if (data['success']) {

            Swal.fire({
        title: 'Whatsapp Link Added Success',
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
</script>
