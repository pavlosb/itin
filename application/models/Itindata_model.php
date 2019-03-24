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


    public function set_section()
    {

        $data ['name_section'] = $this->input->post('name_section');
         if (isset($this->input->post('printtext_section'))) {
            $data ['printtext_section'] = $this->input->post('printtext_section');
         } else {
            $data ['printtext_section'] = $this->input->post('name_section');
         }

         $this->db->select_max('pos_section', 'maxpos');
            $query = $this->db->get('sections_tbl');
            foreach ($query->result() as $row)
{
$maxpos = $row->maxpos
}
            $data ['pos_section'] = $maxpos + 1;
           
        return $this->db->insert('sections_tbl', $data);
    }
    
}

