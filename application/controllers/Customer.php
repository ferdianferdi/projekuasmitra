<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_customer');
    }

    public function index()
    {
        $data['row'] = $this->m_customer->get();
        $this->template->load('template', 'customer/vcustomer', $data);
    }

    public function add_customer()
    {
        $customer = new stdClass();
        $customer->id_customer = null;
        $customer->nama_customer = null;
        $customer->jk_customer = null;

        $data = array(
            'page' => 'add',
            'row' => $customer,
        );
        $this->template->load('template', 'customer/form_customer', $data);
    }

    public function edit_customer($id)
    {
        $query = $this->m_customer->get($id);
        if ($query->num_rows() > 0) {
            $data['row'] = $query->row();
            $data['page'] = 'edit';
            $this->template->load('template', 'customer/form_customer', $data);
        } else {
            echo "<script>alert('Data Tidak Ditemukan');";
            echo "window.location='" . site_url('customer') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->m_customer->add($post);
        } else if (isset($_POST['edit'])) {
            $this->m_customer->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil disimpan');
        }
        redirect('customer');
    }

    public function delete_customer($id)
    {
        $this->m_customer->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil dihapus');
        }
        redirect('customer');
    }
}
?>