<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_unit extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('produk_unit');
        if ($id != null) {
            $this->db->where('id_unit', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'nama_unit' => $post['nama_unit'],
        ];

        $this->db->insert('produk_unit', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama_unit' => $post['nama_unit'],
        ];

        $this->db->where('id_unit', $post['id_unit']);
        $this->db->update('produk_unit', $params);
    }


    public function delete($id)
    {
        $this->db->where('id_unit', $id);
        $this->db->delete('produk_unit');
    }
}
?>