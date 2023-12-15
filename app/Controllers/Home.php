<?php

namespace App\Controllers;
use App\Models\UserModel;

class Home extends BaseController
{


    public function forgotPassword(): string {
        return view('forgot-password');
    }

    public function login(): string {
        $correo= $this->request->getPost('correo');
        $password= $this->request->getPost('password');

        $user= new UserModel();

        $dataUser= $user-> checkCredentials(['correo'=>$correo]);

        if(count ($dataUser) > 0 && password_verify($password, $dataUser[0]['password'])){

            $data= [
                "correo"=> $dataUser[0]['correo']
            ];
            $session= session();
            $session->set($data);

            return redirect()->to (base_url())->with ('mensaje','1');

        }else{
            return redirect()->to (base_url())->with ('mensaje','0');
        }

    }

}
