<?php
    class dosen extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model('Dosen_model');
        }
        public function index() {
            $data['judul']= 'Lecture Page';
            $data['dosen']= $this->Dosen_model->getAllDosen();
            if($this->input->post('keyword')){
                $data['dosen']= $this->Dosen_model->cariDataDosen();
            }
            $this->form_validation->set_rules('nip','NIP','required|is_unique[dosen.nip]');
            $this->form_validation->set_rules('namadosen','Lecture name','required');
            if($this->form_validation->run()== False){
                $this->load->view('templates/header',$data);
                $this->load->view('dosen/index',$data);
                $this->load->view('templates/footer'); 
            }else{
                $data =[
                    'nip' => $this->input->post('nip'),
                    'namadosen' => $this->input->post('namadosen'),
                ];
                $this->db->insert('dosen',$data);
                $this->session->set_flashdata('flash', ' <strong>successfully added</strong>.');
                redirect('dosen');
            }
        }
        public function ubah($id = null)
        {
            $this->Dosen_model->ubahDataDosen($id);
            $this->session->set_flashdata('flash', ' <strong>successfully changed</strong>.');
            redirect('dosen');
        }

        public function hapus($id){
            $this->Dosen_model->hapusDataDosen($id);
            $this->session->set_flashdata('flash', ' <strong>successfully deleted</strong>.');
            redirect('dosen');
        }
    }
    ?>