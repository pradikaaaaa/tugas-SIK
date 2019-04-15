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

    public function getTransaksi(){
        $this->db->select('id_transaksi, tgl_transaksi, nama_customer');
        $this->db->from('tbl_pembelian');
        $this->db->join('tbl_customer','tbl_pembelian.id_customer = tbl_customer.id_customer','inner');
        $query = $this->db->get();    
        return $query->result();
    }

    public function getDetailTransaksi($id){
        $this->db->from('tbl_pembelian');
        $this->db->where('id_transaksi',$id);
        $query = $this->db->get();    
        return $query->result();
    }

    public function getDetailItem($id){
        $this->db->select('b.nama_barang as nama, b.harga as harga, d.jumlah as jumlah');
        $this->db->from('tbl_detail_pembelian d');
        $this->db->join('tbl_barang b', 'd.id_barang = b.id_barang', 'inner');
        
        $this->db->where('id_transaksi',$id);
        $query = $this->db->get();    
        return $query->result();
    }

}

?>