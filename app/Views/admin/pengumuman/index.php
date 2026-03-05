<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold"><i class="bi bi-megaphone-fill me-2 text-primary"></i> Data Pengumuman</h5>
        <a href="<?= base_url('admin/pengumuman/create') ?>" class="btn btn-primary rounded-pill fw-semibold"><i class="bi bi-plus-circle me-1"></i> Buat Pengumuman</a>
    </div>
    <div class="card-body pt-4">
        <div class="table-responsive">
            <table class="table table-hover table-striped datatable" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th width="35%">Judul Pengumuman</th>
                        <th width="15%">Kategori</th>
                        <th width="15%">Waktu Publish</th>
                        <th width="10%">Status</th>
                        <th width="20%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($pengumuman)): ?>
                        <?php $no = 1; foreach($pengumuman as $row): ?>
                        <tr>
                            <td class="text-center align-middle"><?= $no++ ?></td>
                            <td class="align-middle fw-semibold text-wrap"><?= $row['judul'] ?></td>
                            <td class="align-middle"><?= $row['nama_kategori'] ?></td>
                            <td class="align-middle"><small><i class="bi bi-clock me-1 text-secondary"></i> <?= date('d M Y H:i', strtotime($row['tgl_publish'])) ?></small></td>
                            <td class="align-middle">
                                <?php if($row['status_publish'] == 'publish'): ?>
                                    <span class="badge bg-success rounded-pill px-3">Publish</span>
                                <?php else: ?>
                                    <span class="badge bg-warning text-dark rounded-pill px-3">Schedule</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center align-middle">
                                <a href="<?= base_url('admin/pengumuman/edit/' . $row['id']) ?>" class="btn btn-sm btn-warning rounded-pill px-3 mb-1"><i class="bi bi-pencil-square"></i> Edit</a>
                                <a href="<?= base_url('admin/pengumuman/delete/' . $row['id']) ?>" class="btn btn-sm btn-danger rounded-pill px-3 mb-1" onclick="return confirm('Yakin ingin menghapus pengumuman ini?');"><i class="bi bi-trash"></i> Hapus</a>
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