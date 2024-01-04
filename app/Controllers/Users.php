<?php

// Archivo: app/Controllers/Auth.php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\Validation\Validation;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class Users extends BaseController
{

    public function index(): string
    {
        return view('login');
    }

    public function login()
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
                // Guardar información de autenticación del usuario en la sesión
                session()->set('isLoggedIn', true);
        
                // Redirigir al usuario a la página de libros después de una autenticación exitosa
                return redirect()->to('/libros');
            } else {
                // Inicio de sesión fallido
                $data['error'] = 'Credenciales incorrectas. Por favor, inténtalo de nuevo.';
                return view('login', $data);
            }
        } else {
            // Mostrar errores de validación al usuario
            return view('login', ['validation' => $this->validation]);
        }
    }

    public function logout()
{
    // Cerrar la sesión
    session()->destroy();

    // Redirigir al usuario a la página de login
    return redirect()->to('/');
}

public function forgotPassword()
    {
        return view('forgot-password');

       
    }

    
}

