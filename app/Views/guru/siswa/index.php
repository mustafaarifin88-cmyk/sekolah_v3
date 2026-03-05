<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold"><i class="bi bi-people-fill me-2 text-primary"></i> Data Siswa Kelas Saya</h5>
    </div>
    <div class="card-body pt-4">
        <div class="alert alert-info rounded-4 border-0 mb-4">
            <i class="bi bi-info-circle-fill me-2"></i> Anda ditugaskan sebagai <strong>Wali Kelas</strong>. Anda memiliki akses untuk melihat dan mengedit data siswa di kelas yang Anda ampu.
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-striped datatable" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th width="20%">NISN</th>
                        <th width="35%">Nama Lengkap</th>
                        <th width="15%" class="text-center">Jenis Kelamin</th>
                        <th width="15%">Agama</th>
                        <th width="10%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($siswa)): ?>
                        <?php $no = 1; foreach($siswa as $row): ?>
                        <tr>
                            <td class="text-center align-middle"><?= $no++ ?></td>
                            <td class="align-middle fw-bold font-monospace text-primary"><?= $row['nisn'] ?></td>
                            <td class="align-middle fw-semibold text-dark"><?= $row['nama_lengkap'] ?></td>
                            <td class="align-middle text-center fw-bold"><?= $row['jenis_kelamin'] ?></td>
                            <td class="align-middle"><?= $row['agama'] ?></td>
                            <td class="text-center align-middle">
                                <a href="<?= base_url('guru/siswa/edit/' . $row['id']) ?>" class="btn btn-sm btn-warning rounded-pill px-3"><i class="bi bi-pencil-square"></i> Edit</a>
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