<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masyarakat_model extends CI_Model
{ 
    private $_table = 'masyarakat'; 

    public function get_all()
    {
        $query = $this->db->get_where($this->_table);
        return $query->result(); 
    }

    function update_masyarakat($where, $data)
    {
        $this->db->update('masyarakat', $data, $where);
        return $this->db->affected_rows();
    }

    public function get_by_user($email) //menampilkan login masyarakat di frontend
    {
        $query = $this->db->get_where($this->_table, array('email' => $email));
        return $query;
    }

    public function get_by_id($id) //menampilkan change password
    {
        $query = $this->db->get_where($this->_table, array('id_masyarakat' => $id));
        return $query->row();
    }

    public function verify($email, $password)  //change password
    {
        $this->db->where('email', $email);
        $query = $this->db->get($this->_table);
        $data = $query->row();
        if (!password_verify($password, $data->password)) {
            return FALSE;
        }
        return true;
    }

    public function update($data) //change password
    {
        if (!isset($data['id_masyarakat'])) {
            return;
        }
        return $this->db->update($this->_table, $data, ['id_masyarakat' => $data['id_masyarakat']]);
    }

    public function insert($data) //menyimpan data masyarakat di register
    {
        $this->db->insert($this->_table, $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
}