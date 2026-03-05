<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-bottom pb-3 pt-4">
        <h5 class="card-title mb-0 fw-bold"><i class="bi bi-building me-2 text-primary"></i> Form Edit Profil Sekolah</h5>
    </div>
    <div class="card-body pt-4">
        <form action="<?= base_url('admin/profil_sekolah/update') ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= isset($profil['id']) ? $profil['id'] : 1 ?>">

            <h6 class="fw-bold text-primary mb-3 mt-2">1. Informasi Umum</h6>
            <div class="row g-3 mb-4">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label fw-semibold">Nama Sekolah <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama_sekolah" value="<?= isset($profil['nama_sekolah']) ? $profil['nama_sekolah'] : '' ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label fw-semibold">Nama Kepala Sekolah</label>
                        <input type="text" class="form-control" name="nama_kepsek" value="<?= isset($profil['nama_kepsek']) ? $profil['nama_kepsek'] : '' ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label fw-semibold">NIP/NIK Kepala Sekolah</label>
                        <input type="text" class="form-control" name="nip_kepsek" value="<?= isset($profil['nip_kepsek']) ? $profil['nip_kepsek'] : '' ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label fw-semibold">Akreditasi</label>
                        <input type="text" class="form-control" name="akreditasi" value="<?= isset($profil['akreditasi']) ? $profil['akreditasi'] : '' ?>" placeholder="Contoh: A">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label fw-semibold">Kurikulum</label>
                        <input type="text" class="form-control" name="kurikulum" value="<?= isset($profil['kurikulum']) ? $profil['kurikulum'] : '' ?>" placeholder="Contoh: Kurikulum Merdeka">
                    </div>
                </div>
            </div>

            <h6 class="fw-bold text-primary mb-3 border-top pt-4">2. Narasi & Sejarah</h6>
            <div class="row g-3 mb-4">
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label fw-semibold">Sejarah Sekolah</label>
                        <textarea class="form-control summernote" name="sejarah"><?= isset($profil['sejarah']) ? $profil['sejarah'] : '' ?></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label fw-semibold">Visi</label>
                        <textarea class="form-control summernote" name="visi"><?= isset($profil['visi']) ? $profil['visi'] : '' ?></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label fw-semibold">Misi</label>
                        <textarea class="form-control summernote" name="misi"><?= isset($profil['misi']) ? $profil['misi'] : '' ?></textarea>
                    </div>
                </div>
            </div>

            <h6 class="fw-bold text-primary mb-3 border-top pt-4">3. Kontak & Lokasi</h6>
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label fw-semibold">Nomor Telepon</label>
                        <input type="text" class="form-control" name="no_telp" value="<?= isset($profil['no_telp']) ? $profil['no_telp'] : '' ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label fw-semibold">Email Sekolah</label>
                        <input type="email" class="form-control" name="email" value="<?= isset($profil['email']) ? $profil['email'] : '' ?>">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label fw-semibold">Alamat Lengkap</label>
                        <textarea class="form-control" name="alamat" rows="3"><?= isset($profil['alamat']) ? $profil['alamat'] : '' ?></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label fw-semibold">Peta Sekolah (Embed Google Map)</label>
                        <textarea class="form-control" name="peta" rows="4" placeholder="Paste kode <iframe> dari Google Maps di sini"><?= isset($profil['peta']) ? $profil['peta'] : '' ?></textarea>
                    </div>
                </div>
            </div>

            <h6 class="fw-bold text-primary mb-3 border-top pt-4">4. Media Sosial</h6>
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label fw-semibold">Link Facebook</label>
                        <input type="url" class="form-control" name="facebook" value="<?= isset($profil['facebook']) ? $profil['facebook'] : '' ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label fw-semibold">Link Instagram</label>
                        <input type="url" class="form-control" name="instagram" value="<?= isset($profil['instagram']) ? $profil['instagram'] : '' ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label fw-semibold">Link Twitter / X</label>
                        <input type="url" class="form-control" name="twitter" value="<?= isset($profil['twitter']) ? $profil['twitter'] : '' ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label fw-semibold">Link YouTube</label>
                        <input type="url" class="form-control" name="youtube" value="<?= isset($profil['youtube']) ? $profil['youtube'] : '' ?>">
                    </div>
                </div>
            </div>

            <h6 class="fw-bold text-primary mb-3 border-top pt-4">5. Foto & Logo</h6>
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label fw-semibold">Upload Logo Sekolah (PNG/JPG, Max 2MB)</label>
                        <input type="file" class="form-control" name="logo" accept="image/png, image/jpeg">
                        <?php if(isset($profil['logo']) && $profil['logo']): ?>
                            <div class="mt-2 p-2 bg-light rounded-3 d-inline-block">
                                <img src="<?= base_url('uploads/logo/' . $profil['logo']) ?>" height="60" alt="Logo">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label fw-semibold">Upload Foto Kepala Sekolah (PNG/JPG, Max 2MB)</label>
                        <input type="file" class="form-control" name="foto_kepsek" accept="image/png, image/jpeg">
                        <?php if(isset($profil['foto_kepsek']) && $profil['foto_kepsek']): ?>
                            <div class="mt-2 p-2 bg-light rounded-3 d-inline-block">
                                <img src="<?= base_url('uploads/profil/' . $profil['foto_kepsek']) ?>" height="80" alt="Foto Kepsek">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="border-top pt-4 text-end">
                <button type="submit" class="btn btn-primary px-5 py-2 fw-bold rounded-pill"><i class="bi bi-save me-2"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>