<?php

namespace App\Models;

use CodeIgniter\Model;

class HubungankelModel extends Model
{
    protected $table = 'ref_hub_kel';
    protected $primaryKey = 'id';
    protected $setAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowFields = ['hubungan_keluarga', 'kode'];
}
