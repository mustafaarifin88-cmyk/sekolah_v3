<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold"><i class="bi bi-newspaper me-2 text-primary"></i> Data Berita Sekolah</h5>
        <a href="<?= base_url('admin/berita/create') ?>" class="btn btn-primary rounded-pill fw-semibold"><i class="bi bi-plus-circle me-1"></i> Tulis Berita</a>
    </div>
    <div class="card-body pt-4">
        <div class="table-responsive">
            <table class="table table-hover table-striped datatable" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th width="15%">Thumbnail</th>
                        <th width="30%">Judul Berita</th>
                        <th width="15%">Kategori</th>
                        <th width="10%">Status</th>
                        <th width="10%">Penulis</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($berita)): ?>
                        <?php $no = 1; foreach($berita as $row): ?>
                        <tr>
                            <td class="text-center align-middle"><?= $no++ ?></td>
                            <td class="align-middle">
                                <img src="<?= base_url('uploads/berita/' . $row['foto']) ?>" class="rounded-3 shadow-sm" style="height: 60px; object-fit: cover; width: 90px;" alt="<?= $row['judul'] ?>">
                            </td>
                            <td class="align-middle fw-semibold"><?= $row['judul'] ?>
                                <br><small class="text-muted"><i class="bi bi-calendar-event"></i> <?= date('d M Y', strtotime($row['tgl_publish'])) ?></small>
                            </td>
                            <td class="align-middle"><?= $row['nama_kategori'] ?></td>
                            <td class="align-middle">
                                <?php if($row['status_publish'] == 'publish'): ?>
                                    <span class="badge bg-success rounded-pill">Publish</span>
                                <?php else: ?>
                                    <span class="badge bg-warning text-dark rounded-pill">Schedule</span>
                                <?php endif; ?>
                            </td>
                            <td class="align-middle"><?= $row['nama_penulis'] ?></td>
                            <td class="text-center align-middle">
                                <a href="<?= base_url('admin/berita/edit/' . $row['id']) ?>" class="btn btn-sm btn-warning rounded-pill px-3 mb-1"><i class="bi bi-pencil-square"></i> Edit</a>
                                <a href="<?= base_url('admin/berita/delete/' . $row['id']) ?>" class="btn btn-sm btn-danger rounded-pill px-3 mb-1" onclick="return confirm('Yakin ingin menghapus berita ini?');"><i class="bi bi-trash"></i> Hapus</a>
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