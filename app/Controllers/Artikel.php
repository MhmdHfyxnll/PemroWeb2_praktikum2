<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

class Artikel extends BaseController
{
    public function __construct()
    {
        if (strpos(current_url(), 'admin') && !session()->get('logged_in')) {
            header('Location: /login');
            exit;
        }
    }

    public function index()
    {
        $model = new ArtikelModel();
        $data['artikel'] = $model->findAll();
        $data['title'] = 'Daftar Artikel';

        return view('artikel/index', $data);
    }

    public function view($slug)
    {
        $model = new ArtikelModel();
        $data['artikel'] = $model->where(['slug' => $slug])->first();

        if (!$data['artikel']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data['title'] = $data['artikel']['judul'];
        return view('artikel/detail', $data);
    }

    public function admin_index()
    {
        $model = new ArtikelModel();
        $data['artikel'] = $model->findAll();
        $data['title'] = 'Admin Artikel';

        return view('artikel/admin_index', $data);
    }

    public function add()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'judul' => 'required|min_length[3]',
            'isi'   => 'required',
            'gambar' => 'uploaded[gambar]|is_image[gambar]|max_size[gambar,2048]'
        ]);

        if ($validation->withRequest($this->request)->run()) {

            $file = $this->request->getFile('gambar');
            $namaGambar = $file->getRandomName();
            $file->move('gambar', $namaGambar);

            $model = new ArtikelModel();
            $model->insert([
                'judul' => $this->request->getPost('judul'),
                'isi' => $this->request->getPost('isi'),
                'slug' => url_title($this->request->getPost('judul')),
                'gambar' => $namaGambar,
                'status' => 1
            ]);

            return redirect()->to('/admin/artikel');
        }

        return view('artikel/form_add', [
            'title' => 'Tambah Artikel',
            'validation' => $validation
        ]);
    }

    public function edit($id)
    {
        $model = new ArtikelModel();
        $dataLama = $model->find($id);

        $validation = \Config\Services::validation();

        $validation->setRules([
            'judul' => 'required|min_length[3]',
            'isi'   => 'required',
            'gambar' => 'is_image[gambar]|max_size[gambar,2048]'
        ]);

        if ($validation->withRequest($this->request)->run()) {

            $dataUpdate = [
                'judul' => $this->request->getPost('judul'),
                'isi' => $this->request->getPost('isi'),
            ];

            $file = $this->request->getFile('gambar');

            if ($file && $file->isValid() && !$file->hasMoved()) {

                // hapus gambar lama
                if ($dataLama['gambar'] && file_exists('gambar/' . $dataLama['gambar'])) {
                    unlink('gambar/' . $dataLama['gambar']);
                }

                // upload baru
                $namaGambar = $file->getRandomName();
                $file->move('gambar', $namaGambar);

                $dataUpdate['gambar'] = $namaGambar;
            }

            $model->update($id, $dataUpdate);
            return redirect()->to('/admin/artikel');
        }

        return view('artikel/form_edit', [
            'title' => 'Edit Artikel',
            'data' => $dataLama,
            'validation' => $validation
        ]);
    }

    public function delete($id)
    {
        $model = new ArtikelModel();
        $data = $model->find($id);

        // hapus gambar juga
        if ($data['gambar'] && file_exists('gambar/' . $data['gambar'])) {
            unlink('gambar/' . $data['gambar']);
        }

        $model->delete($id);
        return redirect()->to('/admin/artikel');
    }
}