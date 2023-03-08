<?php

class Masyarakat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('masyarakat_model');
		$this->load->model('auth_model');
		if(!$this->auth_model->current_user()){
			redirect('backend/auth/login');
		}
	}

	public function index()
	{
		$data['title'] = 'List Data Masyarakat';
        $data['activeUser'] = $this->auth_model->current_user();
        $data['masyarakat'] = $this->masyarakat_model->get_all();
        
		$this->load->view('backend/list_masyarakat', $data);
	}

	public function blokir()
    {
        $id = $this->uri->segment(4);
        $data = array('status'  => '0');
        $update = $this->masyarakat_model->update_masyarakat(array('id_masyarakat' => $id), $data);
        if ($update) {
            $this->session->set_flashdata('message', 'Data berhasil diblokir!');
        } else {
            $this->session->set_flashdata('message', 'Data gagal diblokir!');
        }
        redirect('backend/masyarakat');
    }
    public function aktifkan()
    {
        $id = $this->uri->segment(4);
        $data = array('status'  => '1');
        $update = $this->masyarakat_model->update_masyarakat(array('id_masyarakat' => $id), $data);
        $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">
            Data Petugas Telah Di-aktifkan kembali!
          </div>');
        redirect('backend/masyarakat');
    } 

    public function register()//method add digunakan untuk menampilkan form tambah data barang
	{
		$data['activeUser'] = $this->authfront_model->current_user(); //menampilkan level
		$masyarakat = $this->masyarakat_model;
		if ($this->input->method() === 'post'){
			$user = [ 
				"jk" => $this->input->post('jk'), 
                "nik" => $this->input->post('nik'),
                "nama" => $this->input->post('nama'),
                "email" => $this->input->post('email'),
                "no_hp" => $this->input->post('no_hp'),
                "alamat" => $this->input->post('alamat')  
			];
			$saved = $this->masyarakat_model->save($user);
			if ($saved) {
				$this->session->set_flashdata('message', 'Data berhasil disimpan!');
				redirect('authfront/register');
			}

		}
		$this->load->view('authfront/register', $data);
	}
}
