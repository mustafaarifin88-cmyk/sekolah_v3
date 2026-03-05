<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('auth/login', 'Auth::login');
$routes->post('auth/process', 'Auth::process');
$routes->get('auth/logout', 'Auth::logout');

$routes->group('', ['namespace' => 'App\Controllers\Front'], function ($routes) {
    $routes->get('profil/sejarah', 'Profil::sejarah');
    $routes->get('profil/visi-misi', 'Profil::visi_misi');
    $routes->get('profil/struktur', 'Profil::struktur');
    $routes->get('profil/fasilitas', 'Profil::fasilitas_list');
    $routes->get('profil/fasilitas/(:num)', 'Profil::fasilitas_detail/$1');
    $routes->get('profil/akreditasi', 'Profil::akreditasi');

    $routes->get('akademik/kurikulum', 'Akademik::kurikulum');
    $routes->get('akademik/kalender', 'Akademik::kalender');
    $routes->get('akademik/program', 'Akademik::program_list');
    $routes->get('akademik/program/(:num)', 'Akademik::program_detail/$1');
    $routes->get('akademik/ekstrakurikuler', 'Akademik::eskul_list');
    $routes->get('akademik/ekstrakurikuler/(:num)', 'Akademik::eskul_detail/$1');

    $routes->get('informasi/berita', 'Informasi::berita_list');
    $routes->get('informasi/berita/(:segment)', 'Informasi::berita_detail/$1');
    $routes->get('informasi/pengumuman', 'Informasi::pengumuman_list');
    $routes->get('informasi/pengumuman/(:segment)', 'Informasi::pengumuman_detail/$1');
    $routes->get('informasi/galeri-foto', 'Informasi::galeri_foto');
    $routes->get('informasi/galeri-video', 'Informasi::galeri_video');
    $routes->get('informasi/prestasi', 'Informasi::prestasi_list');
    $routes->get('informasi/prestasi/(:num)', 'Informasi::prestasi_detail/$1');
    $routes->get('informasi/agenda', 'Informasi::agenda_list');
    $routes->get('informasi/agenda/(:num)', 'Informasi::agenda_detail/$1');

    $routes->get('kontak', 'Kontak::index');
    $routes->post('kontak/simpan_saran', 'Kontak::simpan_saran');
});

$routes->group('admin', ['filter' => 'role:admin', 'namespace' => 'App\Controllers\Admin'], function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');

    $routes->get('profil_sekolah/edit', 'ProfilSekolah::edit');
    $routes->post('profil_sekolah/update', 'ProfilSekolah::update');

    $routes->get('pengaturan/warna_bg', 'Pengaturan::warna_bg');
    $routes->post('pengaturan/update_warna', 'Pengaturan::update_warna');

    $routes->get('siswa/import', 'Siswa::import');
    $routes->get('siswa/download_template', 'Siswa::download_template');
    $routes->post('siswa/process_import', 'Siswa::process_import');

    $routes->get('kotak_saran', 'KotakSaran::index');
    $routes->get('kotak_saran/detail/(:num)', 'KotakSaran::detail/$1');
    $routes->get('kotak_saran/delete/(:num)', 'KotakSaran::delete/$1');

    $adminControllers = [
        'struktur'             => 'Struktur',
        'fasilitas'            => 'Fasilitas',
        'kategori_fasilitas'   => 'KategoriFasilitas',
        'kalender'             => 'Kalender',
        'program'              => 'Program',
        'kategori_program'     => 'KategoriProgram',
        'ekstrakurikuler'      => 'Ekstrakurikuler',
        'kategori_eskul'       => 'KategoriEskul',
        'unduhan'              => 'Unduhan',
        'berita'               => 'Berita',
        'kategori_berita'      => 'KategoriBerita',
        'pengumuman'           => 'Pengumuman',
        'kategori_pengumuman'  => 'KategoriPengumuman',
        'galeri_foto'          => 'GaleriFoto',
        'galeri_video'         => 'GaleriVideo',
        'prestasi'             => 'Prestasi',
        'kategori_prestasi'    => 'KategoriPrestasi',
        'agenda'               => 'Agenda',
        'kategori_agenda'      => 'KategoriAgenda',
        'kelas'                => 'Kelas',
        'siswa'                => 'Siswa',
        'user_guru'            => 'UserGuru',
        'user_admin'           => 'UserAdmin',
        'slideshow'            => 'SlideShow',
        'menu_eksternal'       => 'MenuEksternal'
    ];

    foreach ($adminControllers as $uri => $controller) {
        $routes->get($uri, "$controller::index");
        $routes->get("$uri/create", "$controller::create");
        $routes->post("$uri/store", "$controller::store");
        $routes->get("$uri/edit/(:num)", "$controller::edit/$1");
        $routes->post("$uri/update/(:num)", "$controller::update/$1");
        $routes->get("$uri/delete/(:num)", "$controller::delete/$1");
    }
});

$routes->group('guru', ['filter' => 'role:guru', 'namespace' => 'App\Controllers\Guru'], function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');

    $routes->get('profil/edit', 'Profil::edit');
    $routes->post('profil/update', 'Profil::update');

    $routes->get('siswa', 'Siswa::index');
    $routes->get('siswa/edit/(:num)', 'Siswa::edit/$1');
    $routes->post('siswa/update/(:num)', 'Siswa::update/$1');

    $guruControllers = [
        'berita'       => 'Berita',
        'pengumuman'   => 'Pengumuman',
        'galeri_foto'  => 'GaleriFoto',
        'galeri_video' => 'GaleriVideo'
    ];

    foreach ($guruControllers as $uri => $controller) {
        $routes->get($uri, "$controller::index");
        $routes->get("$uri/create", "$controller::create");
        $routes->post("$uri/store", "$controller::store");
        $routes->get("$uri/edit/(:num)", "$controller::edit/$1");
        $routes->post("$uri/update/(:num)", "$controller::update/$1");
        $routes->get("$uri/delete/(:num)", "$controller::delete/$1");
    }
});