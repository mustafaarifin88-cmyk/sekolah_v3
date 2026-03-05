<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

abstract class BaseController extends Controller
{
    protected $request;
    protected $helpers = ['form', 'url', 'file'];
    protected $globalData = [];

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        
        $session = \Config\Services::session();

        $profilModel = new \App\Models\ProfilSekolahModel();
        $pengaturanModel = new \App\Models\PengaturanModel();
        $menuEksternalModel = new \App\Models\MenuEksternalModel();

        $this->globalData = [
            'profil' => $profilModel->first(),
            'pengaturan' => $pengaturanModel->first(),
            'menu_eksternal' => $menuEksternalModel->findAll()
        ];
    }
}