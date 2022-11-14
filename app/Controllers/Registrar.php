<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Registrar extends BaseController
{
    public function index()
    {
        $data['msg'] = '';
        if ($this->request->getMethod() === 'post') {
            $usuarioModel = model("UsuarioModel");
            try {
                $usuarioData = $this->request->getPost();
                $usuarioData['perfil'] = 'usuario'; //perfil default
                if ($usuarioModel->save($usuarioData)) {
                    $data['msg'] = 'Usuario criado com sucesso';
                } else {
                    $data['msg'] = 'Error ao criar usuário';
                    $data['errors'] = $usuarioModel->errors();
                }
            } catch (\Exception $e) {
                $data['msg'] = 'Error ao criar usuário1: ' . $e->getMessage();
            }
        }
        return view('registrar', $data);
    }
}
