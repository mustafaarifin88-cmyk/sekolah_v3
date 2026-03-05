<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 fw-bold"><i class="bi bi-person-badge-fill me-2 text-primary"></i> Edit Profil Akun Saya</h5>
            </div>
            <div class="card-body pt-4 p-lg-5">
                <form action="<?= base_url('guru/profil/update') ?>" method="post" enctype="multipart/form-data">
                    
                    <div class="text-center mb-5">
                        <div class="position-relative d-inline-block">
                            <?php if($guru['foto_profil']): ?>
                                <img src="<?= base_url('uploads/profil/' . $guru['foto_profil']) ?>" class="rounded-circle shadow-sm border border-3 border-white" style="width: 120px; height: 120px; object-fit: cover;">
                            <?php else: ?>
                                <div class="bg-secondary rounded-circle d-inline-flex align-items-center justify-content-center text-white shadow-sm border border-3 border-white" style="width: 120px; height: 120px;">
                                    <i class="bi bi-person-fill" style="font-size: 4rem;"></i>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="mt-3">
                            <label class="form-label fw-semibold">Ganti Foto Profil</label>
                            <input type="file" class="form-control form-control-sm mx-auto bg-light border-0" name="foto_profil" accept="image/png, image/jpeg" style="max-width: 300px;">
                        </div>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label fw-semibold text-muted">Nama Lengkap</label>
                                <input type="text" class="form-control form-control-lg bg-light border-0 text-dark fw-bold" value="<?= $guru['nama_lengkap'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label fw-semibold text-muted">Username Login</label>
                                <input type="text" class="form-control form-control-lg bg-light border-0 text-primary fw-bold font-monospace" value="<?= $guru['username'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mb-4">
                                <label class="form-label fw-semibold">Ubah Password Baru</label>
                                <input type="password" class="form-control form-control-lg bg-light border-0" name="password" placeholder="Ketik password baru di sini...">
                                <small class="text-muted d-block mt-2"><i class="bi bi-info-circle text-primary"></i> Biarkan kosong jika tidak ingin merubah password saat ini.</small>
                            </div>
                        </div>
                    </div>

                    <div class="text-end border-top pt-4 mt-2">
                        <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill fw-bold shadow-sm"><i class="bi bi-save me-2"></i> Update Profil Saya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>