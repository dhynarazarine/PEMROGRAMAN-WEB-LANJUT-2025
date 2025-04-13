<form action="{{ url('/supplier/import_ajax') }}" method="POST" id="form-import-supplier" enctype="multipart/form-data">
    @csrf
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Data Supplier</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Download Template</label><br>
                    <a href="{{ asset('template_supplier.xlsx') }}" class="btn btn-sm btn-info" download>
                        <i class="fa fa-file-excel"></i> Download Template
                    </a>
                </div>
                <div class="form-group">
                    <label>Pilih File Excel</label>
                    <input type="file" name="file_supplier" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-warning" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </div>
    </div>
</form>

<script>
    $("#form-import-supplier").on("submit", function(e) {
        e.preventDefault();
        let form = this;
        let formData = new FormData(form);

        $.ajax({
            url: form.action,
            method: form.method,
            data: formData,
            processData: false,
            contentType: false,
            success: function (res) {
                if (res.status) {
                    $('#myModal').modal('hide');
                    Swal.fire('Berhasil', res.message, 'success');
                    dataSupplier.ajax.reload(); // reload DataTable supplier
                } else {
                    Swal.fire('Gagal', res.message, 'error');
                }
            },
            error: function(xhr) {
                Swal.fire('Error', 'Terjadi kesalahan pada server.', 'error');
                console.error(xhr.responseText);
            }
        });
    });
</script>
