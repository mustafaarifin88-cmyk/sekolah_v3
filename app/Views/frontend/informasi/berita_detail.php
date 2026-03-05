<?= $this->extend('layout/frontend_layout') ?>

<?= $this->section('content') ?>

<div class="mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('informasi/berita') ?>" class="text-decoration-none text-secondary">Berita Sekolah</a></li>
            <li class="breadcrumb-item active text-truncate" style="max-width: 200px;" aria-current="page"><?= $berita['judul'] ?></li>
        </ol>
    </nav>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <img src="<?= base_url('uploads/berita/' . $berita['foto']) ?>" class="w-100" style="max-height: 500px; object-fit: cover;" alt="<?= $berita['judul'] ?>">
            
            <div class="card-body p-4 p-lg-5">
                <div class="d-flex flex-wrap align-items-center mb-4 gap-3">
                    <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-bold"><i class="fas fa-tag me-1"></i> <?= $berita['nama_kategori'] ?></span>
                    <span class="text-muted small fw-semibold"><i class="fas fa-calendar-alt me-1 text-primary"></i> <?= date('d M Y, H:i', strtotime($berita['tgl_publish'])) ?></span>
                    <span class="text-muted small fw-semibold"><i class="fas fa-user-edit me-1 text-primary"></i> <?= $berita['nama_penulis'] ?></span>
                </div>

                <h1 class="fw-bolder text-dark mb-4 lh-base"><?= $berita['judul'] ?></h1>
                
                <div class="text-secondary lh-lg fs-5 text-justify mt-4 article-content">
                    <?= $berita['isi'] ?>
                </div>

                <?php if(!empty($berita['seo_keywords'])): ?>
                    <div class="mt-5 pt-4 border-top">
                        <h6 class="fw-bold text-dark mb-3"><i class="fas fa-tags text-primary me-2"></i> Kata Kunci (Tags):</h6>
                        <div class="d-flex flex-wrap gap-2">
                            <?php 
                                $tags = explode(',', $berita['seo_keywords']);
                                foreach($tags as $tag): 
                                    if(trim($tag) != ''):
                            ?>
                                <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fw-normal"><?= trim($tag) ?></span>
                            <?php 
                                    endif;
                                endforeach; 
                            ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="mt-5 pt-4 border-top text-center">
                    <p class="fw-bold text-dark mb-3">Bagikan Berita Ini:</p>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= current_url() ?>" target="_blank" class="btn btn-primary rounded-circle me-2" style="width: 45px; height: 45px; line-height: 32px;"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/intent/tweet?url=<?= current_url() ?>&text=<?= $berita['judul'] ?>" target="_blank" class="btn btn-info text-white rounded-circle me-2" style="width: 45px; height: 45px; line-height: 32px;"><i class="fab fa-twitter"></i></a>
                    <a href="https://api.whatsapp.com/send?text=<?= $berita['judul'] ?> - <?= current_url() ?>" target="_blank" class="btn btn-success rounded-circle" style="width: 45px; height: 45px; line-height: 32px;"><i class="fab fa-whatsapp fs-5 mt-1"></i></a>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
    .text-justify { text-align: justify; }
    .article-content img, .article-content iframe { max-width: 100%; height: auto; border-radius: 10px; margin: 20px 0; }
</style>

<?= $this->endSection() ?>