<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Usuarios extends BaseController
{
    public function index()
    {
        echo '<h1>Index de usuarios</h1>';
    }

    public function add(){
        echo '<h1>Add de usuarios</h1>';
    }

    public function edit(){
        echo '<h1>Edit de usuarios</h1>';
    }
}
