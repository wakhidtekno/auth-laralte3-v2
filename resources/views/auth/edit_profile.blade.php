@extends('layouts.default')
@section('title','Ubah profile')
@section('content-header-title', 'Ubah Profile')

@section('content')
    <!-- Default box -->
    <div class="card">
    <div class="card-header">
        <h3 class="card-title">Ubah Profile</h3>
    </div>
    <div class="card-body">
        <form action="{{route('update-profile')}}" role="form" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{old('nama') ?? $user->nama}}">
                @error('nama')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{old('username') ?? $user->username}}">
                @error('username')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="username">Foto</label>
                <div class="mb-2">
                    @if (Auth::user()->foto == url('storage'))
                    <img src="{{asset('assets/dist/img/user.svg') }}" id="image-preview" class="rounded-circle elevation-2" alt="User Image" width="200px" height="200px">
                    @else
                    <img src="{{url(Auth::user()->foto)}}" id="image-preview" class="rounded-circle elevation-2" alt="User Image" width="200px" height="200px">
                    @endif
                </div>

                <div class="form-group">
                    <div class="input-group">
                      <input type="file" name="foto"  id="image-source" onchange="previewImage();" accept="img/*">
                    </div>
                    @error('foto')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror

                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection

@push('after-script')
@include('sweetalert::alert')
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
@endpush
