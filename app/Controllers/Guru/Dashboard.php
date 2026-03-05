<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard Guru'
        ];
        return view('guru/dashboard/index', $data);
    }
}