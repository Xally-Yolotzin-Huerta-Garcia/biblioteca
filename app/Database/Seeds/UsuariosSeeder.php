<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'correo'    => 'xallygar@gmail.com',
            'password' => password_hash('1234', PASSWORD_DEFAULT),
        ];

        // Insertar el nuevo usuario en la tabla 't_users'
        $this->db->table('t_users')->insert($data);
    }
}
