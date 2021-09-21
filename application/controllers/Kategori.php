<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    function __construct(){
        parent:: __construct();

        $this->load->model('M_Kategori', 'kategori');
    }

	public function index()
	{
        $data = array(
            'title' => 'List Kategori',
            'content' => 'kategori/vkategori',
            'data'=>  $this->kategori->get_data()
        // print_r($data);
        );
        $this->load->view('template/view', $data);
	}

    public function add()
    {
        $this->load->view('kategori/kategori_add');
    }

    public function insert()
    {
        $post = $this->input->post();
        $this->load->model('M_Kategori','kategori');
       
        $kategori = $post['nama_kategori'];
        

        if ($kategori == null ){
            echo"Kolom tidak boleh kosong! ";
        }else{
            $data = array(
                'nama_kategori' => $kategori,
            );

            $this->kategori->tambah_data($data);
            redirect('kategori');
        }
    }

    public function edit($id)
    {
        $this->load->model('M_Kategori','kategori');
        $data = $this->kategori->get_byid($id);
        $this->load->view('kategori/kategori_edit',$data);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->load->model('M_Kategori','kategori');

        $kategori= $post['nama_kategori'];
        $id = $post['id'];

        if ($kategori == null ){
            echo"Kolom tidak boleh kosong! ";
        }else{
            $data = array(
                'nama_kategori' => $kategori,
            );

            $this->kategori->ubah_data($id, $data);
            redirect('kategori');
        }
    }

    public function delete($id)
    {
        $this->load->model('M_Kategori','kategori');

        $this->kategori->hapus_data($id);
        redirect('kategori');
    }
}
?>