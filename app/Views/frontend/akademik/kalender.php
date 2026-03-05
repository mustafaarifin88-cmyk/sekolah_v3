<?= $this->extend('layout/frontend_layout') ?>

<?= $this->section('content') ?>

<div class="bg-primary bg-opacity-10 rounded-4 p-5 text-center mb-5">
    <h1 class="fw-bolder text-dark mb-3">Kalender Pendidikan</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-secondary">Akademik</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kalender Pendidikan</li>
        </ol>
    </nav>
</div>

<div class="row g-4 justify-content-center">
    <?php if(isset($kalender) && !empty($kalender)): ?>
        <?php foreach($kalender as $kal): ?>
            <div class="col-lg-10">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                    <div class="row g-0">
                        <div class="col-md-5 bg-light d-flex align-items-center justify-content-center p-4">
                            <img src="<?= base_url('uploads/dokumen/' . $kal['foto']) ?>" class="img-fluid rounded-3 shadow-sm" alt="<?= $kal['judul'] ?>" style="max-height: 400px; object-fit: contain;">
                        </div>
                        <div class="col-md-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                        <i class="fas fa-calendar-alt text-primary fs-5"></i>
                                    </div>
                                    <h3 class="fw-bolder text-dark mb-0"><?= $kal['judul'] ?></h3>
                                </div>
                                <hr class="text-secondary opacity-25">
                                <div class="text-secondary lh-lg text-justify mt-4">
                                    <?= !empty($kal['keterangan']) ? $kal['keterangan'] : '<p class="text-muted fst-italic">Keterangan kalender ini belum tersedia.</p>' ?>
                                </div>
                                <div class="mt-4">
                                    <a href="<?= base_url('uploads/dokumen/' . $kal['foto']) ?>" target="_blank" class="btn btn-outline-primary rounded-pill px-4"><i class="fas fa-search-plus me-2"></i> Perbesar Gambar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12 text-center py-5">
            <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 120px; height: 120px;">
                <i class="fas fa-calendar-times text-muted" style="font-size: 3rem;"></i>
            </div>
            <h4 class="fw-bold text-dark">Kalender Belum Tersedia</h4>
            <p class="text-muted">Data kalender pendidikan tahun ini belum diunggah oleh admin.</p>
        </div>
    <?php endif; ?>
</div>

<style>
    .text-justify { text-align: justify; }
    .text-secondary img, .text-secondary iframe { max-width: 100%; height: auto; border-radius: 10px; margin: 15px 0; }
</style>

<?= $this->endSection() ?>