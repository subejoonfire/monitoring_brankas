<?php

namespace App\Controllers;

use App\Models\RiwayatBerhasilRFIDModel;
use App\Models\RiwayatBerhasilKeypadModel;
use App\Models\RiwayatGagalModel;

class Riwayat extends BaseController
{
    // public $RiwayatBerhasilRFIDModel, $RiwayatBerhasilKeypadModel,  $RiwayatGagalModel;
    // public function __construct() {}
    public function berhasilRFID()
    {
        $model = new RiwayatBerhasilRFIDModel();
        $data['rows'] = $model->join('anggota', 'riwayatberhasilrfid.id_anggota = anggota.id')->orderBy('tanggal_akses', 'DESC')->findAll();
        return view('riwayat/berhasil', $data);
    }
    public function berhasilKeypad()
    {
        $model = new RiwayatBerhasilKeypadModel();
        $data['rows'] = $model->join('anggota', 'riwayatberhasilkeypad.id_anggota = anggota.id')->orderBy('tanggal_akses', 'DESC')->findAll();
        return view('riwayat/berhasil', $data);
    }

    public function gagal()
    {
        $model = new RiwayatGagalModel();
        $data['rows'] = $model->orderBy('tanggal_akses', 'DESC')->findAll();
        return view('riwayat/gagal', $data);
    }

    public function deleteBerhasil(int $id)
    {
        (new RiwayatBerhasilRFIDModel())->delete($id);
        return redirect()->to('riwayat/berhasil')->with('success', 'Riwayat dihapus');
    }

    public function deleteGagal(int $id)
    {
        (new RiwayatGagalModel())->delete($id);
        return redirect()->to('riwayat/gagal')->with('success', 'Riwayat dihapus');
    }
}
