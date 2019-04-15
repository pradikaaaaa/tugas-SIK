<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->model('Transaksi_Model');
		
    }
    
    public function index(){
        $data['transaksi'] = $this->Transaksi_Model->getTransaksi();
        $this->load->view('transaksi_list',$data);
    }

	public function tambahTransaksi()
	{
        $data['kode_transaksi'] = $this->generate_kode();
        $data['kode_customer'] = $this->Transaksi_Model->getCustomer();
		$this->load->view('transaksi_insert',$data);

    }

    public function detailtransaksi($id){
        $data['header'] = $this->Transaksi_Model->getDetailTransaksi($id);
        $data['orderItem'] = $this->Transaksi_Model->getDetailItem($id);
        $this->load->view('transaksi_detail',$data);
    }

    

    public function generate_kode(){
        $tgl = date("my");
        $nomor = 1;
        $kode = substr('SO'.$tgl.'00000'.$nomor,-12,12);

        $cek = count($this->Transaksi_Model->CekKode($kode));

        while($cek == 1){
            $nomor++;
            $kode = substr('SO'.$tgl.'00000'.$nomor,-12,12);
            $cek = count($this->Transaksi_Model->CekKode($kode));
        }
        return $kode;
    }

	
}
