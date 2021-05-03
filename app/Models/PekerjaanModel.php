<?php

namespace App\Models;

use CodeIgniter\Model;

class PekerjaanModel extends Model
{
    protected $table = 'ref_jenis_pekerjaan';
    protected $primaryKey = 'id';
    protected $setAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowFields = ['pekerjaan', 'kode'];
}
