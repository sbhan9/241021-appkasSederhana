<?php

namespace App\Models;

use CodeIgniter\Model;

class KasModel extends Model
{
    protected $table      = 'kas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['tanggal', 'pemasukan', 'pengeluaran', 'keterangan'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = '';
}