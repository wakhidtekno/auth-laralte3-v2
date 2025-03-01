@extends('layouts.default')
@section('title','User Log Activity')
@section('content-header-title','User Log Activity')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">User Log Activity</h3>
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-striped projects">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>User</th>
                                <th>Log Name</th>
                                <th>Action</th>
                                <th>Properties</th>
                            </tr>
                        </thead>
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
  <script>
    $(function() {
        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            autoWidth: false,
            //order: [[2, 'desc']],
            ajax: '{!! route('activitylog.index') !!}', // memanggil route yang menampilkan data json
            columns: [// mengambil & menampilkan kolom sesuai tabel database
                {
                    data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    orderable: false
                },
                {
                    data: 'user.username',
                    name: 'user.username',
                    orderable: false
                },
                {
                    data: 'log_name',
                    name: 'log_name',
                    orderable: false
                },
                {
                    data: 'event',
                    name: 'event',
                    orderable: false
                },
                {
                    data: 'properties',
                    name: 'properties',
                    orderable: false
                },
            ]
        });
    });
</script>
@endpush

