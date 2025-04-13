<div id="modal-master" class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Detail Data Level</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @empty($level)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <div class="form-group">
                    <label>ID Level</label>
                    <input type="text" class="form-control" value="{{ $level->level_id }}" readonly>
                </div>
                <div class="form-group">
                    <label>Kode Level</label>
                    <input type="text" class="form-control" value="{{ $level->level_kode }}" readonly>
                </div>
                <div class="form-group">
                    <label>Nama Level</label>
                    <input type="text" class="form-control" value="{{ $level->level_nama }}" readonly>
                </div>
            @endempty
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-secondary">Tutup</button>
        </div>
    </div>
</div>
