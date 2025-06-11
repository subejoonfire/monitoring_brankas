<?php

namespace App\Controllers;

use App\Models\DataAnggotaModel;

class DataAnggota extends BaseController
{
    protected DataAnggotaModel $model;

    public function __construct()
    {
        $this->model = new DataAnggotaModel();
    }

    public function index()
    {
        return view('anggota/index', [
            'rows' => $this->model->findAll()
        ]);
    }

    public function create()
    {
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'id_anggota'   => 'required|is_unique[Data_Anggota.id_anggota]',
                'tag'          => 'required|is_unique[Data_Anggota.tag]',
                'nama_anggota' => 'required'
            ];

            if (! $this->validate($rules)) {
                return view('anggota/form', ['validation' => $this->validator]);
            }

            $this->model->insert($this->request->getPost());
            return redirect()->to('anggota')->with('success', 'Data tersimpan!');
        }
        return view('anggota/form');
    }

    public function edit(int $id)
    {
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'tag'          => "required|is_unique[Data_Anggota.tag,id_anggota,$id]",
                'nama_anggota' => 'required'
            ];
            if (! $this->validate($rules)) {
                return view('anggota/form', [
                    'row'        => $this->model->find($id),
                    'validation' => $this->validator
                ]);
            }
            $this->model->update($id, $this->request->getPost());
            return redirect()->to('anggota')->with('success', 'Data di-update!');
        }
        return view('anggota/form', ['row' => $this->model->find($id)]);
    }

    public function delete(int $id)
    {
        $this->model->delete($id);
        return redirect()->to('anggota')->with('success', 'Data dihapus!');
    }
}
