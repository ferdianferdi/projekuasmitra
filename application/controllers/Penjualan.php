<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('m_penjualan');
    }

    public function index()
    {
        $this->load->model('m_customer');
        $customer = $this->m_customer->get()->result();
        $data = array(
            'customer' => $customer,
            'struk' => $this->m_penjualan->no_struk(),
        );
        $this->template->load('template', 'transaksi/form_penjualan', $data);
    }
}
?>