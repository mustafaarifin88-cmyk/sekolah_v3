<?= $this->extend('layout/frontend_layout') ?>

<?= $this->section('content') ?>

<div class="bg-primary bg-opacity-10 rounded-4 p-5 text-center mb-5">
    <h1 class="fw-bolder text-dark mb-3">Struktur Organisasi</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-secondary">Profil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Struktur Organisasi</li>
        </ol>
    </nav>
</div>

<div class="row g-5 justify-content-center">
    <?php if(isset($struktur) && !empty($struktur)): ?>
        <?php foreach($struktur as $str): ?>
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-5">
                        <h3 class="fw-bold text-center text-dark border-bottom pb-4 mb-4"><?= $str['judul'] ?></h3>
                        <div class="text-center mb-4">
                            <img src="<?= base_url('uploads/struktur/' . $str['foto']) ?>" class="img-fluid rounded-3 shadow-sm w-100" alt="<?= $str['judul'] ?>">
                        </div>
                        <?php if(!empty($str['keterangan'])): ?>
                            <div class="text-secondary lh-lg px-lg-4 text-justify mt-5">
                                <?= $str['keterangan'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12 text-center py-5">
            <img src="<?= base_url('assets/compiled/svg/error-404.svg') ?>" class="img-fluid mb-4" style="height: 200px;" alt="Not Found">
            <h4 class="text-muted">Struktur organisasi belum tersedia.</h4>
        </div>
    <?php endif; ?>
</div>

<style>
    .text-justify { text-align: justify; }
    .text-secondary img, .text-secondary iframe { max-width: 100%; height: auto; border-radius: 10px; margin: 15px 0; }
</style>

<?= $this->endSection() ?>