<?php

Class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mtaksi');
        if($this->session->userdata("login")!="true"){
            redirect("login");
        }
    }

    function index() {
		$data["err_code"] = $this->session->userdata('err_code');
        $data["content"] = "dashboard";
        $this->load->view('template', $data);
    }

    function pemesan() {
        $data["pemesans"] = $this->mtaksi->getall();
        $data["content"] = "pemesan";
        $this->load->view('template', $data);
    }
    
    function hapus_pemesan($id_datauser) {
        $this->mtaksi->delete($id_datauser);
        $this->session->set_flashdata("notif","Data pemesan berhasil dihapus");
        redirect("admin/pemesan");
    }

    function aksi() {
        $this->form_validation->set_rules("status", "status", "required");
        if($this->form_validation->run()==true){
                 $status = $this->input->post("status", true);
                 foreach ($status as $sts=>$key){
                   
                    $this->mtaksi->update($sts,array("status"=>$key));
                 }
                 $this->session->set_flashdata("notif","Status terupdate");
                 redirect("admin/pemesan");
        }
   
     
    }
    function delete($id=""){
        if($id!=""){
            
        }
    }
	
	function simpanPassword(){
        $password= $this->input->post("pass_lama", true);
		$pass1= $this->input->post("pass1", true);
		$pass2= $this->input->post("pass2", true);
		if($this->mtaksi->cekPass($password)==true){
			if($pass1==$pass2){
				$this->mtaksi->simpanPass($pass1);
			}
			else{
				$this->session->set_userdata('err_code',2);
			}
		}
		else{
			$this->session->set_userdata('err_code',1);
		}
		redirect('admin');
	}
	
    function search(){
        $key = $this->input->get("s", true);
         $data["pemesans"] = $this->mtaksi->search($key);
        $data["content"] = "pemesan";
        $this->load->view('template', $data);
    }
    function logout() {
        $this->session->unset_userdata("id");
        $this->session->unset_userdata("login");
        $this->session->set_flashdata("notif", "Anda telah keluar dari sistem");
        redirect("login");
    }

}
?>