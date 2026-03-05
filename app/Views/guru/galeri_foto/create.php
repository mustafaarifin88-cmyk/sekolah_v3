<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 fw-bold"><i class="bi bi-plus-circle me-2 text-primary"></i> Upload Foto Galeri</h5>
                <a href="<?= base_url('guru/galeri_foto') ?>" class="btn btn-outline-secondary rounded-pill btn-sm fw-semibold"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
            </div>
            <div class="card-body pt-4">
                <form action="<?= base_url('guru/galeri_foto/store') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Judul Foto / Caption <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg bg-light border-0" name="judul" required placeholder="Contoh: Kegiatan Upacara Bendera 17 Agustus">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Upload Foto (JPG/PNG, Max 2MB) <span class="text-danger">*</span></label>
                        <div class="position-relative">
                            <input type="file" class="form-control form-control-lg bg-light border-0" name="foto" accept="image/png, image/jpeg" required>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Keterangan Tambahan (Opsional)</label>
                        <textarea class="form-control bg-light border-0" name="keterangan" rows="4" placeholder="Ceritakan momen singkat dari foto ini..."></textarea>
                    </div>
                    
                    <div class="text-end border-top pt-4">
                        <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill fw-bold shadow-sm"><i class="bi bi-cloud-arrow-up-fill me-2"></i> Upload Foto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>