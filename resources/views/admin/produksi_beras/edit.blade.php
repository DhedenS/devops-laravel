<div class="modal fade" id="modalEdit{{ $item->id_produksi }}" tabindex="-1"
    aria-labelledby="modalEditLabel{{ $item->id_produksi }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('produksi_beras.update', $item->id_produksi) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel{{ $item->id_produksi }}">Edit Produksi Beras</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Padi</label>
                        <select name="id_padi" class="form-control" required>
                            @foreach ($padi as $p)
                                <option value="{{ $p->id_padi }}"
                                    {{ $item->id_padi == $p->id_padi ? 'selected' : '' }}>
                                    {{ $p->nama_padi }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Produk</label>
                        <select name="id_produk" class="form-control" required>
                            @foreach ($produk as $p)
                                <option value="{{ $p->id_produk }}"
                                    {{ $item->id_produk == $p->id_produk ? 'selected' : '' }}>
                                    {{ $p->nama_produk }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Produksi</label>
                        <input type="date" name="tanggal_produksi" class="form-control"
                            value="{{ $item->tanggal_produksi }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Padi</label>
                        <input type="number" name="jumlah_padi" class="form-control" value="{{ $item->jumlah_padi }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Beras</label>
                        <input type="number" name="jumlah_beras" class="form-control"
                            value="{{ $item->jumlah_beras }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control" required>{{ $item->keterangan }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
