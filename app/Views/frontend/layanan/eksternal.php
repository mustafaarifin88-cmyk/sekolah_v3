<?= $this->extend('layout/frontend_layout') ?>

<?= $this->section('content') ?>

<div class="bg-primary bg-opacity-10 rounded-4 p-5 text-center mb-5">
    <h1 class="fw-bolder text-dark mb-3">Data & Layanan Terintegrasi</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Layanan Eksternal</li>
        </ol>
    </nav>
</div>

<div class="row g-4 justify-content-center mb-5">
    <?php if(isset($menu_eksternal) && !empty($menu_eksternal)): ?>
        <?php foreach($menu_eksternal as $me): ?>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 hover-lift overflow-hidden text-center p-4">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px;">
                            <i class="fas fa-external-link-alt text-primary fs-2"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-3"><?= $me['judul'] ?></h4>
                        <p class="text-muted small mb-4">Akses layanan portal eksternal terintegrasi dengan sistem sekolah kami.</p>
                        <a href="<?= $me['url'] ?>" target="_blank" class="btn btn-outline-primary rounded-pill px-4 mt-auto fw-bold">Kunjungi Layanan <i class="fas fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12 text-center py-5">
            <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 120px; height: 120px;">
                <i class="fas fa-link text-muted" style="font-size: 3rem;"></i>
            </div>
            <h4 class="fw-bold text-dark">Layanan Belum Tersedia</h4>
            <p class="text-muted">Belum ada tautan layanan eksternal yang ditambahkan.</p>
        </div>
    <?php endif; ?>
</div>

<style>
    .hover-lift { transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .hover-lift:hover { transform: translateY(-5px); box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important; }
</style>

<?= $this->endSection() ?>