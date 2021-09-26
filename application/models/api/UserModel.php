<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model
{
    public function register($post)
	{
		$data = [
            'nim' => $post['nim'],
			'nama_user' => $post['nama_user'],
            'alamat' => $post['alamat'],
            'jurusan' => $post['jurusan'],
            'no_hp' => $post['no_hp'],
			'email' => $post['email'],
            'role' => $post['role'],
			'password' => $this->makeHash($post['password']),
		];

		$this->db->insert('tb_user', $data);

		return $data;
	}

	public function login($data)
	{
		$email = $data['email'];
		$password = $data['password'];

		$rt = array(
			'status' => false,
			'email' => '',
			'nama_user' => '',
			'id' => '',
		);

		$hasil = $this->db->get_where('tb_user', array('email' => $email));
		if ($hasil->num_rows() > 0) {
			$ro = $hasil->row();
			if (password_verify($password, $ro->password)) {
				// $nama = $ro->nama_user;
				$rt['status'] = true;
				$rt['email'] = $hasil->row()->email;
				$rt['nama_user'] = $hasil->row()->nama_user;
				$rt['id'] = $hasil->row()->id_user;
			} else {
				// $nama = $ro->nama_user;
				$rt['status'] = false;
				$rt['email'] = $ro->email;
				$rt['nama_user'] = $ro->nama_user;
			}
		}
		return $rt;
	}


	function makeHash($string)
	{
		$options = array('cost' => 11);
		$hash    = password_hash($string, PASSWORD_BCRYPT, $options);
		return $hash;
	}
}
?>