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
		 $this->db->order_by('name_carbrand ASC');
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
       
        $query = $this->db->query('SELECT  c.id_section as mainsectid, c.name_section as mainsect, c.en_name_section as en_mainsect, c.printtext_section as mainsectprint, c.en_printtext_section as en_mainsectprint, b.id_section, b.name_section, b.en_name_section, b.printtext_section, b.en_printtext_section, a.id_cp, a.name_cp, a.en_name_cp, a.points_cp, a.printtext_cp, a.en_printtext_cp, a.nokpoints_cp, a.helptext_cp, a.en_helptext_cp  FROM db_itin.checkpoint_tbl as a left join db_itin.sections_tbl as b on b.id_section = a.sect_cp inner join db_itin.sections_tbl as c on b.parent_section = c.id_section');
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

    public function get_clientsplain($where=null) {
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

    public function get_clients($where = null) {

    $q = "Select c.*, v.*, k.* from clients_tbl c
            LEFT JOIN vehicles_tbl AS v ON c.id_client = v.client_vhcl
            LEFT JOIN inspections_tbl AS k ON v.id_vhcl = k.vehicle_inspection";

      if (isset($where)) 
      {

         $q .= " WHERE ";
            foreach ($where as $field => $value):
               $q .= $field." = ".$value;
            endforeach;
      }

      $q .= " ORDER BY c.id_client";
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

    public function get_vehiclesfull($where=null) 
    {
      $q = "Select  v.*, k.*, c.*  from vehicles_tbl v
            LEFT JOIN inspections_tbl AS k ON  v.id_vhcl = k.vehicle_inspection
            LEFT JOIN clients_tbl AS c ON v.client_vhcl = c.id_client"
            ;

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


    public function get_inspectionsfull($where=null) 
    {
      $q = "Select k.*, v.*, c.*, u.first_name, u.last_name from inspections_tbl as k
            LEFT JOIN vehicles_tbl AS v ON k.vehicle_inspection = v.id_vhcl
            LEFT JOIN clients_tbl AS c ON k.client_inspection = c.id_client 
            LEFT JOIN users AS u ON k.inspector_inspection = u.id ORDER BY k.date_inspection DESC";

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

	 public function get_scoreforoutside($id) {
		$this->db->where(array('inspectionid_insres' => $id, 'chkpointid_insres >=' => 58, 'chkpointid_insres <=' => 78));
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

	 public function get_inspectionimages($id) {
		$this->db->where(array('inspectionid_img' => $id));
		$query = $this->db->get('inspectionimg_tbl');
		if ($query -> num_rows() > 0) {
			foreach ($query->result() as $row)
			{
				$inspimg[$row->id_img] = $row->filename_img;
			}
			return $inspimg;
		} else {
			return null;
		}
	 }

	 public function get_inspectionremarks($id) {

      $this->db->where(array('inspectionid_insrem' => $id));
      $query = $this->db->get('inspectionremarks_tbl');
      if ($query -> num_rows() > 0) {
      foreach ($query->result() as $row)
      {
         $remark[$row->chkpointid_insrem] = $row->remark_insrem;
      }
      return $remark;
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

	 public function set_inspectionimg($id, $data) 
    {
     //$this->db->where(array('inspectionid_insres' => $id));
     //$this->db->delete('inspectionresults_tbl');

      $this->db->insert_batch('inspectionimg_tbl', $data);
    }

	 public function set_inspectionremarks($id, $data) 
    {
      $this->db->where(array('inspectionid_insrem' => $id));
      $this->db->delete('inspectionremarks_tbl');

      $this->db->insert_batch('inspectionremarks_tbl', $data);
    }

    public function upd_inspection($id, $data){
      $this->db->where('id_inspection', $id);
      $this->db->update('inspections_tbl', $data);
      return;
    }


    public function get_sectionscore($inspid, $sectid) {

      $this->db->select_sum('chpointscore_insres');
      $this->db->where('inspectionid_insres', $inspid);
      $this->db->where('chkpointsect_insres', $sectid);
      $query = $this->db->get('inspectionresults_tbl'); 
      if ($query -> num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data = $row->chpointscore_insres;
			}
			return $data;
		} else {
			return null;
		}
    }

    public function upd_client($id, $data) {
      $this->db->where('id_client', $id);
      $this->db->update('clients_tbl', $data);
      return;
    }    

    public function upd_vehicle($id, $data) {
      $this->db->where('id_vhcl', $id);
      $this->db->update('vehicles_tbl', $data);
      return;
    }

    public function del_client($id) {
      $this->db->where('id_client', $id);
      $this->db->delete('clients_tbl');
      return;
    } 

    public function del_vehicle($id) {
      $this->db->where('id_vhcl', $id);
      $this->db->delete('vehicles_tbl');
      return;
    } 

    public function getlatsinspectionid() {
      
      $this->db->select('id_inspection');
      $this->db->order_by('id_inspection', 'DESC');
      $this->db->limit(1);
      $query = $this->db->get('inspections_tbl');
      if ($query -> num_rows() > 0) {
      foreach ($query->result() as $row)
         {
               $data = $row->id_inspection;
         }
      } else {
         $data = 0;
      }
      return $data;
   }

   public function checkifexists($chk_fld, $chk_val, $chk_tbl) {
      $this->db->where($chk_fld, $chk_val);
      $query = $this->db->get($chk_tbl); 
      if ($query->num_rows() > 0) {
         foreach ($query->result() as $row) {
             $data[] = $row;
         }
         return $data;
     }
   }

	public function getsingleimg($imgid) {
		$this->db->where('id_img', $imgid);
      $query = $this->db->get('inspectionimg_tbl'); 
		if ($query -> num_rows() > 0) {
		foreach ($query->result() as $row)
		{
				$data = $row->filename_img;
		}
	} else {
		$data = 0;
	}
	return $data;
}


public function delsingleimg($imgid) {
	$this->db->where('id_img', $imgid);
	$query = $this->db->delete('inspectionimg_tbl'); 
	return;
}

public function set_signature($data) {
	$this->db->insert('signatures_tbl', $data);
	return $this->db->insert_id();
 }
 public function get_signature($where = null) {
	if (isset($where)) {
		$this->db->where($where);
	  }
		$query = $this->db->get('signatures_tbl');
		return $query->result_array();
  
 }

}

