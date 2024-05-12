<?php

namespace App\Models;

use CodeIgniter\Model;

class Buku extends Model
{
    protected $table = 'buku';

    public $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function select_all()
    {
        return $this->db->table($this->table)->join('penerbit', 'penerbit.id_penerbit = buku.id_penerbit')->get();
    }

    public function select_one($id)
    {

        return $this->db->table($this->table)->join('penerbit', 'penerbit.id_penerbit = buku.id_penerbit')->getWhere(['id_buku' => $id]);
    }

    public function insert_one($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function update_one($id, $data)
    {
        return $this->db->table($this->table)->update($data, ['id_buku' => $id]);
    }

    public function delete_one($id)
    {
        return $this->db->table($this->table)->delete(['id_buku' => $id]);
    }

    public function search($keyword)
    {
        return $this->db->table($this->table)->join('penerbit', 'penerbit.id_penerbit = buku.id_penerbit')->like('nama_buku', $keyword)->get();
    }

    public function lowest_stock()
    {
        $lowest = $this->db->query("SELECT MIN(stok) AS stok FROM " . $this->table);
        $stok = $lowest->getRow()->stok;
        return $this->db->table($this->table)->select("nama_buku, buku.id_penerbit, penerbit.nama")->join('penerbit', 'penerbit.id_penerbit = buku.id_penerbit')->getWhere(['stok' => $stok]);
    }

    public function get_next_id($kategori)
    {
        $query = $this->db->query("SELECT MAX(id_buku) AS id FROM " . $this->table . " WHERE kategori = '" . $kategori . "'");
        $id = $query->getRow()->id;
        $id = substr($id, 1);
        $id = (int)$id;
        $id++;
        $id = strtoupper(substr($kategori, 0, 1)) . $id;
        return $id;
    }
}
