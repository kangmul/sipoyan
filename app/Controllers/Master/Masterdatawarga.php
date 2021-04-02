<?php 
namespace App\Controllers\Master;

use App\Controllers\BaseController;


// ambil model kota
use App\Models\KotaModel;
class Masterdatawarga extends BaseController
{
    public function index()
    {
    	$data = [
    		'title' => 'Master Data Warga',
    	];
        return view('master/datawarga', $data);
    }

    public function createdatawarga()
    {
        $kota = new KotaModel();
    	$data = [
    		'title' => 'Tambah Data Warga',
            'kota' => $kota->findAll(),
    	];
    	return view('master/formtambahwarga', $data);
    }
}

 ?>