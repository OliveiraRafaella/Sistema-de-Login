<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        
        echo '<h2> Usuario logado: '. $this->session->get('nome') . '</h2';
    }
}
