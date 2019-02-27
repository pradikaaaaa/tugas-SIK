<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_Model extends CI_Model {

    public function __construct(){
		parent::__construct();
    }

    public function CekKode($id){
        $this->db->select('*');
        $this->db->where('id_customer',$id);
        $query = $this->db->get('tbl_customer');

        return $query->result();

    }

    public function insertCustomer()
    {
        $data = array(
            'id_customer'=>$this->input->post('id_customer'),
            'nama_customer'=>$this->input->post('nama_customer'),
            'alamat'=>$this->input->post('alamat'),
            'telepon'=>$this->input->post('telepon')
        );
        $this->db->insert('tbl_customer', $data);
    }

}

/* End of file Customer_Model.php */

?>