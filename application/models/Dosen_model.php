<?php
    class Dosen_model extends CI_Model{
        public function getAllDosen(){
            return $this->db->get('dosen')->result_array();
        }
        public function cariDataDosen(){
            $keyword = $this->input->post('keyword', true);
            $this->db->like('nip', $keyword);
            $this->db->or_like('namadosen', $keyword);
            return $this->db->get('dosen')->result_array();
        }
        public function ubahDataDosen(){
            $data = 
            [
                "nip" => $this->input->post('nip',true),
                "namadosen" => $this->input->post('namadosen',true),
            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('dosen',$data);
        }
        public function hapusDataDosen($id){
            $this->db->where('id', $id);
            $this->db->delete('dosen');
        }
    }
?>