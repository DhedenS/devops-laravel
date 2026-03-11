@forelse ($petanis as $index => $petani)
<tr>
    <td>{{ $petanis->firstItem() + $index }}</td>
    <td>{{ $petani->nama_lengkap }}</td>
    <td>{{ $petani->username }}</td>
    <td>{{ $petani->email }}</td>
    <td>{{ $petani->gender }}</td>
    <td>{{ $petani->no_telp }}</td>
    <td>{{ $petani->alamat }}</td>
    <td>{{ ucfirst($petani->role) }}</td>
    <td>
        <a href="{{ route('petani.edit', $petani->id_petani) }}" class="btn btn-sm btn-warning mb-1">
            <i class="bi bi-pencil-square"></i> Edit
        </a>
        <form action="{{ route('petani.destroy', $petani->id_petani) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">
                <i class="bi bi-trash-fill"></i> Hapus
            </button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="9" class="text-center text-muted">Tidak ada data petani ditemukan.</td>
</tr>
@endforelse
