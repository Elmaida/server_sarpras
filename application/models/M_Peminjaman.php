<?php 

    class M_Peminjaman extends CI_Model {

        function get_data($table='tb_peminjaman')
        { 
            // $this->db->select('*');
            // $this->db->from('tb_peminjaman');
            // $this->db->join('tb_barang', 'tb_barang.id_barang=tb_peminjaman.id_barang');
            // $this->db->join('tb_kategori', 'tb_kategori.id_kategori=tb_barang.id_kategori');
            // $this->db->join('tb_user', 'tb_user.id_user=tb_peminjaman.id_user');

            // return $this->db->from ('tb_peminjaman AS p')
            // ->join('tb_user AS u', 'p.id_user = u.id_user' )
            // ->join('tb_kategori AS k', 'p.id_kategori = k.id_kategori' )
            // ->join('tb_barang AS b', 'p.id_barang = b.id_barang' )
            // ->get($table)
            // ->result();
            $query = $this->db->get($table);
            return $query->result();
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
                'status_pengajuan' => $post['status_pengajuan'],
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