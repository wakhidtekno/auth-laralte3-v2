@extends('layouts.default')
@section('title','Reset Password User')
@section('content-header-title','Reset Password User')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Form Reset Password User</h3>
                    </div>
                    <!-- /.card-header -->

                    <!-- form start -->
                    <form role="form" action="{{route('users.update-password', $item->id)}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                      <div class="card-body">
                        <div class="form-group">
                            <label for="password">Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @error('password')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                          </div>
                          <div class="form-group">
                              <label for="konfirmasi_password">Konfirmasi Password<span class="text-danger">*</span></label>
                              <input type="password" class="form-control @error('konfirmasi_password') is-invalid @enderror" id="konfirmasi_password" name="konfirmasi_password">
                              @error('konfirmasi_password')
                              <div class="text-danger">
                                  {{ $message }}
                              </div>
                              @enderror
                          </div>
                        <p class="text-gray"><span class="text-danger">*</span> Wajib diisi</p>
                      </div>
                      <!-- /.card-body -->


                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
                  <!-- /.card -->
            </div>
        </div>
    </div>
@endsection

@push('after-script')
<script>
    function previewImage() {
    document.getElementById("image-preview").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

    oFReader.onload = function(oFREvent) {
      document.getElementById("image-preview").src = oFREvent.target.result;
    };
  };
</script>
@include('sweetalert::alert')
@endpush
