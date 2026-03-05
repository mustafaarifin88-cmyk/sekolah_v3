<?= $this->extend('layout/frontend_layout') ?>

<?= $this->section('content') ?>

<div class="bg-primary bg-opacity-10 rounded-4 p-5 text-center mb-5">
    <h1 class="fw-bolder text-dark mb-3">Program Unggulan</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-secondary">Akademik</a></li>
            <li class="breadcrumb-item active" aria-current="page">Program Unggulan</li>
        </ol>
    </nav>
</div>

<div class="row g-4">
    <?php if(isset($program) && !empty($program)): ?>
        <?php foreach($program as $prog): ?>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 hover-lift overflow-hidden d-flex flex-column">
                    <div class="position-relative">
                        <img src="<?= base_url('uploads/program/' . $prog['foto']) ?>" class="card-img-top" style="height: 220px; object-fit: cover;" alt="<?= $prog['judul'] ?>">
                        <div class="position-absolute top-0 start-0 m-3">
                            <span class="badge bg-primary shadow-sm px-3 py-2 rounded-pill fw-bold">
                                <?= $prog['nama_kategori'] ?>
                            </span>
                        </div>
                    </div>
                    <div class="card-body p-4 d-flex flex-column flex-grow-1">
                        <h4 class="card-title fw-bold text-dark mb-3"><?= $prog['judul'] ?></h4>
                        <div class="text-muted small mb-4 flex-grow-1 text-truncate-3">
                            <?= strip_tags($prog['keterangan']) ?>
                        </div>
                        <a href="<?= base_url('akademik/program/' . $prog['id']) ?>" class="btn btn-outline-primary rounded-pill w-100 mt-auto fw-bold py-2">Lihat Detail Program</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12 text-center py-5">
            <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 120px; height: 120px;">
                <i class="fas fa-award text-muted" style="font-size: 3rem;"></i>
            </div>
            <h4 class="fw-bold text-dark">Belum Ada Program</h4>
            <p class="text-muted">Data program unggulan sekolah belum ditambahkan.</p>
        </div>
    <?php endif; ?>
</div>

<style>
    .hover-lift { transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .hover-lift:hover { transform: translateY(-5px); box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important; }
    .text-truncate-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>

<?= $this->endSection() ?>