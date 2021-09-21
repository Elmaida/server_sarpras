<?php 

    class M_User extends CI_Model {

        function get_data($table='tb_user')
        {
            $query = $this->db->get($table);
            return $query->result();
        }

        function tambah_data($data)
        {
            $this->db->insert('tb_user', $data);
        }

        function get_byid($id)
        {
            return $this->db->where('id_user', $id)
            ->get('tb_user')->row_array();
        }

        function ubah_data($id, $data)
        {
            $this->db->where('id_user', $id);
            $this->db->update('tb_user', $data);
        }

        function hapus_data($id)
        {
            $this->db->where('id_user',$id);
            $this->db->delete('tb_user');
        }
    }
    
?>