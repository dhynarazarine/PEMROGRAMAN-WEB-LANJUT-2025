<div id="modal-master" class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Detail Data Barang</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
            @empty($barang)
                <div class="alert alert-danger">Data tidak ditemukan.</div>
            @else
                <div class="form-group">
                    <label>ID</label>
                    <input type="text" class="form-control" value="{{ $barang->barang_id }}" readonly>
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <input type="text" class="form-control" value="{{ $barang->kategori->kategori_nama ?? '-' }}" readonly>
                </div>
                <div class="form-group">
                    <label>Kode Barang</label>
                    <input type="text" class="form-control" value="{{ $barang->barang_kode }}" readonly>
                </div>
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" value="{{ $barang->barang_nama }}" readonly>
                </div>
                <div class="form-group">
                    <label>Harga Beli</label>
                    <input type="text" class="form-control" value="{{ number_format($barang->harga_beli, 0, ',', '.') }}" readonly>
                </div>
                <div class="form-group">
                    <label>Harga Jual</label>
                    <input type="text" class="form-control" value="{{ number_format($barang->harga_jual, 0, ',', '.') }}" readonly>
                </div>
            @endempty
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-secondary">Tutup</button>
        </div>
    </div>
</div>