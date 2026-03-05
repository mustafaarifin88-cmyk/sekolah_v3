<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold"><i class="bi bi-person-plus-fill me-2 text-primary"></i> Tambah Akun Guru Baru</h5>
        <a href="<?= base_url('admin/user_guru') ?>" class="btn btn-outline-secondary rounded-pill btn-sm fw-semibold"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
    </div>
    <div class="card-body pt-4 p-lg-5">
        <form action="<?= base_url('admin/user_guru/store') ?>" method="post" enctype="multipart/form-data">
            <div class="row g-4">
                <div class="col-lg-6 border-end pe-lg-4">
                    <h6 class="fw-bold text-primary mb-4 text-uppercase border-bottom pb-2">Informasi Profil</h6>
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Nama Lengkap & Gelar <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg bg-light border-0" name="nama_lengkap" required placeholder="Contoh: Budi Santoso, S.Pd">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Jabatan (Opsional)</label>
                        <input type="text" class="form-control bg-light border-0" name="jabatan" placeholder="Contoh: Guru Matematika">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Wali Kelas (Opsional)</label>
                        <select class="form-select form-select-lg bg-light border-0" name="kelas_id">
                            <option value="">-- Bukan Wali Kelas --</option>
                            <?php foreach($kelas as $k): ?>
                                <option value="<?= $k['id'] ?>"><?= $k['nama_kelas'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <small class="text-muted mt-1 d-block">Pilih kelas jika guru ini ditugaskan sebagai wali kelas.</small>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Upload Foto Profil (Opsional)</label>
                        <input type="file" class="form-control bg-light border-0" name="foto_profil" accept="image/png, image/jpeg">
                    </div>
                </div>
                
                <div class="col-lg-6 ps-lg-4">
                    <h6 class="fw-bold text-success mb-4 text-uppercase border-bottom pb-2">Informasi Login</h6>
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Username Login <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg bg-light border-0" name="username" required placeholder="Username unik">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control form-control-lg bg-light border-0" name="password" required placeholder="Minimal 6 karakter">
                    </div>
                    
                    <div class="bg-primary bg-opacity-10 p-4 rounded-4 mt-4">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-info-circle-fill text-primary fs-2 me-3"></i>
                            <p class="mb-0 text-dark small fw-semibold">Akun yang dibuat akan langsung memiliki akses ke Panel Guru sesuai kebijakan sistem.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-end border-top pt-4 mt-4">
                <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill fw-bold shadow-sm"><i class="bi bi-save me-2"></i> Simpan Data Guru</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>