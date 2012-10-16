<?php

class Api extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("taksi_model");
        
    }

    function index() {
        die();
    }
    function post(){
        $this->form_validation->set_rules("uid", "uid", "required");
        $this->form_validation->set_rules("nama", "nama", "required");
        $this->form_validation->set_rules("alamat", "alamat", "required");
        $this->form_validation->set_rules("tanggal", "tanggal", "required");
        $this->form_validation->set_rules("waktu", "waktu", "required");
        $this->form_validation->set_rules("nope", "nope", "required");
        $this->form_validation->set_rules("tujuan", "tujuan", "required");
        $this->form_validation->set_rules("jumlah", "jumlah", "required");
        //$this->form_validation->set_rules("phoneid", "phoneid", "required");
        if($this->form_validation->run()==true){
           $set = array(
		   	   "dev_id"=> $this->input->post("uid", true),
               "nama_pemesan"=>  $this->input->post("nama", true),
               "alamat_pemesan"=> $this->input->post("alamat", true),
               "waktu_pemesan"=> $this->input->post("tanggal", true)." ".$this->input->post("waktu", true),
               "tujuan"=> $this->input->post("tujuan", true),
               "nomor_telephon" => $this->input->post("nope", true),
               "jumlah_orang"=>  $this->input->post("jumlah", true)//,               "phoneid"=>  $this->input->post("phoneid", true)
           );
         $this->taksi_model->set_taksi($set);
           echo "true";
        }else {
            echo  "false";
        }
        
    }

}
?>
