<?= $this->extend('layout/frontend_layout') ?>

<?= $this->section('content') ?>

<div class="mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('informasi/prestasi') ?>" class="text-decoration-none text-secondary">Prestasi</a></li>
            <li class="breadcrumb-item active text-truncate" style="max-width: 200px;" aria-current="page"><?= $prestasi['judul'] ?></li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-8 mb-4">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body p-4 p-lg-5">
                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill mb-3 fw-bold"><i class="fas fa-medal me-1"></i> <?= $prestasi['nama_kategori'] ?></span>
                <h1 class="fw-bolder text-dark mb-4"><?= $prestasi['judul'] ?></h1>
                
                <h5 class="fw-bold mb-3 mt-5 text-dark border-bottom pb-2">Deskripsi Prestasi</h5>
                <div class="text-secondary lh-lg fs-5 text-justify doc-content">
                    <?= !empty($prestasi['keterangan']) ? $prestasi['keterangan'] : '<p class="text-muted fst-italic">Keterangan detail mengenai prestasi ini belum ditambahkan.</p>' ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm rounded-4 bg-primary text-white position-relative overflow-hidden mb-4">
            <div class="position-absolute" style="top: -20px; right: -20px; opacity: 0.1;">
                <i class="fas fa-trophy" style="font-size: 15rem;"></i>
            </div>
            <div class="card-body p-4 position-relative z-index-1">
                <h4 class="fw-bold mb-4 border-bottom border-light pb-3">Informasi Detail</h4>
                
                <div class="mb-4">
                    <p class="mb-1 text-white-50 small text-uppercase fw-bold"><i class="fas fa-user-graduate me-2"></i>Nama Penerima</p>
                    <h5 class="fw-bold text-white mb-0"><?= $prestasi['nama_penerima'] ?></h5>
                </div>

                <div class="mb-4">
                    <p class="mb-1 text-white-50 small text-uppercase fw-bold"><i class="fas fa-building me-2"></i>Penyelenggara</p>
                    <h6 class="fw-bold text-white mb-0"><?= $prestasi['penyelenggara'] ?></h6>
                </div>

                <div class="mb-4">
                    <p class="mb-1 text-white-50 small text-uppercase fw-bold"><i class="fas fa-gift me-2"></i>Hadiah / Peringkat</p>
                    <h6 class="fw-bold text-warning mb-0 fs-5"><?= $prestasi['hadiah'] ?></h6>
                </div>

                <div class="mb-0">
                    <p class="mb-1 text-white-50 small text-uppercase fw-bold"><i class="fas fa-calendar-alt me-2"></i>Tgl. Penerimaan</p>
                    <h6 class="fw-bold text-white mb-0"><?= date('d F Y', strtotime($prestasi['tgl_penerimaan'])) ?></h6>
                </div>
            </div>
        </div>

        <a href="<?= base_url('informasi/prestasi') ?>" class="btn btn-outline-primary w-100 rounded-pill py-3 fw-bold shadow-sm"><i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar Prestasi</a>
    </div>
</div>

<style>
    .text-justify { text-align: justify; }
    .doc-content img, .doc-content iframe { max-width: 100%; height: auto; border-radius: 10px; margin: 15px 0; }
</style>

<?= $this->endSection() ?>