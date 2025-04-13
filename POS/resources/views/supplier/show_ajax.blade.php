<div id="modal-master" class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Detail Data Supplier</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
            @empty($supplier)
                <div class="alert alert-danger">Data tidak ditemukan.</div>
            @else
                <div class="form-group">
                    <label>ID</label>
                    <input type="text" class="form-control" value="{{ $supplier->supplier_id }}" readonly>
                </div>
                <div class="form-group">
                    <label>Kode</label>
                    <input type="text" class="form-control" value="{{ $supplier->supplier_kode }}" readonly>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" value="{{ $supplier->supplier_nama }}" readonly>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" readonly>{{ $supplier->alamat }}</textarea>
                </div>
            @endempty
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-secondary">Tutup</button>
        </div>
    </div>
</div>