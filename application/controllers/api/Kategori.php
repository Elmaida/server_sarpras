<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/API_Controller.php';

require_once APPPATH . '/libraries/JWT.php';

use \Firebase\JWT\JWT;

class Kategori extends API_Controller 
{
	private $secret = 'this is key secret';

    public function __construct()
    {
        parent::__construct();
		$this->load->model('api/KategoriModel', 'kategori');
    }

    public function index()
	{
		header("Access-Control-Allow-Origin: *");
		$this->_apiConfig([
			'methods' => ['GET'],
		]);

		// if ($this->check_token()) {
			$produk = $this->kategori->get_data();
			$data = [
				'status' => 'succes',
				'data' => $produk,
				'message' => 'berhasil di get',
			];
			return  $this->api_return($data, 200);
		
	}

	public function get_Id($id){

		// $kategori = $this->kategori->get_Id($id);

		if ($this->check_token()) {
			$produk = $this->kategori->get_data();
			$data = [
				'status' => 'succes',
				'data' => $produk,
				'message' => 'berhasil di get',
			];
			return  $this->api_return($data, 200);
		}
		// $this->load->view('api/Barang',$barang);

	}



    public function ktgr()
	{
		header("Access-Control-Allow-Origin: *");

        $this->_apiConfig([
            'methods' => ['POST'],
        ]);

        $post = json_decode(file_get_contents('php://input'), true);

		$res = $this->kategori->add($post);

		$data = [
			'status' => 'succes',
			'data' => $res,
			'message' => 'berhasil di get',
		];

		return  $this->api_return($data, 201);
	}

	//JWT

	public function response($data, $status = 200)
	{
		$this->output
			->set_content_type('application/json')
			->set_status_header($status)
			->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
			->_display();

		exit;
	}

	public function check_token()
	{
		$jwt = $this->input->get_request_header('Authorization');

		try {
			$decoded = JWT::decode($jwt, $this->secret, array('HS256'));
			return $decoded;
		} catch (\Exception $e) {
			return $this->api_return(
				[
					'status' => false,
					'auth' => false,
					'message' => 'Gagal, error token',
				],
				401
			);
		}
	}


}
?>