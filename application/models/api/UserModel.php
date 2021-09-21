<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


class UserModel extends CI_Model
{

	public function get_data()
	{
        return $this->db->get('tb_user')->result();
	}

    public function get_Id($id)
    {
        return $this->db->where('id_user', $id)
        ->get('tb_user')->row_array();
    }

    public function add($post)
    {
        $data = array(
            'nim' => $post['nim_user'],
            'nama_user' => $post['nama'],
            'jurusan' => $post['jurusan_user'],
            'alamat' => $post["alamat_user"],
            'no_hp' => $post["no_hp"]
        );
        return $this->db->insert('tb_user', $data);
        // return $data;
    }
}