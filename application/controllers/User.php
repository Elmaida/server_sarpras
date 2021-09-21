<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct(){
        parent:: __construct();

        $this->load->model('M_User', 'user');
    }

	public function index()
	{
        $data = array(
            'title' => 'List User',
            'content' => 'user/vuser',
            'data'=>  $this->user->get_data()
        // print_r($data);
        );
        $this->load->view('template/view', $data);
	}

    public function add()
    {
        $this->load->view('user/user_add');
    }

    public function insert()
    {
        $post = $this->input->post();
        $this->load->model('M_User','user');
       
        $nim = $post['nim'];
        $nama_user = $post['nama_user'];
        $jurusan = $post['jurusan'];
        $alamat = $post['alamat'];
        $no_hp = $post['no_hp'];
        $token = $post['token'];

        if ($nim == null || $nama_user == null || $jurusan== null || $alamat == null || $no_hp == null ){
            echo"Kolom tidak boleh kosong! ";
        }else{
            $data = array(
                'nim' => $nim,
                'nama_user' => $nama_user,
                'jurusan' => $jurusan,
                'alamat' => $alamat,
                'no_hp' => $no_hp,
                'token' => $token,
            );

            $this->user->tambah_data($data);
            redirect('user');
        }
    }

    public function edit($id)
    {
        $this->load->model('M_User','user');
        $data = $this->user->get_byid($id);
        // print_r($data);
        $this->load->view('user/user_edit',$data);
    }

    public function update()
    {
        $this->load->model('M_User','user');
        $post = $this->input->post();

        $nim = $post['nim'];
        $nama_user = $post['nama'];
        $jurusan = $post['jurusan'];
        $alamat = $post['alamat'];
        $no_hp = $post['no_hp'];
        $token = $post['token'];
        $id = $post['id'];

        // print_r($nim);
        // print_r($nama_user);
        // print_r($jurusan);
        // print_r($alamat);
        // print_r($no_hp);
        // print_r($id);

        if ($nim == null || $nama_user == null || $jurusan== null || $alamat == null || $no_hp == null  ){
            echo"Kolom tidak boleh kosong! ";
        }else{
            $data = array(
                'nim' => $nim,
                'nama_user' => $nama_user,
                'jurusan' => $jurusan,
                'alamat' => $alamat,
                'no_hp' => $no_hp,
            );

            $this->user->ubah_data($id, $data);
            redirect('user');
        }
    }

    public function delete($id)
    {
        $this->load->model('M_User','user');

        $this->user->hapus_data($id);
        redirect('user');
    }
}
?>