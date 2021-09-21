<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


class KategoriModel extends CI_Model
{

	public function get_data()
	{
        return $this->db->get('tb_kategori')->result();
        // return $this->db->from('tb_kategori AS k')->select('k.*,k.nama_kategori')
        // ->join('tb_kategori AS k', 'b.id_kategori = k.id_kategori')
        // ->get()
        // ->result();
	}

    public function get_Id($id)
    {
        return $this->db->where('id_kategori', $id)
        ->get('tb_kategori')->row_array();
    }

    public function add($post)
    {
        $data = array(
            'nama_kategori' => $post['jenis']
        );
        return $this->db->insert('tb_kategori', $data);
        // return $data;
    }
}