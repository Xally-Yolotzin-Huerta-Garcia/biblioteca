<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LibrosSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'titulo'    => 'El principito',
            'autor'    => ' Antoine de Saint-Exupéry',
            'editorial'    => 'Gran Travesía',
            'isvn'    => '637378383',
            'precio'    => '150',
        ];

        // Insertar el nuevo usuario en la tabla 't_libros'
        $this->db->table('t_libros')->insert($data);
    }
}
