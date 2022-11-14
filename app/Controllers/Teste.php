<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Teste extends BaseController
{
    public function index()
    {
        echo '<h1>Ola</h1>';
        return redirect()->to('public/admin');
    }
}
