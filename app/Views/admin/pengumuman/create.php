<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold"><i class="bi bi-plus-circle me-2 text-primary"></i> Buat Pengumuman Baru</h5>
        <a href="<?= base_url('admin/pengumuman') ?>" class="btn btn-outline-secondary rounded-pill btn-sm fw-semibold"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
    </div>
    <div class="card-body pt-4">
        <form action="<?= base_url('admin/pengumuman/store') ?>" method="post">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold text-uppercase text-muted small">Judul Pengumuman <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg border-2" name="judul" required placeholder="Ketikkan judul pengumuman...">
                    </div>
                    
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold text-uppercase text-muted small">Isi Pengumuman <span class="text-danger">*</span></label>
                        <textarea class="form-control summernote" name="isi"></textarea>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="card bg-primary bg-opacity-10 border-0 shadow-none rounded-4 mb-4">
                        <div class="card-body p-4">
                            <h6 class="fw-bold text-primary mb-4"><i class="bi bi-gear-fill me-2"></i> Pengaturan Publikasi</h6>
                            
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

                            <div class="form-group mb-4">
                                <label class="form-label fw-semibold">Waktu Publish <span class="text-danger">*</span></label>
                                <input type="datetime-local" class="form-control" name="tgl_publish" required value="<?= date('Y-m-d\TH:i') ?>">
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100 rounded-pill fw-bold py-2"><i class="bi bi-megaphone-fill me-2"></i> Sebarkan Pengumuman</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>