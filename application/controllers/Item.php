<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['m_kategori', 'm_unit', 'm_item']);
    }

    public function index()
    {
        $data['row'] = $this->m_item->get();
        $this->template->load('template', 'produk/item/vitem', $data);
    }

    public function add_item()
    {
        $item = new stdClass();
        $item->id_item = null;
        $item->id_kategori = null;
        $item->id_unit = null;
        $item->nama_item = null;
        $item->harga_item = null;

        $kategori = $this->m_kategori->get();
        $unit = $this->m_unit->get();

        $data = array(
            'page' => 'add',
            'row' => $item,
            'kategori' => $kategori,
            'unit' => $unit
        );
        $this->template->load('template', 'produk/item/form_item', $data);
    }

    public function edit_item($id)
    {
        $query = $this->m_item->get($id);
        if ($query->num_rows() > 0) {
            $item = $query->row();
            $kategori = $this->m_kategori->get();
            $unit = $this->m_unit->get();

            $data = array(
                'page' => 'edit',
                'row' => $item,
                'kategori' => $kategori,
                'unit' => $unit
            );
            $this->template->load('template', 'produk/item/form_item', $data);
        } else {
            $this->session->set_flashdata('error', 'Data Tidak Ditemukan');
            redirect('item');
        }

    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->m_item->add($post);
        } else if (isset($_POST['edit'])) {
            $this->m_item->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil disimpan');
            redirect('item');
        }
    }

    public function delete_item($id)
    {
        $this->m_item->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil');
        }
        redirect('item');
    }
}
?>