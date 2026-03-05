<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 fw-bold"><i class="bi bi-pencil-square me-2 text-primary"></i> Ganti Foto Slide Show</h5>
                <a href="<?= base_url('admin/slideshow') ?>" class="btn btn-outline-secondary rounded-pill btn-sm fw-semibold"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
            </div>
            <div class="card-body pt-4 p-5 text-center">
                <form action="<?= base_url('admin/slideshow/update/' . $slide['id']) ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label class="form-label fw-semibold d-block mb-3">Foto Saat Ini</label>
                        <img src="<?= base_url('uploads/slideshow/' . $slide['foto']) ?>" class="img-fluid rounded-4 shadow-sm border" style="max-height: 250px; object-fit: contain;">
                    </div>
                    
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold text-start w-100">Upload Foto Baru Pengganti</label>
                        <input type="file" class="form-control form-control-lg bg-light border-0" name="foto" accept="image/png, image/jpeg" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill fw-bold shadow-sm"><i class="bi bi-save me-2"></i> Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>