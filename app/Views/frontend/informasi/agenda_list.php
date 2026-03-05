<?= $this->extend('layout/frontend_layout') ?>

<?= $this->section('content') ?>

<div class="bg-primary bg-opacity-10 rounded-4 p-5 text-center mb-5">
    <h1 class="fw-bolder text-dark mb-3">Agenda Kegiatan Sekolah</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-secondary">Informasi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Agenda</li>
        </ol>
    </nav>
</div>

<div class="row g-4">
    <?php if(isset($agenda) && !empty($agenda)): ?>
        <?php foreach($agenda as $ag): ?>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 hover-lift overflow-hidden d-flex flex-column">
                    <?php if(!empty($ag['foto'])): ?>
                        <div class="position-relative">
                            <img src="<?= base_url('uploads/agenda/' . $ag['foto']) ?>" class="card-img-top" style="height: 200px; object-fit: cover;" alt="<?= $ag['judul'] ?>">
                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge bg-primary shadow-sm px-3 py-2 rounded-pill fw-bold">
                                    <?= $ag['nama_kategori'] ?>
                                </span>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="bg-light d-flex align-items-center justify-content-center position-relative" style="height: 200px;">
                            <i class="fas fa-calendar-alt text-secondary opacity-25" style="font-size: 5rem;"></i>
                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge bg-primary shadow-sm px-3 py-2 rounded-pill fw-bold">
                                    <?= $ag['nama_kategori'] ?>
                                </span>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <div class="card-body p-4 d-flex flex-column flex-grow-1">
                        <h4 class="card-title fw-bold text-dark mb-3"><?= $ag['judul'] ?></h4>
                        <div class="text-muted small mb-4 flex-grow-1 line-clamp-3">
                            <?= strip_tags($ag['keterangan']) ?>
                        </div>
                        <a href="<?= base_url('informasi/agenda/' . $ag['id']) ?>" class="btn btn-outline-primary w-100 mt-auto rounded-pill fw-bold">Lihat Detail Agenda</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12 text-center py-5">
            <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 120px; height: 120px;">
                <i class="fas fa-calendar-times text-muted" style="font-size: 3rem;"></i>
            </div>
            <h4 class="fw-bold text-dark">Belum Ada Agenda</h4>
            <p class="text-muted">Jadwal kegiatan atau agenda sekolah belum ditambahkan.</p>
        </div>
    <?php endif; ?>
</div>

<style>
    .hover-lift { transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .hover-lift:hover { transform: translateY(-5px); box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important; }
    .line-clamp-3 { display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
</style>

<?= $this->endSection() ?>