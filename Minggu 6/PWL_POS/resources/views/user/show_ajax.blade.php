{{-- resources/views/user/show_ajax.blade.php --}}
<div id="modal-master" class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Detail Data User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @empty($user)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <div class="form-group">
                    <label>ID</label>
                    <input type="text" class="form-control" value="{{ $user->user_id }}" readonly>
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <input type="text" class="form-control" value="{{ $user->level->level_nama }}" readonly>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" value="{{ $user->username }}" readonly>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" value="{{ $user->nama }}" readonly>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" value="********" readonly>
                </div>
            @endempty
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-secondary">Tutup</button>
        </div>
    </div>
</div>
