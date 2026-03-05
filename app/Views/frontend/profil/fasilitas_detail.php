<?= $this->extend('layout/frontend_layout') ?>

<?= $this->section('content') ?>

<div class="mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('profil/fasilitas') ?>" class="text-decoration-none text-secondary">Fasilitas</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $fasilitas['judul'] ?></li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-8 mb-4">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <img src="<?= base_url('uploads/fasilitas/' . $fasilitas['foto']) ?>" class="w-100" style="max-height: 500px; object-fit: cover;" alt="<?= $fasilitas['judul'] ?>">
            <div class="card-body p-5">
                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-3 fw-bold"><?= $fasilitas['nama_kategori'] ?></span>
                <h2 class="fw-bolder text-dark mb-4"><?= $fasilitas['judul'] ?></h2>
                
                <div class="text-secondary lh-lg fs-5 text-justify">
                    <?= !empty($fasilitas['keterangan']) ? $fasilitas['keterangan'] : '<p class="text-muted fst-italic">Keterangan fasilitas ini belum ditambahkan.</p>' ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm rounded-4 sticky-top" style="top: 100px;">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-4 border-bottom pb-3">Informasi Fasilitas</h5>
                
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                        <i class="fas fa-tag text-primary fs-5"></i>
                    </div>
                    <div>
                        <p class="text-muted mb-0 small fw-bold text-uppercase">Kategori</p>
                        <h6 class="fw-bold mb-0 text-dark"><?= $fasilitas['nama_kategori'] ?></h6>
                    </div>
                </div>

                <div class="d-flex align-items-center mb-4">
                    <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                        <i class="fas fa-heart text-success fs-5"></i>
                    </div>
                    <div>
                        <p class="text-muted mb-0 small fw-bold text-uppercase">Kondisi Saat Ini</p>
                        <h6 class="fw-bold mb-0 text-dark"><?= $fasilitas['kondisi'] ?></h6>
                    </div>
                </div>

                <div class="d-flex align-items-center">
                    <div class="bg-info bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                        <i class="fas fa-calendar-alt text-info fs-5"></i>
                    </div>
                    <div>
                        <p class="text-muted mb-0 small fw-bold text-uppercase">Tanggal Masuk</p>
                        <h6 class="fw-bold mb-0 text-dark"><?= date('d F Y', strtotime($fasilitas['tgl_masuk'])) ?></h6>
                    </div>
                </div>
                
                <hr class="my-4 text-secondary">
                <a href="<?= base_url('profil/fasilitas') ?>" class="btn btn-outline-primary w-100 rounded-pill"><i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar</a>
            </div>
        </div>
    </div>
</div>

<style>
    .text-justify { text-align: justify; }
    .text-secondary img, .text-secondary iframe { max-width: 100%; height: auto; border-radius: 10px; margin: 15px 0; }
</style>

<?= $this->endSection() ?>