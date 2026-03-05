<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold"><i class="bi bi-images me-2 text-primary"></i> Data Galeri Foto</h5>
        <a href="<?= base_url('admin/galeri_foto/create') ?>" class="btn btn-primary rounded-pill fw-semibold"><i class="bi bi-plus-circle me-1"></i> Upload Foto</a>
    </div>
    <div class="card-body pt-4">
        <div class="table-responsive">
            <table class="table table-hover table-striped datatable" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th width="15%">Preview Foto</th>
                        <th width="30%">Judul / Caption</th>
                        <th width="20%">Pengunggah</th>
                        <th width="15%">Tanggal Upload</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($galeri)): ?>
                        <?php $no = 1; foreach($galeri as $row): ?>
                        <tr>
                            <td class="text-center align-middle"><?= $no++ ?></td>
                            <td class="align-middle">
                                <a href="<?= base_url('uploads/galeri/' . $row['foto']) ?>" target="_blank">
                                    <img src="<?= base_url('uploads/galeri/' . $row['foto']) ?>" class="rounded-3 shadow-sm border" style="height: 60px; object-fit: cover; width: 90px;" alt="<?= $row['judul'] ?>">
                                </a>
                            </td>
                            <td class="align-middle fw-semibold"><?= $row['judul'] ?></td>
                            <td class="align-middle"><i class="bi bi-person-circle me-1 text-secondary"></i> <?= $row['nama_penulis'] ?></td>
                            <td class="align-middle"><small><?= date('d M Y, H:i', strtotime($row['created_at'])) ?></small></td>
                            <td class="text-center align-middle">
                                <a href="<?= base_url('admin/galeri_foto/edit/' . $row['id']) ?>" class="btn btn-sm btn-warning rounded-pill px-3 mb-1"><i class="bi bi-pencil-square"></i> Edit</a>
                                <a href="<?= base_url('admin/galeri_foto/delete/' . $row['id']) ?>" class="btn btn-sm btn-danger rounded-pill px-3 mb-1" onclick="return confirm('Yakin ingin menghapus foto ini dari galeri?');"><i class="bi bi-trash"></i> Hapus</a>
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