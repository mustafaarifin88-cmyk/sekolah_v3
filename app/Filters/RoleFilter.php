<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('auth/login'));
        }

        $role = session()->get('role');

        if ($arguments && !in_array($role, $arguments)) {
            if ($role == 'admin') {
                return redirect()->to(base_url('admin/dashboard'));
            } elseif ($role == 'guru') {
                return redirect()->to(base_url('guru/dashboard'));
            }
            return redirect()->to(base_url('/'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}