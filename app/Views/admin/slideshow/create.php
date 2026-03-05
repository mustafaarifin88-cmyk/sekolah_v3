<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 fw-bold"><i class="bi bi-cloud-upload-fill me-2 text-primary"></i> Upload Foto Slide Show</h5>
                <a href="<?= base_url('admin/slideshow') ?>" class="btn btn-outline-secondary rounded-pill btn-sm fw-semibold"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
            </div>
            <div class="card-body p-4 p-lg-5 text-center">
                <form action="<?= base_url('admin/slideshow/store') ?>" method="post" enctype="multipart/form-data">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 100px; height: 100px;">
                        <i class="bi bi-images text-primary" style="font-size: 3rem;"></i>
                    </div>
                    <h4 class="fw-bold mb-4">Pilih Foto untuk Banner Beranda</h4>
                    
                    <div class="form-group mb-4">
                        <input type="file" class="form-control form-control-lg bg-light border-0 shadow-sm p-3 rounded-4" name="foto[]" accept="image/png, image/jpeg" multiple required>
                        <small class="text-muted d-block mt-2 fw-semibold">Anda dapat memilih lebih dari satu foto sekaligus (Multiple Upload). Disarankan rasio foto landscape (16:9).</small>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill fw-bold shadow-sm py-3"><i class="bi bi-upload me-2"></i> Mulai Upload Foto</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>