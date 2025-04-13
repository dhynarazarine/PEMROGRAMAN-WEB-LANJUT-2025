<form action="{{ url('/level/import_ajax') }}" method="POST" id="form-import" enctype="multipart/form-data">
    @csrf
    <div id="modal-master" class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Data Level</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label>Download Template</label><br>
                    <a href="{{ asset('template_level.xlsx') }}" class="btn btn-info btn-sm" download>
                        <i class="fa fa-file-excel"></i> Download Template
                    </a>
                    <small id="error-template" class="error-text form-text text-danger"></small>
                </div>

                <div class="form-group">
                    <label>Pilih File</label>
                    <input type="file" name="file_level" id="file_level" class="form-control" required>
                    <small id="error-file_level" class="error-text form-text text-danger"></small>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </div>
    </div>
</form>

<script>
   $("#form-import").on("submit", function(e) {
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
                   tableLevel.ajax.reload(); // reload datatable level
               } else {
                   Swal.fire('Gagal', res.message, 'error');
               }
           }
       });
   });
</script>