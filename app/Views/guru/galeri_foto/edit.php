<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 fw-bold"><i class="bi bi-pencil-square me-2 text-primary"></i> Edit Foto Galeri</h5>
                <a href="<?= base_url('guru/galeri_foto') ?>" class="btn btn-outline-secondary rounded-pill btn-sm fw-semibold"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
            </div>
            <div class="card-body pt-4">
                <form action="<?= base_url('guru/galeri_foto/update/' . $galeri['id']) ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Judul Foto / Caption <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg bg-light border-0" name="judul" value="<?= $galeri['judul'] ?>" required>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="form-label fw-semibold">Ganti Foto (Opsional)</label>
                                <input type="file" class="form-control bg-light border-0" name="foto" accept="image/png, image/jpeg">
                                <small class="text-muted">Biarkan kosong jika tidak ingin mengubah foto saat ini.</small>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <label class="form-label fw-semibold d-block">Preview Saat Ini</label>
                            <img src="<?= base_url('uploads/galeri/' . $galeri['foto']) ?>" class="img-fluid rounded-3 shadow-sm border" style="max-height: 100px; object-fit: contain;">
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Keterangan Tambahan (Opsional)</label>
                        <textarea class="form-control bg-light border-0" name="keterangan" rows="4"><?= $galeri['keterangan'] ?></textarea>
                    </div>
                    
                    <div class="text-end border-top pt-4">
                        <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill fw-bold shadow-sm"><i class="bi bi-save me-2"></i> Update Data Foto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>