<?= $this->extend('layout/frontend_layout') ?>

<?= $this->section('content') ?>

<div class="bg-primary bg-opacity-10 rounded-4 p-5 text-center mb-5">
    <h1 class="fw-bolder text-dark mb-3">Sejarah Sekolah</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-secondary">Profil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sejarah</li>
        </ol>
    </nav>
</div>

<div class="row align-items-start">
    <div class="col-lg-4 mb-4">
        <div class="card border-0 shadow-sm rounded-4 text-center sticky-top" style="top: 100px;">
            <div class="card-body p-4">
                <?php if(isset($profil['foto_kepsek']) && $profil['foto_kepsek']): ?>
                    <img src="<?= base_url('uploads/profil/' . $profil['foto_kepsek']) ?>" class="img-fluid rounded-circle mb-4 border border-5 border-white shadow-sm" style="width: 200px; height: 200px; object-fit: cover;" alt="Kepala Sekolah">
                <?php else: ?>
                    <img src="<?= base_url('assets/compiled/jpg/1.jpg') ?>" class="img-fluid rounded-circle mb-4" style="width: 200px; height: 200px; object-fit: cover;" alt="Placeholder">
                <?php endif; ?>
                <h4 class="fw-bold mb-1"><?= isset($profil['nama_kepsek']) ? $profil['nama_kepsek'] : '-' ?></h4>
                <p class="text-primary fw-semibold mb-3">Kepala Sekolah</p>
                <div class="bg-light rounded-3 p-3 text-start">
                    <p class="mb-1 text-muted small">NIP / NIK</p>
                    <p class="fw-bold mb-0"><?= isset($profil['nip_kepsek']) ? $profil['nip_kepsek'] : '-' ?></p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-5">
                <h3 class="fw-bold text-dark mb-4 border-bottom pb-3">Sejarah & Profil Singkat</h3>
                <div class="text-secondary lh-lg fs-5 text-justify">
                    <?= isset($profil['sejarah']) ? $profil['sejarah'] : '<p class="text-center text-muted">Data sejarah belum ditambahkan.</p>' ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .text-justify { text-align: justify; }
    .lh-lg { line-height: 1.8 !important; }
    .text-secondary img, .text-secondary iframe { max-width: 100%; height: auto; border-radius: 10px; margin: 15px 0; }
</style>

<?= $this->endSection() ?>