<?php

namespace App\Models;

use CodeIgniter\Model;

class PendidikanModel extends Model
{
    protected $table = 'ref_pendidikan';
    protected $primaryKey = 'id';
    protected $setAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowFields = ['pendidikan', 'kode'];
}
