<?php

namespace App\Controllers;

use App\Models\AnggotaModel;
use App\Models\RiwayatBerhasilRFIDModel;
use App\Models\RiwayatGagalModel;
use CodeIgniter\RESTful\ResourceController;

class IotReceiver extends ResourceController
{
    public function receive()
    {
        $request = $this->request;

        $tag = $request->getPost('tag');
        $foto = $request->getPost('foto'); // base64
        $tanggal = date('Y-m-d');
        $waktu = date('H:i:s');

        if (!$tag || !$foto) {
            return $this->fail('Tag dan foto wajib diisi', 400);
        }

        $anggotaModel = new AnggotaModel();
        $dataAnggota = $anggotaModel->where('tag', $tag)->first();

        if ($dataAnggota) {
            // Masuk ke Riwayat Berhasil
            $riwayatModel = new RiwayatBerhasilRFIDModel();
            $riwayatModel->insert([
                'id_anggota'    => $dataAnggota['id_anggota'],
                'tanggal_akses' => $tanggal,
                'waktu_akses'   => $waktu,
                'foto'          => $foto
            ]);

            return $this->respond(['status' => 'berhasil'], 200);
        } else {
            // Masuk ke Riwayat Gagal
            $gagalModel = new RiwayatGagalModel();
            $gagalModel->insert([
                'tanggal_percobaan'   => $tanggal,
                'waktu_akses'         => $waktu,
                'tag_tidak_dikenal'   => $tag,
                'foto'                => $foto
            ]);

            return $this->respond(['status' => 'gagal'], 200);
        }
    }
}
