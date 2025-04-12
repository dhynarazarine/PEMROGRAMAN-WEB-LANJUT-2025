<div id="modal-master" class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Detail Data Kategori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @empty($kategori)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <div class="form-group">
                    <label>ID</label>
                    <input type="text" class="form-control" value="{{ $kategori->kategori_id }}" readonly>
                </div>
                <div class="form-group">
                    <label>Kode Kategori</label>
                    <input type="text" class="form-control" value="{{ $kategori->kategori_kode }}" readonly>
                </div>
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" class="form-control" value="{{ $kategori->kategori_nama }}" readonly>
                </div>
            @endempty
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-secondary">Tutup</button>
        </div>
    </div>
</div>
