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

        function search_Barang($barang){
            $this->db->like('nama_barang', $barang , 'both');
            $this->db->order_by('nama_barang', 'ASC');
            $this->db->limit(10);
            return $this->db->get('tbl_barang')->result();
        }

        function tambah_order($data)
        {
            $this->db->insert('tbl_pembelian', $data);
        }

        function tambah_detail_order($data)
        {
            $this->db->insert('tbl_detail_pembelian', $data);
        }

        public function getBarang(){
            $this->db->select('*');
            $query = $this->db->get('tbl_barang');
            return $query->result();
        }
    }

    /* End of file Barang_Model.php */
?>