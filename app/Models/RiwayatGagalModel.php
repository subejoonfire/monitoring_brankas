<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatGagalModel extends Model
{
    protected $table = 'riwayat_Gagal';
    protected $primaryKey = 'id_riwayat_gagal';
    protected $allowedFields = ['id_riwayat_gagal', 'tanggal_percobaan', 'waktu_akses', 'tag_tidak_dikenal', 'foto'];
}
