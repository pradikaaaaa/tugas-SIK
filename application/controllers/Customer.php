<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');
        $this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('nama_customer', 'Nama Customer', 'trim|required');
		if ($this->form_validation->run() === false) {
			$data['id']=$this->generate_kode();
			$this->load->view('tambahcustomer',$data);
		}else{
			$this->load->model('Customer_Model');
			$this->Customer_Model->insertCustomer();
			redirect('Barang/index','refresh');
		}

	}

	public function generate_kode(){
		$this->load->model('Customer_Model');

        $nomor = 1;
        $kode = substr('C00'.$nomor,-5,5);

        $cek = count($this->Customer_Model->CekKode($kode));

        while($cek == 1){
            $nomor++;
            $kode = substr('C00'.$nomor,-5,5);
            $cek = count($this->Customer_Model->CekKode($kode));
        }
        return $kode;
    }


}
