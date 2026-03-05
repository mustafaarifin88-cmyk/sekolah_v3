<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold"><i class="bi bi-pencil-square me-2 text-primary"></i> Edit Data Akun Guru</h5>
        <a href="<?= base_url('admin/user_guru') ?>" class="btn btn-outline-secondary rounded-pill btn-sm fw-semibold"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
    </div>
    <div class="card-body pt-4 p-lg-5">
        <form action="<?= base_url('admin/user_guru/update/' . $guru['id']) ?>" method="post" enctype="multipart/form-data">
            <div class="row g-4">
                <div class="col-lg-6 border-end pe-lg-4">
                    <h6 class="fw-bold text-primary mb-4 text-uppercase border-bottom pb-2">Informasi Profil</h6>
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Nama Lengkap & Gelar <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg bg-light border-0" name="nama_lengkap" value="<?= $guru['nama_lengkap'] ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Jabatan (Opsional)</label>
                        <input type="text" class="form-control bg-light border-0" name="jabatan" value="<?= $guru['jabatan'] ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Wali Kelas (Opsional)</label>
                        <select class="form-select form-select-lg bg-light border-0" name="kelas_id">
                            <option value="">-- Bukan Wali Kelas --</option>
                            <?php foreach($kelas as $k): ?>
                                <option value="<?= $k['id'] ?>" <?= $guru['kelas_id'] == $k['id'] ? 'selected' : '' ?>><?= $k['nama_kelas'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="form-group mb-3 d-flex align-items-center gap-3">
                        <?php if($guru['foto_profil']): ?>
                            <img src="<?= base_url('uploads/profil/' . $guru['foto_profil']) ?>" class="rounded-circle shadow-sm" style="width: 60px; height: 60px; object-fit: cover;">
                        <?php else: ?>
                            <div class="bg-secondary rounded-circle d-inline-flex align-items-center justify-content-center text-white shadow-sm" style="width: 60px; height: 60px;">
                                <i class="bi bi-person-fill fs-3"></i>
                            </div>
                        <?php endif; ?>
                        <div class="flex-grow-1">
                            <label class="form-label fw-semibold mb-1">Ganti Foto Profil</label>
                            <input type="file" class="form-control bg-light border-0 form-control-sm" name="foto_profil" accept="image/png, image/jpeg">
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 ps-lg-4">
                    <h6 class="fw-bold text-success mb-4 text-uppercase border-bottom pb-2">Informasi Login</h6>
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Username Login <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg bg-light border-0" name="username" value="<?= $guru['username'] ?>" required>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Reset Password (Opsional)</label>
                        <input type="password" class="form-control form-control-lg bg-light border-0" name="password" placeholder="Isi untuk mengganti password baru">
                        <small class="text-muted d-block mt-1">Kosongkan kolom ini jika tidak ingin merubah password.</small>
                    </div>
                </div>
            </div>
            <div class="text-end border-top pt-4 mt-4">
                <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill fw-bold shadow-sm"><i class="bi bi-save me-2"></i> Update Data Guru</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>