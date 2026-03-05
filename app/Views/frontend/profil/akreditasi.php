<?= $this->extend('layout/frontend_layout') ?>

<?= $this->section('content') ?>

<div class="bg-primary bg-opacity-10 rounded-4 p-5 text-center mb-5">
    <h1 class="fw-bolder text-dark mb-3">Akreditasi Sekolah</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-secondary">Profil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Akreditasi</li>
        </ol>
    </nav>
</div>

<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden text-center text-white position-relative" style="background: linear-gradient(135deg, #435ebe 0%, #25396f 100%);">
            
            <div class="position-absolute" style="top: -50px; right: -50px; opacity: 0.1;">
                <i class="fas fa-certificate" style="font-size: 300px;"></i>
            </div>

            <div class="card-body p-5 position-relative z-index-1">
                <div class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow" style="width: 120px; height: 120px;">
                    <h1 class="text-primary fw-bolder mb-0" style="font-size: 4rem;"><?= isset($profil['akreditasi']) && !empty($profil['akreditasi']) ? strtoupper($profil['akreditasi']) : '?' ?></h1>
                </div>
                
                <h2 class="fw-bold mb-3">Nilai Akreditasi</h2>
                <p class="fs-5 fw-light text-white-50 mb-0">
                    <?= isset($profil['nama_sekolah']) ? $profil['nama_sekolah'] : 'Sekolah ini' ?> saat ini menyandang predikat Akreditasi <strong><?= isset($profil['akreditasi']) && !empty($profil['akreditasi']) ? strtoupper($profil['akreditasi']) : 'Belum Tersedia' ?></strong> yang ditetapkan oleh Badan Akreditasi Nasional Sekolah/Madrasah.
                </p>
            </div>
        </div>
        <div class="text-center mt-5">
            <a href="<?= base_url('/') ?>" class="btn btn-outline-primary rounded-pill px-5 py-2 fw-bold">Kembali ke Beranda</a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>