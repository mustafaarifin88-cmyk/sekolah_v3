<?= $this->extend('layout/frontend_layout') ?>

<?= $this->section('content') ?>

<div class="bg-primary bg-opacity-10 rounded-4 p-5 text-center mb-5">
    <h1 class="fw-bolder text-dark mb-3">Galeri Video</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-secondary">Informasi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Galeri Video</li>
        </ol>
    </nav>
</div>

<div class="row g-4">
    <?php if(isset($galeri) && !empty($galeri)): ?>
        <?php foreach($galeri as $v): ?>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden hover-lift bg-dark text-white">
                    <div class="position-relative">
                        <img src="<?= base_url('uploads/galeri/' . $v['thumbnail']) ?>" class="card-img-top w-100 opacity-75" style="height: 250px; object-fit: cover;" alt="<?= $v['judul'] ?>">
                        
                        <div class="position-absolute top-50 start-50 translate-middle">
                            <div class="play-btn bg-white rounded-circle d-flex align-items-center justify-content-center shadow" style="width: 60px; height: 60px;">
                                <i class="fas fa-play text-danger fs-4 ms-1"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body p-4 bg-white text-dark z-index-1">
                        <h5 class="fw-bold mb-2 line-clamp-2"><?= $v['judul'] ?></h5>
                        <?php if(!empty($v['keterangan'])): ?>
                            <p class="text-muted small mb-0 line-clamp-2"><?= $v['keterangan'] ?></p>
                        <?php endif; ?>
                    </div>
                    <a href="<?= $v['link_youtube'] ?>" target="_blank" class="stretched-link"></a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12 text-center py-5">
            <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 120px; height: 120px;">
                <i class="fas fa-video text-muted" style="font-size: 3rem;"></i>
            </div>
            <h4 class="fw-bold text-dark">Video Kosong</h4>
            <p class="text-muted">Belum ada video yang ditambahkan ke galeri.</p>
        </div>
    <?php endif; ?>
</div>

<style>
    .hover-lift { transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .hover-lift:hover { transform: translateY(-5px); box-shadow: 0 15px 30px rgba(0,0,0,0.15) !important; }
    .hover-lift:hover img { opacity: 0.5 !important; transition: opacity 0.3s ease; }
    .play-btn { transition: transform 0.3s ease; }
    .hover-lift:hover .play-btn { transform: scale(1.1); }
    .line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
</style>

<?= $this->endSection() ?>