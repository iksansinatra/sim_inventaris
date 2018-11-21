<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_modaasdp4 extends CI_Model{

    function __construct() {
        parent::__construct();
    }


    public function input($data) {
        $this->db->insert('table_modaasdp4', $data);
    }

    public function record_count() {
        return $this->db->count_all("table_modaasdp4");
    }

    public function fetch_countries($limit, $start) {
            $this->db->limit($limit, $start);
            $query = $this->db->get("table_modaasdp4");

            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;
       }

    public function tampil_data_modaasdp4() {
        $query  = $this->db->query("select * from table_modaasdp4");
        return $query->result();
    }

    public function edit($data) {
        $this->db->update('table_modaasdp4', $data, array('modaasdp4_id'=>$data['modaasdp4_id']));
    }

    public function delete($id) {
        $this->db->delete('table_modaasdp4', array('modaasdp4_id' => $id));
    }

}
?>