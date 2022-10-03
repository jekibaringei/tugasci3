<?php
    class mahasiswa extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model('Mahasiswa_model');
        }
        public function index() {
            $data['judul']= 'Students Page';
            $data['mahasiswa']= $this->Mahasiswa_model->getAllMahasiswa();
            if($this->input->post('keyword')){
                $data['mahasiswa']= $this->Mahasiswa_model->cariDataMahasiswa();
            }
            $data['jurusan']= $this->Mahasiswa_model->getAllJurusan();
            $this->form_validation->set_rules('kode','kode','required|is_unique[mahasiswa.kode]');
            $this->form_validation->set_rules('matakuliah','matakuliah','required|is_unique[mahasiswa.matakuliah]');
            $this->form_validation->set_rules('sks','sks','required');
            $this->form_validation->set_rules('semester','semester','required');
            $this->form_validation->set_rules('jurusan','jurusan','required');
            if($this->form_validation->run()== False){
                $this->load->view('templates/header',$data);
                $this->load->view('mahasiswa/index',$data);
                $this->load->view('templates/footer'); 
            }else{
                $data =[
                    'kode' => $this->input->post('kode'),
                    'matakuliah' => $this->input->post('matakuliah'),
                    'sks' => $this->input->post('sks'),
                    'semester' => $this->input->post('semester'),
                    'jurusan' => $this->input->post('jurusan'),
                ];
                $this->db->insert('mahasiswa',$data);
                $this->session->set_flashdata('flash', ' ditambahkan');
                redirect('mahasiswa');
            }
        }
        public function ubah($id = null)
        {
            $this->Mahasiswa_model->ubahDataMahasiswa($id);
            $this->session->set_flashdata('flash', ' diubah');
            redirect('mahasiswa');
        }

        public function hapus($id){
            $this->Mahasiswa_model->hapusDataMahasiswa($id);
            $this->session->set_flashdata('flash', 'dihapus');
            redirect('mahasiswa');
        }
    }
    ?>