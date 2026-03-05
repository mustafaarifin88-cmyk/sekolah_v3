<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold"><i class="bi bi-pencil-square me-2 text-warning"></i> Edit Data Prestasi</h5>
        <a href="<?= base_url('admin/prestasi') ?>" class="btn btn-outline-secondary rounded-pill btn-sm fw-semibold"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
    </div>
    <div class="card-body pt-4">
        <form action="<?= base_url('admin/prestasi/update/' . $prestasi['id']) ?>" method="post">
            <div class="row g-4">
                <div class="col-md-8">
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Judul Prestasi / Lomba <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg" name="judul" value="<?= $prestasi['judul'] ?>" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label fw-semibold">Nama Penerima <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nama_penerima" value="<?= $prestasi['nama_penerima'] ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label fw-semibold">Hadiah / Peringkat <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="hadiah" value="<?= $prestasi['hadiah'] ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Keterangan Lengkap / Deskripsi (Opsional)</label>
                        <textarea class="form-control summernote" name="keterangan"><?= $prestasi['keterangan'] ?></textarea>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card bg-light border-0 shadow-none rounded-4 mb-3">
                        <div class="card-body p-4">
                            <div class="form-group mb-3">
                                <label class="form-label fw-semibold">Kategori Prestasi <span class="text-danger">*</span></label>
                                <select class="form-select" name="kategori_id" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <?php foreach($kategori as $kat): ?>
                                        <option value="<?= $kat['id'] ?>" <?= $prestasi['kategori_id'] == $kat['id'] ? 'selected' : '' ?>><?= $kat['nama_kategori'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label fw-semibold">Instansi Penyelenggara <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="penyelenggara" value="<?= $prestasi['penyelenggara'] ?>" required>
                            </div>

                            <div class="form-group mb-0">
                                <label class="form-label fw-semibold">Tanggal Penerimaan <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="tgl_penerimaan" value="<?= $prestasi['tgl_penerimaan'] ?>" required>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-3 rounded-pill fw-bold shadow-sm mt-2"><i class="bi bi-save me-2"></i> Update Data Prestasi</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>