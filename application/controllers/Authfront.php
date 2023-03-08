<?php

class Authfront extends CI_Controller
{
    public function index()
    {
        show_404();
    }

    public function login_front()
    {
        $this->load->model('authfront_model');
        $this->load->library('form_validation');

        $rules = $this->authfront_model->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            return $this->load->view('login_front');
        }

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($this->authfront_model->login($username, $password)) {
            redirect('page');
        } else {
            $this->session->set_flashdata('message_login_error', 'Login Gagal, pastikan username dan passwrod benar!');
        }

        $this->load->view('login_front');
    }

    public function logout()
    {
        $this->load->model('authfront_model');
        $this->authfront_model->logout();
        redirect('page');
    }

	public function register()//method add digunakan untuk menampilkan form tambah data barang
	{
		$data['activeUser'] = $this->auth_model->current_user(); //menampilkan level
		$user = $this->users_model;
		if ($this->input->method() === 'post'){
			$user = [ 
				"username" => $this->input->post('username'),
                "password" => $this->input->post('password'),
                "nip" => $this->input->post('nip'),
                "nama" => $this->input->post('nama'),
                "email" => $this->input->post('email'),
                "no_hp" => $this->input->post('no_hp'),
                "password" => $this->input->post('password'),
                "level" => $this->input->post('level') 
			];
			$saved = $this->users_model->save($user);
			if ($saved) {
				$this->session->set_flashdata('message', 'Data berhasil disimpan!');
				redirect('backend/users');
			}

		}
		$this->load->view('backend/add_user', $data);
	}
}
