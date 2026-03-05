<footer class="footer-front mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <h5 class="footer-title d-flex align-items-center">
                    <?php if(isset($profil['logo']) && $profil['logo']): ?>
                        <img src="<?= base_url('uploads/logo/' . $profil['logo']) ?>" alt="Logo" style="height: 40px; margin-right:15px; background:white; padding:5px; border-radius:5px;">
                    <?php endif; ?>
                    <?= isset($profil['nama_sekolah']) ? $profil['nama_sekolah'] : 'Nama Sekolah' ?>
                </h5>
                <p class="mb-4">Membangun generasi cerdas, berkarakter, dan siap menghadapi tantangan global di masa depan.</p>
                <div class="social-links">
                    <?php if(!empty($profil['facebook'])): ?><a href="<?= $profil['facebook'] ?>" target="_blank"><i class="fab fa-facebook-f"></i></a><?php endif; ?>
                    <?php if(!empty($profil['instagram'])): ?><a href="<?= $profil['instagram'] ?>" target="_blank"><i class="fab fa-instagram"></i></a><?php endif; ?>
                    <?php if(!empty($profil['twitter'])): ?><a href="<?= $profil['twitter'] ?>" target="_blank"><i class="fab fa-twitter"></i></a><?php endif; ?>
                    <?php if(!empty($profil['youtube'])): ?><a href="<?= $profil['youtube'] ?>" target="_blank"><i class="fab fa-youtube"></i></a><?php endif; ?>
                </div>
            </div>
            
            <div class="col-lg-3 mb-4">
                <h5 class="footer-title">Tautan Cepat</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="<?= base_url('profil/sejarah') ?>" class="text-decoration-none text-secondary">Tentang Kami</a></li>
                    <li class="mb-2"><a href="<?= base_url('informasi/berita') ?>" class="text-decoration-none text-secondary">Berita Terbaru</a></li>
                    <li class="mb-2"><a href="<?= base_url('informasi/pengumuman') ?>" class="text-decoration-none text-secondary">Pengumuman</a></li>
                    <li class="mb-2"><a href="<?= base_url('kontak') ?>" class="text-decoration-none text-secondary">Kontak & Saran</a></li>
                </ul>
            </div>
            
            <div class="col-lg-5 mb-4">
                <h5 class="footer-title">Hubungi Kami</h5>
                <ul class="list-unstyled">
                    <li class="mb-3 d-flex">
                        <i class="fas fa-map-marker-alt mt-1 me-3 text-primary"></i>
                        <span><?= isset($profil['alamat']) ? $profil['alamat'] : 'Alamat belum diatur' ?></span>
                    </li>
                    <li class="mb-3 d-flex align-items-center">
                        <i class="fas fa-phone mt-1 me-3 text-primary"></i>
                        <span><?= isset($profil['no_telp']) ? $profil['no_telp'] : '-' ?></span>
                    </li>
                    <li class="mb-3 d-flex align-items-center">
                        <i class="fas fa-envelope mt-1 me-3 text-primary"></i>
                        <span><?= isset($profil['email']) ? $profil['email'] : '-' ?></span>
                    </li>
                </ul>
            </div>
        </div>
        
        <hr class="mt-4 mb-4 border-secondary">
        
        <div class="row align-items-center text-center text-md-start">
            <div class="col-md-6 mb-3 mb-md-0">
                <p class="mb-0">&copy; <?= date('Y') ?> <?= isset($profil['nama_sekolah']) ? $profil['nama_sekolah'] : 'Sistem Informasi Sekolah' ?>. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </div>
</footer>