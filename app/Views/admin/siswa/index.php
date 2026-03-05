<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center flex-wrap gap-2">
        <h5 class="card-title mb-0 fw-bold"><i class="bi bi-people-fill me-2 text-primary"></i> Data Siswa Aktif</h5>
        <div>
            <a href="<?= base_url('admin/siswa/import') ?>" class="btn btn-success rounded-pill fw-bold shadow-sm me-2"><i class="bi bi-file-earmark-excel-fill me-1"></i> Import Excel</a>
            <a href="<?= base_url('admin/siswa/create') ?>" class="btn btn-primary rounded-pill fw-bold shadow-sm"><i class="bi bi-plus-circle me-1"></i> Tambah Siswa</a>
        </div>
    </div>
    <div class="card-body pt-4">
        <div class="table-responsive">
            <table class="table table-hover table-striped datatable" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th width="15%">NISN</th>
                        <th width="30%">Nama Lengkap</th>
                        <th width="15%">Kelas</th>
                        <th width="10%">L/P</th>
                        <th width="10%">Agama</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($siswa)): ?>
                        <?php $no = 1; foreach($siswa as $row): ?>
                        <tr>
                            <td class="text-center align-middle"><?= $no++ ?></td>
                            <td class="align-middle fw-bold font-monospace"><?= $row['nisn'] ?></td>
                            <td class="align-middle fw-semibold text-dark"><?= $row['nama_lengkap'] ?></td>
                            <td class="align-middle"><span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill"><?= $row['nama_kelas'] ?></span></td>
                            <td class="align-middle text-center fw-bold text-secondary"><?= $row['jenis_kelamin'] ?></td>
                            <td class="align-middle"><?= $row['agama'] ?></td>
                            <td class="text-center align-middle">
                                <a href="<?= base_url('admin/siswa/edit/' . $row['id']) ?>" class="btn btn-sm btn-warning rounded-pill px-3 mb-1"><i class="bi bi-pencil-square"></i></a>
                                <a href="<?= base_url('admin/siswa/delete/' . $row['id']) ?>" class="btn btn-sm btn-danger rounded-pill px-3 mb-1" onclick="return confirm('Yakin ingin menghapus data siswa ini?');"><i class="bi bi-trash"></i></a>
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