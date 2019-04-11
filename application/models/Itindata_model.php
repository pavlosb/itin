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
        return $query->result_array();
    }

    public function get_carbrands($where = null)
    {
       // $this->db->order_by('compname_clients', 'ASC');
       if (isset($where)) {
        $this->db->where($where);
       }
        $query = $this->db->get('carbrands_tbl');
        if ($query -> num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		} else {
			return null;
		}
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
       
        $query = $this->db->query('SELECT  c.id_section as mainsectid, c.name_section as mainsect, c.printtext_section as mainsectprint, b.id_section, b.name_section, b.printtext_section, a.id_cp, a.name_cp, a.points_cp, a.printtext_cp, a.nokpoints_cp, a.helptext_cp  FROM db_itin.checkpoint_tbl as a left join db_itin.sections_tbl as b on b.id_section = a.sect_cp inner join db_itin.sections_tbl as c on b.parent_section = c.id_section');
        return $query->result_array();
    }
    
    public function set_client($data) {
      $this->db->insert('clients_tbl', $data);
      return $this->db->insert_id();

    }

    public function set_vehicle($data) {
      $this->db->insert('vehicles_tbl', $data);
      return $this->db->insert_id();

    }

    public function get_clients($where = null)
    {
       // $this->db->order_by('compname_clients', 'ASC');
       if (isset($where)) {
        $this->db->where($where);
       }
        $query = $this->db->get('clients_tbl');
        if ($query -> num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		} else {
			return null;
		}
    }

    public function get_unisnpvehicles(){

      $query = $this->db->query("Select * from vehicles_tbl AS VT where not exists( select * from inspections_tbl AS IT where VT.id_vhcl = IT.vehicle_inspection)");
      if ($query -> num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		} else {
			return null;
		}
    }

    public function get_vehicle($data){

      $query = $this->db->get_where('vehicles_tbl', $data);
      if ($query -> num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data = $row;
			}
			return $data;
		} else {
			return null;
		}
    }

    public function set_inspection($data) {

      $this->db->insert('inspections_tbl', $data);
      return $this->db->insert_id();
    }


    public function get_inspectionsfull($where) 
    {
      $q = "Select i.*, v.*, c.*, u.first_name, u.last_name from inspections_tbl I
            LEFT JOIN vehicles_tbl v ON i.vehicle_inspection = v.id_vhcl
            LEFT JOIN clients_tbl c ON i.client_inspection = c.id_client 
            LEFT JOIN users u ON i.inspector_inspection = u.id";

      if (isset($where)) 
      {

         $q .= " WHERE ";
            foreach ($where as $field => $value):
               $q .= $field." = ".$value;
            endforeach;
      }
            $query = $this->db->query($q);
            if ($query -> num_rows() > 0) {
               foreach ($query->result() as $row) {
                  $data[] = $row;
               }
               return $data;
            } else {
               return null;
            }
    }

    public function get_inspectionscore($id) {

      $this->db->where(array('inspectionid_insres' => $id));
      $query = $this->db->get('inspectionresults_tbl');
      if ($query -> num_rows() > 0) {
      foreach ($query->result() as $row)
      {
         $score[$row->chkpointid_insres] = $row->chpointscore_insres;
      }
      return $score;
   } else {
      return null;
   }
    }
    public function set_inspectionscore($id, $data) 
    {
      $this->db->where(array('inspectionid_insres' => $id));
      $this->db->delete('inspectionresults_tbl');

      $this->db->insert_batch('inspectionresults_tbl', $data);
    }
}

