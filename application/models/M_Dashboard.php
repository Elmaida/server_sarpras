<?php 

    class M_Dashboard extends CI_Model {

        function get_data($table='tb_peminjaman')
        {
            return $this->db->query("SELECT p.id_pinjam, b.nama, u.nama_user, p.jumlah, p.status_transaksi FROM tb_peminjaman AS p
            JOIN tb_barang AS b ON b.id_barang=p.id_barang
            JOIN tb_user as u ON u.id_user=p.id_user")->result();
        }

        function get_byid($id)
        {
            return $this->db->where('id_pinjam', $id)
            ->get('tb_peminjaman')->row_array();
        }
        
        public function hitung_stok()
        {
            return $this->db->query("SELECT sum(stok) barang FROM tb_barang")->row();
        }

        public function jumlah_barang()
        {
            return $this->db->query("SELECT count(id_barang) barang FROM tb_barang")->row();
        }

        public function jumlah_peminjam()
        {
            return $this->db->query("SELECT count(id_pinjam) pinjam FROM tb_peminjaman")->row();
        }

        public function jumlah_kategori()
        {
            return $this->db->query("SELECT count(id_kategori) kategori FROM tb_kategori")->row();
        }

        public function jumlah_user()
        {
            return $this->db->query("SELECT count(id_user) user FROM tb_user")->row();
        }
    }
    ?>