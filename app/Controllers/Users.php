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
    public function resetPassword(){

    $correo = $this->request->getPost('correo');

    $userModel = new UserModel();
    $user = $userModel->where('correo', $correo)->first();

    if ($user) {
        // Genera una nueva contraseña temporal
        $newPassword = bin2hex(random_bytes(8)); // Genera una contraseña aleatoria

        // Actualiza la contraseña en la base de datos
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $userModel->update($user['id'], ['password' => $hashedPassword]);

        // Enviar correo electrónico utilizando PHPMailer
        $mail = new PHPMailer(true); // Activa excepciones

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'yotzysalazar@gmail.com'; // Tu dirección de correo
            $mail->Password = 'Xally2001'; // Tu contraseña de correo
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('yotzysalazar@gmail.com', 'Huerta Garcia Xally Yolotzin');
            $mail->addAddress($correo);
            $mail->Subject = 'Restablecimiento de Contraseña';
            $mail->Body = 'Tu nueva contraseña es: ' . $newPassword;

            $mail->send();
            
            echo 'Se ha enviado un correo electrónico con instrucciones para restablecer tu contraseña.';
        } catch (Exception $e) {
            echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
        }
    } else {
        echo 'El correo electrónico proporcionado no está registrado en nuestra plataforma.';
    }
}

    
}

