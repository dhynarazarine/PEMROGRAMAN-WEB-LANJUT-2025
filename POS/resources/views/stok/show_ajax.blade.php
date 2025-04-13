<div id="modal-master" class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Detail Data Stok</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @empty($stok)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <div class="form-group">
                    <label>ID</label>
                    <input type="text" class="form-control" value="{{ $stok->stok_id }}" readonly>
                </div>
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" value="{{ $stok->barang->barang_nama ?? 'Tidak ditemukan' }}" readonly>
                </div>
                <div class="form-group">
                    <label>Nama User</label>
                    <input type="text" class="form-control" value="{{ $stok->user->name ?? 'Tidak ditemukan' }}" readonly>
                </div>
                <div class="form-group">
                    <label>Tanggal Stok</label>
                    <input type="text" class="form-control" value="{{ $stok->stok_tanggal }}" readonly>
                </div>
                <div class="form-group">
                    <label>Jumlah Stok</label>
                    <input type="text" class="form-control" value="{{ $stok->stok_jumlah }}" readonly>
                </div>
            @endempty
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-secondary">Tutup</button>
        </div>
    </div>
</div>
