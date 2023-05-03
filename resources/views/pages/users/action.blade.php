<a class="btn btn-info btn-sm mb-1" data-remote ="{{route('users.show', $user->id)}}" href="#userModal" data-toggle="modal" data-target="#userModal" data-title="Detail User">
    <i class="fas fa-eye">
    </i>
    Detail
</a>
<a class="btn btn-primary btn-sm mb-1" href="{{route('users.edit', $user->id)}}">
    <i class="fas fa-pencil-alt">
    </i>
    Ubah
</a>
<a href="{{route('users.reset-password', $user->id)}}" class="btn btn-warning btn-sm mb-1">
    <i class="fa fa-key"></i>
    Reset password
</a>
<form action="{{route('users.destroy', $user->id)}}" method="post" class="d-inline" id="{{'form-hapus-user-'.$user->id}}">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger btn-sm btn-hapus" data-id="{{$user->id}}" data-nama="{{$user->nama}}">
        <i class="fas fa-trash">
        </i>
        Hapus
    </button>
</form>


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
