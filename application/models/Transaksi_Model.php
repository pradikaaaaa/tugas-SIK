<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_Model extends CI_Model {
    public function __construct(){
		parent::__construct();
    }
    
    public function CekKode($id){
        $this->db->select('*');
        $this->db->where('id_transaksi',$id);
        $query = $this->db->get('tbl_pembelian');

        return $query->result();
        
    }

    public function getCustomer(){
        $this->db->select('*');
        $query = $this->db->get('tbl_customer');
        return $query->result();
    }
}

?>