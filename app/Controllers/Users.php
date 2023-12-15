<?php

// Archivo: app/Controllers/Auth.php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Users extends BaseController
{

    public function index(): string
    {
        return view('login');
    }

    public function doLogin()
    {
        // Cargar la librería de validación si aún no está cargada
        if (!isset($this->validation)) {
            $this->validation = \Config\Services::validation();
        }
    
        // Configurar reglas de validación
        $rules = [
            'correo' => 'required|valid_email',
            'password' => 'required',
        ];
    
        $messages = [
            'correo' => [
                'required' => 'El campo correo es obligatorio.',
                'valid_email' => 'Por favor, ingresa un correo electrónico válido.',
            ],
            'password' => [
                'required' => 'El campo contraseña es obligatorio.',
            ],
        ];
    
        $this->validation->setRules($rules, $messages);
    
        // Ejecutar la validación
        if ($this->validation->withRequest($this->request)->run()) {
            // Obtener las credenciales del formulario
            $correo = $this->request->getPost('correo');
            $password = $this->request->getPost('password');
    
            // Verificar las credenciales con el modelo de usuario
            $userModel = new UserModel();
            $user = $userModel->checkCredentials($correo, $password);
    
            if ($user) {
                // Inicio de sesión exitoso
                // Puedes almacenar información del usuario en la sesión si es necesario
                return redirect()->to(base_url());
    
            } else {
                // Inicio de sesión fallido
                echo 'Credenciales incorrectas. Por favor, inténtalo de nuevo.';
            }
        } else {
            // Mostrar errores de validación al usuario
            return view('login', ['validation' => $this->validation]);
        }
    }
    
}

