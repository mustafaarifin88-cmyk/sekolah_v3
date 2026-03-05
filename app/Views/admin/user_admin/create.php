<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 fw-bold"><i class="bi bi-person-plus-fill me-2 text-primary"></i> Tambah Akun Admin</h5>
                <a href="<?= base_url('admin/user_admin') ?>" class="btn btn-outline-secondary rounded-pill btn-sm fw-semibold"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
            </div>
            <div class="card-body pt-4 p-lg-5">
                <form action="<?= base_url('admin/user_admin/store') ?>" method="post" enctype="multipart/form-data">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-lg bg-light border-0" name="nama_lengkap" required placeholder="Nama pengelola">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label fw-semibold">Upload Foto Profil (Opsional)</label>
                                <input type="file" class="form-control bg-light border-0" name="foto_profil" accept="image/png, image/jpeg">
                            </div>
                        </div>
                        <div class="col-md-6 border-start ps-lg-4">
                            <div class="form-group mb-3">
                                <label class="form-label fw-semibold">Username Login <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-lg bg-light border-0" name="username" required placeholder="Username unik">
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label fw-semibold">Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control form-control-lg bg-light border-0" name="password" required placeholder="Minimal 6 karakter">
                            </div>
                        </div>
                    </div>
                    <div class="text-end border-top pt-4 mt-2">
                        <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill fw-bold shadow-sm"><i class="bi bi-save me-2"></i> Simpan Data Admin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>