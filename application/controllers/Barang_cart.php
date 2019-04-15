<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Barang_cart extends CI_Controller {

        public function __construct()
	    {
            parent::__construct();
            $this->load->helper('url','form');
            $this->load->library('form_validation');
            $this->load->library('cart');
        }

        public function index()
        {

        }

        public function add()
        {
            $this->load->library('cart');
            $data = array(
                "id"                => $this->input->post('id'),
                "id_barang"         => $this->input->post('id_barang'),
                "name"              => $this->input->post('nama_barang'),
                "satuan"            => $this->input->post('satuan'),
                "qty"               => $this->input->post('quantity'),
                "kode_transaksi"    => $this->input->post('kode_transaksi'),
                "id_customer"       => $this->input->post('id_customer'),
                "price"             => $this->input->post('harga')
            );
            $this->cart->insert($data);
            echo $this->view();
        }

        public function load()
        {
            echo $this->view();
        }

        public function view()
        {
            $this->load->library('cart');
            $output='';
            $output .= '
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <div align="right">
                        <button type="button" id="clear_cart" class="btn btn-warning">Clear Cart</button>
                    </div>
                    <br>
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Quantity</th>
                        <th>Kode Transaksi</th>
                        <th>ID Customer</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>

            ';
            $count = 0;
            foreach ($this->cart->contents() as $items) {
                $count++;
                $output .= '
                <tbody>
                            <tr>
                                <td>'.$items["name"].'</td>
                                <td>'.$items["satuan"].'</td>
                                <td>'.$items["qty"].'</td>
                                <td>'.$items["kode_transaksi"].'</td>
                                <td>'.$items["id_customer"].'</td>
                                <td>'.$items["price"].'</td>

                                <td><button type="button" name="remove" class="btn btn-danger
                                btn-xs remove_inventory" id="'.$items["rowid"].'">Remove</button></td>
							</tr>

                ';
            }
            $output.='
                    </tbody>
				</table>
            ';
            if($count == 0){
                $output = '<h3 align="center">Cart is empty</h3>';
            }
            return $output;
        }

        public function remove()
        {
            $this->load->library('cart');
            $row_id = $_POST["row_id"];
            $data = array(
                'rowid' => $row_id,
                'qty'   => 0
            );
            $this->cart->update($data);
            echo $this->view();
        }

        public function clear()
        {
            $this->load->library('cart');
            $this->cart->destroy();
            echo $this->view();
        }

        public function proses_order()
        {
            $this->load->model('Barang_Model');

            //-------------------------Input data Pembelian------------------------------
            $data_order = array('id_transaksi'  => $this->input->post('kode_transaksi'),
                                'tgl_transaksi' => $this->input->post('tgl_transaksi'),
                                'tgl_produksi'  => $this->input->post('tgl_produksi'),
                                'tgl_selesai_produksi' => $this->input->post('tgl_selesai'),
                                'tgl_pengiriman' => $this->input->post('tgl_pengiriman'),
                                'id_customer'   => $this->input->post('idcustomer'));
            $id_order = $this->Barang_Model->tambah_order($data_order);
            //-------------------------Input data detail---------------------------------
            if ($cart = $this->cart->contents())
			{
				foreach ($cart as $item)
					{
						$data_detail = array('id_transaksi' =>$item['kode_transaksi'],
                                             'id_barang'    =>$item['id'],
                                             'harga_barang' =>$item['price'],
                                             'jumlah'       =>$item['qty']);
						$proses = $this->Barang_Model->tambah_detail_order($data_detail);
					}
			}
            //-------------------------Hapus shopping cart--------------------------
            $this->cart->destroy();
            redirect('Barang/index','refresh');

        }

    }

    /* End of file Barang_cart.php */

?>