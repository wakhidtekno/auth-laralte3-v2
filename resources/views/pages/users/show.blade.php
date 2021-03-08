<table class="table table-bordered">
    {{-- <tr>
        <td colspan="2" class="text-center">
            @if ($item->foto == url('storage'))
            <img src="{{asset('assets/dist/img/user.svg') }}" class="rounded-circle elevation-2" alt="User Image" width="200px" height="200px">
            @else
            <img src="{{url($item->foto)}}" class="rounded-circle elevation-2" alt="User Image" width="200px" height="200px">
            @endif
        </td>
    </tr>
    <tr>
        <th>Nama</th>
        <td>{{ $item->nama }}</td>
    </tr>
    <tr>
        <th>Username</th>
        <td>{{ $item->username }}</td>
    </tr>
    <tr>
        <th>Level</th>
        <td>{{ $item->level }}</td>
    </tr>
    <tr>
        <th>Bergabung</th>
        <td>{{ $item->created_at->isoFormat('DD/MM/YYYY HH:mm:ss')}}</td>
    </tr> --}}
    <tr>
        <td class="text-center">
            @if ($item->foto == url('storage'))
            <img src="{{asset('assets/dist/img/user.svg') }}" class="rounded-circle elevation-2" alt="User Image" width="200px" height="200px">
            @else
            <img src="{{url($item->foto)}}" class="rounded-circle elevation-2" alt="User Image" width="200px" height="200px">
            @endif
        </td>
        <td>
            <table style="width: 100%">
                <tr>
                    <th>Nama</th>
                    <td>{{ $item->nama }}</td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td>{{ $item->username }}</td>
                </tr>
                <tr>
                    <th>Level</th>
                    <td>{{ $item->level }}</td>
                </tr>
                <tr>
                    <th>Bergabung</th>
                    <td>{{ $item->created_at->isoFormat('DD/MM/YYYY HH:mm:ss')}}</td>
                </tr>
            </table>
        </td>

    </tr>

</table>
