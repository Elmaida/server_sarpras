<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

    function __construct(){
        parent:: __construct();

        $this->load->model('M_Peminjaman', 'peminjaman', TRUE);
        $this->load->helper(array('form', 'url'));

    }

	public function index()
	{
        $data = array(
            'title' => 'List Peminjaman',
            'content' => 'peminjaman/vpeminjaman',
            'data'=>  $this->peminjaman->get_data()
        // print_r($data);
        );
        // $data['data'] = $this->M_Peminjaman->get_data($table);
        $this->load->view('template/view', $data);
	}

    // public function data_pinjam(){
    //     $data ['tb_barang'] = $this->M_Peminjaman->data_pinjam()->result();
    //     $data ['tb_kategori'] = $this-> M_Peminjaman->data_pinjam()->result();
    //     $data ['tb_user'] =$this->M_Peminjaman->data_pinjam()->result();
    //     $this->load->view('peminjaman/vpeminjaman', $data);
    // }


    public function add()
    {
        $this->load->view('peminjaman/peminjaman_add');
    }

    public function insert()
    {
        $post = $this->input->post();
        $this->load->model('M_Peminjaman','peminjaman');
       
       
        $id_user = $post['id_user'];
        $id_barang = $post ['id_barang'];
        $id_kategori = $post['id_kategori'];
        $jumlah = $post['jumlah'];
        $tanggal_kembali = $post['tanggal_kembali'];
        $tanggal_pinjam = $post['tanggal_pinjam'];
        $status_transaksi = $post['status_transaksi'];
        $status_pengajuan = $post['status_pengajuan'];

        if ($id_user == null ||$id_barang == null || $id_kategori == null || $jumlah == null || $tanggal_kembali == null 
        || $tanggal_pinjam == null || $status_pengajuan == null || $status_transaksi == null ){
            echo"Kolom tidak boleh kosong! ";
        }else{
            $data = array(
                'id_user' => $id_user,
                'id_barang' => $id_barang,
                'id_kategori' => $id_kategori,
                'jumlah' => $jumlah,
                'tanggal_pinjam' => $tanggal_pinjam,
                'tanggal_kembali' => $tanggal_kembali,
                'status_transaksi' => $status_transaksi,
                'status_pengajuan' => $status_pengajuan,
                // 'nama' => $nama,
                // 'id_kategori' => $id_kategori,
                // 'stok' => $stok,
                // 'harga' => $harga,
                // 'tanggal' => $tanggal,
            );

            $this->peminjaman->tambah_data($data);
            redirect('peminjaman');
        }
    }

    public function edit($id)
    {
        $this->load->model('M_Peminjaman','peminjaman');
        $data = $this->peminjaman->get_byid($id);
        $this->load->view('peminjaman/peminjaman_edit',$data);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->load->model('M_Peminjaman','peminjaman');

        $id_user = $post['id_user'];
        $id_barang = $post ['id_barang'];
        $id_kategori = $post['id_kategori'];
        $jumlah = $post['jumlah'];
        $tanggal_kembali = $post['tanggal_kembali'];
        $tanggal_pinjam = $post['tanggal_pinjam'];
        $status_transaksi = $post['status_transaksi'];
        $status_pengajuan = $post['status_pengajuan'];
        $id = $post['id'];

        if ($id_user == null ||$id_barang == null || $id_kategori == null || $jumlah == null || $tanggal_kembali == null 
        || $tanggal_pinjam == null || $status_pengajuan == null || $status_transaksi == null ){
            echo"Kolom tidak boleh kosong! ";
        }else{
            $data = array(
                'id_user' => $id_user,
                'id_barang' => $id_barang,
                'id_kategori' => $id_kategori,
                'jumlah' => $jumlah,
                'tanggal_pinjam' => $tanggal_pinjam,
                'tanggal_kembali' => $tanggal_kembali,
                'status_transaksi' => $status_transaksi,
                'status_pengajuan' => $status_pengajuan,
            );

            $this->peminjaman->ubah_data($id, $data);
            redirect('peminjaman');
        }
    }

    public function delete($id)
    {
        $this->load->model('M_Peminjaman','peminjaman');

        $this->peminjaman->hapus_data($id);
        redirect('peminjaman');
    }
}
?>