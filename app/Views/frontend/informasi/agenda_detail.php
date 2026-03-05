<?= $this->extend('layout/frontend_layout') ?>

<?= $this->section('content') ?>

<div class="mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('informasi/agenda') ?>" class="text-decoration-none text-secondary">Agenda</a></li>
            <li class="breadcrumb-item active text-truncate" style="max-width: 200px;" aria-current="page"><?= $agenda['judul'] ?></li>
        </ol>
    </nav>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <?php if(!empty($agenda['foto'])): ?>
                <img src="<?= base_url('uploads/agenda/' . $agenda['foto']) ?>" class="w-100" style="max-height: 500px; object-fit: cover;" alt="<?= $agenda['judul'] ?>">
            <?php else: ?>
                <div class="bg-primary bg-opacity-10 d-flex align-items-center justify-content-center w-100" style="height: 250px;">
                    <i class="fas fa-calendar-check text-primary opacity-50" style="font-size: 6rem;"></i>
                </div>
            <?php endif; ?>
            
            <div class="card-body p-4 p-lg-5">
                <span class="badge bg-primary px-3 py-2 rounded-pill mb-3 fs-6"><i class="fas fa-tag me-1"></i> <?= $agenda['nama_kategori'] ?></span>
                <h1 class="fw-bolder text-dark mb-4"><?= $agenda['judul'] ?></h1>
                
                <hr class="mb-4 text-secondary opacity-25">
                
                <div class="text-secondary lh-lg fs-5 text-justify doc-content">
                    <?= !empty($agenda['keterangan']) ? $agenda['keterangan'] : '<p class="text-muted fst-italic text-center">Deskripsi lengkap untuk agenda ini belum ditambahkan.</p>' ?>
                </div>

                <div class="mt-5 pt-4 border-top text-center">
                    <a href="<?= base_url('informasi/agenda') ?>" class="btn btn-outline-primary rounded-pill px-5 py-2 fw-bold"><i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar Agenda</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .text-justify { text-align: justify; }
    .doc-content img, .doc-content iframe { max-width: 100%; height: auto; border-radius: 10px; margin: 20px 0; }
</style>

<?= $this->endSection() ?>