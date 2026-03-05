<?= $this->extend('layout/frontend_layout') ?>

<?= $this->section('content') ?>

<div class="bg-primary bg-opacity-10 rounded-4 p-5 text-center mb-5">
    <h1 class="fw-bolder text-dark mb-3">Data Kurikulum</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-secondary">Akademik</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kurikulum</li>
        </ol>
    </nav>
</div>

<div class="row justify-content-center mb-5">
    <div class="col-lg-8">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden position-relative">
            <div class="position-absolute top-0 start-0 w-100 bg-primary" style="height: 6px;"></div>
            
            <div class="card-body p-5 text-center">
                <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow-sm" style="width: 100px; height: 100px;">
                    <i class="fas fa-book-open text-primary" style="font-size: 2.5rem;"></i>
                </div>
                
                <h4 class="text-secondary fw-semibold mb-3">Sistem Kurikulum Yang Diterapkan</h4>
                
                <div class="bg-light rounded-4 p-4 my-4 border border-light-subtle">
                    <h1 class="display-5 fw-bolder text-dark mb-0">
                        <?= isset($profil['kurikulum']) && !empty($profil['kurikulum']) ? $profil['kurikulum'] : 'Kurikulum Belum Diatur' ?>
                    </h1>
                </div>
                
                <p class="text-muted fs-5 px-lg-4 lh-lg">
                    <?= isset($profil['nama_sekolah']) ? $profil['nama_sekolah'] : 'Sekolah kami' ?> berkomitmen memberikan sistem pembelajaran terbaik yang sesuai dengan standar pendidikan nasional dan terus adaptif terhadap perkembangan teknologi maupun ilmu pengetahuan di era global.
                </p>

                <div class="mt-5">
                    <a href="<?= base_url('akademik/program') ?>" class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm">Lihat Program Unggulan <i class="fas fa-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>