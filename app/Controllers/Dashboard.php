<?php

namespace App\Controllers;

use App\Models\AnggotaModel;
use App\Models\RiwayatBerhasilRFIDModel;
use App\Models\RiwayatGagalModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $anggota  = new AnggotaModel();
        $berhasil = new RiwayatBerhasilRFIDModel();
        $gagal    = new RiwayatGagalModel();

        $data = [
            'jmlAnggota'  => $anggota->countAllResults(),
            'jmlBerhasil' => $berhasil->countAllResults(),
            'jmlGagal'    => $gagal->countAllResults(),
        ];

        return view('dashboard', $data);
    }
}
