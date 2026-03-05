<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold"><i class="bi bi-diagram-3-fill me-2 text-primary"></i> Data Struktur Organisasi</h5>
        <a href="<?= base_url('admin/struktur/create') ?>" class="btn btn-primary rounded-pill fw-semibold"><i class="bi bi-plus-circle me-1"></i> Tambah Data</a>
    </div>
    <div class="card-body pt-4">
        <div class="table-responsive">
            <table class="table table-hover table-striped datatable" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th width="20%">Foto / Bagan</th>
                        <th width="50%">Judul Struktur</th>
                        <th width="25%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($struktur as $row): ?>
                    <tr>
                        <td class="text-center align-middle"><?= $no++ ?></td>
                        <td class="align-middle">
                            <img src="<?= base_url('uploads/struktur/' . $row['foto']) ?>" class="rounded-3 shadow-sm" style="height: 60px; object-fit: cover; width: 100px;" alt="<?= $row['judul'] ?>">
                        </td>
                        <td class="align-middle fw-semibold"><?= $row['judul'] ?></td>
                        <td class="text-center align-middle">
                            <a href="<?= base_url('admin/struktur/edit/' . $row['id']) ?>" class="btn btn-sm btn-warning rounded-pill px-3"><i class="bi bi-pencil-square"></i> Edit</a>
                            <a href="<?= base_url('admin/struktur/delete/' . $row['id']) ?>" class="btn btn-sm btn-danger rounded-pill px-3" onclick="return confirm('Yakin ingin menghapus data ini?');"><i class="bi bi-trash"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>