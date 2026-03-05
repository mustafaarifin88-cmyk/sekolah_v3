<?= $this->extend('layout/frontend_layout') ?>

<?= $this->section('content') ?>

<?php if(isset($slides) && !empty($slides)): ?>
<div id="heroCarousel" class="carousel slide mb-5 rounded-4 overflow-hidden shadow-sm" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php foreach($slides as $key => $slide): ?>
            <div class="carousel-item <?= $key == 0 ? 'active' : '' ?>">
                <img src="<?= base_url('uploads/slideshow/' . $slide['foto']) ?>" class="d-block w-100" style="height: 60vh; object-fit: cover;" alt="Slide">
            </div>
        <?php endforeach; ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<?php endif; ?>

<div class="row align-items-center mb-5 mt-5">
    <div class="col-lg-6 mb-4 mb-lg-0">
        <?php if(isset($profil['foto_kepsek']) && $profil['foto_kepsek']): ?>
            <img src="<?= base_url('uploads/profil/' . $profil['foto_kepsek']) ?>" class="img-fluid rounded-4 shadow-lg" alt="Kepala Sekolah">
        <?php endif; ?>
    </div>
    <div class="col-lg-6 px-lg-5">
        <h6 class="text-primary fw-bold text-uppercase tracking-wider">Sambutan Kepala Sekolah</h6>
        <h2 class="fw-bolder mb-4 text-dark"><?= isset($profil['nama_kepsek']) ? $profil['nama_kepsek'] : 'Kepala Sekolah' ?></h2>
        <div class="text-secondary fs-5" style="display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical; overflow: hidden;">
            <?= isset($profil['sejarah']) ? strip_tags($profil['sejarah']) : '' ?>
        </div>
        <a href="<?= base_url('profil/sejarah') ?>" class="btn btn-outline-primary rounded-pill px-4 py-2 mt-4">Baca Selengkapnya <i class="fas fa-arrow-right ms-2"></i></a>
    </div>
</div>

<div class="py-5">
    <div class="text-center mb-5">
        <h6 class="text-primary fw-bold text-uppercase">Program Akademik</h6>
        <h2 class="fw-bolder">Program Unggulan</h2>
    </div>
    <div class="row g-4">
        <?php if(isset($program) && !empty($program)): ?>
            <?php foreach($program as $prog): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 hover-lift">
                        <img src="<?= base_url('uploads/program/' . $prog['foto']) ?>" class="card-img-top rounded-top-4" style="height: 200px; object-fit: cover;" alt="<?= $prog['judul'] ?>">
                        <div class="card-body p-4">
                            <span class="badge bg-primary bg-opacity-10 text-primary mb-2"><?= $prog['nama_kategori'] ?></span>
                            <h5 class="card-title fw-bold text-dark"><?= $prog['judul'] ?></h5>
                            <a href="<?= base_url('akademik/program/' . $prog['id']) ?>" class="text-decoration-none fw-bold text-primary mt-3 d-inline-block">Lihat Detail <i class="fas fa-chevron-right ms-1 fs-7"></i></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center text-muted">Belum ada data program unggulan.</div>
        <?php endif; ?>
    </div>
</div>

<div class="py-5 mb-5">
    <div class="text-center mb-5">
        <h6 class="text-primary fw-bold text-uppercase">Kebanggaan Kami</h6>
        <h2 class="fw-bolder">Prestasi Terbaru</h2>
    </div>
    <div class="row g-4">
        <?php if(isset($prestasi) && !empty($prestasi)): ?>
            <?php foreach($prestasi as $pres): ?>
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm rounded-4 p-3 hover-lift d-flex flex-row align-items-center">
                        <div class="bg-primary bg-opacity-10 rounded-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-trophy text-primary fs-1"></i>
                        </div>
                        <div class="ms-4">
                            <span class="badge bg-secondary mb-1"><?= $pres['nama_kategori'] ?></span>
                            <h5 class="fw-bold mb-1 text-dark"><?= $pres['judul'] ?></h5>
                            <p class="text-muted mb-0 small"><i class="fas fa-user me-2"></i><?= $pres['nama_penerima'] ?> | <i class="fas fa-calendar me-2"></i><?= date('d M Y', strtotime($pres['tgl_penerimaan'])) ?></p>
                        </div>
                        <a href="<?= base_url('informasi/prestasi/' . $pres['id']) ?>" class="stretched-link"></a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center text-muted">Belum ada data prestasi.</div>
        <?php endif; ?>
    </div>
</div>

<style>
    .hover-lift { transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .hover-lift:hover { transform: translateY(-5px); box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important; }
    .fs-7 { font-size: 0.8rem; }
    .tracking-wider { letter-spacing: 0.1em; }
</style>

<?= $this->endSection() ?>