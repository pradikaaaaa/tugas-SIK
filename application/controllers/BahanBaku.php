<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BahanBaku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('BahanBaku_Model');

	}

	public function index()
	{
		$data['bahan'] = $this->BahanBaku_Model->getBahan();
		$this->load->view('bahan_baku_list',$data);

	}

	public function tambahBahan(){
		$this->form_validation->set_rules('nama_bahan', 'Nama Bahan', 'trim|required');
		if ($this->form_validation->run() === false) {
			$data['id']=$this->generate_kode();
			$this->load->view('tambahbahanbaku',$data);
		}else{
			$this->BahanBaku_Model->insertBahan();
			redirect('BahanBaku/index','refresh');
		}
	}

	public function generate_kode(){
		
        $nomor = 1;
        $kode = substr('BB'.$nomor,-3,3);

        $cek = count($this->BahanBaku_Model->CekKode($kode));

        while($cek == 1){
            $nomor++;
            $kode = substr('BB'.$nomor,-3,3);
            $cek = count($this->BahanBaku_Model->CekKode($kode));
        }
        return $kode;
    }


}
