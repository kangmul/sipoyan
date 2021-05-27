<?php

namespace App\Controllers\Flamboyan;

use App\Controllers\BaseController;

use App\Models\WargaModel;


use DateTime;

class PosyanduController extends BaseController
{
    protected $modelwarga;

    public function __construct()
    {
        $this->modelwarga = new WargaModel();
    }

    public function index()
    {
        $data = [
            'title' => "Pengelolaan data POSYANDU"
        ];
        return view("posyandu/index", $data);
    }

    public function flamboyanbalita()
    {
        try {
            if ($this->request->isAJAX()) {
                $post = $this->request->getVar();

                if (isset($post['nama']) || isset($post['usia'])) {
                    $offset = 0;
                    $limit = 10;
                    $search = ['nama' => $post['nama'], 'usia' => $post['usia']];
                    $post['draw'] = 0;
                } else {
                    $offset = $post['start'];
                    $limit = $post['length'];
                    $search = strtolower(str_replace(" ", "+", $post['search']['value']));
                }

                $datahasil = $this->modelwarga->getbalita($search, $limit, $offset);

                $databalita = [];
                $i = 1;
                foreach ($datahasil["databalita"] as $key => $value) {
                    $nomor = $offset + $i;
                    $databalita[$key][] = $nomor;
                    $databalita[$key][] = "<span class='text-capitalize'>" . strtolower($value["nama"]) . "</span>";
                    $databalita[$key][] = $value["jk"];
                    $databalita[$key][] = date("d-m-Y", strtotime($value["tgl_lahir"]));
                    $lahir = new DateTime($value["tgl_lahir"]);
                    $now = new DateTime();
                    $interval = $now->diff($lahir);
                    $umurtahun = ($interval->y) * 12;
                    $umurbulan = ($interval->m) + $umurtahun;
                    $umurhari = $interval->d;

                    $databalita[$key][] = $umurbulan . ' bulan ' . $umurhari . ' hari';
                    $databalita[$key][] = "<span class='text-capitalize'>" . strtolower($value["nm_ayah"]) . "</span>";
                    $databalita[$key][] = "<span class='text-capitalize'>" . strtolower($value["nm_ibu"]) . "</span>";
                    $databalita[$key][] = "<span class='text-capitalize'>" . strtolower($value['kota']) . "</span>";
                    $databalita[$key][] = "<a href='/detailwarga/" . $value['id_balita'] . "' class='badge'><i class='fas fa-eye'></i></a>";
                    $i++;
                }
                $forcingdata = [
                    'draw' => $post["draw"],
                    'recordsTotal' => $datahasil["jmldatabalita"],
                    'recordsFiltered' => $datahasil["jmldatabalitafilter"],
                    'start' => $post["start"],
                    'length' => $post["length"],
                    'data' => $databalita
                ];
                echo json_encode($forcingdata);
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}
