<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 fw-bold"><i class="bi bi-tags-fill me-2 text-primary"></i> Kategori Ekstrakurikuler</h5>
                <a href="<?= base_url('admin/kategori_eskul/create') ?>" class="btn btn-primary rounded-pill fw-semibold"><i class="bi bi-plus-circle me-1"></i> Tambah Kategori</a>
            </div>
            <div class="card-body pt-4">
                <div class="table-responsive">
                    <table class="table table-hover table-striped datatable" style="width:100%">
                        <thead class="table-light">
                            <tr>
                                <th width="5%" class="text-center">No</th>
                                <th width="35%">Nama Kategori</th>
                                <th width="40%">Keterangan</th>
                                <th width="20%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($kategori)): ?>
                                <?php $no = 1; foreach($kategori as $row): ?>
                                <tr>
                                    <td class="text-center align-middle"><?= $no++ ?></td>
                                    <td class="align-middle fw-semibold">
                                        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill"><?= $row['nama_kategori'] ?></span>
                                    </td>
                                    <td class="align-middle"><?= !empty($row['keterangan']) ? $row['keterangan'] : '-' ?></td>
                                    <td class="text-center align-middle">
                                        <a href="<?= base_url('admin/kategori_eskul/edit/' . $row['id']) ?>" class="btn btn-sm btn-warning rounded-pill px-3 mb-1"><i class="bi bi-pencil-square"></i> Edit</a>
                                        <a href="<?= base_url('admin/kategori_eskul/delete/' . $row['id']) ?>" class="btn btn-sm btn-danger rounded-pill px-3 mb-1" onclick="return confirm('Yakin menghapus kategori ini? Data ekstrakurikuler terkait mungkin akan terpengaruh.');"><i class="bi bi-trash"></i> Hapus</a>
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