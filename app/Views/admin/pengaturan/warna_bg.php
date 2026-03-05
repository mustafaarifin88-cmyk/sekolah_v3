<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom pb-3 pt-4">
                <h5 class="card-title mb-0 fw-bold"><i class="bi bi-palette-fill me-2 text-primary"></i> Pengaturan Warna Tema Website</h5>
            </div>
            <div class="card-body pt-4 p-5">
                <form action="<?= base_url('admin/pengaturan/update_warna') ?>" method="post">
                    <input type="hidden" name="id" value="<?= isset($pengaturan['id']) ? $pengaturan['id'] : 1 ?>">
                    
                    <div class="row g-4 mb-5">
                        <div class="col-md-6 text-center border-end">
                            <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="bi bi-layout-sidebar-inset-reverse text-primary" style="font-size: 2.5rem;"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Background Website</h5>
                            <p class="text-muted small mb-4 px-3">Warna latar belakang dasar untuk halaman pengunjung.</p>
                            
                            <div class="d-flex justify-content-center align-items-center gap-3">
                                <input type="color" class="form-control form-control-color border-0 shadow-sm" name="warna_bg" value="<?= isset($pengaturan['warna_bg']) ? $pengaturan['warna_bg'] : '#f2f7ff' ?>" style="width: 100px; height: 80px; cursor: pointer; border-radius: 15px;">
                            </div>
                        </div>

                        <div class="col-md-6 text-center">
                            <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="bi bi-layout-top text-success" style="font-size: 2.5rem;"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Background Header (Navigasi)</h5>
                            <p class="text-muted small mb-4 px-3">Warna latar belakang untuk menu navigasi atas (Navbar).</p>
                            
                            <div class="d-flex justify-content-center align-items-center gap-3">
                                <input type="color" class="form-control form-control-color border-0 shadow-sm" name="warna_header" value="<?= isset($pengaturan['warna_header']) ? $pengaturan['warna_header'] : '#ffffff' ?>" style="width: 100px; height: 80px; cursor: pointer; border-radius: 15px;">
                            </div>
                        </div>
                    </div>

                    <div class="text-center border-top pt-4">
                        <button type="submit" class="btn btn-primary btn-lg rounded-pill fw-bold shadow-sm px-5"><i class="bi bi-save me-2"></i> Terapkan Pengaturan Warna</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>