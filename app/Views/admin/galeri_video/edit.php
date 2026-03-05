<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 fw-bold"><i class="bi bi-pencil-square me-2 text-danger"></i> Edit Video Galeri</h5>
                <a href="<?= base_url('admin/galeri_video') ?>" class="btn btn-outline-secondary rounded-pill btn-sm fw-semibold"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
            </div>
            <div class="card-body pt-4">
                <form action="<?= base_url('admin/galeri_video/update/' . $galeri['id']) ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Judul Video <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="judul" value="<?= $galeri['judul'] ?>" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Link YouTube <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-danger text-white border-danger"><i class="bi bi-youtube"></i></span>
                            <input type="url" class="form-control" name="link_youtube" value="<?= $galeri['link_youtube'] ?>" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="form-label fw-semibold">Ganti Thumbnail Video (Opsional)</label>
                                <input type="file" class="form-control" name="thumbnail" accept="image/png, image/jpeg">
                                <small class="text-muted">Biarkan kosong jika tidak ingin mengubah thumbnail.</small>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <label class="form-label fw-semibold d-block mb-2">Thumbnail Saat Ini</label>
                            <img src="<?= base_url('uploads/galeri/' . $galeri['thumbnail']) ?>" class="img-fluid rounded-3 shadow-sm border" style="max-height: 100px; object-fit: contain;">
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Keterangan Tambahan (Opsional)</label>
                        <textarea class="form-control" name="keterangan" rows="4"><?= $galeri['keterangan'] ?></textarea>
                    </div>
                    
                    <div class="text-end border-top pt-4">
                        <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill fw-bold"><i class="bi bi-save me-2"></i> Update Data Video</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>