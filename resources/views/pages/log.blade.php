@extends('layouts.default')
@section('title','Acitivity Log')
@section('content-header-title','Activity Log')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Activity Log</h3>
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-striped projects">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Field</th>
                                <th>Action</th>
                                <th>Tanggal</th>
                                <th>User</th>
                                <th>Properties</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->log_name }}</td>
                                    <td>{{ $item->event }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    @if ($item->causer_id == null)
                                        <td>System</td>
                                    @else
                                        <td>{{ $item->user->nama }}</td>
                                    @endif
                                    <td>{{ $item->properties }}</td>

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
@endpush

