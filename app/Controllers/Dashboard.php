<?php

namespace App\Controllers;

use App\Models\DataAnggotaModel;
use App\Models\RiwayatBerhasilModel;
use App\Models\RiwayatGagalModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $anggota  = new DataAnggotaModel();
        $berhasil = new RiwayatBerhasilModel();
        $gagal    = new RiwayatGagalModel();

        $data = [
            'jmlAnggota'  => $anggota->countAllResults(),
            'jmlBerhasil' => $berhasil->countAllResults(),
            'jmlGagal'    => $gagal->countAllResults(),
        ];

        return view('dashboard', $data);
    }
}