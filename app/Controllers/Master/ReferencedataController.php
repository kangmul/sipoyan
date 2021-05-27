<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;

use App\Models\HubungankelModel;
use App\Models\KotaModel;
use App\Models\MaritalModel;
use App\Models\PekerjaanModel;
use App\Models\PendidikanModel;
use App\Models\KecamatanModel;
use App\Models\KelurahanModel;
use App\Models\AgamaModel;

class ReferencedataController extends BaseController
{

    protected $modelkecamatan;
    protected $modelkelurahan;
    protected $modelagama;
    protected $modelkota;
    protected $modelpendidikan;

    public function __construct()
    {
        $this->modelagama = new AgamaModel();
        $this->modelkecamatan = new KecamatanModel();
        $this->modelkelurahan = new KelurahanModel();
        $this->modelkota = new KotaModel();
        $this->modelpendidikan = new PendidikanModel();
    }

    public function getagama()
    {
        try {
            $post = $this->request->getVar('terms');
            if (array_key_exists('term', $post)) {
                $search = strtoupper($post["term"]);
                $model = $this->modelagama->like('agama', $search, 'both')->get(5,0);
            } else {
                $model = $this->modelagama->get(5, 0);
            }
            $dataagama = $model->getResultArray();
            $result = [];
            foreach ($dataagama as $val) {
                $result[] = [
                    "id" => $val["kode_agama"],
                    "text" => $val["agama"]
                ];
            }
            $response = json_encode($result);
            echo $response;
            exit;
            
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function Ajaxprovkabkotakec()
    {
        try {

            $kodekecamatan = $this->request->getVar();
            $kecamatan = $this->modelkecamatan->where(['id' => $kodekecamatan])->first();
            if (empty($kecamatan)) {
                $response = [
                    'success' => false,
                    'code' => 400,
                    'message' => 'Data tidak ditemukan',
                    'data' => []
                ];
            } else {
                $response = [
                    'success' => true,
                    'code' => 200,
                    'message' => 'Data ditemukan',
                    'data' => $kecamatan
                ];
            }
            $result = json_encode($response);
            return $result;
            exit;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function getkelurahan()
    {
        try {
            $search = $this->request->getVar('idkecamatan');
            if ($search) {
                $kelurahan = $this->modelkelurahan
                    ->where('id_ref_kecamatan', $search)
                    ->get();
            }
            $listkelurahan = $kelurahan->getResultArray();
            $kec = [];
            foreach ($listkelurahan as $value) {
                $kec[] = [
                    'id' => $value['id'],
                    'text' => $value['nama']
                ];
            }

            $result = json_encode($kec);
            echo $result;
            exit;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    function getkecamatan()
    {
        try {
            $post = $this->request->getVar('terms');
            $search = $post['term'];
            $kecamatan = $this->modelkecamatan->get(10, 0);
            if ($search) {
                $kecamatan = $this->modelkecamatan
                    ->like('nama', strtolower($search), 'both')
                    ->orLike('id', $search)
                    ->get();
            }
            $listkecamatan = $kecamatan->getResultArray();
            $kec = [];
            foreach ($listkecamatan as $value) {
                $kec[] = [
                    'id' => $value['id'],
                    'text' => $value['nama']
                ];
            }

            $result = json_encode($kec);
            echo $result;
            exit;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    function gettempatlahir()
    {
        try {
            $post = $this->request->getVar('terms');
            $search = $post['term'];
            $kabkota = $this->modelkota->get(10, 0);
            if ($search) {
                $kabkota = $this->modelkota
                    ->like('nama', strtolower($search), 'both')
                    ->orLike('id', $search)
                    ->get();
            }
            $listkabkota = $kabkota->getResultArray();
            $kec = [];
            foreach ($listkabkota as $value) {
                $kec[] = [
                    'id' => $value['id'],
                    'text' => $value['nama']
                ];
            }

            $result = json_encode($kec);
            echo $result;
            exit;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    function getpendidikan()
    {
        try {
            $post = $this->request->getVar('terms');
            $search = strtoupper($post['term']);
            
            $pendidikan = $this->modelpendidikan->get(5, 0);
            if ($search) {
                $pendidikan = $this->modelpendidikan
                    ->like('pendidikan', $search, 'both')
                    ->get(5,0);
            }
            $listpendidikan = $pendidikan->getResultArray();
            $kec = [];
            foreach ($listpendidikan as $value) {
                $pend[] = [
                    'id' => $value['kode'],
                    'text' => $value['pendidikan']
                ];
            }

            $result = json_encode($pend);
            echo $result;
            exit;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}
