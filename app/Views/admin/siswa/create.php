<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold"><i class="bi bi-person-plus-fill me-2 text-primary"></i> Tambah Data Siswa</h5>
        <a href="<?= base_url('admin/siswa') ?>" class="btn btn-outline-secondary rounded-pill btn-sm fw-semibold"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
    </div>
    <div class="card-body pt-4 p-lg-5">
        <form action="<?= base_url('admin/siswa/store') ?>" method="post">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">NISN <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg bg-light border-0" name="nisn" required placeholder="Nomor Induk Siswa Nasional">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg bg-light border-0" name="nama_lengkap" required placeholder="Nama lengkap siswa">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Kelas <span class="text-danger">*</span></label>
                        <select class="form-select form-select-lg bg-light border-0" name="kelas_id" required>
                            <option value="">-- Pilih Kelas --</option>
                            <?php foreach($kelas as $k): ?>
                                <option value="<?= $k['id'] ?>"><?= $k['nama_kelas'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Jenis Kelamin <span class="text-danger">*</span></label>
                        <select class="form-select form-select-lg bg-light border-0" name="jenis_kelamin" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="L">Laki-Laki (L)</option>
                            <option value="P">Perempuan (P)</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Agama <span class="text-danger">*</span></label>
                        <select class="form-select form-select-lg bg-light border-0" name="agama" required>
                            <option value="">-- Pilih Agama --</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Alamat Lengkap</label>
                        <textarea class="form-control form-control-lg bg-light border-0" name="alamat" rows="2" placeholder="Alamat tempat tinggal siswa"></textarea>
                    </div>
                </div>
            </div>
            <div class="text-end border-top pt-4 mt-3">
                <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill fw-bold shadow-sm"><i class="bi bi-save me-2"></i> Simpan Data Siswa</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>