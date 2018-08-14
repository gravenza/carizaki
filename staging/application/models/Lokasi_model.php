<?php
class Lokasi_model extends CI_Model{

    public function __construct() {
        parent::__construct();
    }

    function get()
    {
        $query = $this->db->get('tbl_lokasi');
        return $query;
    }
}
?>