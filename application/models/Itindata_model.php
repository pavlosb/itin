<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Itindata_model extends CI_Model
{

    public function get_sections()
    {
       // $this->db->order_by('compname_clients', 'ASC');
        $query = $this->db->get('sections_tbl');
        return $query->result_array();
    }

    
}

