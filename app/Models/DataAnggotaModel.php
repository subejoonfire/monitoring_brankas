<?php

namespace App\Models;

use CodeIgniter\Model;

class DataAnggotaModel extends Model
{
    protected $table = 'data_Anggota';
    protected $primaryKey = 'id_anggota';
    protected $allowedFields = ['id_anggota', 'tag', 'nama_anggota'];
}
