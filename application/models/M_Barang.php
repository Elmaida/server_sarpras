<?php 

    class M_Barang extends CI_Model {

        function get_data($table='tb_barang')
        {
            $query = $this->db->get($table);
            return $query->result();
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