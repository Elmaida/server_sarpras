<?php 

    class M_Dashboard extends CI_Model {

        function get_data($table='tb_peminjaman')
        {
            $query = $this->db->get($table);
            return $query->result();
        }

        function get_byid($id)
        {
            return $this->db->where('id_pinjam', $id)
            ->get('tb_peminjaman')->row_array();
        }
        
        public function hitung_jumlah()
        {
            $this->db->select_sum('stok');
            $query = $this->db->get('tb_barang');
            if($query->num_rows()>0)
            {
                return $query->row()->stok;
            }else{
                return 0;
            }
        }
    }
    ?>