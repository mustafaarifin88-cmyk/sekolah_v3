<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold"><i class="bi bi-plus-circle me-2 text-primary"></i> Tambah Program Unggulan</h5>
        <a href="<?= base_url('admin/program') ?>" class="btn btn-outline-secondary rounded-pill btn-sm fw-semibold"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
    </div>
    <div class="card-body pt-4">
        <form action="<?= base_url('admin/program/store') ?>" method="post" enctype="multipart/form-data">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Judul Program <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="judul" required placeholder="Contoh: Program Tahfidz Qur'an">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Kategori Program <span class="text-danger">*</span></label>
                        <select class="form-select" name="kategori_id" required>
                            <option value="">-- Pilih Kategori --</option>
                            <?php foreach($kategori as $kat): ?>
                                <option value="<?= $kat['id'] ?>"><?= $kat['nama_kategori'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Upload Foto/Cover Program (JPG/PNG) <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="foto" accept="image/png, image/jpeg" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Keterangan Program Unggulan</label>
                        <textarea class="form-control summernote" name="keterangan"></textarea>
                    </div>
                </div>
            </div>
            <div class="text-end border-top pt-4">
                <button type="submit" class="btn btn-primary px-4 rounded-pill fw-bold"><i class="bi bi-save me-2"></i> Simpan Program</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>