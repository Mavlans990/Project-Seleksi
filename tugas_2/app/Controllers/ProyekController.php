<?php namespace App\Controllers;

use App\Models\ProyekModel;

class ProyekController extends BaseController
{
    public function index()
    {
        $model = new ProyekModel();
        $data['proyek'] = $model->findAll();
        return view('proyek/index', $data);
    }

    public function create()
    {
        return view('proyek/create');
    }

    public function store()
    {
        $model = new ProyekModel();
        $model->save([
            'nama_proyek' => $this->request->getPost('nama_proyek'),
            'client' => $this->request->getPost('client'),
            'tgl_mulai' => $this->request->getPost('tgl_mulai'),
            'tgl_selesai' => $this->request->getPost('tgl_selesai'),
            'pimpinan_proyek' => $this->request->getPost('pimpinan_proyek'),
            'keterangan' => $this->request->getPost('keterangan')
        ]);
        return redirect()->to('/proyek');
    }

    public function edit($id)
    {
        $model = new ProyekModel();
        $data['proyek'] = $model->find($id);
        return view('proyek/edit', $data);
    }

    public function update($id)
    {
        $model = new ProyekModel();
        $model->update($id, [
            'nama_proyek' => $this->request->getPost('nama_proyek'),
            'client' => $this->request->getPost('client'),
            'tgl_mulai' => $this->request->getPost('tgl_mulai'),
            'tgl_selesai' => $this->request->getPost('tgl_selesai'),
            'pimpinan_proyek' => $this->request->getPost('pimpinan_proyek'),
            'keterangan' => $this->request->getPost('keterangan')
        ]);
        return redirect()->to('/proyek');
    }

    public function delete($id)
    {
        $model = new ProyekModel();
        $model->delete($id);
        return redirect()->to('/proyek');
    }
}
