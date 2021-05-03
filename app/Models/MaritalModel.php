<?php

namespace App\Models;

use CodeIgniter\Model;

class MaritalModel extends Model
{
    protected $table = 'ref_marital';
    protected $primaryKey = 'id';
    protected $setAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowFields = ['marital', 'kode'];
}
