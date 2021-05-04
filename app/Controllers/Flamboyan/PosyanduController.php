<?php

namespace App\Controllers\Flamboyan;

use App\Controllers\BaseController;

class PosyanduController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "Pengelolaan data POSYANDU"
        ];
        return view("posyandu/index", $data);
    }
}
