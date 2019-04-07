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

		$this->load->view('tambahcustomer');

	}

	public function tambahCustomer(){
		$this->form_validation->set_rules('id_customer', 'N', 'trim|required');
		if ($this->form_validation->run() === false) {
			$data['id']=$this->generate_kode();
			$this->load->view('tambahbarang',$data);
		}else{
			$this->load->model('Barang_Model');
			$this->Barang_Model->insertBarang();
			redirect('Barang/index','refresh');
		}
	}

	
}
