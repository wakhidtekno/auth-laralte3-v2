@extends('layouts.default')
@section('title','Ubah password')
@section('content-header-title', 'Ubah Password')

@section('content')
    <!-- Default box -->
    <div class="card">
    <div class="card-header">
        <h3 class="card-title">Ubah Password</h3>
    </div>
    <div class="card-body">
        <form action="{{route('update-password')}}" role="form" method="post">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="passwordLama">Password Lama</label>
                <input type="password" class="form-control @error('password_lama') is-invalid @enderror" id="passwordLama" name="password_lama" value="{{old('password_lama')}}">
                @error('password_lama')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="passwordBaru">Password Baru</label>
                <input type="password" class="form-control @error('password_baru') is-invalid @enderror" id="passwordBaru" name="password_baru" value="{{old('password_baru')}}">
                @error('password_baru')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="passwordBaruConfirmation">Konfirmasi Password Baru</label>
                <input type="password" class="form-control @error('konfirmasi_password_baru') is-invalid @enderror" id="passwordBaruConfirmation" name="konfirmasi_password_baru" value="{{old('konfirmasi_password_baru')}}">
                @error('konfirmasi_password_baru')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
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
@endpush
