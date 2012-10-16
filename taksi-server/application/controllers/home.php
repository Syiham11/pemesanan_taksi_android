<?php

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("mtaksi");
    }

    function index($id="") {
        if($id!=""){
		$this->session->set_userdata('uid',$id);
        $data["pemesans"]=$this->mtaksi->getpesan($id);
        $data["content"]="home";
        $this->load->view("home_template",$data);
        }
    }
	
	function batal($id="") {
        if($id!=""){
		$this->mtaksi->updateMobile($id);
		redirect('/home/index/'.$this->session->userdata('uid'));
        //$data["pemesans"]=$this->mtaksi->getpesan($id);
        //$data["content"]="home";
        //$this->load->view("home_template",$data);
        }
	}
	function hapusdata()
	 {
   $this->home->delete_row();
   $this->index();
   }
}
?>
