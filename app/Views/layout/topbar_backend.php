<header class="mb-3">
    <nav class="navbar navbar-expand navbar-light navbar-top">
        <div class="container-fluid">
            <a href="#" class="burger-btn d-block">
                <i class="bi bi-justify fs-3"></i>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-lg-0">
                    <li class="nav-item dropdown me-1">
                        <a class="nav-link active dropdown-toggle text-gray-600" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class='bi bi-envelope bi-sub fs-4'></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li>
                                <h6 class="dropdown-header">Pemberitahuan</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">Tidak ada pesan baru</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                            <div class="user-name text-end me-3">
                                <h6 class="mb-0 text-gray-600"><?= session()->get('nama_lengkap') ?></h6>
                                <p class="mb-0 text-sm text-gray-600"><?= strtoupper(session()->get('role')) ?></p>
                            </div>
                            <div class="user-img d-flex align-items-center">
                                <div class="avatar avatar-md">
                                    <?php if(session()->get('foto_profil')): ?>
                                        <img src="<?= base_url('uploads/profil/' . session()->get('foto_profil')) ?>" alt="Face 1">
                                    <?php else: ?>
                                        <img src="<?= base_url('assets/compiled/jpg/1.jpg') ?>" alt="Face 1">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                        <li>
                            <h6 class="dropdown-header">Halo, <?= explode(' ', session()->get('nama_lengkap'))[0] ?>!</h6>
                        </li>
                        <?php if(session()->get('role') == 'guru'): ?>
                            <li><a class="dropdown-item" href="<?= base_url('guru/profil/edit') ?>"><i class="icon-mid bi bi-person me-2"></i> Profil Saya</a></li>
                        <?php endif; ?>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="<?= base_url('auth/logout') ?>"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Keluar</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>