<?= $this->extend('layout/frontend_layout') ?>

<?= $this->section('content') ?>

<div class="bg-primary bg-opacity-10 rounded-4 p-5 text-center mb-5">
    <h1 class="fw-bolder text-dark mb-3">Pengumuman Resmi</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-secondary">Informasi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pengumuman</li>
        </ol>
    </nav>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="row g-4">
            <?php if(isset($pengumuman) && !empty($pengumuman)): ?>
                <?php foreach($pengumuman as $p): ?>
                    <div class="col-12">
                        <div class="card border-0 shadow-sm rounded-4 hover-lift">
                            <div class="card-body p-4 p-lg-5 d-flex flex-column flex-md-row align-items-md-center">
                                <div class="bg-primary bg-opacity-10 rounded-4 d-flex align-items-center justify-content-center mb-4 mb-md-0 me-md-4 flex-shrink-0" style="width: 80px; height: 80px;">
                                    <i class="fas fa-bullhorn text-primary fs-2"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-1 rounded-pill me-3 small fw-bold">Penting</span>
                                        <span class="text-muted small fw-semibold"><i class="fas fa-clock me-1 text-secondary"></i> <?= date('d M Y', strtotime($p['tgl_publish'])) ?></span>
                                    </div>
                                    <h4 class="fw-bold text-dark mb-2">
                                        <a href="<?= base_url('informasi/pengumuman/' . $p['slug']) ?>" class="text-decoration-none text-dark hover-primary"><?= $p['judul'] ?></a>
                                    </h4>
                                    <p class="text-muted mb-0 line-clamp-2"><?= strip_tags($p['isi']) ?></p>
                                </div>
                                <div class="ms-md-4 mt-4 mt-md-0 flex-shrink-0 text-md-end">
                                    <a href="<?= base_url('informasi/pengumuman/' . $p['slug']) ?>" class="btn btn-outline-primary rounded-pill px-4">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 120px; height: 120px;">
                        <i class="fas fa-bell-slash text-muted" style="font-size: 3rem;"></i>
                    </div>
                    <h4 class="fw-bold text-dark">Tidak Ada Pengumuman</h4>
                    <p class="text-muted">Saat ini belum ada pengumuman terbaru untuk ditampilkan.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
    .hover-lift { transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .hover-lift:hover { transform: translateY(-3px); box-shadow: 0 10px 25px rgba(0,0,0,0.08) !important; }
    .hover-primary:hover { color: #435ebe !important; }
    .line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
</style>

<?= $this->endSection() ?>