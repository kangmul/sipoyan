<?php

namespace App\Models;

use CodeIgniter\Model;

class WargaModel extends Model
{
    protected $table = 'warga';
    protected $setAutoIncrement = true;
    protected $allowedFields = ['no_kk', 'kepala_keluarga', 'alamat', 'rt', 'rw', 'nama', 'nik', 'jk', 'tmp_lahir', 'tgl_lahir', 'agama', 'pendidikan', 'jenis_pekerjaan', 'st_perkawinan', 'st_hub_kel', 'kewarganegaraan', 'no_passport', 'no_kitap', 'nm_ayah', 'nm_ibu', 'kel', 'kec', 'created_at', 'updated_at', 'deleted_at'];
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getAllWarga($key, $limit, $offset)
    {
        $builder = $this->table("warga");
        $totaldata = $builder->countAllResults(false);
        $builder->select("LOWER(warga.nama) as nama, warga.id as idwarga, warga.jk, warga.tgl_lahir, warga.tmp_lahir, ref_kab_kota.nama as kota ");
        $builder->join("ref_kab_kota", "ref_kab_kota.id = warga.tmp_lahir", "inner");
        if (!empty($key)) {
            $builder->like("warga.nama", $key, "both");
            $builder->orderBy("warga.created_at DESC");
            $getdatawarga = $builder->get($limit, $offset);
            $datawarga = $getdatawarga->getResultArray();
            $countfiltered = count($datawarga);
        } else {
            $builder->orderBy("warga.created_at DESC");
            $getdatawarga = $builder->get($limit, $offset);
            $datawarga = $getdatawarga->getResultArray();
            $countfiltered = $builder->countAllResults();
        }
        $response = [
            'datawarga' => $datawarga,
            'jmldatawarga' => $totaldata,
            'jmldatafilter' => $countfiltered,
        ];
        return $response;
    }

    public function countmalewarga()
    {
        return  $this->where("warga.jk = ", "L")->countAllResults();
    }

    public function countfemalewarga()
    {
        return  $this->where("warga.jk = ", "P")->countAllResults();
    }

    public function getbalita($key, $limit, $offset)
    {
        $builder = $this->table('warga');
        $builder->select(["LOWER(warga.nama) as nama, warga.id as id_balita, warga.jk, warga.tgl_lahir, warga.nm_ayah, warga.nm_ibu, ref_kab_kota.nama as kota"]);
        $builder->join("ref_kab_kota", "ref_kab_kota.id = warga.tmp_lahir");
        $builder->where("warga.tgl_lahir >=", date("Y-m-d", strtotime("-5 years")));

        if (!empty($key)) {
            if($usia0to12 = false){
                $builder->where("warga.tgl_lahir >=", date("Y-m-d", strtotime("-1 years")));
            }
            if($usia12to36 = false){
                $builder->where("warga.tgl_lahir <=", date("Y-m-d", strtotime("-1 years")));
                $builder->where("warga.tgl_lahir >=", date("Y-m-d", strtotime("-3 years")));
            }
            if($usia36to60 = false){
                $builder->where("warga.tgl_lahir <=", date("Y-m-d", strtotime("-3 years")));
                $builder->where("warga.tgl_lahir >=", date("Y-m-d", strtotime("-5 years")));
            }
            // $builder->where("warga.tgl_lahir >=", date("Y-m-d", strtotime("-2 years")));
            $builder->like("warga.nama", $key, "both");
        } 
        // var_dump($builder->getCompiledSelect());exit;
        $getdatabalita = $builder->get($limit, $offset);
        $databalita = $getdatabalita->getResultArray();
        $countfiltered = count($databalita);

        $response = [
            'databalita' => $databalita,
            'jmldatabalita' => $countfiltered,
            'jmldatabalitafilter' => $countfiltered,
        ];
        return $response;
        // $getdatabalita = $this->get($limit, $offset);
        // $databalita = $getdatabalita->getResultArray();
        // $countfiltered = count($databalita);
        // $totaldata = count($databalita);
        // $response = [
        //     'databalita' => $databalita,
        //     'jmldatabalita' => $totaldata,
        //     'jmldatabalitafilter' => $countfiltered,
        // ];
        // return $response;
    }

    public function countmalebalita()
    {
        $this->where("warga.tgl_lahir >=", date("Y-m-d", strtotime("-5 years")));
        $this->where("warga.tgl_lahir <=", date("Y-m-d"));
        $this->where("warga.jk = ", "L");
        return $jmlmalebalita = $this->countAllResults();
    }

    public function countfemalebalita()
    {
        $this->where("warga.tgl_lahir >=", date("Y-m-d", strtotime("-5 years")));
        $this->where("warga.tgl_lahir <=", date("Y-m-d"));
        $this->where("warga.jk = ", "P");
        return $jmlfemalebalita = $this->countAllResults();
    }

    public function getlansia($key, $limit, $offset)
    {
        $this->select("LOWER(warga.nama) as nama, warga.id as id_lansia, warga.jk, warga.tgl_lahir, ref_kab_kota.nama as kota");
        $this->where("warga.tgl_lahir <=", date("Y-m-d", strtotime("-45 years")));
        $this->join("ref_kab_kota", "ref_kab_kota.id = warga.tmp_lahir");
        if (!empty($key)) {
            $jmllansia = $this->countAllResults();
            $this->like("warga.nama", $key, "both");
            $this->get($limit, $offset);
            $lansia = $this->getResultArray();
            $jmldata = count($lansia);
            $response = [
                'datalansia' => $lansia,
                'jmllansia' => $jmllansia,
                'jmllansiafiltered' => $jmldata
            ];
            return $response;
        }
        $jmllansia = $this->countAllResults(false);
        $datalansia = $this->get($limit, $offset);
        $lansia = $datalansia->getResultArray();
        $response = [
            'datalansia' => $lansia,
            'jmllansia' => count($lansia),
            'jmllansiafiltered' => count($lansia),

        ];
        return $response;
    }

    public function countmalelansia()
    {
        $this->where("warga.tgl_lahir <=", date("Y-m-d", strtotime("-45 years")));
        $this->where("warga.jk = ", "L");
        return $jmlmalelansia = $this->countAllResults();
    }

    public function countfemalelansia()
    {
        $this->where("warga.tgl_lahir <=", date("Y-m-d", strtotime("-45 years")));
        $this->where("warga.jk = ", "P");
        return $jmlfemalelansia = $this->countAllResults();
    }

    public function detailwarga($id)
    {
        // $this->select("warga.*, ref_kab_kota.nama as kota, ref_agama.agama as agama, ref_pendidikan.pendidikan as sekolah, ref_jenis_pekerjaan.pekerjaan as pekerjaan, ref_marital.marital as stkawin, ref_hub_kel.hubungan_keluarga as hbkel");
        $this->select("warga.*, warga.nama as nama, ref_kab_kota.nama as kota, ref_agama.agama, ref_pendidikan.pendidikan, ref_jenis_pekerjaan.pekerjaan, ref_marital.marital, ref_hub_kel.hubungan_keluarga");
        $this->join("ref_kab_kota", "ref_kab_kota.id = warga.tmp_lahir", "inner");
        $this->join("ref_agama", "ref_agama.kode_agama = warga.agama", "left");
        $this->join("ref_pendidikan", "ref_pendidikan.kode =  warga.pendidikan", "left");
        $this->join("ref_jenis_pekerjaan", "ref_jenis_pekerjaan.kode = warga.jenis_pekerjaan");
        $this->join("ref_marital", "ref_marital.kode = warga.st_perkawinan");
        $this->join("ref_hub_kel", "ref_hub_kel.kode = warga.st_hub_kel");
        $this->Where('warga.id =', $id);
        $data = $this->get();
        return $data->getResultArray();
    }
}
