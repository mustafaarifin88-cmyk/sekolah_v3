<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm rounded-4 mb-4" style="background: linear-gradient(135deg, #435ebe 0%, #25396f 100%); color: white;">
            <div class="card-body p-5 d-flex align-items-center justify-content-between">
                <div>
                    <h3 class="text-white fw-bold mb-2">Selamat Datang, <?= session()->get('nama_lengkap') ?>!</h3>
                    <p class="text-white-50 mb-0 fs-5">Anda login sebagai Administrator. Kelola semua data website profil sekolah melalui panel ini.</p>
                </div>
                <div class="d-none d-md-block opacity-50">
                    <i class="bi bi-laptop" style="font-size: 5rem;"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6 col-lg-3 col-md-6">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                        <div class="stats-icon purple mb-2">
                            <i class="iconly-boldShow"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Profil Sekolah</h6>
                        <a href="<?= base_url('admin/profil_sekolah/edit') ?>" class="text-decoration-none fw-bold text-dark stretched-link">Kelola Profil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3 col-md-6">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                        <div class="stats-icon blue mb-2">
                            <i class="iconly-boldProfile"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Data Siswa</h6>
                        <a href="<?= base_url('admin/siswa') ?>" class="text-decoration-none fw-bold text-dark stretched-link">Kelola Siswa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3 col-md-6">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                        <div class="stats-icon green mb-2">
                            <i class="iconly-boldDocument"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Berita & Publikasi</h6>
                        <a href="<?= base_url('admin/berita') ?>" class="text-decoration-none fw-bold text-dark stretched-link">Kelola Berita</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3 col-md-6">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                        <div class="stats-icon red mb-2">
                            <i class="iconly-boldSetting"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Pengaturan</h6>
                        <a href="<?= base_url('admin/pengaturan/warna_bg') ?>" class="text-decoration-none fw-bold text-dark stretched-link">Ubah Tampilan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>