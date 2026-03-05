<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 fw-bold"><i class="bi bi-door-open-fill me-2 text-primary"></i> Data Kelas</h5>
                <a href="<?= base_url('admin/kelas/create') ?>" class="btn btn-primary rounded-pill fw-semibold"><i class="bi bi-plus-circle me-1"></i> Tambah Kelas</a>
            </div>
            <div class="card-body pt-4">
                <div class="table-responsive">
                    <table class="table table-hover table-striped datatable" style="width:100%">
                        <thead class="table-light">
                            <tr>
                                <th width="10%" class="text-center">No</th>
                                <th width="60%">Nama Kelas</th>
                                <th width="30%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($kelas)): ?>
                                <?php $no = 1; foreach($kelas as $row): ?>
                                <tr>
                                    <td class="text-center align-middle"><?= $no++ ?></td>
                                    <td class="align-middle fw-semibold fs-5 text-dark">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                                <i class="bi bi-hash"></i>
                                            </div>
                                            <?= $row['nama_kelas'] ?>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <a href="<?= base_url('admin/kelas/edit/' . $row['id']) ?>" class="btn btn-sm btn-warning rounded-pill px-4 mb-1 fw-bold"><i class="bi bi-pencil-square"></i> Edit</a>
                                        <a href="<?= base_url('admin/kelas/delete/' . $row['id']) ?>" class="btn btn-sm btn-danger rounded-pill px-4 mb-1 fw-bold" onclick="return confirm('Yakin ingin menghapus kelas ini? Data siswa terkait dapat terpengaruh.');"><i class="bi bi-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>