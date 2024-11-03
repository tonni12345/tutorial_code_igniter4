<?php

namespace App\Controllers;

class Home extends BaseController
{

    private $model;
    private $modelPenerbit;

    public function __construct()
    {
        $this->model = model('BukuModels');
        $this->modelPenerbit = model('PenerbitModels');
    }

    public function index()
    {
        $data = [];
        if (isset($_POST['query_buku']) && !empty($_POST['query_buku'])) {
            $data = array(
                'title' => 'Daftar Buku',
                'buku' => $this->model->search($_POST['query_buku'])->getResult(),
                'query' => $_POST['query_buku']
            );
        } else {
            $data = array(
                'title' => 'Daftar Buku',
                'buku' => $this->model->select_all()->getResult()
            );
        }
        return view('index', $data);
    }

    public function admin()
    {
        if (!session()->get("loginData") || session()->get("loginData")["isLoggedIn"] != true) {
            return redirect()->to(base_url('login'));
        }
        $data = array(
            'title' => 'Daftar Buku',
            'title2' => 'Daftar Penerbit',
            'buku' => $this->model->select_all()->getResult(),
            'penerbit' => $this->modelPenerbit->select_all()->getResult()
        );

        return view('admin', $data);
    }

    public function chart()
    {
        $data = array(
            'title' => 'Chart',
            'penerbit' => $this->modelPenerbit->get_chart_data()
        );
        return view('chart', $data);
    }

    public function pengadaan()
    {
        $data = array(
            'title' => 'Buku yang perlu diadakan',
            'buku' => $this->model->lowest_stock()->getResult()
        );
        return view('pengadaan', $data);
    }

    public function cari()
    {
        $keyword = $this->request->getPost('keyword');
        $data = array(
            'title' => 'Hasil Pencarian',
            'buku' => $this->model->search($keyword)->get()->getResult()
        );
        return view('cari', $data);
    }

    public function tambah($jenis = 'buku')
    {
        if (!session()->get("loginData") || session()->get("loginData")["isLoggedIn"] != true) {
            return redirect()->to(base_url('login'));
        }
        $data = array(
            'title' => 'Tambah Buku',
            'jenis' => $jenis,
            'penerbit' => $this->modelPenerbit->select_all()->getResult()
        );
        return view('create', $data);
    }

    public function simpan()
    {
        if (!session()->get("loginData") || session()->get("loginData")["isLoggedIn"] != true) {
            return redirect()->to(base_url('login'));
        }
        if (isset($_POST['buku'])) {
            $data = array(
                'id_buku' => $this->model->get_next_id($this->request->getPost('kategori')),
                'nama_buku' => $this->request->getPost('nama_buku'),
                'id_penerbit' => $this->request->getPost('id_penerbit'),
                'stok' => $this->request->getPost('stok'),
                'harga' => $this->request->getPost('harga'),
                'kategori' => $this->request->getPost('kategori')
            );
            $this->model->insert_one($data);
            return redirect()->to(base_url('admin'));
        } else if (isset($_POST['penerbit'])) {
            $data = array(
                'id_penerbit' => $this->modelPenerbit->get_next_id(),
                'nama' => $this->request->getPost('nama'),
                'alamat' => $this->request->getPost('alamat'),
                'kota' => $this->request->getPost('kota'),
                'telepon' => $this->request->getPost('telepon')
            );
            $this->modelPenerbit->insert_one($data);
            return redirect()->to(base_url('admin'));
        } else {
            return redirect()->to(base_url('admin'));
        }
    }

    public function edit($id)
    {
        if (!session()->get("loginData") || session()->get("loginData")["isLoggedIn"] != true) {
            return redirect()->to(base_url('login'));
        }
        if (isset($_POST['nama_buku'])) {
            $data = array(
                'nama_buku' => $this->request->getPost('nama_buku'),
                'id_penerbit' => $this->request->getPost('id_penerbit'),
                'stok' => $this->request->getPost('stok'),
                'harga' => $this->request->getPost('harga'),
            );
            $id_buku = $this->request->getPost('id_buku');
            $this->model->update_one($id_buku, $data);
            return redirect()->to(base_url('admin'));
        } else if (substr($id, 0, 2) !== "SP") {
            $data = array(
                'title' => 'Edit Buku',
                'buku' => $this->model->select_one($id)->getRow(),
                'jenis' => "Buku",
                'penerbit' => $this->modelPenerbit->select_all()->getResult()
            );
            return view('edit', $data);
        } else if (isset($_POST['nama'])) {
            $data = array(
                'nama' => $this->request->getPost('nama'),
                'alamat' => $this->request->getPost('alamat'),
                'telepon' => $this->request->getPost('telepon'),
                'kota' => $this->request->getPost('kota')
            );
            $id_buku = $this->request->getPost('id_penerbit');
            $this->modelPenerbit->update_one($id_buku, $data);
            return redirect()->to(base_url('admin'));
        } else if (substr($id, 0, 2) == "SP") {
            $data = array(
                'title' => 'Edit Penerbit',
                'penerbit' => $this->modelPenerbit->select_one($id)->getRow(),
                'jenis' => "Penerbit"
            );
            return view('edit', $data);
        }
    }

    public function update()
    {
        if (!session()->get("loginData") || session()->get("loginData")["isLoggedIn"] != true) {
            return redirect()->to(base_url('login'));
        }
        if (isset($_POST['id_buku'])) {

            $id = $this->request->getPost('id_buku');
            $data = array(
                'nama_buku' => $this->request->getPost('nama'),
                'penerbit' => $this->request->getPost('penerbit'),
                'stok' => $this->request->getPost('stok'),
                'harga' => $this->request->getPost('harga'),
                'kategori' => $this->request->getPost('kategori')
            );
            $this->model->update_one($id, $data);
            return redirect()->to(base_url('admin'));
        } else if (isset($_POST['id_penerbit'])) {
            $id = $this->request->getPost('id_penerbit');
            $data = array(
                'nama' => $this->request->getPost('nama'),
                'alamat' => $this->request->getPost('alamat'),
                'telepon' => $this->request->getPost('telepon'),
                'kota' => $this->request->getPost('kota')
            );
            $this->modelPenerbit->update_one($id, $data);
            return redirect()->to(base_url('admin'));
        } else {
            return redirect()->to(base_url('admin'));
        }
    }

    public function hapus($id)
    {
        if (!session()->get("loginData") || session()->get("loginData")["isLoggedIn"] != true) {
            return redirect()->to(base_url('login'));
        }
        $this->model->delete_one($id);
        $this->modelPenerbit->delete_one($id);

        return redirect()->to(base_url('admin'));
    }

    public function export()
{
    $buku = $this->model->select_all()->getResult();
    
    // Set the headers to force download
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="buku_export.csv"');
    header('Pragma: no-cache');
    header('Expires: 0');

    // Create a file pointer connected to the output stream
    $output = fopen('php://output', 'write');

    // Output the column headings
    fputcsv($output, ['No', 'Kategori', 'Nama Buku', 'Harga', 'Stok', 'Penerbit']);

    // Output each row of the data
    $i = 1;
    foreach ($buku as $cihuy) {
        fputcsv($output, [$i++, $cihuy->kategori, $cihuy->nama_buku, $cihuy->harga, $cihuy->stok, $cihuy->nama]);
    }

    fclose($output);
    exit();
}

}
