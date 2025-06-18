<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatBerhasilRFIDModel extends Model
{
    protected $table = 'riwayatberhasilrfid';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_anggota', 'tanggal_akses'];

    protected $returnType = 'array';

    public function withAnggota()
    {
        return $this->select('riwayatberhasilrfid.*, anggota.nama')
            ->join('anggota', 'anggota.id = riwayatberhasilrfid.id_anggota');
    }
}
