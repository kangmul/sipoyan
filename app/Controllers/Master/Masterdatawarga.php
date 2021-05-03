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

class Masterdatawarga extends BaseController
{
    protected $showdata;

    public function __construct()
    {
        $modelkota = new KotaModel();
        $modelagama = new AgamaModel();
        $modelpendidikan = new PendidikanModel();
        $modelpekerjaan = new PekerjaanModel();
        $modelmarital = new MaritalModel();
        $modelhubkel = new HubungankelModel();
        $modelwarga = new WargaModel();
        $this->showdata = [
            'kota' => $modelkota->findAll(),
            'agama' => $modelagama->findAll(),
            'pendidikan' => $modelpendidikan->findAll(),
            'pekerjaan' => $modelpekerjaan->findAll(),
            'marital' => $modelmarital->findAll(),
            'hubkel' => $modelhubkel->findAll(),
            'warga' => $modelwarga->select('warga.nama, warga.jk, warga.tgl_lahir, ref_kab_kota.nama as tempat_lahir')->join('ref_kab_kota', 'ref_kab_kota.id = warga.tmp_lahir')->findAll(),

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
                        "rt" => $val["rt"],
                        "rw" => $val["rw"],
                        "kel" => $val["kel"],
                        "kec" => $val["kec"],
                        "kepala_keluarga" => $val["kepalakk"],
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
                        "created_at" => date('Y-m-d H:i:s')
                    ];
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
                $offset = $post['start'] == '' ? '0' : $post['start'];
                $limit = $post['length'] == '' ? '10' : $post['length'];
                $search = $post['search']['value'];

                $db = \Config\Database::connect();
                $builder = $db->table('warga');
                $builder->select('warga.nama, warga.jk, warga.tgl_lahir, ref_kab_kota.nama kota')->join('ref_kab_kota', 'ref_kab_kota.id = warga.tmp_lahir');
                $hasil = $builder->get($limit, $offset);
                $totaldata = $builder->countAllResults();
                $datahasil = $hasil->getResultArray();
                if (!empty($search)) {
                    $builder->select('warga.nama, warga.jk, warga.tgl_lahir, ref_kab_kota.nama kota')->join('ref_kab_kota', 'ref_kab_kota.id = warga.tmp_lahir')->like('warga.nama', $search, 'both');
                    $hasil = $builder->get($limit, $offset);
                    $countfiltered = $builder->countAllResults();
                    $datahasil = $hasil->getResultArray();
                }

                $totalfiltered = empty($countfiltered) ? 0 : $countfiltered;

                $datawarga = [];
                $i = 1;
                foreach ($datahasil as $key => $value) {
                    $datawarga[$key][] = $i;
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
                    $datawarga[$key][] = "<a href='#' class='badge badge-info'><span><i class='fas fa-eye'></i></span></a>";
                    $i++;
                }
                $forcingdata = [
                    'draw' => $post["draw"],
                    'recordsTotal' => $totaldata,
                    'recordsFiltered' => $totalfiltered,
                    'start' => $post["start"],
                    'length' => $post["length"],
                    'data' => $datawarga
                ];
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
                $offset = $post['start'] == '' ? '0' : $post['start'];
                $limit = $post['length'] == '' ? '10' : $post['length'];
                $search = $post['search']['value'];

                $db = \Config\Database::connect();
                $builder = $db->table('warga');
                $builder->select('warga.nama, warga.jk, warga.tgl_lahir, warga.nm_ayah, warga.nm_ibu, ref_kab_kota.nama kota');
                $builder->where("warga.tgl_lahir >=", date("Y-m-d", strtotime("-5 years")));
                $builder->where("warga.tgl_lahir <=", date("Y-m-d"));
                $builder->join('ref_kab_kota', 'ref_kab_kota.id = warga.tmp_lahir');
                $hasil = $builder->get($limit, $offset);
                $totaldata = $builder->countAllResults();

                $datahasil = $hasil->getResultArray();
                if (!empty($search)) {
                    $$builder->select('warga.nama, warga.jk, warga.tgl_lahir, warga.nm_ayah, warga.nm_ibu, ref_kab_kota.nama kota');
                    $builder->where("warga.tgl_lahir >=", date("Y-m-d", strtotime("-5 years")));
                    $builder->where("warga.tgl_lahir <=", date("Y-m-d"));
                    $builder->join('ref_kab_kota', 'ref_kab_kota.id = warga.tmp_lahir')->like('warga.nama', $search, 'both');
                    $hasil = $builder->get($limit, $offset);
                    $countfiltered = $builder->countAllResults();
                    $datahasil = $hasil->getResultArray();
                }

                $totalfiltered = empty($countfiltered) ? 0 : $countfiltered;

                $datawarga = [];
                $i = 1;
                foreach ($datahasil as $key => $value) {
                    $datawarga[$key][] = $i;
                    $datawarga[$key][] = "<span class='text-capitalize'>" . strtolower($value["nama"]) . "</span>";
                    $datawarga[$key][] = $value["jk"];
                    $datawarga[$key][] = date("d-m-Y", strtotime($value["tgl_lahir"]));
                    $lahir = new DateTime($value["tgl_lahir"]);
                    $now = new DateTime();
                    $interval = $now->diff($lahir);
                    $umurtahun = ($interval->y) * 12;
                    $umurbulan = ($interval->m) + $umurtahun;
                    $umurhari = $interval->d;

                    $datawarga[$key][] = $umurbulan . ' bulan ' . $umurhari . ' hari';
                    $datawarga[$key][] = "<span class='text-capitalize'>" . strtolower($value["nm_ayah"]) . "</span>";
                    $datawarga[$key][] = "<span class='text-capitalize'>" . strtolower($value["nm_ibu"]) . "</span>";
                    $datawarga[$key][] = "<span class='text-capitalize'>" . strtolower($value['kota']) . "</span>";
                    $datawarga[$key][] = "<a href='#' class='badge badge-info'><span><i class='fas fa-eye'></i></span></a>";
                    $i++;
                }
                $forcingdata = [
                    'draw' => $post["draw"],
                    'recordsTotal' => $totaldata,
                    'recordsFiltered' => $totalfiltered,
                    'start' => $post["start"],
                    'length' => $post["length"],
                    'data' => $datawarga
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
                $offset = $post['start'] == '' ? '0' : $post['start'];
                $limit = $post['length'] == '' ? '10' : $post['length'];
                $search = $post['search']['value'];

                $db = \Config\Database::connect();
                $builder = $db->table('warga');
                $builder->select('warga.nama, warga.jk, warga.tgl_lahir, ref_kab_kota.nama kota');
                $builder->where("warga.tgl_lahir <=", date("Y-m-d", strtotime("-45 years")));
                // $builder->where("warga.tgl_lahir <=", date("Y-m-d"));
                $builder->join('ref_kab_kota', 'ref_kab_kota.id = warga.tmp_lahir');
                $hasil = $builder->get($limit, $offset);
                $totaldata = $builder->countAllResults();
                $datahasil = $hasil->getResultArray();
                if (!empty($search)) {
                    $$builder->select('warga.nama, warga.jk, warga.tgl_lahir, ref_kab_kota.nama kota');
                    $builder->where("warga.tgl_lahir <=", date("Y-m-d", strtotime("-45 years")));
                    // $builder->where("warga.tgl_lahir <=", date("Y-m-d"));
                    $builder->join('ref_kab_kota', 'ref_kab_kota.id = warga.tmp_lahir')->like('warga.nama', $search, 'both');
                    $hasil = $builder->get($limit, $offset);
                    $countfiltered = $builder->countAllResults();
                    $datahasil = $hasil->getResultArray();
                }

                $totalfiltered = empty($countfiltered) ? 0 : $countfiltered;

                $datawarga = [];
                $i = 1;
                foreach ($datahasil as $key => $value) {
                    $datawarga[$key][] = $i;
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
                    $datawarga[$key][] = "<a href='#' class='badge badge-info'><span><i class='fas fa-eye'></i></span></a>";
                    $i++;
                }
                $forcingdata = [
                    'draw' => $post["draw"],
                    'recordsTotal' => $totaldata,
                    'recordsFiltered' => $totalfiltered,
                    'start' => $post["start"],
                    'length' => $post["length"],
                    'data' => $datawarga
                ];
                echo json_encode($forcingdata);
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}
