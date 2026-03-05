<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title . ' - ' : '' ?><?= isset($profil['nama_sekolah']) ? $profil['nama_sekolah'] : 'Profil Sekolah' ?></title>
    
    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/app.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            background-color: <?= isset($pengaturan['warna_bg']) ? $pengaturan['warna_bg'] : '#ffffff' ?>;
            font-family: 'Nunito', sans-serif;
            overflow-x: hidden;
        }
        .navbar-front {
            background-color: #ffffff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            padding: 15px 0;
            transition: all 0.3s ease;
        }
        .navbar-brand img {
            height: 50px;
            object-fit: contain;
        }
        .navbar-brand span {
            font-weight: 800;
            color: #25396f;
            margin-left: 10px;
            font-size: 1.2rem;
        }
        .nav-link {
            font-weight: 600;
            color: #4f5d77 !important;
            padding: 10px 15px !important;
            transition: color 0.3s;
        }
        .nav-link:hover, .nav-link.active {
            color: #435ebe !important;
        }
        .dropdown-menu {
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        .dropdown-item {
            padding: 10px 20px;
            font-weight: 500;
        }
        .dropdown-item:hover {
            background-color: #f2f7ff;
            color: #435ebe;
        }
        .main-content-front {
            min-height: 70vh;
            padding-top: 100px;
            padding-bottom: 50px;
        }
        .footer-front {
            background-color: #1e2125;
            color: #a8b2bc;
            padding: 60px 0 20px 0;
        }
        .footer-title {
            color: #fff;
            font-weight: 700;
            margin-bottom: 25px;
        }
        .social-links a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.1);
            color: #fff;
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            margin-right: 10px;
            transition: all 0.3s;
        }
        .social-links a:hover {
            background: #435ebe;
            transform: translateY(-3px);
        }
    </style>
</head>
<body>

    <?= $this->include('layout/header_front') ?>

    <main class="main-content-front">
        <div class="container">
            <?= $this->renderSection('content') ?>
        </div>
    </main>

    <?= $this->include('layout/footer_front') ?>

    <script src="<?= base_url('assets/compiled/js/app.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/jquery/jquery.min.js') ?>"></script>
</body>
</html>