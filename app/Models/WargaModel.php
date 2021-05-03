<?php

namespace App\Models;

use CodeIgniter\Model;

class WargaModel extends Model
{
    protected $table = 'warga';
    protected $setAutoIncrement = true;
    protected $allowedFields = ['no_kk', 'kepala_keluarga', 'rt', 'rw', 'nama', 'nik', 'jk', 'tmp_lahir', 'tgl_lahir', 'agama', 'pendidikan', 'jenis_pekerjaan', 'st_perkawinan', 'st_hub_kel', 'kewarganegaraan', 'no_passport', 'no_kitap', 'nm_ayah', 'nm_ibu', 'kel', 'kec', 'created_at', 'updated_at', 'deleted_at'];
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getAllWarga()
    {
        $response = [
            'datawarga' => $this->findAll(),
            'jmldatawarga' => $this->countAllResults(),
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

    public function getbalita($key = '', $limit, $offset)
    {
        $builder = $this->table('warga');
        $builder->select(["LOWER(warga.nama), warga.jk, warga.tgl_lahir, warga.nm_ayah, warga.nm_ibu, ref_kab_kota.nama kota"]);
        $builder->join("ref_kab_kota", "ref_kab_kota.id = warga.tmp_lahir");
        $builder->where("warga.tgl_lahir >=", date("Y-m-d", strtotime("-5 years")));
        $builder->where("warga.tgl_lahir <=", date("Y-m-d"));
        if ($key) {
            $data = $builder->like("warga.nama", strtolower($key));
            $jmlfiltered = $builder->countAllResults();
            $response = [
                'databalita' => $data,
                'jmlbalita' => $jmlfiltered
            ];
            return $response;
        }
        $jmlbalita = $this->countAllResults(false);
        // $jmlmale = $male->countAllResults(false);
        // $jmlfemale = $female->countAllResults(false);
        $databalita = $this->get($limit, $offset);
        $balita = $databalita->getResultArray();
        $response = [
            'databalita' => $balita,
            'jmlbalita' => $jmlbalita,
        ];
        return $response;
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

    public function getlansia($key = false, $limit, $offset)
    {
        $this->select("warga.nama, warga.jk, warga.tgl_lahir, ref_kab_kota.nama kota");
        $this->where("warga.tgl_lahir <=", date("Y-m-d", strtotime("-45 years")));
        $this->join("ref_kab_kota", "ref_kab_kota.id = warga.tmp_lahir");
        if ($key) {
            $this->like("warga.nama", $key, "both");
            $this->get($limit, $offset);
            $lansia = $this->getResultArray();
            $response = [
                'datalansia' => $lansia,
                'jmllansia' => $this->countAllResults(),
            ];
            return $response;
        }
        $jmllansia = $this->countAllResults(false);
        $datalansia = $this->get($limit, $offset);
        $lansia = $datalansia->getResultArray();
        $response = [
            'datalansia' => $lansia,
            'jmllansia' => $jmllansia,

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
}
