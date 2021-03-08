@extends('layouts.default')
@section('title','Data User')
@section('content-header-title','Data Users')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data users</h3>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <a href="{{route('users.create')}}" class="btn btn-success"><i class="fas fa-user-plus"></i> Tambah
                        </a>
                    </div>
                    <table id="dataTable" class="table table-striped projects">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>Level</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->level }}</td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm mb-1" data-remote ="{{route('users.show', $item->id)}}" href="#userModal" data-toggle="modal" data-target="#userModal" data-title="Detail User">
                                            <i class="fas fa-eye">
                                            </i>
                                            Detail
                                        </a>
                                        <a class="btn btn-primary btn-sm mb-1" href="{{route('users.edit', $item->id)}}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Ubah
                                        </a>
                                        <a href="{{route('users.reset-password', $item->id)}}" class="btn btn-warning btn-sm mb-1">
                                            <i class="fa fa-key"></i>
                                            Reset password
                                        </a>
                                        <form action="{{route('users.destroy', $item->id)}}" method="post" class="d-inline" id="{{'form-hapus-user-'.$item->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm btn-hapus" data-id="{{$item->id}}" data-nama="{{$item->nama}}">
                                                <i class="fas fa-trash">
                                                </i>
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modal --}}
<div class="modal" id="userModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{-- <h5 class="modal-title"></h5> --}}
            </div>
            <div class="modal-body">
                <i class="fa fa-spinner fa-spin"></i>
            </div>
        </div>
    </div>
</div>
@endsection

@push('after-style')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
@endpush

@push('after-script')
<!-- DataTables -->
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- page script -->
<script>
    $(function () {
      $('#dataTable').DataTable({
        "responsive": true,
        "autoWidth": false,
        "language":{
        "url" : "/assets/plugins/datatables/indonesia.json",
        "sEmptyTable" : "Tidads"
         },
      });
    });
  </script>

<script>
    jQuery(document).ready(function($){
        $('#userModal').on('show.bs.modal', function(e){
            var button = $(e.relatedTarget);
            var modal = $(this);

            modal.find('.modal-body').load(button.data("remote"));
            modal.find('.modal-title').html(button.data("title"));
        });
    });
</script>
@include('sweetalert::alert')
<script>
    $('.btn-hapus').on('click', function(e){
        e.preventDefault();
        let id = $(this).data('id');
        let form = $('#form-hapus-user-'+id);
        let nama = $(this).data('nama');

        Swal.fire({
        title: 'Apakah anda yakin?',
        text: nama +' akan dihapus',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#5bc0de',
        confirmButtonColor: '#d9534f ',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal',
        reverseButtons: true,
        }).then((result) => {
            if (result.value) {
                form.submit();
            }
        })

    });
</script>
@endpush

