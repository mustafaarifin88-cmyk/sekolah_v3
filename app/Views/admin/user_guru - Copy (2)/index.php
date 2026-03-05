<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold"><i class="bi bi-person-badge-fill me-2 text-primary"></i> Data User Guru</h5>
        <a href="<?= base_url('admin/user_guru/create') ?>" class="btn btn-primary rounded-pill fw-semibold"><i class="bi bi-plus-circle me-1"></i> Tambah Akun Guru</a>
    </div>
    <div class="card-body pt-4">
        <div class="table-responsive">
            <table class="table table-hover table-striped datatable" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th width="10%" class="text-center">Foto</th>
                        <th width="25%">Nama Lengkap</th>
                        <th width="20%">Jabatan</th>
                        <th width="15%">Wali Kelas</th>
                        <th width="10%">Username</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($guru)): ?>
                        <?php $no = 1; foreach($guru as $row): ?>
                        <tr>
                            <td class="text-center align-middle"><?= $no++ ?></td>
                            <td class="text-center align-middle">
                                <?php if($row['foto_profil']): ?>
                                    <img src="<?= base_url('uploads/profil/' . $row['foto_profil']) ?>" class="rounded-circle shadow-sm" style="width: 45px; height: 45px; object-fit: cover;">
                                <?php else: ?>
                                    <div class="bg-secondary rounded-circle d-inline-flex align-items-center justify-content-center text-white" style="width: 45px; height: 45px;">
                                        <i class="bi bi-person-fill"></i>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td class="align-middle fw-bold text-dark"><?= $row['nama_lengkap'] ?></td>
                            <td class="align-middle"><?= !empty($row['jabatan']) ? $row['jabatan'] : '-' ?></td>
                            <td class="align-middle">
                                <?php if(!empty($row['kelas_id'])): ?>
                                    <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-2"><i class="bi bi-check-circle-fill me-1"></i> Ya</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill px-3 py-2">Bukan Wali</span>
                                <?php endif; ?>
                            </td>
                            <td class="align-middle font-monospace text-primary"><?= $row['username'] ?></td>
                            <td class="text-center align-middle">
                                <a href="<?= base_url('admin/user_guru/edit/' . $row['id']) ?>" class="btn btn-sm btn-warning rounded-pill px-3 mb-1"><i class="bi bi-pencil-square"></i></a>
                                <a href="<?= base_url('admin/user_guru/delete/' . $row['id']) ?>" class="btn btn-sm btn-danger rounded-pill px-3 mb-1" onclick="return confirm('Yakin ingin menghapus akun guru ini?');"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>