<?= $this->extend('layout/frontend_layout') ?>

<?= $this->section('content') ?>

<div class="bg-primary bg-opacity-10 rounded-4 p-5 text-center mb-5">
    <h1 class="fw-bolder text-dark mb-3">Ekstrakurikuler</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-secondary">Akademik</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ekstrakurikuler</li>
        </ol>
    </nav>
</div>

<div class="row g-4">
    <?php if(isset($eskul) && !empty($eskul)): ?>
        <?php foreach($eskul as $es): ?>
            <div class="col-md-6 col-lg-4">
                <a href="<?= base_url('akademik/ekstrakurikuler/' . $es['id']) ?>" class="text-decoration-none">
                    <div class="card h-100 border-0 shadow-sm rounded-4 hover-lift overflow-hidden">
                        <div class="position-relative">
                            <img src="<?= base_url('uploads/eskul/' . $es['foto']) ?>" class="card-img-top" style="height: 250px; object-fit: cover;" alt="<?= $es['nama_ekstrakurikuler'] ?>">
                            <div class="position-absolute top-0 end-0 m-3">
                                <span class="badge bg-white text-primary shadow-sm px-3 py-2 rounded-pill fw-bold">
                                    <i class="fas fa-tag me-1"></i> <?= $es['nama_kategori'] ?>
                                </span>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <h4 class="card-title fw-bold text-dark mb-3"><?= $es['nama_ekstrakurikuler'] ?></h4>
                            
                            <div class="d-flex align-items-center mt-3 pt-3 border-top">
                                <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                    <i class="fas fa-user-tie text-secondary"></i>
                                </div>
                                <div>
                                    <p class="mb-0 small text-muted">Guru Pembimbing</p>
                                    <h6 class="mb-0 fw-bold text-dark"><?= $es['nama_guru_pembimbing'] ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12 text-center py-5">
            <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 120px; height: 120px;">
                <i class="fas fa-dribbble text-muted" style="font-size: 3rem;"></i>
            </div>
            <h4 class="fw-bold text-dark">Belum Ada Ekstrakurikuler</h4>
            <p class="text-muted">Data kegiatan ekstrakurikuler belum ditambahkan.</p>
        </div>
    <?php endif; ?>
</div>

<style>
    .hover-lift { transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .hover-lift:hover { transform: translateY(-5px); box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important; }
</style>

<?= $this->endSection() ?>