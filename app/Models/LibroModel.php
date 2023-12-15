<?php 
namespace App\Models;

use CodeIgniter\Model;

class LibroModel extends Model{
    protected $table      = 't_libros';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields= ['titulo','autor','editorial','isvn', 'precio'];
}