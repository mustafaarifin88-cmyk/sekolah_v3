<style>
    .navbar-front {
        background-color: <?= isset($pengaturan['warna_header']) ? $pengaturan['warna_header'] : '#ffffff' ?> !important;
        transition: all 0.3s ease;
    }
    
    .navbar-nav .nav-link {
        white-space: nowrap; 
    }

    @media (min-width: 992px) and (max-width: 1200px) {
        .navbar-brand span {
            font-size: 1rem;
        }
        .navbar-brand img {
            height: 35px !important;
        }
        .navbar-nav .nav-link {
            font-size: 0.85rem;
            padding-left: 0.4rem !important;
            padding-right: 0.4rem !important;
        }
        .navbar-front .btn {
            font-size: 0.85rem;
            padding: 0.4rem 1rem !important;
        }
    }
</style>

<nav class="navbar navbar-expand-lg navbar-front fixed-top shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="<?= base_url('/') ?>">
            <?php if(isset($profil['logo']) && $profil['logo']): ?>
                <img src="<?= base_url('uploads/logo/' . $profil['logo']) ?>" alt="Logo" style="height: 45px; margin-right: 10px;">
            <?php endif; ?>
            <span class="fw-bold text-dark"><?= isset($profil['nama_sekolah']) ? $profil['nama_sekolah'] : 'NAMA SEKOLAH' ?></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link text-dark fw-semibold" href="<?= base_url('/') ?>">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark fw-semibold" href="#" id="profilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profil Sekolah
                    </a>
                    <ul class="dropdown-menu shadow-sm border-0" aria-labelledby="profilDropdown">
                        <li><a class="dropdown-item" href="<?= base_url('profil/sejarah') ?>">Sejarah Sekolah</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('profil/visi-misi') ?>">Visi & Misi</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('profil/struktur') ?>">Struktur Organisasi</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('profil/fasilitas') ?>">Fasilitas</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('profil/akreditasi') ?>">Akreditasi</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark fw-semibold" href="#" id="akademikDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Akademik
                    </a>
                    <ul class="dropdown-menu shadow-sm border-0" aria-labelledby="akademikDropdown">
                        <li><a class="dropdown-item" href="<?= base_url('akademik/kurikulum') ?>">Data Kurikulum</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('akademik/kalender') ?>">Kalender Pendidikan</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('akademik/program') ?>">Program Unggulan</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('akademik/ekstrakurikuler') ?>">Ekstrakurikuler</a></li>
                    </ul>
                </li>
                
                <?php if(isset($menu_eksternal) && !empty($menu_eksternal)): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark fw-semibold" href="#" id="layananDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Data & Layanan
                    </a>
                    <ul class="dropdown-menu shadow-sm border-0" aria-labelledby="layananDropdown">
                        <?php foreach($menu_eksternal as $me): ?>
                            <li><a class="dropdown-item" href="<?= $me['url'] ?>" target="_blank"><?= $me['judul'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark fw-semibold" href="#" id="infoDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Informasi & Publikasi
                    </a>
                    <ul class="dropdown-menu shadow-sm border-0" aria-labelledby="infoDropdown">
                        <li><a class="dropdown-item" href="<?= base_url('informasi/berita') ?>">Berita Sekolah</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('informasi/pengumuman') ?>">Pengumuman</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('informasi/galeri-foto') ?>">Galeri Foto</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('informasi/galeri-video') ?>">Galeri Video</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('informasi/prestasi') ?>">Prestasi Siswa & Guru</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('informasi/agenda') ?>">Agenda Kegiatan</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fw-semibold" href="<?= base_url('kontak') ?>">Kontak & Interaksi</a>
                </li>
                <li class="nav-item ms-lg-3 mt-3 mt-lg-0">
                    <a class="btn btn-primary rounded-pill px-4 fw-bold shadow-sm" href="<?= base_url('auth/login') ?>">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>