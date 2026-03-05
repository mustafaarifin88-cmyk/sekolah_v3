<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold"><i class="bi bi-trophy-fill me-2 text-warning"></i> Data Prestasi</h5>
        <a href="<?= base_url('admin/prestasi/create') ?>" class="btn btn-primary rounded-pill fw-semibold"><i class="bi bi-plus-circle me-1"></i> Tambah Prestasi</a>
    </div>
    <div class="card-body pt-4">
        <div class="table-responsive">
            <table class="table table-hover table-striped datatable" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th width="25%">Judul Prestasi</th>
                        <th width="15%">Kategori</th>
                        <th width="15%">Nama Penerima</th>
                        <th width="15%">Peringkat/Hadiah</th>
                        <th width="10%">Tanggal</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($prestasi)): ?>
                        <?php $no = 1; foreach($prestasi as $row): ?>
                        <tr>
                            <td class="text-center align-middle"><?= $no++ ?></td>
                            <td class="align-middle fw-bold text-dark"><?= $row['judul'] ?>
                                <br><small class="text-muted fw-normal"><i class="bi bi-building"></i> <?= $row['penyelenggara'] ?></small>
                            </td>
                            <td class="align-middle"><span class="badge bg-light text-dark border rounded-pill"><?= $row['nama_kategori'] ?></span></td>
                            <td class="align-middle fw-semibold"><?= $row['nama_penerima'] ?></td>
                            <td class="align-middle text-success fw-bold"><?= $row['hadiah'] ?></td>
                            <td class="align-middle"><?= date('d/m/Y', strtotime($row['tgl_penerimaan'])) ?></td>
                            <td class="text-center align-middle">
                                <a href="<?= base_url('admin/prestasi/edit/' . $row['id']) ?>" class="btn btn-sm btn-warning rounded-pill px-3 mb-1"><i class="bi bi-pencil-square"></i> Edit</a>
                                <a href="<?= base_url('admin/prestasi/delete/' . $row['id']) ?>" class="btn btn-sm btn-danger rounded-pill px-3 mb-1" onclick="return confirm('Yakin ingin menghapus data prestasi ini?');"><i class="bi bi-trash"></i> Hapus</a>
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