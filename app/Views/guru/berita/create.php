<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold"><i class="bi bi-plus-circle me-2 text-primary"></i> Tambah Agenda Sekolah</h5>
        <a href="<?= base_url('admin/agenda') ?>" class="btn btn-outline-secondary rounded-pill btn-sm fw-semibold"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
    </div>
    <div class="card-body pt-4">
        <form action="<?= base_url('admin/agenda/store') ?>" method="post" enctype="multipart/form-data">
            <div class="row g-4">
                <div class="col-md-8">
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Judul Agenda Kegiatan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg" name="judul" required placeholder="Contoh: Rapat Pembagian Raport Semester Ganjil">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Keterangan / Deskripsi Agenda <span class="text-danger">*</span></label>
                        <textarea class="form-control summernote" name="keterangan"></textarea>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card bg-light border-0 shadow-none rounded-4 mb-3">
                        <div class="card-body p-4">
                            <div class="form-group mb-3">
                                <label class="form-label fw-semibold">Kategori Agenda <span class="text-danger">*</span></label>
                                <select class="form-select" name="kategori_id" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <?php foreach($kategori as $kat): ?>
                                        <option value="<?= $kat['id'] ?>"><?= $kat['nama_kategori'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group mb-0">
                                <label class="form-label fw-semibold">Upload Poster / Foto (Opsional)</label>
                                <input type="file" class="form-control" name="foto" accept="image/png, image/jpeg">
                                <small class="text-muted">Biarkan kosong jika agenda tidak memiliki gambar poster.</small>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-3 rounded-pill fw-bold shadow-sm mt-2"><i class="bi bi-save me-2"></i> Simpan Agenda</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>