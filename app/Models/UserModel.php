<?php

// Archivo: app/Models/UserModel.php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

public function checkCredentials($data)
{
    $user = $this->db->table('t_users');
    $user->where($data);

    return $user->get()->getResultArray();
}

}

