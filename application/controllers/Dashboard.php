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
			'data'=>  $this->dashboard->get_data()
		);
		$this->load->view('template/view', $data);
	}
	public function total()
	{
		$data['total']=$this->model->hitung_jumlah();
	}
}
