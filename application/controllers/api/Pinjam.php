<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/API_Controller.php';

class Pinjam extends API_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('api/PinjamModel', 'pinjam');
    }	
    public function index()
	{
		header("Access-Control-Allow-Origin: *");

		$barang = $this->pinjam->get_data();
		$data = [
			'status' => 'succes',
			'data' => $barang,
			'message' => 'berhasil di get',
		];
		return  $this->api_return($data, 200);
	}

	public function get_Id($id){

		$barang = $this->pinjam->get_Id($id);
		$data = [
			'status' => 'succes',
			'data' => $barang,
			'message' => 'berhasil di get',
		];
		return  $this->api_return($data, 200);
		
		// $this->load->view('api/Barang',$barang);

	}

	public function pinjam()
	{
		header("Access-Control-Allow-Origin: *");

        $this->_apiConfig([
            'methods' => ['POST'],
        ]);

        $post = json_decode(file_get_contents('php://input'), true);

		$res = $this->pinjam->add($post);

		$data = [
			'status' => 'succes',
			'data' => $res,
			'message' => 'berhasil di get',
		];

		return  $this->api_return($data, 201);
	}
}
?>