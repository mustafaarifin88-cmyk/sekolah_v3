<?= $this->extend('layout/frontend_layout') ?>

<?= $this->section('content') ?>

<div class="bg-primary bg-opacity-10 rounded-4 p-5 text-center mb-5">
    <h1 class="fw-bolder text-dark mb-3">Visi & Misi</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-secondary">Profil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Visi & Misi</li>
        </ol>
    </nav>
</div>

<div class="row g-4 justify-content-center">
    <div class="col-lg-10 mb-4">
        <div class="card border-0 shadow-sm rounded-4 position-relative overflow-hidden">
            <div class="position-absolute top-0 start-0 w-100 bg-primary" style="height: 5px;"></div>
            <div class="card-body p-5 text-center">
                <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px;">
                    <i class="fas fa-eye text-primary fs-1"></i>
                </div>
                <h2 class="fw-bolder text-dark mb-4">Visi Kami</h2>
                <div class="text-secondary fs-4 fw-semibold fst-italic lh-base">
                    <?= isset($profil['visi']) ? $profil['visi'] : '<p class="text-muted">Data visi belum ditambahkan.</p>' ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-10">
        <div class="card border-0 shadow-sm rounded-4 position-relative overflow-hidden">
            <div class="position-absolute top-0 start-0 w-100 bg-success" style="height: 5px;"></div>
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px;">
                        <i class="fas fa-bullseye text-success fs-1"></i>
                    </div>
                    <h2 class="fw-bolder text-dark">Misi Kami</h2>
                </div>
                <div class="text-secondary fs-5 lh-lg text-justify px-lg-5">
                    <?= isset($profil['misi']) ? $profil['misi'] : '<p class="text-center text-muted">Data misi belum ditambahkan.</p>' ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .text-justify { text-align: justify; }
    .text-secondary ul, .text-secondary ol { padding-left: 20px; }
    .text-secondary li { margin-bottom: 10px; }
    .text-secondary img, .text-secondary iframe { max-width: 100%; height: auto; border-radius: 10px; margin: 15px 0; }
</style>

<?= $this->endSection() ?>