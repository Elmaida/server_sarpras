<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


class PinjamModel extends CI_Model
{

	public function get_data()
	{
		return $this->db->from ('tb_peminjaman AS p') -> select ('p.id_pinjam, b.nama, u.nama_user, p.tanggal_pinjam, p.tanggal_kembali, p.jumlah,')
		->join('tb_user AS u', 'p.id_user = u.id_user' )
		->join('tb_kategori AS k', 'p.id_kategori = k.id_kategori' )
		->join('tb_barang AS b', 'p.id_barang = b.id_barang' )
		->get()
		->result();
	}

    public function get_Id($id)
    {
        return $this->db->where('id_pinjam', $id)
        ->get('tb_peminjaman')->row_array();
    }

    public function get_riwayat()
    {
        return $this->db->from('tb_peminjaman AS p') -> select ('b.nama, p.jumlah, p.tanggal_pinjam, p.tanggal_kembali, p.status_transaksi')
		->join('tb_barang AS b', 'p.id_barang = b.id_barang' )

        ->get()
        ->result();
    }

	public function add($post)
    {
        $data = array(
            'id_user' => $post['id_user'],
            // 'id_barang' => $post['id_barang'],
            // 'id_kategori' => $post['id_kategori'],
			'jumlah' => $post['stok'],
			'tanggal_kembali' => $post['tkembali'],
            'tanggal_pinjam' => date("Y-m-d H:i:s")
        );
        return $this->db->insert('tb_peminjaman', $data);
        
    }
}