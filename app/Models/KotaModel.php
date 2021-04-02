<?php
namespace App\Models;

use CodeIgniter\Model;

class KotaModel extends Model
{
	protected $table = 'ref_kota';
	protected $primaryKey = 'id';
	protected $setAutoIncrement = true;
	protected $returnType = 'array';
	protected $allowFields = ['kota', 'nama'];
	public function getData()
	{
		echo 'data kota';
	}
}


?>