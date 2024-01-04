<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 't_users'; // tabla de usuarios
    protected $primaryKey = 'id'; // Clave primaria

    // Especifica los campos permitidos para asignación masiva
    protected $allowedFields = ['correo', 'password'];

    public function checkCredentials($correo, $password)
    {
        $user = $this->where('correo', $correo)->first();

        // Verificar si se encontró un usuario con el correo proporcionado
        if ($user) {
            // Comparar la contraseña hasheada almacenada con la contraseña proporcionada
            $storedPassword = $user['password']; // Suponiendo que el campo de la contraseña se llama 'password'

            // Verificar si la contraseña proporcionada coincide con la almacenada
            if (password_verify($password, $storedPassword)) {
                // Contraseña válida
                return $user; // Retorna los datos del usuario si las credenciales son correctas
            }
        }

        return null; // Si las credenciales son incorrectas o el usuario no existe, devuelve null
    }
}
