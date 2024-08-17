<?php namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\LokasiModel;
use App\Models\ProyekModel;
use App\Models\ProyekLokasiModel;
use CodeIgniter\API\ResponseTrait;

class ProyekController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $proyekModel = new ProyekModel();
        $proyekLokasiModel = new ProyekLokasiModel();
        $lokasiModel = new LokasiModel();

        $proyeks = $proyekModel->findAll();

        foreach ($proyeks as &$proyek) {
            $lokasiIds = $proyekLokasiModel->where('proyek_id', $proyek['id'])->findAll();
            $lokasiData = [];
            foreach ($lokasiIds as $lokasiId) {
                $lokasi = $lokasiModel->find($lokasiId['lokasi_id']);
                if ($lokasi) {
                    $lokasiData[] = $lokasi;
                }
            }
            $proyek['lokasi'] = $lokasiData;
        }

        return $this->respond($proyeks);
    }

    public function show($id)
    {
        $proyekModel = new ProyekModel();
        $proyekLokasiModel = new ProyekLokasiModel();
        $lokasiModel = new LokasiModel();

        $proyek = $proyekModel->find($id);

        if (!$proyek) {
            return $this->failNotFound('Proyek tidak ditemukan');
        }

        $lokasiIds = $proyekLokasiModel->where('proyek_id', $id)->findAll();
        $lokasiData = [];
        foreach ($lokasiIds as $lokasiId) {
            $lokasi = $lokasiModel->find($lokasiId['lokasi_id']);
            if ($lokasi) {
                $lokasiData[] = $lokasi;
            }
        }
        $proyek['lokasi'] = $lokasiData;

        return $this->respond($proyek);
    }

    public function create()
    {
        $proyekModel = new ProyekModel();
        $proyekLokasiModel = new ProyekLokasiModel();

        $input = $this->request->getJSON(true);

        $data = [
            'nama_proyek' => $input['namaProyek'] ?? '',
            'client' => $input['client'] ?? '',
            'tgl_mulai' => $input['tglMulai'] ?? '',
            'tgl_selesai' => $input['tglSelesai'] ?? '',
            'pimpinan_proyek' => $input['pimpinanProyek'] ?? '',
            'keterangan' => $input['keterangan'] ?? '',
            'created_at' => $input['createdAt'] ?? '',
        ];

        if (!$proyekModel->save($data)) {
            return $this->fail($proyekModel->errors(), 400);
        }

        $proyekId = $proyekModel->getInsertID();
        
        $lokasiArray = $input['lokasi'] ?? []; 
        foreach ($lokasiArray as $lokasi) {
            if (isset($lokasi['id'])) {
                $proyekLokasiModel->insert([
                    'proyek_id' => $proyekId,
                    'lokasi_id' => $lokasi['id']
                ]);
            }
        }

        return $this->respondCreated(['id' => $proyekId] + $data, 'Proyek berhasil ditambahkan');
    }

    public function update($id)
    {
        $proyekModel = new ProyekModel();
        $proyekLokasiModel = new ProyekLokasiModel();

        $input = $this->request->getJSON(true);

        $data = [
            'nama_proyek' => $input['namaProyek'] ?? '',
            'client' => $input['client'] ?? '',
            'tgl_mulai' => $input['tglMulai'] ?? '',
            'tgl_selesai' => $input['tglSelesai'] ?? '',
            'pimpinan_proyek' => $input['pimpinanProyek'] ?? '',
            'keterangan' => $input['keterangan'] ?? '',
            'created_at' => $input['createdAt'] ?? '',
        ];

        if (!$proyekModel->update($id, $data)) {
            return $this->fail($proyekModel->errors(), 400);
        }

        $proyekLokasiModel->where('proyek_id', $id)->delete();

        $lokasiArray = $input['lokasi'] ?? []; 
        foreach ($lokasiArray as $lokasi) {
            if (isset($lokasi['id'])) {
                $proyekLokasiModel->insert([
                    'proyek_id' => $id,
                    'lokasi_id' => $lokasi['id']
                ]);
            }
        }

        return $this->respond(['id' => $id] + $data, 200, 'Proyek berhasil diperbarui');
    }

    public function delete($id)
    {
        $proyekModel = new ProyekModel();
        $proyekLokasiModel = new ProyekLokasiModel();
        
        $proyek = $proyekModel->find($id);
        if (!$proyek) {
            return $this->failNotFound('Proyek tidak ditemukan');
        }

        $proyekLokasiModel->where('proyek_id', $id)->delete();

        if ($proyekModel->delete($id)) {
            return $this->respondDeleted(['id' => $id], 'Proyek berhasil dihapus');
        } else {
            return $this->failServerError('Terjadi kesalahan saat menghapus proyek');
        }
    }
}
