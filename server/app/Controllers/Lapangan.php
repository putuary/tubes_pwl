<?php

namespace App\Controllers;

use App\Models\LapanganModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Lapangan extends ResourceController
{
    use ResponseTrait;
    // all users
    public function index()
    {
        $model = new LapanganModel();
        $data['lapangan'] = $model->orderBy('id_lapangan', 'DESC')->findAll();
        return $this->respond($data);
    }
    // create
    public function create()
    {
        $model = new LapanganModel();
        $data = [
            'nama_lapangan' => $this->request->getVar('nama_lapangan'),
            'gambar' => $this->request->getVar('gambar'),
        ];
        $model->insert($data);
        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => 'Data komentar berhasil ditambahkan.',
            ],
        ];
        return $this->respond($response);
    }
    // single user
    public function show($id = null)
    {
        $model = new LapanganModel();
        $data = $model->where('id_lapangan', $id)->first();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data Lapangan tidak ditemukan.');
        }
    }
    // update
    public function update($id = null)
    {
        $model = new LapanganModel();
        $id = $this->request->getVar('id_lapangan');
        $data = [
            'nama_lapangan' => $this->request->getVar('nama_lapangan'),
            'gambar' => $this->request->getVar('gambar'),
        ];
        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Data Lapangan Berhasil diubah.',
            ],
        ];
        return $this->respond($response);
    }
    // delete
    public function delete($id = null)
    {
        $model = new LapanganModel();
        $data = $model->where('id_lapangan', $id)->delete($id);
        if ($data) {
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Data lapangan berhasil dihapus.',
                ],
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data lapangan tidak ditemukan.');
        }
    }
}