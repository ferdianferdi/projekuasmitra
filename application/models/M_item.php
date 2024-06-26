<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_item extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select('produk_item.*, produk_kategori.nama_kategori as nama_kategori, produk_unit.nama_unit');
        $this->db->from('produk_item');
        $this->db->join('produk_kategori', 'produk_kategori.id_kategori = produk_item.id_kategori');
        $this->db->join('produk_unit', 'produk_unit.id_unit = produk_item.id_unit');
        if ($id != null) {
            $this->db->where('id_item', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'id_kategori' => $post['kategori'],
            'id_unit' => $post['unit'],
            'nama_item' => $post['nama_item'],
            'harga_item' => $post['harga_item'],
        ];
        $this->db->insert('produk_item', $params);
    }

    public function edit($post)
    {
        $params = [
            'id_kategori' => $post['kategori'],
            'id_unit' => $post['unit'],
            'nama_item' => $post['nama_item'],
            'harga_item' => $post['harga_item'],
        ];
        $this->db->where('id_item', $post['id_item']);
        $this->db->update('produk_item', $params);
    }

    public function delete($id)
    {
        $this->db->where('id_item', $id);
        $this->db->delete('produk_item');
    }

}
?>