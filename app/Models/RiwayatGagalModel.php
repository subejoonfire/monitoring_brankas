<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatGagalModel extends Model
{
    protected $table = 'riwayat_gagal';
    protected $primaryKey = 'id';
    protected $allowedFields = ['tanggal_akses', 'key', 'foto'];
}
