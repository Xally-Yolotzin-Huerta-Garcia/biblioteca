<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LibroModel;
class Libros extends Controller{

    public function listar(){
        $libro= new LibroModel();
        $datos ['libros']= $libro->orderBy('id','ASC')->findAll();
        return view('inicio', $datos);
    }

    public function save(){

        if ($this->request->getMethod() === 'post') {
            // Verifica si se ha enviado el formulario POST antes de insertar
            $libro = new LibroModel();
    
            $datos = [
                'titulo' => $this->request->getVar('titulo'),
                'autor' => $this->request->getVar('autor'),
                'editorial' => $this->request->getVar('editorial'),
                'isbn' => $this->request->getVar('isbn'),
                'precio' => $this->request->getVar('precio'),
            ];
    
            $libro->insert($datos);
    
            // Redirige a la página deseada después de la inserción exitosa
            return redirect()->to (base_url('/libros'));
        }
    }

    public function create():string{
        
        return view('save');
    }

    public function delete($id=null){
        $libro = new LibroModel();
        $data=$libro->where('id',$id)->first();

        $libro->where('id',$id)->delete($id);
        return redirect()->to (base_url('/libros'));
    }

    public function edit($id=null){
        
        $libro = new LibroModel();
        $datos['libro']=$libro->where('id',$id)->first();
        return view('edit', $datos);
    }

    public function update(){
        
        $libro = new LibroModel();

        $datos = [
            'titulo' => $this->request->getVar('titulo'),
            'autor' => $this->request->getVar('autor'),
            'editorial' => $this->request->getVar('editorial'),
            'isbn' => $this->request->getVar('isbn'),
            'precio' => $this->request->getVar('precio'),
        ];
        $id= $this->request->getVar('id');
        $libro->update($id, $datos);
        return redirect()->to (base_url('/libros'));
    }
}