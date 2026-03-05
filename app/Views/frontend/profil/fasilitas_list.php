<?= $this->extend('layout/frontend_layout') ?>

<?= $this->section('content') ?>

<div class="bg-primary bg-opacity-10 rounded-4 p-5 text-center mb-5">
    <h1 class="fw-bolder text-dark mb-3">Fasilitas Sekolah</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-secondary">Profil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Fasilitas</li>
        </ol>
    </nav>
</div>

<?php if(isset($kategori) && !empty($kategori)): ?>
    <div class="d-flex flex-wrap justify-content-center gap-2 mb-5">
        <a href="<?= base_url('profil/fasilitas') ?>" class="btn btn-primary rounded-pill px-4">Semua Fasilitas</a>
        <?php foreach($kategori as $kat): ?>
            <button class="btn btn-outline-primary rounded-pill px-4"><?= $kat['nama_kategori'] ?></button>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<div class="row g-4">
    <?php if(isset($fasilitas) && !empty($fasilitas)): ?>
        <?php foreach($fasilitas as $fas): ?>
            <div class="col-md-6 col-lg-4">
                <a href="<?= base_url('profil/fasilitas/' . $fas['id']) ?>" class="text-decoration-none">
                    <div class="card h-100 border-0 shadow-sm rounded-4 hover-lift overflow-hidden">
                        <div class="position-relative">
                            <img src="<?= base_url('uploads/fasilitas/' . $fas['foto']) ?>" class="card-img-top" style="height: 250px; object-fit: cover;" alt="<?= $fas['judul'] ?>">
                            <div class="position-absolute top-0 end-0 m-3">
                                <span class="badge bg-white text-primary shadow-sm px-3 py-2 rounded-pill fw-bold">
                                    <?= $fas['nama_kategori'] ?>
                                </span>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <h4 class="card-title fw-bold text-dark mb-2"><?= $fas['judul'] ?></h4>
                            <div class="d-flex align-items-center text-muted small fw-semibold">
                                <i class="fas fa-check-circle text-success me-2"></i> Kondisi: <?= $fas['kondisi'] ?>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12 text-center py-5">
            <h4 class="text-muted">Data fasilitas belum tersedia.</h4>
        </div>
    <?php endif; ?>
</div>

<style>
    .hover-lift { transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .hover-lift:hover { transform: translateY(-5px); box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important; }
</style>

<?= $this->endSection() ?>