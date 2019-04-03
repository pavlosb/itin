<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Itindata_model extends CI_Model
{

    public function get_sections($where = null)
    {
       // $this->db->order_by('compname_clients', 'ASC');
       if (isset($where)) {
        $this->db->where($where);
       }
        $query = $this->db->get('sections_tbl');
        foreach ($query->result_array() as $row)
{
        $data = $row;
}
        return $data;
    }

    public function get_carbrands($where = null)
    {
       // $this->db->order_by('compname_clients', 'ASC');
       if (isset($where)) {
        $this->db->where($where);
       }
        $query = $this->db->get('carbrands_tbl');
        return $query->result_array();
    }


    public function set_section()
    {

        $data ['name_section'] = $this->input->post('name_section');
         if ($this->input->post('printtext_section' !="")) {
            $data ['printtext_section'] = $this->input->post('printtext_section');
         } else {
            $data ['printtext_section'] = $this->input->post('name_section');
         }

         $this->db->select_max('pos_section', 'maxpos');
            $query = $this->db->get('sections_tbl');
            foreach ($query->result() as $row)
{
$maxpos = $row->maxpos;
}
            $data ['pos_section'] = $maxpos + 1;
            if ($this->input->post('parent_section') != "0" ) {
                $data ['parent_section'] = $this->input->post('parent_section');
             }   
        return $this->db->insert('sections_tbl', $data);
    }

    public function set_checkpoint()
    {

        $data ['name_cp'] = $this->input->post('name_cp');
         if ($this->input->post('printtext_cp' !="")) {
            $data ['printtext_cp'] = $this->input->post('printtext_cp');
         } else {
            $data ['printtext_cp'] = $this->input->post('name_cp');
         }

         $this->db->select_max('pos_cp', 'maxpos');
            $query = $this->db->get('checkpoint_tbl');
            foreach ($query->result() as $row)
{
$maxpos = $row->maxpos;
}
            $data ['pos_cp'] = $maxpos + 1;
            $data ['sect_cp'] = $this->input->post('sect_cp');
            $data ['helptext_cp'] = $this->input->post('helptext_cp');
            $data ['points_cp'] = $this->input->post('points_cp');
            
        return $this->db->insert('checkpoint_tbl', $data);
    }

    public function get_checkpoints()
    {
       // $this->db->order_by('compname_clients', 'ASC');
       
        $query = $this->db->query('SELECT  c.name_section as mainsect, b.name_section, a.id_cp, a.name_cp, a.points_cp  FROM db_itin.checkpoint_tbl as a left join db_itin.sections_tbl as b on b.id_section = a.sect_cp inner join db_itin.sections_tbl as c on b.parent_section = c.id_section');
        return $query->result_array();
    }
    
}

