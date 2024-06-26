<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_customer extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('customer');
        if ($id != null) {
            $this->db->where('id_customer', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'nama_customer' => $post['nama_customer'],
            'jk_customer' => $post['jk_customer']
        ];

        $this->db->insert('customer', $params);
    }

    public function delete($id)
    {
        $this->db->where('id_customer', $id);
        $this->db->delete('customer');
    }
}
?>