<?php
namespace App\Models;

use CodeIgniter\Model;

class KotaModel extends Model
{
	protected $table = 'ref_kab_kota';
	protected $primaryKey = 'id';
	protected $setAutoIncrement = true;
	protected $returnType = 'array';
	protected $allowFields = ['id_ref_provinsi', 'nama'];
}
