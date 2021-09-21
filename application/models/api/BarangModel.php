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

    
}

?>