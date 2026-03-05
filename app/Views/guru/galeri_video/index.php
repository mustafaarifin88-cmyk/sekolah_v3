<?= $this->extend('layout/backend_layout') ?>

<?= $this->section('content') ?>
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-bottom pb-3 pt-4 d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold"><i class="bi bi-play-btn-fill me-2 text-danger"></i> Data Galeri Video</h5>
        <a href="<?= base_url('guru/galeri_video/create') ?>" class="btn btn-primary rounded-pill fw-semibold"><i class="bi bi-plus-circle me-1"></i> Tambah Video</a>
    </div>
    <div class="card-body pt-4">
        <div class="table-responsive">
            <table class="table table-hover table-striped datatable" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th width="15%">Thumbnail</th>
                        <th width="30%">Judul Video</th>
                        <th width="20%">Link YouTube</th>
                        <th width="15%">Pengunggah</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($galeri)): ?>
                        <?php $no = 1; foreach($galeri as $row): ?>
                        <tr>
                            <td class="text-center align-middle"><?= $no++ ?></td>
                            <td class="align-middle">
                                <div class="position-relative d-inline-block">
                                    <img src="<?= base_url('uploads/galeri/' . $row['thumbnail']) ?>" class="rounded-3 shadow-sm border" style="height: 60px; object-fit: cover; width: 90px;" alt="<?= $row['judul'] ?>">
                                    <div class="position-absolute top-50 start-50 translate-middle">
                                        <i class="bi bi-play-circle-fill text-white fs-4 opacity-75"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle fw-semibold"><?= $row['judul'] ?></td>
                            <td class="align-middle">
                                <a href="<?= $row['link_youtube'] ?>" target="_blank" class="btn btn-sm btn-outline-danger rounded-pill"><i class="bi bi-youtube"></i> Tonton</a>
                            </td>
                            <td class="align-middle"><i class="bi bi-person-circle me-1 text-secondary"></i> <?= $row['nama_penulis'] ?></td>
                            <td class="text-center align-middle">
                                <a href="<?= base_url('guru/galeri_video/edit/' . $row['id']) ?>" class="btn btn-sm btn-warning rounded-pill px-3 mb-1"><i class="bi bi-pencil-square"></i> Edit</a>
                                <a href="<?= base_url('guru/galeri_video/delete/' . $row['id']) ?>" class="btn btn-sm btn-danger rounded-pill px-3 mb-1" onclick="return confirm('Yakin ingin menghapus video ini dari galeri?');"><i class="bi bi-trash"></i> Hapus</a>
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