<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 fw-bold"><i class="bi bi-pencil-square me-2 text-primary"></i> Edit File Unduhan</h5>
                <a href="<?= base_url('admin/unduhan') ?>" class="btn btn-outline-secondary rounded-pill btn-sm fw-semibold"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
            </div>
            <div class="card-body pt-4">
                <form action="<?= base_url('admin/unduhan/update/' . $unduhan['id']) ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Judul File / Dokumen <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="judul" value="<?= $unduhan['judul'] ?>" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold d-block">File Saat Ini</label>
                        <a href="<?= base_url('uploads/dokumen/' . $unduhan['file_path']) ?>" target="_blank" class="btn btn-sm btn-info text-white rounded-pill px-3"><i class="bi bi-file-earmark-text"></i> <?= $unduhan['file_path'] ?></a>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Ganti File (Opsional)</label>
                        <input type="file" class="form-control" name="file_path">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengganti file lama.</small>
                    </div>

                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Keterangan (Opsional)</label>
                        <textarea class="form-control" name="keterangan" rows="4"><?= $unduhan['keterangan'] ?></textarea>
                    </div>
                    <div class="text-end border-top pt-4">
                        <button type="submit" class="btn btn-primary px-4 rounded-pill fw-bold"><i class="bi bi-save me-2"></i> Update File</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>