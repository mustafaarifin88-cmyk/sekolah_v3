<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold"><i class="bi bi-pencil-square me-2 text-primary"></i> Edit Kalender Pendidikan</h5>
        <a href="<?= base_url('admin/kalender') ?>" class="btn btn-outline-secondary rounded-pill btn-sm fw-semibold"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
    </div>
    <div class="card-body pt-4">
        <form action="<?= base_url('admin/kalender/update/' . $kalender['id']) ?>" method="post" enctype="multipart/form-data">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Judul / Tahun Ajaran <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="judul" value="<?= $kalender['judul'] ?>" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Ganti Gambar (Biarkan kosong jika tidak ingin diganti)</label>
                        <input type="file" class="form-control" name="foto" accept="image/png, image/jpeg">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3 text-center border rounded-3 p-3 bg-light">
                        <label class="form-label fw-semibold d-block mb-3">Gambar Kalender Saat Ini</label>
                        <img src="<?= base_url('uploads/dokumen/' . $kalender['foto']) ?>" class="img-fluid rounded-3 shadow-sm border" style="max-height: 200px; object-fit: contain; background: #fff;">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Keterangan Tambahan (Opsional)</label>
                        <textarea class="form-control summernote" name="keterangan"><?= $kalender['keterangan'] ?></textarea>
                    </div>
                </div>
            </div>
            <div class="text-end border-top pt-4">
                <button type="submit" class="btn btn-primary px-4 rounded-pill fw-bold"><i class="bi bi-save me-2"></i> Update Kalender</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>