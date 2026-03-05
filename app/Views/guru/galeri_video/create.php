<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 fw-bold"><i class="bi bi-plus-circle me-2 text-danger"></i> Tambah Video Galeri</h5>
                <a href="<?= base_url('guru/galeri_video') ?>" class="btn btn-outline-secondary rounded-pill btn-sm fw-semibold"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
            </div>
            <div class="card-body pt-4">
                <form action="<?= base_url('guru/galeri_video/store') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Judul Video <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg bg-light border-0" name="judul" required placeholder="Contoh: Dokumentasi Pentas Seni 2024">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Link YouTube <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-danger text-white border-danger"><i class="bi bi-youtube"></i></span>
                            <input type="url" class="form-control form-control-lg bg-light border-0" name="link_youtube" required placeholder="https://www.youtube.com/watch?v=xxxx">
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Upload Thumbnail Video (JPG/PNG) <span class="text-danger">*</span></label>
                        <input type="file" class="form-control bg-light border-0" name="thumbnail" accept="image/png, image/jpeg" required>
                        <small class="text-muted">Upload gambar yang akan dijadikan cover depan video di galeri.</small>
                    </div>

                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Keterangan Tambahan (Opsional)</label>
                        <textarea class="form-control bg-light border-0" name="keterangan" rows="4" placeholder="Ceritakan deskripsi singkat video ini..."></textarea>
                    </div>
                    
                    <div class="text-end border-top pt-4">
                        <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill fw-bold shadow-sm"><i class="bi bi-cloud-arrow-up-fill me-2"></i> Simpan Video</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>