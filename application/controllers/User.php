<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('m_user');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['row'] = $this->m_user->get();
        $this->template->load('template', 'user/vuser', $data);
    }

    public function add_user()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules(
            'konfpass',
            'Konfirmasi Password',
            'trim|required|matches[password]',
            array('matches' => 'Password Tidak Sesuai')
        );
        $this->form_validation->set_rules('posisi', 'Posisi', 'required');
        $this->form_validation->set_message('required', 'Tolong isi %s terlebih dahulu');
        $this->form_validation->set_message('is_unique', '%s ini sudah dipakai');
        $this->form_validation->set_message('min_length', '%s minimal harus 6 karakter');

        if
        ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'user/add_user');
        } else {
            $post = $this->input->post(null, TRUE);
            $this->m_user->add($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data Berhasil disimpan');
            }
            redirect('user');
        }
    }

    public function edit_user($id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|callback_check_username');
        if ($this->input->post('password')) {
            $this->form_validation->set_rules('password', 'Password', 'trim|max_length[6]');
            $this->form_validation->set_rules(
                'konfpass',
                'Konfirmasi Password',
                'trim|matches[password]',
                array('matches' => 'Password Tidak Sesuai')
            );
        }
        if ($this->input->post('konfpass')) {
            $this->form_validation->set_rules(
                'konfpass',
                'Konfirmasi Password',
                'trim|matches[password]',
                array('matches' => 'Password Tidak Sesuai')
            );
        }
        $this->form_validation->set_rules('posisi', 'Posisi', 'required');
        $this->form_validation->set_message('required', 'Tolong isi %s terlebih dahulu');
        $this->form_validation->set_message('is_unique', '%s ini sudah dipakai');
        $this->form_validation->set_message('max_length', '%s minimal harus 6 karakter');

        if
        ($this->form_validation->run() == FALSE) {
            $query = $this->m_user->get($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $this->template->load('template', 'user/edit_user', $data);
            } else {
                echo "<script> 
                alert('Data Tidak Ada');
                window.location='" . site_url('user') . "';
                </script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->m_user->edit($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data Berhasil diubah');
            }
            redirect('user');
        }
    }

    function check_username()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND id != '$post[id]'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('check_username', '%s ini sudah dipakai, silahkan ganti yang lain');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function delete_user($id)
    {
        $where = array('id' => $id);
        $this->m_user->delete($where, 'user');
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil dihapus');
        }
        redirect(base_url('user'));
    }
}