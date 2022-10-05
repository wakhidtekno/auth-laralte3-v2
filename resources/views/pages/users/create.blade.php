@extends('layouts.default')
@section('title','Tambah User')
@section('content-header-title','Tambah User')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Form Tambah User</h3>
                    </div>
                    <!-- /.card-header -->

                    <!-- form start -->
                    <form role="form" action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                      <div class="card-body">
                        <div class="form-group">
                          <label for="nama">Nama<span class="text-danger">*</span></label>
                          <input type="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{old('nama')}}">
                          @error('nama')
                          <div class="text-danger">
                              {{ $message }}
                          </div>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="username">Username<span class="text-danger">*</span></label>
                            <input type="username" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{old('username')}}">
                            @error('username')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Level<span class="text-danger">*</span></label>
                            <select class="form-control @error('level') is-invalid @enderror" name="level">
                                <option value="admin" {{old('level') == 'admin' ? 'selected' : ''}}>Admin</option>
                                <option value="user" {{old('level') == 'user' ? 'selected' : ''}}>User</option>
                            </select>
                          </div>
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
                        <div class="form-group">
                          <label for="foto">Foto (opsional)</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input @error('foto') is-invalid @enderror" id="foto" name="foto" accept="image/*">
                              <label class="custom-file-label" for="foto">Pilih File</label>
                            </div>
                        </div>
                        @error('foto')
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
<!-- bs-custom-file-input -->
<script src="{{asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
      bsCustomFileInput.init();
    });
</script>
@include('sweetalert::alert')
@endpush
