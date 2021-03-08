@extends('layouts.default')
@section('title','Edit Profil Instansi')
@section('content-header-title','Edit Profil Instansi')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Instansi</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('instansi.update', $item->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama">Nama Instansi</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama') ?? $item->nama }}">
                            @error('nama')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror">{{old('alamat') ?? $item->alamat }}</textarea>
                            @error('alamat')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@push('after-script')
@include('sweetalert::alert')

@endpush

