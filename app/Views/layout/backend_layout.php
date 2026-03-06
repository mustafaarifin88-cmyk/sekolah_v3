<?php $dbProfil = (new \App\Models\ProfilSekolahModel())->first(); ?>
<!DOCTYPE html>
<html lang="id" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'Panel Sekolah' ?></title>
    
    <?php if(isset($dbProfil['logo']) && $dbProfil['logo']): ?>
        <link rel="shortcut icon" href="<?= base_url('uploads/logo/' . $dbProfil['logo']) ?>" type="image/x-icon">
        <link rel="icon" href="<?= base_url('uploads/logo/' . $dbProfil['logo']) ?>" type="image/x-icon">
    <?php endif; ?>
    
    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/app.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/app-dark.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/iconly.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/table-datatable.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/extensions/summernote/summernote-lite.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
</head>
<body>
    <script src="<?= base_url('assets/static/js/initTheme.js') ?>"></script>
    <div id="app">
        <?php 
            if (session()->get('role') == 'admin') {
                echo $this->include('layout/sidebar_admin');
            } else {
                echo $this->include('layout/sidebar_guru');
            }
        ?>
        <div id="main" class='layout-navbar navbar-fixed'>
            <?= $this->include('layout/topbar_backend') ?>
            <div id="main-content">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3><?= isset($title) ? $title : '' ?></h3>
                            </div>
                        </div>
                    </div>
                    <section class="section mt-4">
                        <?php if(session()->getFlashdata('success')): ?>
                            <div class="alert alert-success alert-dismissible show fade rounded-4 shadow-sm">
                                <i class="bi bi-check-circle me-2"></i> <?= session()->getFlashdata('success') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <?php if(session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger alert-dismissible show fade rounded-4 shadow-sm">
                                <i class="bi bi-exclamation-circle me-2"></i> <?= session()->getFlashdata('error') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <?= $this->renderSection('content') ?>
                    </section>
                </div>

                <footer>
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p><?= date('Y') ?> &copy; <?= isset($dbProfil['nama_sekolah']) ? $dbProfil['nama_sekolah'] : 'Sistem Sekolah' ?></p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/static/js/components/dark.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>
    <script src="<?= base_url('assets/compiled/js/app.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/summernote/summernote-lite.min.js') ?>"></script>
    <script>
        $(document).ready(function() {
            $('.datatable').DataTable();
            $('.summernote').summernote({
                height: 300, // Sedikit ditinggikan agar lebih nyaman
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    // Menambahkan 'picture' dan 'video' ke dalam grup 'insert'
                    ['insert', ['link', 'picture', 'video']], 
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                // Tambahan opsional: Mengatur pesan placeholder saat editor kosong
                placeholder: 'Ketikkan isi konten di sini...',
                // Pastikan gambar yang diupload otomatis diresize jika terlalu besar (opsional tapi disarankan)
                callbacks: {
                    onImageUpload: function(files) {
                        // Jika Anda ingin membuat fitur upload gambar langsung ke server, 
                        // Anda harus menambahkan AJAX handler di sini. 
                        // Namun secara default, Summernote akan mengubah gambar menjadi base64 text.
                    }
                }
            });
        });
    </script>
</body>
</html>