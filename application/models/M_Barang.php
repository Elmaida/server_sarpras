<?php 

    class M_Barang extends CI_Model {

        function get_data()
        {
            return $this->db->query("SELECT b.id_barang, b.nama, k.nama_kategori, b.stok, b.harga, b.tanggal FROM tb_barang AS b
            JOIN tb_kategori as k ON k.id_kategori=b.id_kategori")->result();
        }

        function tambah_data($data)
        {
            $this->db->insert('tb_barang', $data);
        }

        function get_byid($id)
        {
            return $this->db->where('id_barang', $id)
            ->get('tb_barang')->row_array();
        }

        function ubah_data($id, $data)
        {
            $this->db->where('id_barang', $id);
            $this->db->update('tb_barang', $data);
        }

        function hapus_data($id)
        {
            $this->db->where('id_barang',$id);
            $this->db->delete('tb_barang');
        }
    }
    
?>