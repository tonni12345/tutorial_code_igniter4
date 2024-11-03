<?php

namespace App\Models;

use CodeIgniter\Model;

class Penerbit extends Model
{
    protected $table = 'penerbit';

    public $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function select_all()
    {
        return $this->db->table($this->table)->get();
    }

    public function select_one($id)
    {

        return $this->db->table($this->table)->getWhere(['id_penerbit' => $id]);
    }

    public function insert_one($data)
    {
        $telepon = $this->db->escapeString($data['telepon']);
        if (substr($telepon, 0, 2) === "08") {
            $chunks = str_split($telepon, 4);
            $result = implode('-', $chunks);
            $data['telepon'] = $result;
        } else {
            $data['telepon'] = substr($telepon, 0, 3) . "-" . substr($telepon, 3);
        }
        return $this->db->table($this->table)->insert($data);
    }

    public function update_one($id, $data)
    {
        $telepon = $this->db->escapeString($data['telepon']);
        if (substr($telepon, 0, 2) === "08") {
            $chunks = str_split($telepon, 4);
            $result = implode('-', $chunks);
            $data['telepon'] = $result;
        } else {
            $data['telepon'] = substr($telepon, 0, 3) . "-" . substr($telepon, 3);
        }
        return $this->db->table($this->table)->update($data, ['id_penerbit' => $id]);
    }

    public function delete_one($id)
    {
        return $this->db->table($this->table)->delete(['id_penerbit' => $id]);
    }

    public function get_next_id()
    {
        $query = $this->db->query("SELECT MAX(id_penerbit) AS id FROM " . $this->table);
        $id = $query->getRow()->id;
        $id = substr($id, 2);
        $id = (int) $id;
        $id++;
        $id = "SP" . $id;
        return $id;
    }

    public function get_chart_data()
    {
        $query = $this->db->query("SELECT penerbit.nama, COUNT(buku.id_penerbit) AS jumlah FROM penerbit LEFT JOIN buku ON penerbit.id_penerbit = buku.id_penerbit GROUP BY penerbit.id_penerbit");
        return $query->getResult();
    }
}
