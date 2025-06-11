<?php

namespace App\Controllers;

use App\Models\RiwayatBerhasilModel;
use App\Models\RiwayatGagalModel;

class Riwayat extends BaseController
{
    public function berhasil()
    {
        $model = new RiwayatBerhasilModel();
        $data['rows'] = $model->withAnggota()->orderBy('tanggal_akses', 'DESC')->findAll();
        return view('riwayat/berhasil', $data);
    }

    public function gagal()
    {
        $model = new RiwayatGagalModel();
        $data['rows'] = $model->orderBy('tanggal_percobaan', 'DESC')->findAll();
        return view('riwayat/gagal', $data);
    }

    public function deleteBerhasil(int $id)
    {
        (new RiwayatBerhasilModel())->delete($id);
        return redirect()->to('riwayat/berhasil')->with('success', 'Riwayat dihapus');
    }

    public function deleteGagal(int $id)
    {
        (new RiwayatGagalModel())->delete($id);
        return redirect()->to('riwayat/gagal')->with('success', 'Riwayat dihapus');
    }
}
