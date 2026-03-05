<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 fw-bold"><i class="bi bi-cloud-arrow-up-fill me-2 text-success"></i> Import Data Siswa (Excel)</h5>
                <a href="<?= base_url('admin/siswa') ?>" class="btn btn-outline-secondary rounded-pill btn-sm fw-semibold"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
            </div>
            <div class="card-body p-lg-5 text-center">
                <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px;">
                    <i class="bi bi-file-earmark-spreadsheet fs-1"></i>
                </div>
                <h4 class="fw-bold text-dark mb-3">Langkah 1: Download Template</h4>
                <p class="text-muted mb-4 fs-6 px-lg-5">Pastikan Anda menggunakan format Excel yang sesuai dengan sistem. Unduh template di bawah ini, isi data siswa, lalu upload kembali pada form langkah ke-2.</p>
                <a href="<?= base_url('admin/siswa/download_template') ?>" class="btn btn-success rounded-pill fw-bold px-4 py-2 shadow-sm"><i class="bi bi-download me-2"></i> Download Template Excel</a>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-lg-5">
                <h4 class="fw-bold text-dark mb-4 text-center">Langkah 2: Upload File Excel</h4>
                <form action="<?= base_url('admin/siswa/process_import') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold text-center w-100 d-block text-muted">Pilih File Excel (.xlsx / .xls)</label>
                        <input type="file" class="form-control form-control-lg bg-light border-0 shadow-sm p-3 rounded-4 text-center" name="file_excel" accept=".xls, .xlsx" required>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill fw-bold shadow-sm py-3"><i class="bi bi-upload me-2"></i> Mulai Proses Import Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>