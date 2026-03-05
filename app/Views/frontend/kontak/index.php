<?= $this->extend('layout/frontend_layout') ?>

<?= $this->section('content') ?>

<div class="bg-primary bg-opacity-10 rounded-4 p-5 text-center mb-5">
    <h1 class="fw-bolder text-dark mb-3">Kontak & Interaksi</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kontak</li>
        </ol>
    </nav>
</div>

<div class="row g-5">
    <div class="col-lg-5">
        <div class="mb-5">
            <h3 class="fw-bold text-dark mb-4">Informasi Kontak</h3>
            <p class="text-muted mb-4 fs-5">Jangan ragu untuk menghubungi kami melalui informasi kontak di bawah ini atau kunjungi lokasi sekolah kami secara langsung.</p>
            
            <div class="d-flex align-items-start mb-4">
                <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 me-3 mt-1" style="width: 50px; height: 50px;">
                    <i class="fas fa-map-marker-alt text-primary fs-5"></i>
                </div>
                <div>
                    <h5 class="fw-bold mb-1">Alamat Lengkap</h5>
                    <p class="text-muted mb-0"><?= isset($profil['alamat']) && !empty($profil['alamat']) ? $profil['alamat'] : 'Belum diatur' ?></p>
                </div>
            </div>

            <div class="d-flex align-items-start mb-4">
                <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 me-3 mt-1" style="width: 50px; height: 50px;">
                    <i class="fas fa-phone-alt text-success fs-5"></i>
                </div>
                <div>
                    <h5 class="fw-bold mb-1">Nomor Telepon</h5>
                    <p class="text-muted mb-0"><?= isset($profil['no_telp']) && !empty($profil['no_telp']) ? $profil['no_telp'] : 'Belum diatur' ?></p>
                </div>
            </div>

            <div class="d-flex align-items-start mb-5">
                <div class="bg-danger bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 me-3 mt-1" style="width: 50px; height: 50px;">
                    <i class="fas fa-envelope text-danger fs-5"></i>
                </div>
                <div>
                    <h5 class="fw-bold mb-1">Email Sekolah</h5>
                    <p class="text-muted mb-0"><?= isset($profil['email']) && !empty($profil['email']) ? $profil['email'] : 'Belum diatur' ?></p>
                </div>
            </div>

            <h5 class="fw-bold text-dark mb-3">Media Sosial Kami</h5>
            <div class="d-flex gap-2">
                <?php if(!empty($profil['facebook'])): ?>
                    <a href="<?= $profil['facebook'] ?>" target="_blank" class="btn btn-outline-primary rounded-circle" style="width: 45px; height: 45px; line-height: 32px;"><i class="fab fa-facebook-f"></i></a>
                <?php endif; ?>
                <?php if(!empty($profil['instagram'])): ?>
                    <a href="<?= $profil['instagram'] ?>" target="_blank" class="btn btn-outline-danger rounded-circle" style="width: 45px; height: 45px; line-height: 32px;"><i class="fab fa-instagram"></i></a>
                <?php endif; ?>
                <?php if(!empty($profil['twitter'])): ?>
                    <a href="<?= $profil['twitter'] ?>" target="_blank" class="btn btn-outline-info rounded-circle" style="width: 45px; height: 45px; line-height: 32px;"><i class="fab fa-twitter"></i></a>
                <?php endif; ?>
                <?php if(!empty($profil['youtube'])): ?>
                    <a href="<?= $profil['youtube'] ?>" target="_blank" class="btn btn-outline-danger rounded-circle" style="width: 45px; height: 45px; line-height: 32px;"><i class="fab fa-youtube"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="col-lg-7">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden h-100">
            <div class="card-body p-4 p-lg-5">
                <h3 class="fw-bold text-dark mb-4 border-bottom pb-3">Kirim Pesan / Saran</h3>
                
                <?php if(session()->getFlashdata('success')): ?>
                    <div class="alert alert-success rounded-3">
                        <i class="fas fa-check-circle me-2"></i> <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <?php if(session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger rounded-3">
                        <ul class="mb-0">
                            <?php foreach(session()->getFlashdata('errors') as $err): ?>
                                <li><?= $err ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('kontak/simpan_saran') ?>" method="post">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="nama" class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-lg bg-light border-0" id="nama" name="nama" value="<?= old('nama') ?>" required placeholder="Masukkan nama Anda">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="email" class="form-label fw-semibold">Alamat Email</label>
                                <input type="email" class="form-control form-control-lg bg-light border-0" id="email" name="email" value="<?= old('email') ?>" placeholder="Masukkan email Anda">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mb-4">
                                <label for="pesan" class="form-label fw-semibold">Pesan / Saran <span class="text-danger">*</span></label>
                                <textarea class="form-control form-control-lg bg-light border-0" id="pesan" name="pesan" rows="5" required placeholder="Tuliskan pesan atau saran Anda di sini..."><?= old('pesan') ?></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill fw-bold shadow-sm">Kirim Pesan Sekarang <i class="fas fa-paper-plane ms-2"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php if(isset($profil['peta']) && !empty($profil['peta'])): ?>
    <div class="row mt-5 pt-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-4 p-2">
                <div class="map-container rounded-3 overflow-hidden" style="height: 450px;">
                    <?= $profil['peta'] ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<style>
    .map-container iframe { width: 100% !important; height: 100% !important; border: 0; }
</style>

<?= $this->endSection() ?>