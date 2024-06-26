<?php

class Fungsi
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    function login_user()
    {
        $this->ci->load->model('m_user');
        $id = $this->ci->session->userdata('id_user');
        $user_data = $this->ci->m_user->get($id)->row();
        return $user_data;
    }

    function count_user()
    {
        $this->ci->load->model('m_user');
        return $this->ci->m_user->get()->num_rows();
    }

    function count_customer()
    {
        $this->ci->load->model('m_customer');
        return $this->ci->m_customer->get()->num_rows();
    }

    function count_item()
    {
        $this->ci->load->model('m_item');
        return $this->ci->m_item->get()->num_rows();
    }

}