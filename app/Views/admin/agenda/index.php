<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold"><i class="bi bi-journal-check me-2 text-primary"></i> Data Agenda Sekolah</h5>
        <a href="<?= base_url('admin/agenda/create') ?>" class="btn btn-primary rounded-pill fw-semibold"><i class="bi bi-plus-circle me-1"></i> Tambah Agenda</a>
    </div>
    <div class="card-body pt-4">
        <div class="table-responsive">
            <table class="table table-hover table-striped datatable" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th width="15%">Poster / Foto</th>
                        <th width="40%">Judul Agenda</th>
                        <th width="20%">Kategori</th>
                        <th width="20%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($agenda)): ?>
                        <?php $no = 1; foreach($agenda as $row): ?>
                        <tr>
                            <td class="text-center align-middle"><?= $no++ ?></td>
                            <td class="align-middle">
                                <?php if(!empty($row['foto'])): ?>
                                    <img src="<?= base_url('uploads/agenda/' . $row['foto']) ?>" class="rounded-3 shadow-sm" style="height: 60px; object-fit: cover; width: 90px;" alt="<?= $row['judul'] ?>">
                                <?php else: ?>
                                    <div class="bg-light rounded-3 d-flex align-items-center justify-content-center text-secondary" style="height: 60px; width: 90px;">
                                        <i class="bi bi-image fs-4"></i>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td class="align-middle fw-semibold"><?= $row['judul'] ?></td>
                            <td class="align-middle"><span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill"><?= $row['nama_kategori'] ?></span></td>
                            <td class="text-center align-middle">
                                <a href="<?= base_url('admin/agenda/edit/' . $row['id']) ?>" class="btn btn-sm btn-warning rounded-pill px-3 mb-1"><i class="bi bi-pencil-square"></i> Edit</a>
                                <a href="<?= base_url('admin/agenda/delete/' . $row['id']) ?>" class="btn btn-sm btn-danger rounded-pill px-3 mb-1" onclick="return confirm('Yakin ingin menghapus data agenda ini?');"><i class="bi bi-trash"></i> Hapus</a>
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