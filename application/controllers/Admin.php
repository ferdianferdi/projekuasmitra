<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function login()
    {
        check_already_login();
        $this->load->view('admin/login');
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['login'])) {
            $this->load->model('m_user');
            $query = $this->m_user->login($post);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'id_user' => $row->id,
                    'posisi' => $row->posisi
                );
                $this->session->set_userdata($params);
                echo "<script>
                    alert('Login Berhasil');
                    window.location='" . site_url('dashboard') . "';
                </script>";
            } else {
                echo "<script>
                    alert('Login Gagal, username/password salah');
                    window.location='" . site_url('admin/login') . "';
                </script>";
            }
        }
    }

    public function logout()
    {
        $params = array('id_user', 'posisi');
        $this->session->unset_userdata($params);
        redirect('admin/login');
    }
}