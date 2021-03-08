@extends('layouts.default')
@section('title','Edit User')
@section('content-header-title','Edit User')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Form Edit User</h3>
                    </div>
                    <!-- /.card-header -->

                    <!-- form start -->
                    <form role="form" action="{{route('users.update', $item->id)}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                      <div class="card-body">
                        <div class="form-group">
                          <label for="nama">Nama<span class="text-danger">*</span></label>
                          <input type="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{old('nama') ?? $item->nama}}">
                          @error('nama')
                          <div class="text-danger">
                              {{ $message }}
                          </div>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="username">Username<span class="text-danger">*</span></label>
                            <input type="username" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{old('username') ?? $item->username}}">
                            @error('username')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Level<span class="text-danger">*</span></label>
                            <select class="form-control @error('level') is-invalid @enderror" name="level">
                                <option value="admin" {{(old('level') ?? $item->level) == 'admin' ? 'selected' : ''}}>Admin</option>
                                <option value="user" {{(old('level') ?? $item->level) == 'user' ? 'selected' : ''}}>User</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="username">Foto</label>
                            <div class="mb-2">
                                @if ($item->foto == url('storage'))
                                <img src="{{asset('assets/dist/img/user.svg') }}" id="image-preview" class="rounded-circle elevation-2" alt="User Image" width="200px" height="200px">
                                @else
                                <img src="{{url($item->foto)}}" id="image-preview" class="rounded-circle elevation-2" alt="User Image" width="200px" height="200px">
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                  <input type="file" name="foto"  id="image-source" onchange="previewImage();" accept="img/*">
                                </div>
                                @if ($item->foto != url('storage'))
                                <a href="{{route('user.hapus-foto', $item->id)}}" class="btn btn-danger btn-sm text-center mt-1"><b>Hapus Foto</b></a>
                                @endif

                                @error('foto')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
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
