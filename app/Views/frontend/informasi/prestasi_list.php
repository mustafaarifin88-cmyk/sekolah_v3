<?= $this->extend('layout/frontend_layout') ?>

<?= $this->section('content') ?>

<div class="bg-primary bg-opacity-10 rounded-4 p-5 text-center mb-5">
    <h1 class="fw-bolder text-dark mb-3">Prestasi Sekolah</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-secondary">Informasi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Prestasi</li>
        </ol>
    </nav>
</div>

<div class="row g-4">
    <?php if(isset($prestasi) && !empty($prestasi)): ?>
        <?php foreach($prestasi as $pres): ?>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 hover-lift position-relative overflow-hidden">
                    <div class="position-absolute top-0 end-0 m-3 opacity-25">
                        <i class="fas fa-trophy" style="font-size: 8rem; color: #435ebe;"></i>
                    </div>
                    <div class="card-body p-4 p-lg-5 position-relative z-index-1">
                        <div class="mb-4">
                            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold shadow-sm">
                                <i class="fas fa-medal me-1"></i> <?= $pres['nama_kategori'] ?>
                            </span>
                        </div>
                        <h4 class="fw-bold text-dark mb-3"><?= $pres['judul'] ?></h4>
                        
                        <div class="mt-4 pt-4 border-top">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-user-graduate text-primary me-3 fs-5" style="width: 20px;"></i>
                                <div>
                                    <p class="mb-0 small text-muted lh-1">Penerima</p>
                                    <p class="mb-0 fw-bold text-dark"><?= $pres['nama_penerima'] ?></p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-gift text-success me-3 fs-5" style="width: 20px;"></i>
                                <div>
                                    <p class="mb-0 small text-muted lh-1">Hadiah/Peringkat</p>
                                    <p class="mb-0 fw-bold text-dark"><?= $pres['hadiah'] ?></p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-calendar-check text-info me-3 fs-5" style="width: 20px;"></i>
                                <div>
                                    <p class="mb-0 small text-muted lh-1">Tanggal</p>
                                    <p class="mb-0 fw-bold text-dark"><?= date('d M Y', strtotime($pres['tgl_penerimaan'])) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url('informasi/prestasi/' . $pres['id']) ?>" class="stretched-link"></a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12 text-center py-5">
            <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 120px; height: 120px;">
                <i class="fas fa-award text-muted" style="font-size: 3rem;"></i>
            </div>
            <h4 class="fw-bold text-dark">Belum Ada Prestasi</h4>
            <p class="text-muted">Data prestasi siswa dan guru belum ditambahkan.</p>
        </div>
    <?php endif; ?>
</div>

<style>
    .hover-lift { transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .hover-lift:hover { transform: translateY(-5px); box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important; }
</style>

<?= $this->endSection() ?>