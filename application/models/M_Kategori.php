<?php 

    class M_kategori extends CI_Model {

        function get_data($table='tb_kategori')
        {
            $query = $this->db->get($table);
            return $query->result();
        }

        function tambah_data($data)
        {
            $this->db->insert('tb_kategori', $data);
        }

        function get_byid($id)
        {
            return $this->db->where('id_kategori', $id)
            ->get('tb_kategori')->row_array();
        }

        function ubah_data($id, $data)
        {
            $this->db->where('id_kategori', $id);
            $this->db->update('tb_kategori', $data);
        }

        function hapus_data($id)
        {
            $this->db->where('id_kategori',$id);
            $this->db->delete('tb_kategori');
        }
    }
    
?>