<?php namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\LokasiModel;
use CodeIgniter\API\ResponseTrait;

class LokasiController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $model = new LokasiModel();
        $lokasi = $model->findAll();
        return $this->respond($lokasi);
    }

    public function show($id)
    {
        $model = new LokasiModel();
        $lokasi = $model->find($id);

        if (!$lokasi) {
            return $this->failNotFound('Lokasi tidak ditemukan');
        }

        return $this->respond($lokasi);
    }

    public function create()
    {
        $lokasiModel = new LokasiModel();

        $input = $this->request->getJSON(true);

        $data = [
            'nama_lokasi' => $input['namaLokasi'] ?? '',
            'negara' => $input['negara'] ?? '',
            'provinsi' => $input['provinsi'] ?? '',
            'kota' => $input['kota'] ?? '',
            'created_at' => $input['createdAt'] ?? ''
        ];

        if ($lokasiModel->insert($data)) {
            $id = $lokasiModel->getInsertID();
            $savedData = $lokasiModel->find($id);

            return $this->respondCreated($savedData, 'Lokasi berhasil ditambahkan');
        } else {
            return $this->fail($lokasiModel->errors(), 400);
        }
    }

    public function update($id)
    {
        $lokasiModel = new LokasiModel();

        $input = $this->request->getJSON(true);

        $data = [
            'nama_lokasi' => $input['namaLokasi'] ?? '',
            'negara' => $input['negara'] ?? '',
            'provinsi' => $input['provinsi'] ?? '',
            'kota' => $input['kota'] ?? '',
            'created_at' => $input['createdAt'] ?? ''
        ];

        if ($lokasiModel->update($id, $data)) {
            $updatedData = $lokasiModel->find($id);

            return $this->respond($updatedData, 200, 'Lokasi berhasil diperbarui');
        } else {
            return $this->fail($lokasiModel->errors(), 400);
        }
    }

    public function delete($id)
    {
        $model = new LokasiModel();
        if ($model->delete($id)) {
            return $this->respondDeleted(['id' => $id], 'Lokasi berhasil dihapus');
        } else {
            return $this->failNotFound('Lokasi tidak ditemukan');
        }
    }
}
