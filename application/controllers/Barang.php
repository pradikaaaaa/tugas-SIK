<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('Barang_Model');
		$this->load->model('BahanBaku_Model');

	}

	public function index()
	{
		$data['barang'] = $this->Barang_Model->getBarang();
		$this->load->view('barang_list',$data);

	}

	public function detailBarang($id){
        $data['barang'] = $this->Barang_Model->getDetailBarang($id);
        $data['bahan'] = $this->Barang_Model->getDetailItemBarang($id);
        $this->load->view('barang_detail',$data);
    }


	public function tambahBarang(){
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required');
		if ($this->form_validation->run() === false) {
			$data['id']=$this->generate_kode();
			$data['bahan'] = $this->BahanBaku_Model->getBahan();
			$this->load->view('tambahbarang',$data);
		}else{
			$this->Barang_Model->insertBarang();
			$this->insertDetailBarang();
			// $this->BahanBaku_Model->insertDetailBarang();
			redirect('Barang/index','refresh');
		}
	}

	public function insertDetailBarang(){
		$bahan_list = $this->input->post('bahan');
		//var_dump($bahan_list);
            foreach($bahan_list as $bahan){
                $data = array(
                    'id_barang' => $this->input->post('id_barang'),
                    'id_bahan' => $bahan
                );
                $this->BahanBaku_Model->insertDetailBarang($data);
            }

    }

	public function generate_kode(){
		
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

	function get_autocomplete(){
		$this->load->model('Barang_Model');
		if (isset($_GET['term'])) {
			  $result = $this->Barang_Model->search_Barang($_GET['term']);
			   if (count($result) > 0) {
			foreach ($result as $row)
				 $arr_result[] = array(
					'id_barang'         => $row->id_barang,
					'nama_barang'	    => $row->nama_barang,
					'satuan'			=> $row->satuan,
					'harga'		    	=> $row->harga,
					'value'             => $row->nama_barang
				);
				 echo json_encode($arr_result);
			   }
		}
	}
}
