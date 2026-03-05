<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 fw-bold"><i class="bi bi-link-45deg me-2 text-primary"></i> Data & Layanan Eksternal</h5>
                <a href="<?= base_url('admin/menu_eksternal/create') ?>" class="btn btn-primary rounded-pill fw-semibold"><i class="bi bi-plus-circle me-1"></i> Tambah Link</a>
            </div>
            <div class="card-body pt-4">
                <div class="alert alert-info rounded-4 border-0 mb-4">
                    <i class="bi bi-info-circle-fill me-2"></i> Menu ini akan ditampilkan pada *dropdown* <strong>Data & Layanan</strong> di halaman navigasi pengunjung.
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-striped datatable" style="width:100%">
                        <thead class="table-light">
                            <tr>
                                <th width="10%" class="text-center">No</th>
                                <th width="35%">Judul Label Menu</th>
                                <th width="35%">URL / Link Tujuan</th>
                                <th width="20%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($menu)): ?>
                                <?php $no = 1; foreach($menu as $row): ?>
                                <tr>
                                    <td class="text-center align-middle"><?= $no++ ?></td>
                                    <td class="align-middle fw-bold text-dark"><?= $row['judul'] ?></td>
                                    <td class="align-middle"><a href="<?= $row['url'] ?>" target="_blank" class="text-decoration-none text-primary"><i class="bi bi-box-arrow-up-right me-1"></i> <?= $row['url'] ?></a></td>
                                    <td class="text-center align-middle">
                                        <a href="<?= base_url('admin/menu_eksternal/edit/' . $row['id']) ?>" class="btn btn-sm btn-warning rounded-pill px-3 mb-1"><i class="bi bi-pencil-square"></i></a>
                                        <a href="<?= base_url('admin/menu_eksternal/delete/' . $row['id']) ?>" class="btn btn-sm btn-danger rounded-pill px-3 mb-1" onclick="return confirm('Hapus menu eksternal ini?');"><i class="bi bi-trash"></i></a>
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