<?= $this->extend('layout/frontend_layout') ?>

<?= $this->section('content') ?>

<div class="bg-primary bg-opacity-10 rounded-4 p-5 text-center mb-5">
    <h1 class="fw-bolder text-dark mb-3">Galeri Foto</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-secondary">Informasi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Galeri Foto</li>
        </ol>
    </nav>
</div>

<div class="row g-4" data-masonry='{"percentPosition": true }'>
    <?php if(isset($galeri) && !empty($galeri)): ?>
        <?php foreach($galeri as $g): ?>
            <div class="col-sm-6 col-lg-4 mb-4">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden position-relative group-hover-zoom">
                    <img src="<?= base_url('uploads/galeri/' . $g['foto']) ?>" class="w-100" style="object-fit: cover;" alt="<?= $g['judul'] ?>">
                    
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-end p-4 overlay-dark transition-all">
                        <h5 class="text-white fw-bold mb-1 transform-up"><?= $g['judul'] ?></h5>
                        <?php if(!empty($g['keterangan'])): ?>
                            <p class="text-white-50 small mb-0 transform-up delay-1 line-clamp-2"><?= $g['keterangan'] ?></p>
                        <?php endif; ?>
                    </div>
                    
                    <a href="<?= base_url('uploads/galeri/' . $g['foto']) ?>" target="_blank" class="stretched-link"></a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12 text-center py-5">
            <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 120px; height: 120px;">
                <i class="fas fa-images text-muted" style="font-size: 3rem;"></i>
            </div>
            <h4 class="fw-bold text-dark">Galeri Kosong</h4>
            <p class="text-muted">Belum ada foto yang diunggah ke dalam galeri.</p>
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" async></script>

<style>
    .group-hover-zoom img { transition: transform 0.5s ease; }
    .group-hover-zoom:hover img { transform: scale(1.05); }
    .overlay-dark {
        background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.4) 50%, transparent 100%);
        opacity: 0;
    }
    .group-hover-zoom:hover .overlay-dark { opacity: 1; }
    .transform-up { transform: translateY(20px); transition: transform 0.4s ease, opacity 0.4s ease; opacity: 0; }
    .group-hover-zoom:hover .transform-up { transform: translateY(0); opacity: 1; }
    .delay-1 { transition-delay: 0.1s; }
    .transition-all { transition: all 0.4s ease; }
    .line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
</style>

<?= $this->endSection() ?>