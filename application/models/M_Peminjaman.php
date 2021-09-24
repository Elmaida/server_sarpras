<?php 

    class M_Peminjaman extends CI_Model {

        function get_data()
        { 
            return $this->db->query("SELECT p.id_pinjam, b.nama, u.nama_user, p.tanggal_pinjam, p.tanggal_kembali, p.jumlah, p.status_transaksi, k.nama_kategori FROM tb_peminjaman AS p
            JOIN tb_barang AS b ON b.id_barang=p.id_barang
            JOIN tb_user as u ON u.id_user=p.id_user
            JOIN tb_kategori as k ON k.id_kategori=p.id_kategori")->result();
            // return $this->db->from('tb_peminjaman AS b')
            // ->join('tb_kategori AS k', 'k.id_kategori = b.id_kategori')
            // ->join('tb_barang AS a', 'a.id_barang = b.id_barang')
            // ->join('tb_user AS u', 'u.id_user = b.id_user')
            // ->get('tb_peminjaman')
            // ->result();
        }

        function get_id($table, $where)
        {
            return $this->db->get_where($table, $where)->row_array();
        }

        function tambah_data($post)
        {
            $data = array(
                'id_user' => $post['id_user'],
                'id_barang' => $post['id_barang'],
                'id_kategori' => $post['id_kategori'],
                'jumlah' => $post['jumlah'],
                'tanggal_kembali' => $post['tanggal_kembali'],
                'status_transaksi' => $post['status_transaksi'],
                'tanggal_pinjam' => $post ['tanggal_pinjam'],
            );
            return $this->db->insert('tb_peminjaman', $data);
            
            // $this->db->insert('tb_peminjaman', $data);
        }

        function get_byid($id)
        {
            return $this->db->where('id_pinjam', $id)
            ->get('tb_peminjaman')->row_array();
        }

        function ubah_data($id, $data)
        {
            $this->db->where('id_pinjam', $id);
            $this->db->update('tb_peminjaman', $data);
        }

        function hapus_data($id)
        {
            $this->db->where('id_pinjam',$id);
            $this->db->delete('tb_peminjaman');
        }
    }
    
?>