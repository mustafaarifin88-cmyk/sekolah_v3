<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold"><i class="bi bi-pencil-square me-2 text-primary"></i> Edit Berita Sekolah</h5>
        <a href="<?= base_url('guru/berita') ?>" class="btn btn-outline-secondary rounded-pill btn-sm fw-semibold"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
    </div>
    <div class="card-body pt-4 p-lg-4">
        <form action="<?= base_url('guru/berita/update/' . $berita['id']) ?>" method="post" enctype="multipart/form-data">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Judul Berita <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg bg-light border-0" name="judul" value="<?= $berita['judul'] ?>" required>
                    </div>
                    
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Isi Berita <span class="text-danger">*</span></label>
                        <textarea class="form-control summernote" name="isi"><?= $berita['isi'] ?></textarea>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="card bg-primary bg-opacity-10 border-0 shadow-none rounded-4 mb-4">
                        <div class="card-body p-4">
                            <h6 class="fw-bold text-primary mb-3 border-bottom pb-2">Pengaturan Publikasi</h6>
                            <div class="form-group mb-3">
                                <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                                <select class="form-select bg-white border-0" name="kategori_id" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <?php foreach($kategori as $kat): ?>
                                        <option value="<?= $kat['id'] ?>" <?= $berita['kategori_id'] == $kat['id'] ? 'selected' : '' ?>><?= $kat['nama_kategori'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label class="form-label fw-semibold">Status Publish <span class="text-danger">*</span></label>
                                <select class="form-select bg-white border-0" name="status_publish" required>
                                    <option value="publish" <?= $berita['status_publish'] == 'publish' ? 'selected' : '' ?>>Langsung Publish</option>
                                    <option value="schedule" <?= $berita['status_publish'] == 'schedule' ? 'selected' : '' ?>>Jadwalkan (Schedule)</option>
                                </select>
                            </div>

                            <div class="form-group mb-0">
                                <label class="form-label fw-semibold">Waktu Publish <span class="text-danger">*</span></label>
                                <input type="datetime-local" class="form-control bg-white border-0" name="tgl_publish" required value="<?= date('Y-m-d\TH:i', strtotime($berita['tgl_publish'])) ?>">
                            </div>
                        </div>
                    </div>
                    
                    <div class="card bg-light border-0 shadow-none rounded-4 mb-4">
                        <div class="card-body p-4 text-center">
                            <label class="form-label fw-semibold d-block text-start mb-2">Thumbnail Saat Ini</label>
                            <img src="<?= base_url('uploads/berita/' . $berita['foto']) ?>" class="img-fluid rounded-4 shadow-sm border mb-3" style="max-height: 150px; object-fit: contain;">
                            
                            <div class="form-group mb-4 text-start">
                                <label class="form-label fw-semibold">Ganti Thumbnail (Opsional)</label>
                                <input type="file" class="form-control bg-white border-0" name="foto" accept="image/png, image/jpeg">
                            </div>
                            
                            <div class="form-group mb-0 text-start">
                                <label class="form-label fw-semibold">Kata Kunci / Tags SEO</label>
                                <input type="text" class="form-control bg-white border-0" name="seo_keywords" value="<?= $berita['seo_keywords'] ?>">
                                <small class="text-muted d-block mt-1">Pisahkan dengan koma (,)</small>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill fw-bold shadow-sm py-3"><i class="bi bi-save me-2"></i> Update Berita</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>