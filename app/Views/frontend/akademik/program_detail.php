<?= $this->extend('layout/frontend_layout') ?>

<?= $this->section('content') ?>

<div class="mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('akademik/program') ?>" class="text-decoration-none text-secondary">Program Unggulan</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $program['judul'] ?></li>
        </ol>
    </nav>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="position-relative">
                <img src="<?= base_url('uploads/program/' . $program['foto']) ?>" class="w-100" style="max-height: 450px; object-fit: cover;" alt="<?= $program['judul'] ?>">
                <div class="position-absolute bottom-0 start-0 w-100 p-4 p-lg-5" style="background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);">
                    <span class="badge bg-primary px-3 py-2 rounded-pill mb-3 fs-6"><?= $program['nama_kategori'] ?></span>
                    <h1 class="fw-bolder text-white mb-0"><?= $program['judul'] ?></h1>
                </div>
            </div>
            
            <div class="card-body p-4 p-lg-5">
                <div class="text-secondary lh-lg fs-5 text-justify">
                    <?= !empty($program['keterangan']) ? $program['keterangan'] : '<p class="text-muted fst-italic text-center">Keterangan rinci untuk program unggulan ini belum ditambahkan.</p>' ?>
                </div>

                <hr class="my-5 border-secondary opacity-25">
                
                <div class="text-center">
                    <a href="<?= base_url('akademik/program') ?>" class="btn btn-outline-primary rounded-pill px-5 py-2 fw-bold"><i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar Program</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .text-justify { text-align: justify; }
    .text-secondary img, .text-secondary iframe { max-width: 100%; height: auto; border-radius: 10px; margin: 15px 0; }
</style>

<?= $this->endSection() ?>