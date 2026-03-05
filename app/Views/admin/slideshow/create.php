<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 fw-bold"><i class="bi bi-plus-circle me-2 text-primary"></i> Tambah Slide Show Baru</h5>
                <a href="<?= base_url('admin/slideshow') ?>" class="btn btn-outline-secondary rounded-pill btn-sm fw-semibold"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
            </div>
            <div class="card-body pt-4 p-lg-5 text-center">
                <form action="<?= base_url('admin/slideshow/store') ?>" method="post" enctype="multipart/form-data">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 100px; height: 100px;">
                        <i class="bi bi-images text-primary" style="font-size: 3rem;"></i>
                    </div>
                    <h4 class="fw-bold mb-4">Pilih Foto untuk Banner Beranda</h4>
                    
                    <div class="form-group mb-4 text-start">
                        <label class="form-label fw-semibold">Judul / Slogan Utama (Opsional)</label>
                        <input type="text" class="form-control form-control-lg bg-light border-0" name="judul" placeholder="Contoh: Penerimaan Siswa Baru Tahun 2025">
                    </div>

                    <div class="form-group mb-4 text-start">
                        <label class="form-label fw-semibold">Keterangan Singkat (Opsional)</label>
                        <textarea class="form-control form-control-lg bg-light border-0" name="keterangan" rows="3" placeholder="Tuliskan sub-judul atau deskripsi singkat untuk banner ini..."></textarea>
                    </div>

                    <div class="form-group mb-5 text-start">
                        <label class="form-label fw-semibold">Upload Foto Background (JPG/PNG) <span class="text-danger">*</span></label>
                        <input type="file" class="form-control form-control-lg bg-light border-0 shadow-sm p-3 rounded-4" name="foto" accept="image/png, image/jpeg" required>
                        <small class="text-muted d-block mt-2 fw-semibold">Disarankan menggunakan foto landscape (rasio 16:9) dengan resolusi yang baik agar tidak pecah.</small>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill fw-bold shadow-sm py-3"><i class="bi bi-cloud-arrow-up-fill me-2"></i> Simpan & Publikasikan Slide</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>