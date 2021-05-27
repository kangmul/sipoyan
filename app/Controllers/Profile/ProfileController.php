<?php

namespace App\Controllers\Profile;

use App\Controllers\BaseController;
use App\Models\WargaModel;

class ProfileController extends BaseController
{
    public function index()
    {
        $model = new WargaModel();
        $profiles = $model->getWhere(['nik' => user()->nik], 1, 0);
        $userprofile = $profiles->getResult();
        $data = [
            'title' => "Profile",
            'userprofile' => $userprofile
        ];
        return view("profile/index", $data);
    }
}
