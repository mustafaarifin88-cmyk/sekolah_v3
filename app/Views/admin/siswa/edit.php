<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold"><i class="bi bi-pencil-square me-2 text-primary"></i> Edit Data Siswa</h5>
        <a href="<?= base_url('admin/siswa') ?>" class="btn btn-outline-secondary rounded-pill btn-sm fw-semibold"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
    </div>
    <div class="card-body pt-4 p-lg-5">
        <form action="<?= base_url('admin/siswa/update/' . $siswa['id']) ?>" method="post">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">NISN <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg bg-light border-0" name="nisn" value="<?= $siswa['nisn'] ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg bg-light border-0" name="nama_lengkap" value="<?= $siswa['nama_lengkap'] ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Kelas <span class="text-danger">*</span></label>
                        <select class="form-select form-select-lg bg-light border-0" name="kelas_id" required>
                            <option value="">-- Pilih Kelas --</option>
                            <?php foreach($kelas as $k): ?>
                                <option value="<?= $k['id'] ?>" <?= $siswa['kelas_id'] == $k['id'] ? 'selected' : '' ?>><?= $k['nama_kelas'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Jenis Kelamin <span class="text-danger">*</span></label>
                        <select class="form-select form-select-lg bg-light border-0" name="jenis_kelamin" required>
                            <option value="L" <?= $siswa['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki-Laki (L)</option>
                            <option value="P" <?= $siswa['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan (P)</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Agama <span class="text-danger">*</span></label>
                        <select class="form-select form-select-lg bg-light border-0" name="agama" required>
                            <?php 
                                $agama = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'];
                                foreach($agama as $agm):
                            ?>
                                <option value="<?= $agm ?>" <?= $siswa['agama'] == $agm ? 'selected' : '' ?>><?= $agm ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Alamat Lengkap</label>
                        <textarea class="form-control form-control-lg bg-light border-0" name="alamat" rows="2"><?= $siswa['alamat'] ?></textarea>
                    </div>
                </div>
            </div>
            <div class="text-end border-top pt-4 mt-3">
                <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill fw-bold shadow-sm"><i class="bi bi-save me-2"></i> Update Data Siswa</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>