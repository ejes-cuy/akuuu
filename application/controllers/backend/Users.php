<?php

class Users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		$this->load->model('auth_model');
		if(!$this->auth_model->current_user()){
			redirect('backend/auth/login');
		}
	}

	public function index()
	{
		$data['title'] = 'List Data User';
        $data['activeUser'] = $this->auth_model->current_user();
        $data['users'] = $this->users_model->get_all();
        
		$this->load->view('backend/list_user', $data);
	}
	 
	public function delete($id_user = null)
	{
		
		$data['activeUser'] = $this->auth_model->current_user(); //menampilkan level
        $this->users_model->delete($id_user); 
		redirect("backend/Users");

	}
	
	public function add()//method add digunakan untuk menampilkan form tambah data barang
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

	public function edit($id = null)
	{
		$data['activeUser'] = $this->auth_model->current_user(); //menampilkan level
		$data['users'] = $this->users_model->find($id);

		if (!$data['users'] || !$id) {
			show_404();
		}

		if ($this->input->method() === 'post') {
			// TODO: lakukan validasi data seblum simpan ke model
			$user = [
				'id_user' => $id,
				'nip' => $this->input->post('nip'),
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'no_hp' => $this->input->post('no_hp'),
                'level' => $this->input->post('level'),
				'status' => $this->input->post('status') 
			];
			$updated = $this->users_model->update($user);
			if ($updated) {
				$this->session->set_flashdata('message', 'Article was updated');
				redirect('backend/users');
			}
		}

		$this->load->view('backend/edit_user', $data);
	} 

	public function blokir()
    {
        $id = $this->uri->segment(4);
        $data = array('status'  => '0');
        $update = $this->users_model->update_admin(array('id_user' => $id), $data);
        $this->session->set_flashdata('gagal', '<div class="alert alert-success" role="alert">
            Data Petugas Telah Dinon-aktif!
          </div>');
        redirect('backend/users');
    }

	public function change($id_user = null)
    {
        $data['activeUser'] = $this->auth_model->current_user();
        $data['user'] = $this->users_model->get_by_id($id_user);
        if ($data['activeUser']->level <> 'Admin' && $data['activeUser']->username <> $data['user']->username) {
            show_404();
        }
        if ($this->input->method() === 'post') {
            $current = $this->input->post('current');
            $verify = $this->users_model->verify($data['user']->username, $current);
            if (!$verify) {
                $this->session->set_flashdata('message', 'Current password salah!');
            } else {
                $user = [
                    'id_user'   => $id_user,
                    'password'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
                ];
                $update = $this->users_model->update($user);
                if ($update) {
                    $this->session->set_flashdata('message', 'Password berhasil diubah!');
                    if ($data['activeUser']->username == $data['user']->username) {
                        $this->auth_model->logout();
                        redirect('backend');
                    }
                    redirect('backend/users');
                } else {
                    $this->session->set_flashdata('message', 'Password gagal diubah!');
                }
            }
        }
        $this->load->view('backend/change_password', $data);
    }
}
