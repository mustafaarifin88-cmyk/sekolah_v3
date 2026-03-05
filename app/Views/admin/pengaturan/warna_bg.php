<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom pb-3 pt-4">
                <h5 class="card-title mb-0 fw-bold"><i class="bi bi-palette-fill me-2 text-primary"></i> Pengaturan Tema Website</h5>
            </div>
            <div class="card-body pt-4 p-5 text-center">
                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 100px; height: 100px;">
                    <i class="bi bi-brush-fill text-secondary" style="font-size: 3rem;"></i>
                </div>
                <h4 class="fw-bold mb-3">Warna Latar Belakang (Background)</h4>
                <p class="text-muted mb-4">Sesuaikan warna dasar pada halaman pengunjung (frontend) agar cocok dengan identitas sekolah.</p>
                
                <form action="<?= base_url('admin/pengaturan/update_warna') ?>" method="post">
                    <input type="hidden" name="id" value="<?= isset($pengaturan['id']) ? $pengaturan['id'] : 1 ?>">
                    
                    <div class="form-group mb-4 d-flex justify-content-center align-items-center gap-3">
                        <label class="form-label fw-bold mb-0 fs-5">Pilih Warna :</label>
                        <input type="color" class="form-control form-control-color border-0 shadow-sm" name="warna_bg" value="<?= isset($pengaturan['warna_bg']) ? $pengaturan['warna_bg'] : '#ffffff' ?>" style="width: 80px; height: 60px; cursor: pointer; border-radius: 15px;">
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill fw-bold shadow-sm mt-3"><i class="bi bi-save me-2"></i> Terapkan Warna</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>