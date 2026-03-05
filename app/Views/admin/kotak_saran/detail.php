<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4 position-relative overflow-hidden">
            <div class="position-absolute top-0 start-0 w-100 bg-primary" style="height: 5px;"></div>
            <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 fw-bold"><i class="bi bi-envelope-open-fill me-2 text-primary"></i> Detail Kotak Saran</h5>
                <a href="<?= base_url('admin/kotak_saran') ?>" class="btn btn-outline-secondary rounded-pill btn-sm fw-semibold"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
            </div>
            <div class="card-body p-4 p-lg-5">
                <div class="d-flex align-items-center mb-4 pb-4 border-bottom">
                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-4" style="width: 60px; height: 60px;">
                        <i class="bi bi-person-fill fs-2"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-1"><?= $saran['nama'] ?></h4>
                        <div class="d-flex align-items-center text-muted small">
                            <span class="me-3"><i class="bi bi-envelope me-1"></i> <?= !empty($saran['email']) ? $saran['email'] : 'Tidak ada email' ?></span>
                            <span><i class="bi bi-clock-history me-1"></i> <?= date('d M Y - H:i', strtotime($saran['created_at'])) ?> WIB</span>
                        </div>
                    </div>
                </div>

                <div class="mb-5">
                    <h6 class="fw-bold text-dark text-uppercase mb-3">Isi Pesan / Saran :</h6>
                    <div class="bg-light rounded-4 p-4 text-dark fs-5" style="line-height: 1.8;">
                        <?= nl2br(htmlspecialchars($saran['pesan'])) ?>
                    </div>
                </div>

                <div class="text-end">
                    <a href="<?= base_url('admin/kotak_saran/delete/' . $saran['id']) ?>" class="btn btn-danger px-4 rounded-pill fw-bold" onclick="return confirm('Yakin ingin menghapus pesan ini?');"><i class="bi bi-trash me-2"></i> Hapus Pesan Ini</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>