<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class BarangModel extends CI_Model 
{
    public function get_data()
    {
        // return $this->db->get('tb_barang')->result();
        return $this->db->from('tb_barang AS b')->select('b.*,k.nama_kategori')
        ->join('tb_kategori AS k', 'b.id_kategori = k.id_kategori')
        ->get()
        ->result();
    }    

	public function get_Id($id)
    {
        return $this->db->where('id_barang', $id)
        ->get('tb_barang')->row_array();
    }

    public function add($post)
    {
        $data = array(
            'id_kategori' => $post['kategori'],
            'nama' => $post['nama_barang'],
            'stok' => $post['stok'],
            'harga' => $post['harga'],
            'tanggal' => date("Y-m-d H:i:s")
        );
        return $this->db->insert('tb_barang', $data);
        // return $data;
    }

    public function hitung_pinjam()
    {
        $data = [];
        $barangs = $this->db->get('tb_barang')->result();

        foreach($barangs as $key => $value) {
            $jumlah=0;
            $peminjaman = $this->stok_pinjam($value->id_barang);

            foreach($peminjaman as $key => $pinjam){
                $jumlah = $jumlah + $pinjam->jumlah;
            }

            $row = array(
                'id_barang' => $value->id_barang,
                'nama_barang' => $value->nama,
                'stok' => $value->stok - $jumlah,
                'harga' => $value -> harga,
            );
            $data[] = $row;
        }
        return $data;
    }
    private function stok_pinjam ($id_barang)
    {
        return $this->db->from('tb_peminjaman')
        ->where('id_barang', $id_barang)
        ->where('status_transaksi', 1)
        ->get()->result();
    }


    public function hitung_kembali()
    {
        $data = [];
        $barangs = $this->db->get('tb_barang')->result();

        foreach($barangs as $key => $value) {
            $jumlah=0;
            $peminjaman = $this->stok_kembali($value->id_barang);

            foreach($peminjaman as $key => $pinjam){
                $jumlah = $jumlah + $kembali->jumlah;
            }

            $row = array(
                'id_barang' => $value->id_barang,
                'nama_barang' => $value->nama,
                'stok' => $value->stok + $jumlah,
                'harga' => $value -> harga,
            );
            $data[] = $row;
        }
        return $data;
    }
    private function stok_kembali ($id_barang)
    {
        return $this->db->from('tb_peminjaman')
        ->where('id_barang', $id_barang)
        ->where('status_transaksi', 2)
        ->get()->result();
    }

    public function hitung_ganti()
    {
        $data = [];
        $barangs = $this->db->get('tb_barang')->result();

        foreach($barangs as $key => $value) {
            $jumlah=0;
            $peminjaman = $this->stok_ganti($value->id_barang);

            foreach($peminjaman as $key => $pinjam){
                $jumlah = $jumlah + $ganti->jumlah;
            }

            $row = array(
                'id_barang' => $value->id_barang,
                'nama_barang' => $value->nama,
                'stok' => $value->stok + $jumlah,
                'harga' => $value -> harga,
            );
            $data[] = $row;
        }
        return $data;
    }
    private function stok_hilang ($id_barang)
    {
        return $this->db->from('tb_peminjaman')
        ->where('id_barang', $id_barang)
        ->where('status_transaksi', 3 )
        ->get()->result();
    }

    
}

?>