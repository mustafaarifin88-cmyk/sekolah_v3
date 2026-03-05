<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold"><i class="bi bi-pencil-square me-2 text-primary"></i> Edit Ekstrakurikuler</h5>
        <a href="<?= base_url('admin/eskul') ?>" class="btn btn-outline-secondary rounded-pill btn-sm fw-semibold"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
    </div>
    <div class="card-body pt-4">
        <form action="<?= base_url('admin/eskul/update/' . $eskul['id']) ?>" method="post" enctype="multipart/form-data">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Nama Ekstrakurikuler <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama_ekstrakurikuler" value="<?= $eskul['nama_ekstrakurikuler'] ?>" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Kategori Ekstrakurikuler <span class="text-danger">*</span></label>
                        <select class="form-select" name="kategori_id" required>
                            <option value="">-- Pilih Kategori --</option>
                            <?php foreach($kategori as $kat): ?>
                                <option value="<?= $kat['id'] ?>" <?= $eskul['kategori_id'] == $kat['id'] ? 'selected' : '' ?>><?= $kat['nama_kategori'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Nama Guru Pembimbing / Pelatih <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama_guru_pembimbing" value="<?= $eskul['nama_guru_pembimbing'] ?>" required>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Ganti Foto/Logo (Opsional)</label>
                        <input type="file" class="form-control" name="foto" accept="image/png, image/jpeg">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group mb-3 text-center border rounded-3 p-3 bg-light h-100 d-flex flex-column justify-content-center">
                        <label class="form-label fw-semibold d-block mb-3">Foto/Logo Saat Ini</label>
                        <div>
                            <img src="<?= base_url('uploads/eskul/' . $eskul['foto']) ?>" class="img-fluid rounded-3 shadow-sm" style="max-height: 200px; object-fit: contain;">
                        </div>
                    </div>
                </div>
                
                <div class="col-12 mt-4">
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Keterangan / Profil Singkat Ekstrakurikuler</label>
                        <textarea class="form-control summernote" name="keterangan"><?= $eskul['keterangan'] ?></textarea>
                    </div>
                </div>
            </div>
            
            <div class="text-end border-top pt-4">
                <button type="submit" class="btn btn-primary px-4 rounded-pill fw-bold"><i class="bi bi-save me-2"></i> Update Data</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>