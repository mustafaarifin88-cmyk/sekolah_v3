<?= $this->extend('layout/frontend_layout') ?>

<?= $this->section('content') ?>

<div class="mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('akademik/ekstrakurikuler') ?>" class="text-decoration-none text-secondary">Ekstrakurikuler</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $eskul['nama_ekstrakurikuler'] ?></li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-8 mb-4">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <img src="<?= base_url('uploads/eskul/' . $eskul['foto']) ?>" class="w-100" style="max-height: 450px; object-fit: cover;" alt="<?= $eskul['nama_ekstrakurikuler'] ?>">
            <div class="card-body p-4 p-lg-5">
                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-3 fw-bold"><?= $eskul['nama_kategori'] ?></span>
                <h1 class="fw-bolder text-dark mb-4"><?= $eskul['nama_ekstrakurikuler'] ?></h1>
                
                <h5 class="fw-bold mb-3 mt-4 text-dark border-bottom pb-2">Deskripsi Kegiatan</h5>
                <div class="text-secondary lh-lg fs-5 text-justify">
                    <?= !empty($eskul['keterangan']) ? $eskul['keterangan'] : '<p class="text-muted fst-italic">Keterangan rinci mengenai ekstrakurikuler ini belum ditambahkan.</p>' ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm rounded-4 sticky-top" style="top: 100px;">
            <div class="card-body p-4 text-center">
                <h5 class="fw-bold mb-4 border-bottom pb-3 text-start">Guru Pembimbing</h5>
                
                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3 border border-3 border-white shadow-sm" style="width: 100px; height: 100px;">
                    <i class="fas fa-user-tie text-secondary" style="font-size: 2.5rem;"></i>
                </div>
                
                <h4 class="fw-bold text-dark mb-1"><?= $eskul['nama_guru_pembimbing'] ?></h4>
                <p class="text-primary fw-semibold small mb-4">Penanggung Jawab / Pelatih</p>
                
                <div class="d-flex align-items-center justify-content-start bg-light rounded-3 p-3 mb-4 text-start">
                    <i class="fas fa-info-circle text-info fs-3 me-3"></i>
                    <p class="mb-0 small text-muted">Untuk informasi pendaftaran ekstrakurikuler, silakan hubungi guru pembimbing terkait di sekolah.</p>
                </div>

                <hr class="my-4 text-secondary opacity-25">
                <a href="<?= base_url('akademik/ekstrakurikuler') ?>" class="btn btn-outline-primary w-100 rounded-pill"><i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar</a>
            </div>
        </div>
    </div>
</div>

<style>
    .text-justify { text-align: justify; }
    .text-secondary img, .text-secondary iframe { max-width: 100%; height: auto; border-radius: 10px; margin: 15px 0; }
</style>

<?= $this->endSection() ?>