@extends('layouts.default')
@section('title','Profil Instansi')
@section('content-header-title','Profil Instansi')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Instansi</h3>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">Nama Instansi</dt>
                        <dd class="col-sm-9">{{ $item->nama }}</dd>

                        <dt class="col-sm-3">Alamat</dt>
                        <dd class="col-sm-9">{{ $item->alamat }}</dd>
                      </dl>
                      <a href="{{route('instansi.edit', $item->id)}}" class="btn btn-primary">
                        Ubah
                      </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@push('after-script')
@include('sweetalert::alert')
@endpush

