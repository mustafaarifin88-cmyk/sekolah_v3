<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm rounded-4 mb-4" style="background: linear-gradient(135deg, #198754 0%, #146c43 100%); color: white;">
            <div class="card-body p-5 d-flex align-items-center justify-content-between">
                <div>
                    <h3 class="text-white fw-bold mb-2">Selamat Datang, <?= session()->get('nama_lengkap') ?>!</h3>
                    <p class="text-white-50 mb-0 fs-5">Anda login sebagai Guru. Publikasikan berita, pengumuman, galeri, dan kelola data siswa (jika Anda Wali Kelas).</p>
                </div>
                <div class="d-none d-md-block opacity-50">
                    <i class="bi bi-person-workspace" style="font-size: 5rem;"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6 col-lg-4 col-md-6">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                        <div class="stats-icon purple mb-2">
                            <i class="iconly-boldProfile"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Profil Saya</h6>
                        <a href="<?= base_url('guru/profil/edit') ?>" class="text-decoration-none fw-bold text-dark stretched-link">Pengaturan Akun</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php if(session()->get('kelas_id') != null): ?>
    <div class="col-6 col-lg-4 col-md-6">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                        <div class="stats-icon blue mb-2">
                            <i class="iconly-boldUser"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Siswa Wali Kelas</h6>
                        <a href="<?= base_url('guru/siswa') ?>" class="text-decoration-none fw-bold text-dark stretched-link">Kelola Siswa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="col-6 col-lg-4 col-md-6">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                        <div class="stats-icon green mb-2">
                            <i class="iconly-boldDocument"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Publikasi</h6>
                        <a href="<?= base_url('guru/berita') ?>" class="text-decoration-none fw-bold text-dark stretched-link">Tulis Berita Baru</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>