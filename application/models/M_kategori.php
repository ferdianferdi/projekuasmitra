<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kategori extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('produk_kategori');
        if ($id != null) {
            $this->db->where('id_kategori', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'nama_kategori' => $post['nama_kategori'],
        ];

        $this->db->insert('produk_kategori', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama_kategori' => $post['nama_kategori'],
        ];

        $this->db->where('id_kategori', $post['id_kategori']);
        $this->db->update('produk_kategori', $params);
    }


    public function delete($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('produk_kategori');
    }
}
?>