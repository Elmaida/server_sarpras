<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/API_Controller.php';

class Barang extends API_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('api/BarangModel', 'barang');
    }

    public function index()
	{
		header("Access-Control-Allow-Origin: *");

		$barang = $this->barang->get_data();
		$data = [
			'status' => 'succes',
			'data' => $barang,
			'message' => 'berhasil di get',
		];
		return  $this->api_return($data, 200);
	}

	public function get_Id($id){

		$barang = $this->barang->get_Id($id);
		$data = [
			'status' => 'succes',
			'data' => $barang,
			'message' => 'berhasil di get',
		];
		return  $this->api_return($data, 200);
		
		// $this->load->view('api/Barang',$barang);

	}

    public function store()
	{
		header("Access-Control-Allow-Origin: *");

        $this->_apiConfig([
            'methods' => ['POST'],
        ]);

        $post = json_decode(file_get_contents('php://input'), true);

		$res = $this->barang->add($post);

		$data = [
			'status' => 'succes',
			'data' => $res,
			'message' => 'berhasil di get',
		];

		return  $this->api_return($data, 201);
	}

	// public function edit($id)
    // {
    //     $data = $this->barang->get_byid($id);
    //     $this->load->view('ma/mahasiswa_edit_view', $data);
    // }	
}
?>