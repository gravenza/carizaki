<?php
class GetLatLong extends CI_Model{

    public function __construct() {
        parent::__construct();
    }

    function get()
    {
        $query = $this->db->get('markers');
        return $query;
    }
}
?>