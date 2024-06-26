<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_unit');
    }

    public function index()
    {
        $data['row'] = $this->m_unit->get();
        $this->template->load('template', 'produk/unit/vunit', $data);
    }

    public function add_unit()
    {
        $unit = new stdClass();
        $unit->id_unit = null;
        $unit->nama_unit = null;

        $data = array(
            'page' => 'add',
            'row' => $unit,
        );
        $this->template->load('template', 'produk/unit/form_unit', $data);
    }

    public function edit_unit($id)
    {
        $query = $this->m_unit->get($id);
        if ($query->num_rows() > 0) {
            $data['row'] = $query->row();
            $data['page'] = 'edit';
            $this->template->load('template', 'produk/unit/form_unit', $data);
        } else {
            echo "<script>alert('Data Tidak Ditemukan');";
            echo "window.location='" . site_url('unit') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->m_unit->add($post);
        } else if (isset($_POST['edit'])) {
            $this->m_unit->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil disimpan');
        }
        redirect('unit');
    }

    public function delete_unit($id)
    {
        $this->m_unit->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil dihapus');
        }
        redirect('unit');
    }
}
?>