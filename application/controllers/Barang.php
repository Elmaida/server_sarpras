<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    function __construct(){
        parent:: __construct();

        $this->load->model('M_Barang', 'barang');
    }

	public function index()
	{
        $data = array(
            'title' => 'List Barang',
            'content' => 'barang/vbarang',
            'data'=>  $this->barang->get_data()
        // print_r($data);
        );
        $this->load->view('template/view', $data);
	}

    public function add()
    {
        $this->load->view('barang/barang_add');
    }

    public function insert()
    {
        $post = $this->input->post();
        $this->load->model('M_Barang','barang');
       
        $nama = $post['nama'];
        $id_kategori = $post['id_kategori'];
        $stok = $post['stok'];
        $harga = $post['harga'];
        $tanggal = $post['tanggal'];

        if ($nama == null || $id_kategori == null || $stok == null || $harga == null || $tanggal == null ){
            echo"Kolom tidak boleh kosong! ";
        }else{
            $data = array(
                'nama' => $nama,
                'id_kategori' => $id_kategori,
                'stok' => $stok,
                'harga' => $harga,
                'tanggal' => $tanggal,
            );

            $this->barang->tambah_data($data);
            redirect('barang');
        }
    }

    public function edit($id)
    {
        $this->load->model('M_barang','barang');
        $data = $this->barang->get_byid($id);
        $this->load->view('barang/barang_edit',$data);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->load->model('M_barang','barang');

        $nama = $post['nama'];
        $id_kategori = $post['id_kategori'];
        $stok = $post['stok'];
        $harga = $post['harga'];
        $tanggal = $post['tanggal'];
        $id = $post['id'];

        if ($nama == null || $id_kategori == null || $stok == null || $harga == null || $tanggal == null ){
            echo"Kolom tidak boleh kosong! ";
        }else{
            $data = array(
                'nama' => $nama,
                'id_kategori' => $id_kategori,
                'stok' => $stok,
                'harga' => $harga,
                'tanggal' => $tanggal,
            );

            $this->barang->ubah_data($id, $data);
            redirect('barang');
        }
    }

    public function delete($id)
    {
        $this->load->model('M_barang','barang');

        $this->barang->hapus_data($id);
        redirect('barang');
    }
}
?>