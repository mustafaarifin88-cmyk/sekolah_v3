<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold"><i class="bi bi-envelope-paper-fill me-2 text-primary"></i> Pesan Kotak Saran</h5>
    </div>
    <div class="card-body pt-4">
        <div class="table-responsive">
            <table class="table table-hover table-striped datatable" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th width="15%">Tanggal Masuk</th>
                        <th width="20%">Nama Pengirim</th>
                        <th width="20%">Email</th>
                        <th width="25%">Cuplikan Pesan</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($saran)): ?>
                        <?php $no = 1; foreach($saran as $row): ?>
                        <tr>
                            <td class="text-center align-middle"><?= $no++ ?></td>
                            <td class="align-middle"><small class="text-muted fw-bold"><?= date('d/m/Y H:i', strtotime($row['created_at'])) ?></small></td>
                            <td class="align-middle fw-semibold"><?= $row['nama'] ?></td>
                            <td class="align-middle"><?= !empty($row['email']) ? $row['email'] : '<span class="text-muted fst-italic">Tidak disertakan</span>' ?></td>
                            <td class="align-middle text-truncate" style="max-width: 200px;">
                                <?= strip_tags($row['pesan']) ?>
                            </td>
                            <td class="text-center align-middle">
                                <a href="<?= base_url('admin/kotak_saran/detail/' . $row['id']) ?>" class="btn btn-sm btn-info text-white rounded-pill px-3 mb-1"><i class="bi bi-eye"></i> Baca</a>
                                <a href="<?= base_url('admin/kotak_saran/delete/' . $row['id']) ?>" class="btn btn-sm btn-danger rounded-pill px-3 mb-1" onclick="return confirm('Yakin ingin menghapus pesan ini secara permanen?');"><i class="bi bi-trash"></i> Hapus</a>
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