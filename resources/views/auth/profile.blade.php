@extends('layouts.default')
@section('title','Profile user')
@section('content-header-title', 'Profile User')

@section('content')
    <!-- Default box -->
    <div class="card col-md-6">
    <div class="card-header">
        <h3 class="card-title">Profile User</h3>
    </div>
    <!-- Profile Image -->
        <div class="card-body box-profile row p-4 ">
            <table>
                <tr>
                    <td class="text-left col-4">
                        @if (Auth::user()->foto == url('storage'))
                        <img src="{{asset('assets/dist/img/user.svg') }}" class="rounded-circle elevation-2" alt="User Image" width="200px" height="200px">
                        @else
                        <img src="{{url(Auth::user()->foto)}}" class="rounded-circle elevation-2" alt="User Image" width="200px" height="200px">
                        @endif
                    </td>
                    <td class="col-8 align-middle">
                        <p><span class="profile-username">Username</span> <span class="text-muted">{{ Auth()->user()->username }}</span></p>
                        <p><span class="profile-username">Nama</span> <span class="text-muted">{{ Auth()->user()->nama }}</span></p>
                    </td>
                </tr>
                <tr>
                    <td class="text-center p-3">
                        <a href="{{route('edit-profile')}}" class="btn btn-primary text-center"><b>Ubah</b></a>
                        @if (Auth::user()->foto != url('storage'))
                        <a href="{{route('hapus-foto')}}" class="btn btn-danger text-center"><b>Hapus Foto</b></a>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
        <!-- /.card-body -->
@endsection

@push('after-script')
@include('sweetalert::alert')
@endpush
