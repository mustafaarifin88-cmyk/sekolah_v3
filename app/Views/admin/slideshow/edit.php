<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 fw-bold"><i class="bi bi-pencil-square me-2 text-primary"></i> Edit Data Slide Show</h5>
                <a href="<?= base_url('admin/slideshow') ?>" class="btn btn-outline-secondary rounded-pill btn-sm fw-semibold"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
            </div>
            <div class="card-body pt-4 p-lg-5">
                <form action="<?= base_url('admin/slideshow/update/' . $slide['id']) ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Judul / Slogan Utama</label>
                        <input type="text" class="form-control form-control-lg bg-light border-0" name="judul" value="<?= $slide['judul'] ?>">
                    </div>

                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Keterangan Singkat</label>
                        <textarea class="form-control form-control-lg bg-light border-0" name="keterangan" rows="3"><?= $slide['keterangan'] ?></textarea>
                    </div>

                    <div class="row mb-5 align-items-center">
                        <div class="col-md-8">
                            <div class="form-group mb-0">
                                <label class="form-label fw-semibold text-start w-100">Ganti Foto Background (Opsional)</label>
                                <input type="file" class="form-control form-control-lg bg-light border-0" name="foto" accept="image/png, image/jpeg">
                                <small class="text-muted d-block mt-2">Biarkan kosong jika tidak ingin mengubah foto background.</small>
                            </div>
                        </div>
                        <div class="col-md-4 text-center mt-3 mt-md-0">
                            <label class="form-label fw-semibold d-block mb-2">Foto Saat Ini</label>
                            <img src="<?= base_url('uploads/slideshow/' . $slide['foto']) ?>" class="img-fluid rounded-4 shadow-sm border" style="max-height: 120px; object-fit: contain;">
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill fw-bold shadow-sm py-3"><i class="bi bi-save me-2"></i> Update Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>