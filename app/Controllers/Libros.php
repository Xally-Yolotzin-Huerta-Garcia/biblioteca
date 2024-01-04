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

   /* 
   //funcion delete antes de agregar modal
   public function delete($id=null){
        $libro = new LibroModel();
        $data=$libro->where('id',$id)->first();

        $libro->where('id',$id)->delete($id);
        return redirect()->to (base_url('/libros'));
    }*/

    //funcion delete despues de agregar modal
    public function delete($id = null) {
        $libro = new LibroModel();
        $data = $libro->find($id);
    
        if ($data) {
            $libro->delete($id);
            return redirect()->to(base_url('/libros'));
        }
    
        // Manejo de errores o redirección si es necesario
        return redirect()->to(base_url('/libros'));
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



    public function search() {
        $searchTerm = $this->request->getGet('searchTerm'); // Obtener el término de búsqueda desde la solicitud GET
    
        // Lógica para buscar libros según el término de búsqueda en tu base de datos
        $libroModel = new LibroModel(); // Suponiendo que 'LibroModel' es tu modelo
    
        // Realizar la búsqueda en la base de datos (cambia esto según tu estructura de datos y modelo)
        $results = $libroModel->like('titulo', $searchTerm)
                             ->orLike('autor', $searchTerm)
                             ->orLike('editorial', $searchTerm)
                             ->orLike('precio', $searchTerm)
                             ->orLike('isbn', $searchTerm)
                             ->findAll(); 
    
        // Verificar si se encontraron resultados
        if (empty($results)) {
            // Si no se encontraron resultados, devolver un mensaje
            return json_encode(['message' => 'No se encontraron resultados']);
        } else {
            // Si se encontraron resultados, preparar la información básica de los libros encontrados (título, autor y precio)
            $basicInfo = [];
            foreach ($results as $libro) {
                $basicInfo[] = [
                    'titulo' => $libro['titulo'],
                    'autor' => $libro['autor'],
                    'precio' => $libro['precio']
                    // Puedes agregar más campos si es necesario
                ];
            }
    
            // Devolver los resultados como una respuesta JSON
            return json_encode($basicInfo);
        }
    }
    
    
}