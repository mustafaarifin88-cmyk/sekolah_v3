<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - <?= isset($profil['nama_sekolah']) ? $profil['nama_sekolah'] : 'Sistem Sekolah' ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/app.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/app-dark.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/auth.css') ?>">
</head>
<body>
    <script src="<?= base_url('assets/static/js/initTheme.js') ?>"></script>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo mb-4">
                        <a href="<?= base_url() ?>">
                            <?php if(isset($profil['logo']) && $profil['logo']): ?>
                                <img src="<?= base_url('uploads/logo/' . $profil['logo']) ?>" alt="Logo" style="height: 60px;">
                            <?php endif; ?>
                        </a>
                    </div>
                    <h1 class="auth-title">Masuk.</h1>
                    <p class="auth-subtitle mb-5">Silakan masuk menggunakan data yang didaftarkan oleh Administrator.</p>

                    <?php if(session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger rounded-4">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('auth/process') ?>" method="post">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="username" class="form-control form-control-xl" placeholder="Username" required>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" class="form-control form-control-xl" placeholder="Password" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-3 rounded-pill">Log in</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Kembali ke <a href="<?= base_url() ?>" class="font-bold">Beranda Web</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right" style="background-color: #435ebe; display: flex; align-items: center; justify-content: center;">
                    <h2 class="text-white text-center" style="font-size: 3rem; font-weight: 800; padding: 0 50px;">Sistem Informasi Manajemen<br><?= isset($profil['nama_sekolah']) ? $profil['nama_sekolah'] : 'Sekolah' ?></h2>
                </div>
            </div>
        </div>
    </div>
</body>
</html>