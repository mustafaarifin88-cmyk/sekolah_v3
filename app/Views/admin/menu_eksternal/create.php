<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 fw-bold"><i class="bi bi-plus-circle me-2 text-primary"></i> Tambah Menu Eksternal</h5>
                <a href="<?= base_url('admin/menu_eksternal') ?>" class="btn btn-outline-secondary rounded-pill btn-sm fw-semibold"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
            </div>
            <div class="card-body pt-4 p-lg-5">
                <form action="<?= base_url('admin/menu_eksternal/store') ?>" method="post">
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Judul Label Menu <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg bg-light border-0" name="judul" required placeholder="Contoh: Portal E-Rapor">
                    </div>
                    <div class="form-group mb-5">
                        <label class="form-label fw-semibold">URL / Link Tujuan <span class="text-danger">*</span></label>
                        <input type="url" class="form-control form-control-lg bg-light border-0 text-primary" name="url" required placeholder="https://domain.com/link">
                        <small class="text-muted d-block mt-2">Pastikan diawali dengan http:// atau https://</small>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill fw-bold shadow-sm"><i class="bi bi-save me-2"></i> Simpan Menu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>