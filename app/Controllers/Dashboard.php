<?php

namespace App\Controllers;

use App\Models\WargaModel;

class Dashboard extends BaseController
{
    protected $warga;

    public function __construct()
    {
        $this->warga = new WargaModel();
    }

    public function index()
    {
        $warga = $this->warga->getAllWarga();
        $malewarga = $this->warga->countmalewarga();
        $femalewarga = $this->warga->countfemalewarga();
        $balita = $this->warga->getbalita($key = false, 0, 0);
        $malebalita = $this->warga->countmalebalita();
        $femalebalita = $this->warga->countfemalebalita();
        $lansia = $this->warga->getlansia($key = false, 0, 0);
        $malelansia = $this->warga->countmalelansia();
        $femalelansia = $this->warga->countfemalelansia();
        $data = [
            'title' => "Dashboard",
            'jmlwarga' => $warga["jmldatawarga"],
            'jmlmalewarga' => $malewarga,
            'jmlfemalewarga' => $femalewarga,
            'jmlbalita' => $balita['jmlbalita'],
            'jmlfemalebalita' => $femalebalita,
            'jmlmalebalita' => $malebalita,
            'jmllansia' => $lansia['jmllansia'],
            'jmlmalelansia' => $malelansia,
            'jmlfemalelansia' => $femalelansia,
        ];
        return view('dashboard/index', $data);
    }
}
