<?php 
    class Registrasi extends CI_Controller{
        public function index(){
            $data['judul'] ='Register';
            $this->load->view('admin/templates/admin_header',$data);
            $this->load->view('admin/registrasi',$data);
            $this->load->view('admin/templates/admin_footer');
        }
    }
 ?>