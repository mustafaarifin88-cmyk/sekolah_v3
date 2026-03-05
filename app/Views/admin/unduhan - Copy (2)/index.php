<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold"><i class="bi bi-cloud-arrow-down-fill me-2 text-primary"></i> Pusat Unduhan File</h5>
        <a href="<?= base_url('admin/unduhan/create') ?>" class="btn btn-primary rounded-pill fw-semibold"><i class="bi bi-plus-circle me-1"></i> Tambah File</a>
    </div>
    <div class="card-body pt-4">
        <div class="table-responsive">
            <table class="table table-hover table-striped datatable" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th width="30%">Judul File</th>
                        <th width="30%">Keterangan</th>
                        <th width="15%" class="text-center">Preview/Unduh</th>
                        <th width="20%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($unduhan)): ?>
                        <?php $no = 1; foreach($unduhan as $row): ?>
                        <tr>
                            <td class="text-center align-middle"><?= $no++ ?></td>
                            <td class="align-middle fw-semibold"><?= $row['judul'] ?></td>
                            <td class="align-middle"><?= !empty($row['keterangan']) ? $row['keterangan'] : '-' ?></td>
                            <td class="text-center align-middle">
                                <a href="<?= base_url('uploads/dokumen/' . $row['file_path']) ?>" target="_blank" class="btn btn-sm btn-info rounded-pill text-white px-3"><i class="bi bi-download"></i> Unduh</a>
                            </td>
                            <td class="text-center align-middle">
                                <a href="<?= base_url('admin/unduhan/edit/' . $row['id']) ?>" class="btn btn-sm btn-warning rounded-pill px-3 mb-1"><i class="bi bi-pencil-square"></i> Edit</a>
                                <a href="<?= base_url('admin/unduhan/delete/' . $row['id']) ?>" class="btn btn-sm btn-danger rounded-pill px-3 mb-1" onclick="return confirm('Yakin ingin menghapus file ini?');"><i class="bi bi-trash"></i> Hapus</a>
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