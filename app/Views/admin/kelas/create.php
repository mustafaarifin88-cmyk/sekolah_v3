<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 fw-bold"><i class="bi bi-plus-circle me-2 text-primary"></i> Tambah Kelas</h5>
                <a href="<?= base_url('admin/kelas') ?>" class="btn btn-outline-secondary rounded-pill btn-sm fw-semibold"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
            </div>
            <div class="card-body pt-4 p-5">
                <form action="<?= base_url('admin/kelas/store') ?>" method="post">
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Nama Kelas <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg bg-light border-0" name="nama_kelas" required placeholder="Contoh: X IPA 1, XI IPS 2, Dst...">
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill fw-bold shadow-sm"><i class="bi bi-save me-2"></i> Simpan Kelas Baru</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>