<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
        parent:: __construct();

        $this->load->model('M_Dashboard', 'dashboard');
    }

	public function index()
	{
		$data = array(
			'title' => 'Dashboard Admin',
			'content' => 'dashboard/dashboard',
			'data'=>  $this->dashboard->get_data(),
			'stok'=> $this->dashboard->hitung_stok(),
			'id_barang'=> $this->dashboard->jumlah_barang(),
			'id_pinjam'=> $this->dashboard->jumlah_peminjam(),
			'id_kategori'=> $this->dashboard->jumlah_kategori(),
			'id_user'=> $this->dashboard->jumlah_user(),
		);
		$this->load->view('template/view', $data);
		
	}
}
