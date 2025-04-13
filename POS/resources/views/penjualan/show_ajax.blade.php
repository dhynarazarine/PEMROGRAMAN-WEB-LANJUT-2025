<div id="modal-master" class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Detail Data Penjualan</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
            @empty($penjualan)
                <div class="alert alert-danger">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data tidak ditemukan.
                </div>
            @else
                <div class="form-group">
                    <label>ID Penjualan</label>
                    <input type="text" class="form-control" value="{{ $penjualan->penjualan_id }}" readonly>
                </div>
                <div class="form-group">
                    <label>Kode Penjualan</label>
                    <input type="text" class="form-control" value="{{ $penjualan->penjualan_kode }}" readonly>
                </div>
                <div class="form-group">
                    <label>Pembeli</label>
                    <input type="text" class="form-control" value="{{ $penjualan->pembeli }}" readonly>
                </div>
                <div class="form-group">
                    <label>Tanggal Penjualan</label>
                    <input type="date" class="form-control" value="{{ $penjualan->tanggal_penjualan }}" readonly>
                </div>
            @endempty
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-secondary">Tutup</button>
        </div>
    </div>
</div>
