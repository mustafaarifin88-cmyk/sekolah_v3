<?= $this->extend('layout/frontend_layout') ?>

<?= $this->section('content') ?>

<div class="mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('informasi/pengumuman') ?>" class="text-decoration-none text-secondary">Pengumuman</a></li>
            <li class="breadcrumb-item active text-truncate" style="max-width: 200px;" aria-current="page"><?= $pengumuman['judul'] ?></li>
        </ol>
    </nav>
</div>

<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card border-0 shadow-sm rounded-4 position-relative overflow-hidden">
            <div class="position-absolute top-0 start-0 w-100 bg-danger" style="height: 5px;"></div>
            <div class="card-body p-4 p-lg-5">
                
                <div class="text-center mb-5 pb-4 border-bottom">
                    <div class="bg-danger bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px;">
                        <i class="fas fa-bullhorn text-danger fs-1"></i>
                    </div>
                    <h1 class="fw-bolder text-dark mb-4 lh-base"><?= $pengumuman['judul'] ?></h1>
                    
                    <div class="d-flex flex-wrap justify-content-center align-items-center gap-3">
                        <span class="badge bg-light text-dark border px-3 py-2 rounded-pill fw-bold"><i class="fas fa-tag me-1 text-primary"></i> Kategori: <?= $pengumuman['nama_kategori'] ?></span>
                        <span class="badge bg-light text-dark border px-3 py-2 rounded-pill fw-bold"><i class="fas fa-calendar-alt me-1 text-primary"></i> <?= date('d F Y', strtotime($pengumuman['tgl_publish'])) ?></span>
                        <span class="badge bg-light text-dark border px-3 py-2 rounded-pill fw-bold"><i class="fas fa-user-circle me-1 text-primary"></i> <?= $pengumuman['nama_penulis'] ?></span>
                    </div>
                </div>
                
                <div class="text-secondary lh-lg fs-5 text-justify doc-content px-lg-4">
                    <?= $pengumuman['isi'] ?>
                </div>

                <div class="mt-5 pt-4 border-top text-center">
                    <a href="<?= base_url('informasi/pengumuman') ?>" class="btn btn-outline-secondary rounded-pill px-4"><i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar Pengumuman</a>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
    .text-justify { text-align: justify; }
    .doc-content img, .doc-content iframe { max-width: 100%; height: auto; border-radius: 10px; margin: 20px 0; }
    .doc-content table { width: 100% !important; border-collapse: collapse; margin-bottom: 20px; }
    .doc-content table td, .doc-content table th { border: 1px solid #dee2e6; padding: 10px; }
</style>

<?= $this->endSection() ?>