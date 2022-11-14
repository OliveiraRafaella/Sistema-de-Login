<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        $data['msg'] = '';
        if ($this->request->getMethod() === 'post') {
            $usuarioModel = model('UsuarioModel');
            $usuarioCheck = $usuarioModel->validarSenha($this->request->getPost('usuario'), $this->request->getPost('senha'));

            if (!$usuarioCheck) {
                $data['msg'] = 'Usuario e/ou senha incorretos';
            } else {
                //salva os dados na sessão
                $this->session->set('nome', $usuarioCheck->nome);
                $this->session->set('perfil', $usuarioCheck->perfil);
                // redireciona o usuario para a pagina restrita
                return redirect()->to('public/admin');
            }
        }

        return view('login', $data);
    }
}
