<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Verificar si el usuario está autenticado
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/'); // Redirigir al login si el usuario no está autenticado
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Hacer algo después de que la solicitud ha sido manejada
    }
}
