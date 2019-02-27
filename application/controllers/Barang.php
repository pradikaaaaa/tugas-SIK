<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');
        $this->load->library('form_validation');
	}

	public function index()
	{

		$this->load->view('barang_list');

	}

	public function tambahBarang(){
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required');
		if ($this->form_validation->run() === false) {
			$data['id']=$this->generate_kode();
			$this->load->view('tambahbarang',$data);
		}else{
			$this->load->model('Barang_Model');
			$this->Barang_Model->insertBarang();
			redirect('Barang/index','refresh');
		}
	}

	public function generate_kode(){
		$this->load->model('Barang_Model');

        $nomor = 1;
        $kode = substr('BR'.$nomor,-3,3);

        $cek = count($this->Barang_Model->CekKode($kode));

        while($cek == 1){
            $nomor++;
            $kode = substr('BR'.$nomor,-3,3);
            $cek = count($this->Barang_Model->CekKode($kode));
        }
        return $kode;
    }

}
