<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold"><i class="bi bi-plus-circle me-2 text-primary"></i> Tulis Berita Baru</h5>
        <a href="<?= base_url('guru/berita') ?>" class="btn btn-outline-secondary rounded-pill btn-sm fw-semibold"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
    </div>
    <div class="card-body pt-4 p-lg-4">
        <form action="<?= base_url('guru/berita/store') ?>" method="post" enctype="multipart/form-data">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Judul Berita <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg bg-light border-0" name="judul" required placeholder="Masukkan judul berita yang menarik">
                    </div>
                    
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Isi Berita <span class="text-danger">*</span></label>
                        <textarea class="form-control summernote" name="isi"></textarea>
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
                                        <option value="<?= $kat['id'] ?>"><?= $kat['nama_kategori'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label class="form-label fw-semibold">Status Publish <span class="text-danger">*</span></label>
                                <select class="form-select bg-white border-0" name="status_publish" required>
                                    <option value="publish">Langsung Publish</option>
                                    <option value="schedule">Jadwalkan (Schedule)</option>
                                </select>
                            </div>

                            <div class="form-group mb-0">
                                <label class="form-label fw-semibold">Waktu Publish <span class="text-danger">*</span></label>
                                <input type="datetime-local" class="form-control bg-white border-0" name="tgl_publish" required value="<?= date('Y-m-d\TH:i') ?>">
                            </div>
                        </div>
                    </div>
                    
                    <div class="card bg-light border-0 shadow-none rounded-4 mb-4">
                        <div class="card-body p-4">
                            <div class="form-group mb-4">
                                <label class="form-label fw-semibold">Thumbnail Berita (JPG/PNG) <span class="text-danger">*</span></label>
                                <input type="file" class="form-control bg-white border-0" name="foto" accept="image/png, image/jpeg" required>
                            </div>
                            
                            <div class="form-group mb-0">
                                <label class="form-label fw-semibold">Kata Kunci / Tags SEO</label>
                                <input type="text" class="form-control bg-white border-0" name="seo_keywords" placeholder="Contoh: sekolah unggulan, prestasi">
                                <small class="text-muted d-block mt-1">Pisahkan dengan koma (,)</small>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill fw-bold shadow-sm py-3"><i class="bi bi-send-fill me-2"></i> Publikasikan Berita</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>