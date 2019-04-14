<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class BahanBaku_Model extends CI_Model {

        public function __construct(){
            parent::__construct();
        }

        public function CekKode($id){
            $this->db->select('*');
            $this->db->where('id_bahan',$id);
            $query = $this->db->get('tbl_bahan_baku');
            return $query->result();
        }

        public function insertBahan(){
            $data = array(
                'id_bahan'=>$this->input->post('id_bahan'),
                'nama_bahan'=>$this->input->post('nama_bahan'),
                'satuan'=>$this->input->post('satuan'),
                'harga'=>$this->input->post('harga')
            );
            $this->db->insert('tbl_bahan_baku', $data);
        }

        public function getBahan(){
            $this->db->select('*');
            $query = $this->db->get('tbl_bahan_baku');
            return $query->result();
        }
    }


?>