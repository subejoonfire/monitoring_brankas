<?php

namespace App\Controllers;

use App\Models\AnggotaModel;

class Anggota extends BaseController
{
    protected AnggotaModel $AnggotaModel;

    public function __construct()
    {
        $this->AnggotaModel = new AnggotaModel();
    }

    public function index()
    {
        return view('anggota/index', [
            'rows' => $this->AnggotaModel->findAll()
        ]);
    }

    public function create()
    {
        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'key'          => 'required|is_unique[anggota.key]',
                'tipe'          => 'required|is_unique[anggota.tipe]',
                'nama' => 'required'
            ];

            if (! $this->validate($rules)) {
                return view('anggota/form', ['validation' => $this->validator]);
            }

            $this->AnggotaModel->insert([
                'nama' => $this->request->getPost('nama'),
                'tipe' => $this->request->getPost('tipe'),
                'key' => password_hash($this->request->getPost('key'), PASSWORD_BCRYPT),
            ]);
            return redirect()->to('anggota')->with('success', 'Data tersimpan!');
        }
        return view('anggota/form');
    }

    public function edit(int $id)
    {
        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'key' => "required|is_unique[anggota.key,id,$id]",
                'tipe' => 'required',
                'nama' => 'required'
            ];
            if (! $this->validate($rules)) {
                return view('anggota/form', [
                    'row'        => $this->AnggotaModel->find($id),
                    'validation' => $this->validator
                ]);
            }
            $this->AnggotaModel->update($id, [
                'nama' => $this->request->getPost('nama'),
                'tipe' => $this->request->getPost('tipe'),
                'key' => password_hash($this->request->getPost('key'), PASSWORD_BCRYPT),
            ]);
            return redirect()->to('anggota')->with('success', 'Data di-update!');
        }
        return view('anggota/form', ['row' => $this->AnggotaModel->find($id)]);
    }

    public function delete(int $id)
    {
        $this->AnggotaModel->delete($id);
        return redirect()->to('anggota')->with('success', 'Data dihapus!');
    }
}
