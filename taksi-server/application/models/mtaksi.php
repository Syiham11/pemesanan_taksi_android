<?php

class Mtaksi extends CI_Model {

    var $table;

    function __construct() {
        parent::__construct();
        $this->table = "data_user";
    }

    function getAll() {
        $this->db->order_by("waktu_pemesan", "desc");
        $result = $this->db->get($this->table);

        if ($result->num_rows() > 0) {
            return $result->result_array();
        }
    }

    function getone($id) {
        $this->db->where("id_datauser", "apa");
        $result = $this->db->get($this->table);
        if ($result->num_rows() == 1) {
            return $result->row_array();
        }
    }

    function save($data) {
        $this->db->insert($this->table, $data);
    }

    function update($id, $data) {
        $this->db->where("id_datauser", $id);
        $this->db->update($this->table, $data);
    }

    function updateMobile($id) {
		$this->db->query("update data_user set status='batal' where id_datauser=".$id);
    }

    function delete($id) {
        $this->db->where("id_datauser", $id);
        $this->db->delete($this->table);
    }

    function search($key) {
        $this->db->like("nama_pemesan", $key);
        $this->db->order_by("waktu_pemesan", "desc");
        $result = $this->db->get($this->table);

        if ($result->num_rows() > 0) {
            return $result->result_array();
        }
    }
	
    function cekPass($pass) {
		$cek = $this->db->query("select * from user where password_user='".md5($pass)."' and id_user='".$this->session->userdata('id')."'");
		if ($cek->num_rows() > 0) return true;
		else return false;
    }
	
	function simpanPass($pass){
		$data['password_user'] = md5($pass);
		$this->db->where('id_user', $this->session->userdata('id'));
		$this->db->update('user', $data);
	}

    function get_data_uid($id)
    {
        $this->db->select('*');
        $this->db->from('data_user');
		$query = $this->db->get_where('data_user', array('dev_id'=>$id));
        return $query;
    }
	
    function getpesan($id) {
        $this->db->where("dev_id", $id);
        //$this->db->order_by("waktu_pemesan", "desc");
        $result = $this->db->get($this->table);

        if ($result->num_rows() > 0) {
            return $result->result_array();
        }
    }

}
?>
