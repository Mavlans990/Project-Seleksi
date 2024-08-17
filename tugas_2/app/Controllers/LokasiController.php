<?php namespace App\Controllers;

use App\Models\LokasiModel;

class LokasiController extends BaseController
{
    public function index()
    {
        $model = new LokasiModel();
        $data['lokasi'] = $model->findAll();
        return view('lokasi/index', $data);
    }

    public function create()
    {
        return view('lokasi/create');
    }

    public function store()
    {
        $model = new LokasiModel();
        $model->save([
            'nama_lokasi' => $this->request->getPost('nama_lokasi'),
            'negara' => $this->request->getPost('negara'),
            'provinsi' => $this->request->getPost('provinsi'),
            'kota' => $this->request->getPost('kota')
        ]);
        return redirect()->to('/lokasi');
    }

    public function edit($id)
    {
        $model = new LokasiModel();
        $data['lokasi'] = $model->find($id);
        return view('lokasi/edit', $data);
    }

    public function update($id)
    {
        $model = new LokasiModel();
        $model->update($id, [
            'nama_lokasi' => $this->request->getPost('nama_lokasi'),
            'negara' => $this->request->getPost('negara'),
            'provinsi' => $this->request->getPost('provinsi'),
            'kota' => $this->request->getPost('kota')
        ]);
        return redirect()->to('/lokasi');
    }

    public function delete($id)
    {
        $model = new LokasiModel();
        $model->delete($id);
        return redirect()->to('/lokasi');
    }
}
