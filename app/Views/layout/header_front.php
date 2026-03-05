<nav class="navbar navbar-expand-lg navbar-front fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="<?= base_url('/') ?>">
            <?php if(isset($profil['logo']) && $profil['logo']): ?>
                <img src="<?= base_url('uploads/logo/' . $profil['logo']) ?>" alt="Logo">
            <?php endif; ?>
            <span><?= isset($profil['nama_sekolah']) ? $profil['nama_sekolah'] : 'NAMA SEKOLAH' ?></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/') ?>">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="profilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profil Sekolah
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="profilDropdown">
                        <li><a class="dropdown-item" href="<?= base_url('profil/sejarah') ?>">Sejarah Sekolah</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('profil/visi-misi') ?>">Visi & Misi</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('profil/struktur') ?>">Struktur Organisasi</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('profil/fasilitas') ?>">Fasilitas</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('profil/akreditasi') ?>">Akreditasi</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="akademikDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Akademik
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="akademikDropdown">
                        <li><a class="dropdown-item" href="<?= base_url('akademik/kurikulum') ?>">Data Kurikulum</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('akademik/kalender') ?>">Kalender Pendidikan</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('akademik/program') ?>">Program Unggulan</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('akademik/ekstrakurikuler') ?>">Ekstrakurikuler</a></li>
                    </ul>
                </li>
                
                <?php if(isset($menu_eksternal) && !empty($menu_eksternal)): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="layananDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Data & Layanan
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="layananDropdown">
                        <?php foreach($menu_eksternal as $me): ?>
                            <li><a class="dropdown-item" href="<?= $me['url'] ?>" target="_blank"><?= $me['judul'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="infoDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Informasi & Publikasi
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="infoDropdown">
                        <li><a class="dropdown-item" href="<?= base_url('informasi/berita') ?>">Berita Sekolah</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('informasi/pengumuman') ?>">Pengumuman</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('informasi/galeri-foto') ?>">Galeri Foto</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('informasi/galeri-video') ?>">Galeri Video</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('informasi/prestasi') ?>">Prestasi Siswa & Guru</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('informasi/agenda') ?>">Agenda Kegiatan</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('kontak') ?>">Kontak & Interaksi</a>
                </li>
                <li class="nav-item ms-lg-3 mt-3 mt-lg-0">
                    <a class="btn btn-primary rounded-pill px-4" href="<?= base_url('auth/login') ?>">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>