<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center flex-wrap gap-2">
        <h5 class="card-title mb-0 fw-bold"><i class="bi bi-easel-fill me-2 text-primary"></i> Data Slide Show Beranda</h5>
        <a href="<?= base_url('admin/slideshow/create') ?>" class="btn btn-primary rounded-pill fw-semibold shadow-sm"><i class="bi bi-plus-circle me-1"></i> Tambah Slide Baru</a>
    </div>
    <div class="card-body p-4">
        <div class="row g-4">
            <?php if(isset($slides) && !empty($slides)): ?>
                <?php foreach($slides as $slide): ?>
                    <div class="col-md-6 col-lg-6">
                        <div class="card border border-2 shadow-none rounded-4 overflow-hidden position-relative h-100 d-flex flex-column">
                            <div class="position-relative">
                                <img src="<?= base_url('uploads/slideshow/' . $slide['foto']) ?>" class="w-100" style="height: 250px; object-fit: cover;" alt="Slide">
                                <div class="position-absolute top-0 end-0 m-2 d-flex gap-2">
                                    <a href="<?= base_url('admin/slideshow/edit/' . $slide['id']) ?>" class="btn btn-warning btn-sm rounded-circle shadow text-dark" style="width: 35px; height: 35px; line-height: 20px;"><i class="bi bi-pencil-square"></i></a>
                                    <a href="<?= base_url('admin/slideshow/delete/' . $slide['id']) ?>" class="btn btn-danger btn-sm rounded-circle shadow" onclick="return confirm('Hapus foto slide ini?');" style="width: 35px; height: 35px; line-height: 20px;"><i class="bi bi-trash"></i></a>
                                </div>
                            </div>
                            <div class="p-4 bg-light flex-grow-1">
                                <h5 class="fw-bold text-dark mb-2"><?= !empty($slide['judul']) ? $slide['judul'] : '<i class="text-muted">Tanpa Judul</i>' ?></h5>
                                <p class="text-muted small mb-0"><?= !empty($slide['keterangan']) ? $slide['keterangan'] : '<i class="text-muted">Tanpa keterangan</i>' ?></p>
                            </div>
                            <div class="p-3 bg-white text-center border-top">
                                <small class="text-muted fw-bold"><i class="bi bi-clock me-1"></i> Diunggah: <?= date('d M Y', strtotime($slide['created_at'])) ?></small>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <i class="bi bi-image text-muted opacity-25" style="font-size: 5rem;"></i>
                    <h5 class="text-muted mt-3">Belum ada slide show yang ditambahkan.</h5>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>