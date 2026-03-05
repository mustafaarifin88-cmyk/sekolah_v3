<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 fw-bold"><i class="bi bi-plus-circle me-2 text-warning"></i> Tambah Kategori Prestasi</h5>
                <a href="<?= base_url('admin/kategori_prestasi') ?>" class="btn btn-outline-secondary rounded-pill btn-sm fw-semibold"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
            </div>
            <div class="card-body pt-4">
                <form action="<?= base_url('admin/kategori_prestasi/store') ?>" method="post">
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Nama Kategori <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama_kategori" required placeholder="Contoh: Akademik Siswa, Non-Akademik, Guru Berprestasi">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Keterangan (Opsional)</label>
                        <textarea class="form-control" name="keterangan" rows="4" placeholder="Keterangan singkat..."></textarea>
                    </div>
                    <div class="text-end border-top pt-4">
                        <button type="submit" class="btn btn-primary px-4 rounded-pill fw-bold"><i class="bi bi-save me-2"></i> Simpan Kategori</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>