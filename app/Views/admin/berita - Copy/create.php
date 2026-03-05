<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold"><i class="bi bi-plus-circle me-2 text-primary"></i> Tulis Berita Baru</h5>
        <a href="<?= base_url('admin/berita') ?>" class="btn btn-outline-secondary rounded-pill btn-sm fw-semibold"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
    </div>
    <div class="card-body pt-4">
        <form action="<?= base_url('admin/berita/store') ?>" method="post" enctype="multipart/form-data">
            <div class="row g-3">
                <div class="col-md-8">
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Judul Berita <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg" name="judul" required placeholder="Masukkan judul berita yang menarik">
                    </div>
                    
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Isi Berita <span class="text-danger">*</span></label>
                        <textarea class="form-control summernote" name="isi"></textarea>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card bg-light border-0 shadow-none rounded-4 mb-3">
                        <div class="card-body p-4">
                            <div class="form-group mb-3">
                                <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                                <select class="form-select" name="kategori_id" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <?php foreach($kategori as $kat): ?>
                                        <option value="<?= $kat['id'] ?>"><?= $kat['nama_kategori'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label class="form-label fw-semibold">Status Publish <span class="text-danger">*</span></label>
                                <select class="form-select" name="status_publish" required>
                                    <option value="publish">Langsung Publish</option>
                                    <option value="schedule">Jadwalkan (Schedule)</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label fw-semibold">Tanggal & Waktu Publish <span class="text-danger">*</span></label>
                                <input type="datetime-local" class="form-control" name="tgl_publish" required value="<?= date('Y-m-d\TH:i') ?>">
                            </div>
                        </div>
                    </div>
                    
                    <div class="card bg-light border-0 shadow-none rounded-4 mb-3">
                        <div class="card-body p-4">
                            <div class="form-group mb-3">
                                <label class="form-label fw-semibold">Upload Foto/Thumbnail (JPG/PNG) <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="foto" accept="image/png, image/jpeg" required>
                            </div>
                            
                            <div class="form-group mb-0">
                                <label class="form-label fw-semibold">Kata Kunci / SEO Tags</label>
                                <input type="text" class="form-control" name="seo_keywords" placeholder="Contoh: sekolah unggulan, prestasi siswa">
                                <small class="text-muted">Pisahkan dengan koma (,)</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-end border-top pt-4">
                <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill fw-bold"><i class="bi bi-send-fill me-2"></i> Publikasikan Berita</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>