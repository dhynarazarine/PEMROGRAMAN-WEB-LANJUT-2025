<form action="{{ url('/supplier/ajax') }}" method="POST" id="form-tambah">
    @csrf
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Kode Supplier</label>
                    <input type="text" name="supplier_kode" id="supplier_kode" class="form-control" required>
                    <small id="error-supplier_kode" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Nama Supplier</label>
                    <input type="text" name="supplier_nama" id="supplier_nama" class="form-control" required>
                    <small id="error-supplier_nama" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Kontak</label>
                    <textarea name="kontak" id="kontak" class="form-control" rows="3"></textarea>
                    <small id="error-kontak" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Alamat Supplier</label>
                    <textarea name="alamat" id="alamat" class="form-control" rows="3"></textarea>
                    <small id="error-alamat" class="error-text form-text text-danger"></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function () {
        $("#form-tambah").validate({
            rules: {
                supplier_kode: {
                    required: true,
                    maxlength: 10
                },
                supplier_nama: {
                    required: true,
                    maxlength: 100
                },
                alamat: {
                    required: false,
                    maxlength: 255
                }
                kontak: {
                    required: false,
                    maxlength: 50
                }
            },
            submitHandler: function (form) {
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    success: function (response) {
                        if (response.status) {
                            $('#myModal').modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message
                            });
                            dataSupplier.ajax.reload(null, false);
                        } else {
                            $('.error-text').text('');
                            $.each(response.msgField, function (prefix, val) {
                                $('#error-' + prefix).text(val[0]);
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan',
                                text: response.message
                            });
                        }
                    }
                });
                return false;
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>