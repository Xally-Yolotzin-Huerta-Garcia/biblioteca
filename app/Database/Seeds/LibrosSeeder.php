<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LibrosSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'titulo'    => 'Secreto a voces',
            'autor'    => 'Belva Plain',
            'editorial'    => 'Naranja',
            'isbn'    => '7363838237',
            'precio'    => '225',
        ];

        // Insertar el nuevo usuario en la tabla 't_libros'
        $this->db->table('t_libros')->insert($data);
    }
}
