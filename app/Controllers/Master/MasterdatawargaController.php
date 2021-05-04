<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Models\AgamaModel;
use App\Models\HubungankelModel;
use CodeIgniter\HTTP\RequestInterface;


// ambil model kota
use App\Models\KotaModel;
use App\Models\MaritalModel;
use App\Models\PekerjaanModel;
use App\Models\PendidikanModel;
use App\Models\WargaModel;

// using time codeigniter
use CodeIgniter\I18n\Time;
use DateTime;

class MasterdatawargaController extends BaseController
{
    protected $showdata;
    protected $modelwarga;

    public function __construct()
    {
        $modelkota = new KotaModel();
        $modelagama = new AgamaModel();
        $modelpendidikan = new PendidikanModel();
        $modelpekerjaan = new PekerjaanModel();
        $modelmarital = new MaritalModel();
        $modelhubkel = new HubungankelModel();
        $this->modelwarga = new WargaModel();
        $this->showdata = [
            'kota' => $modelkota->findAll(),
            'agama' => $modelagama->findAll(),
            'pendidikan' => $modelpendidikan->findAll(),
            'pekerjaan' => $modelpekerjaan->findAll(),
            'marital' => $modelmarital->findAll(),
            'hubkel' => $modelhubkel->findAll(),
            'warga' => $this->modelwarga->select('warga.nama, warga.jk, warga.tgl_lahir, ref_kab_kota.nama as tempat_lahir')->join('ref_kab_kota', 'ref_kab_kota.id = warga.tmp_lahir')->findAll(),

        ];
    }

    public function index()
    {
        $data = [
            'title' => 'Master Data Warga',
        ];
        return view('master/datawarga', $data);
    }

    public function createdatawarga()
    {
        $data = [
            'title' => 'Tambah Data Warga',
            'kota' => $this->showdata["kota"],
            'agama' => $this->showdata["agama"],
            'pendidikan' => $this->showdata["pendidikan"],
            'pekerjaan' => $this->showdata["pekerjaan"],
            'marital' => $this->showdata["marital"],
            'hubkel' => $this->showdata["hubkel"],
        ];
        return view('master/formtambahwarga', $data);
    }

    public function savedatawarga()
    {
        try {
            $response = [];
            if ($this->request->isAJAX()) {
                $datawarga = $this->request->getVar();
                foreach ($datawarga["datatabel"] as $val) {
                    $data[] = [
                        "no_kk" => $val["nokk"],
                        "kepala_keluarga" => $val["kepalakk"],
                        "alamat" => $val["alamat"],
                        "rt" => $val["rt"],
                        "rw" => $val["rw"],
                        "nama" => $val["nama"],
                        "nik" => $val["nik"],
                        "jk" => $val["jk"],
                        "tmp_lahir" => $val["tmp_lahir"],
                        "tgl_lahir" => date("Y-m-d", strtotime($val["tgl_lahir"])),
                        "agama" => $val["agama"],
                        "pendidikan" => $val["pendidikan"],
                        "jenis_pekerjaan" => $val["jenis_pekerjaan"],
                        "st_perkawinan" => $val["status"],
                        "st_hub_kel" => $val["hubkel"],
                        "kewarganegaraan" => $val["kewarganegaraan"],
                        "no_passport" => $val["nopassport"],
                        "no_kitap" => $val["nokitap"],
                        "nm_ayah" => $val["namaayah"],
                        "nm_ibu" => $val["namaibu"],
                        "kel" => $val["kel"],
                        "kec" => $val["kec"],
                        "created_at" => date('Y-m-d H:i:s')
                    ];
                }
                // var_dump($data);exit;
                for ($i = 0; $i < count($datawarga["datatabel"]); $i++){
                    $searchdata = $this->modelwarga->where(["nik" => $data[$i]["nik"]])->first();
                    if(!empty($searchdata)){
                        $response['success'] = false;
                        $response['message'] = "Data ".$data[$i]["nama"]." sudah terdaftar";
                        return $response;
                    } 
                }

                $insertomodel = new WargaModel();
                for ($i = 0; $i < count($datawarga["datatabel"]); $i++) {
                    $insertomodel->insert($data[$i]);
                }
                if ($insertomodel->affectedRows()) {
                    $response['success'] = true;
                    $response['message'] = "Data berhasil ditambahkan";
                } else {
                    $response['success'] = false;
                    $response['message'] = "Data gagal ditambahkan";
                }
                return json_encode($response);
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function Tabeldatawarga()
    {
        try {
            if ($this->request->isAJAX()) {
                $post = $this->request->getVar();
                $offset = $post['start'];
                $limit = $post['length'];
                $search = strtolower(str_replace(" ", "+", $post['search']['value']));

                $data = $this->modelwarga->getAllWarga($search, $limit, $offset);

                $datawarga = [];
                $i = 1;
                foreach ($data["datawarga"] as $key => $value) {
                    $nomor = $offset + $i;
                    $datawarga[$key][] = $nomor;
                    $datawarga[$key][] = "<span class='text-capitalize'>" . strtolower($value["nama"]) . "</span>";
                    $datawarga[$key][] = $value["jk"];
                    $datawarga[$key][] = date("d-m-Y", strtotime($value["tgl_lahir"]));
                    $lahir = new DateTime($value["tgl_lahir"]);
                    $now = new DateTime();
                    $interval = $now->diff($lahir);
                    $umurtahun = $interval->y;
                    $umurbulan = $interval->m;
                    $umurhari = $interval->d;
                    $datawarga[$key][] = $umurtahun . ' tahun ' . $umurbulan . ' bulan ' . $umurhari . ' hari';
                    $datawarga[$key][] = "<span class='text-capitalize'>" . strtolower($value['kota']) . "</span>";
                    $datawarga[$key][] = "<a href='/detailwarga/" . $value['idwarga'] . "' class='badge'><i class='fas fa-eye'></i></a>";
                    $i++;
                }
                $forcingdata = [
                    'draw' => $post["draw"],
                    'recordsTotal' => $data["jmldatawarga"],
                    'recordsFiltered' => $data["jmldatafilter"],
                    'start' => $post["start"],
                    'length' => $post["length"],
                    'data' => $datawarga
                ];
                // var_dump($forcingdata);
                echo json_encode($forcingdata);
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function databalita()
    {
        $data = [
            'title' => 'Master Data Balita',
        ];
        return view('master/databalita', $data);
    }

    public function Tabeldatabalita()
    {
        try {
            if ($this->request->isAJAX()) {
                $post = $this->request->getVar();
                $offset = $post['start'];
                $limit = $post['length'];
                $search = strtolower(str_replace(" ", "+", $post['search']['value']));

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

    public function datalansia()
    {
        $data = [
            'title' => 'Master Data Lansia',
        ];
        return view('master/datalansia', $data);
    }

    public function Tabeldatalansia()
    {
        try {
            if ($this->request->isAJAX()) {
                $post = $this->request->getVar();
                $offset = $post['start'];
                $limit = $post['length'];
                $search = strtolower(str_replace(" ", "+", $post['search']['value']));

                $datahasil = $this->modelwarga->getlansia($search, $limit, $offset);

                $datalansia = [];
                $i = 1;
                foreach ($datahasil["datalansia"] as $key => $value) {
                    $datalansia[$key][] = $i;
                    $datalansia[$key][] = "<span class='text-capitalize'>" . strtolower($value["nama"]) . "</span>";
                    $datalansia[$key][] = $value["jk"];
                    $datalansia[$key][] = date("d-m-Y", strtotime($value["tgl_lahir"]));
                    $lahir = new DateTime($value["tgl_lahir"]);
                    $now = new DateTime();
                    $interval = $now->diff($lahir);
                    $umurtahun = $interval->y;
                    $umurbulan = $interval->m;
                    $umurhari = $interval->d;
                    $datalansia[$key][] = $umurtahun . ' tahun ' . $umurbulan . ' bulan ' . $umurhari . ' hari';
                    $datalansia[$key][] = "<span class='text-capitalize'>" . strtolower($value['kota']) . "</span>";
                    $datalansia[$key][] = "<a href='/detailwarga/" . $value['id_lansia'] . "' class='badge'><i class='fas fa-eye'></i></a>";
                    $i++;
                }
                $forcingdata = [
                    'draw' => $post["draw"],
                    'recordsTotal' => $datahasil["jmllansia"],
                    'recordsFiltered' => $datahasil["jmllansiafiltered"],
                    'start' => $post["start"],
                    'length' => $post["length"],
                    'data' => $datalansia
                ];
                echo json_encode($forcingdata);
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function detailwarga($id)
    {
        $detailwarga = $this->modelwarga->detailwarga($id);
        // dd($detailwarga[0]["nama"]);
        $data = [
            'title' => "Detail Warga",
            'detailwarga' => $detailwarga[0],
        ];
        return view('master/detail', $data);
    }
}
