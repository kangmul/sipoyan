<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;

use App\Models\HubungankelModel;
use App\Models\KotaModel;
use App\Models\MaritalModel;
use App\Models\PekerjaanModel;
use App\Models\PendidikanModel;

class Referencedata extends BaseController
{

    protected $showdata;
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();

        $modelkota = new KotaModel();


        $modelpendidikan = new PendidikanModel();
        $modelpekerjaan = new PekerjaanModel();
        $modelmarital = new MaritalModel();
        $modelhubkel = new HubungankelModel();
        $this->showdata = [
            'kota' => $modelkota->findAll(),
            'pendidikan' => $modelpendidikan->findAll(),
            'pekerjaan' => $modelpekerjaan->findAll(),
            'marital' => $modelmarital->findAll(),
            'hubkel' => $modelhubkel->findAll()

        ];
    }

    public function Ajaxagama()
    {
        try {
            if ($this->request->isAJAX()) {
                $post = $this->request->getVar();
                $search = strtoupper($post["key"]["term"]);

                $modelagama = $this->db->table('ref_agama');
                $modelagama->select("*");
                $agama = $modelagama->get(5, 0);
                $dataagama = $agama->getResultArray();
                if (!empty($search)) {
                    $modelagama->select("*");
                    $modelagama->like("agama", $search, "both");
                    $agama = $modelagama->get(5, 0);
                    $dataagama = $agama->getResultArray();
                }


                $result = [];
                foreach ($dataagama as $val) {
                    $result[] = [
                        "id" => $val["kode_agama"],
                        "text" => $val["agama"]
                    ];
                }
                var_dump($result);
                exit;
                echo json_encode($result);
                exit;
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}
