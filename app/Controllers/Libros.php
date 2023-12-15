<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LibroModel;
class Libros extends Controller{

    public function listar():string{
        $libro= new LibroModel();
        $datos ['libros']= $libro->orderBy('id','ASC')->findAll();
        return view('inicio', $datos);
    }

    public function save(): string{
        return view('save');
    }
}