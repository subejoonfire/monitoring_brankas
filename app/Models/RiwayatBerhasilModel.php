<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatBerhasilModel extends Model
{
    protected $table = 'Riwayat_Berhasil';
    protected $primaryKey = 'id_riwayat_berhasil';
    protected $allowedFields = ['id_riwayat_berhasil', 'id_anggota', 'tanggal_akses', 'waktu_akses', 'foto'];

    protected $returnType = 'array';

    public function withAnggota()
    {
        return $this->select('Riwayat_Berhasil.*, Data_Anggota.nama_anggota')
            ->join('Data_Anggota', 'Data_Anggota.id_anggota = Riwayat_Berhasil.id_anggota');
    }
}
