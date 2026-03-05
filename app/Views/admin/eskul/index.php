<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold"><i class="bi bi-dribbble me-2 text-primary"></i> Data Ekstrakurikuler</h5>
        <a href="<?= base_url('admin/eskul/create') ?>" class="btn btn-primary rounded-pill fw-semibold"><i class="bi bi-plus-circle me-1"></i> Tambah Data</a>
    </div>
    <div class="card-body pt-4">
        <div class="table-responsive">
            <table class="table table-hover table-striped datatable" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th width="15%">Foto/Logo</th>
                        <th width="25%">Nama Ekstrakurikuler</th>
                        <th width="20%">Kategori</th>
                        <th width="20%">Guru Pembimbing</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($eskul)): ?>
                        <?php $no = 1; foreach($eskul as $row): ?>
                        <tr>
                            <td class="text-center align-middle"><?= $no++ ?></td>
                            <td class="align-middle">
                                <img src="<?= base_url('uploads/eskul/' . $row['foto']) ?>" class="rounded-3 shadow-sm" style="height: 60px; object-fit: cover; width: 60px;" alt="<?= $row['nama_ekstrakurikuler'] ?>">
                            </td>
                            <td class="align-middle fw-semibold"><?= $row['nama_ekstrakurikuler'] ?></td>
                            <td class="align-middle"><span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill"><?= $row['nama_kategori'] ?></span></td>
                            <td class="align-middle"><?= $row['nama_guru_pembimbing'] ?></td>
                            <td class="text-center align-middle">
                                <a href="<?= base_url('admin/eskul/edit/' . $row['id']) ?>" class="btn btn-sm btn-warning rounded-pill px-3 mb-1"><i class="bi bi-pencil-square"></i> Edit</a>
                                <a href="<?= base_url('admin/eskul/delete/' . $row['id']) ?>" class="btn btn-sm btn-danger rounded-pill px-3 mb-1" onclick="return confirm('Yakin ingin menghapus data ekstrakurikuler ini?');"><i class="bi bi-trash"></i> Hapus</a>
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