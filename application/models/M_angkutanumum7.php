<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_angkutanumum7 extends CI_Model{

    function __construct() {
        parent::__construct();
    }


    public function input($data) {
        $this->db->insert('table_angkutanumum7', $data);
    }

    public function record_count() {
        return $this->db->count_all("table_angkutanumum7");
    }

    public function fetch_countries($limit, $start) {
            $this->db->limit($limit, $start);
            $query = $this->db->get("table_angkutanumum7");

            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;
       }

    public function tampil_data_angkutanumum7() {
        $query  = $this->db->query("select * from table_angkutanumum7");
        return $query->result();
    }

    public function edit($data) {
        $this->db->update('table_angkutanumum7', $data, array('angkutanumum7_id'=>$data['angkutanumum7_id']));
    }

    public function delete($id) {
        $this->db->delete('table_angkutanumum7', array('angkutanumum7_id' => $id));
    }

}
?>
