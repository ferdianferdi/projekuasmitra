<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kategori');
    }

    public function index()
    {
        $data['row'] = $this->m_kategori->get();
        $this->template->load('template', 'produk/kategori/vkategori', $data);
    }

    public function add_kategori()
    {
        $kategori = new stdClass();
        $kategori->id_kategori = null;
        $kategori->nama_kategori = null;

        $data = array(
            'page' => 'add',
            'row' => $kategori,
        );
        $this->template->load('template', 'produk/kategori/form_kategori', $data);
    }

    public function edit_kategori($id)
    {
        $query = $this->m_kategori->get($id);
        if ($query->num_rows() > 0) {
            $data['row'] = $query->row();
            $data['page'] = 'edit';
            $this->template->load('template', 'produk/kategori/form_kategori', $data);
        } else {
            echo "<script>alert('Data Tidak Ditemukan');";
            echo "window.location='" . site_url('kategori') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->m_kategori->add($post);
        } else if (isset($_POST['edit'])) {
            $this->m_kategori->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil disimpan');
        }
        redirect('kategori');
    }

    public function delete_kategori($id)
    {
        $this->m_kategori->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil dihapus');
        }
        redirect('kategori');
    }
}
?>