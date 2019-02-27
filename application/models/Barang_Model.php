<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Barang_Model extends CI_Model {

        public function __construct(){
            parent::__construct();
        }

        public function CekKode($id){
            $this->db->select('*');
            $this->db->where('id_barang',$id);
            $query = $this->db->get('tbl_barang');
            return $query->result();
        }

        public function insertBarang(){
            $data = array(
                'id_barang'=>$this->input->post('id_barang'),
                'nama_barang'=>$this->input->post('nama_barang'),
                'satuan'=>$this->input->post('satuan'),
                'harga'=>$this->input->post('harga')
            );
            $this->db->insert('tbl_barang', $data);
        }


    }

    /* End of file Barang_Model.php */


?>