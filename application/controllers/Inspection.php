<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inspection extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
			parent::__construct();
			$this->load->model('itindata_model');
			$this->load->helper('url_helper');
			$this->load->helper('form');
			$this->lang->load('itin','greek');
			$sesdata = $this->session->userdata;
			$this->data = array(
			'user_lang' => $sesdata['site_lang'],
			'usrgrp' => 3
			);
			
	}
	public function index()
	{
		if ($this->ion_auth->logged_in() && $this->ion_auth->in_group('inspectors'))
		{
			$user = $this->ion_auth->user()->row();
			$data = $this->data;
			$data['userid'] = $user->id;
			$data['username'] = $user->first_name." ".$user->last_name;
			$this->load->view('header', $data);
			$this->load->view('inspections', $data);
			$this->load->view('footer', $data);

		} else {
			redirect('auth/login');
		}
	}

	public function inspection_add()
	{
		if ($this->ion_auth->logged_in() && $this->ion_auth->in_group('inspectors'))
		{
			$user = $this->ion_auth->user()->row();
			$data = $this->data;
			$data['userid'] = $user->id;
			$data['username'] = $user->first_name." ".$user->last_name;
			if (isset($_POST['vehicle_inspection']) && $_POST['vehicle_inspection'] > 0)
			{
				$vehicle = $this->itindata_model->get_vehicle(array('id_vhcl'=> $this->input->post('vehicle_inspection')));
				$insdata['vehicle_inspection'] = $vehicle->id_vhcl;
				$insdata['client_inspection'] = $vehicle->client_vhcl;
				$insdata['inspector_inspection'] = $user->id;
				if (isset($_POST['number_inspection']) && $_POST['number_inspection'] <> "") {
				$insdata['number_inspection'] = $this->input->post('number_inspection');
				} else {
				$insdata['number_inspection'] = $this->_createinspnum($vehicle->id_vhcl);
				}
				$insdata['date_inspection'] = $this->input->post('date_inspection');
				$insdata['orderdate_inspection'] = $this->input->post('orderdate_inspection');
				$insdata['ordermethod_inspection'] = $this->input->post('ordermethod_inspection');
				$insdata['status_inspection'] = 0;
				if (isset($_POST['rmrk_inspection']) && $_POST['rmrk_inspection'] <> "") {
					$insdata['rmrk_inspection'] = $this->input->post('rmrk_inspection');
					}
					if (isset($_POST['en_rmrk_inspection']) && $_POST['en_rmrk_inspection'] <> "") {
						$insdata['en_rmrk_inspection'] = $this->input->post('en_rmrk_inspection');
						}

				$data['inspectionid'] = $this->itindata_model->set_inspection($insdata);
				
				$clients = $this->_getclients();
				
				foreach ($clients as $client) :
					 if ($client->id_client == $vehicle->client_vhcl) 
					 	{
							$data['clientname'] = $client->name_client;
	 					}
				endforeach;
				$inspections = $this->itindata_model->get_inspectionsfull(array('id_inspection' => $data['inspectionid']));
				$data['inspection'] = $inspections[0];
				$data['vehicleinfo'] = array ('vhclreg' => $vehicle->reg_vhcl, 'vhclmake' => $vehicle->make_vhcl, 'modelvhcl' => $vehicle->model_vhcl);
				$data['checkpoints'] = $this->itindata_model->get_checkpoints();
				$this->load->view('header', $data);
				$this->load->view('inspectionform', $data);
				$this->load->view('footer', $data);
			
			} else {
				redirect('inspection/inspection_new', 'refresh');
		}
		} else {
			redirect('auth/login');
		}
	}

	public function inspection_edit($id)
	{
		if ($this->ion_auth->logged_in() && $this->ion_auth->in_group('inspectors'))
		{
			$data = $this->data;
			$user = $this->ion_auth->user()->row();
			$data['userid'] = $user->id;
			$data['username'] = $user->first_name." ".$user->last_name;

			$inspections = $this->itindata_model->get_inspectionsfull(array('id_inspection' => $id));
$inspstatus = $inspections[0]->status_inspection;
			if ($inspstatus < 1) {
			$data['inspection'] = $inspections[0];
			$data['inspscore'] = $this->itindata_model->get_inspectionscore($id);
			$data['inspimg'] = $this->itindata_model->get_inspectionimages($id);
			$data['inspremark'] = $this->itindata_model->get_inspectionremarks($id);
			$data['inspectionid'] = $id;
			$data['checkpoints'] = $this->itindata_model->get_checkpoints();
$data['signature'] = $this->_checksignature($id);
				$this->load->view('header', $data);
				$this->load->view('inspectionform', $data);
				$this->load->view('footer', $data);
		} else {
redirect('inspection/inspection_view/'.$id);
			}
		} else {
			redirect('auth/login');
		}
	}	
	
	public function inspections_list() 
	{
	
		if ($this->ion_auth->logged_in() && $this->ion_auth->in_group('inspectors'))
		{
			$data = $this->data;
		$user = $this->ion_auth->user()->row();
			$data['userid'] = $user->id;
			$data['username'] = $user->first_name." ".$user->last_name;
			$data['inspections'] = $this->itindata_model->get_inspectionsfull();
			//$data['inspections'] = $this->itindata_model->get_inspectionsfull(array('inspector_inspection' => $user->id));
			$this->load->view('header', $data);
			$this->load->view('inspectionslist', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('auth/login');
		}
		

	}

	public function vehicles_list() 
	{
	
		if ($this->ion_auth->logged_in() && $this->ion_auth->in_group('inspectors'))
		{
			$data = $this->data;
		$user = $this->ion_auth->user()->row();
			$data['userid'] = $user->id;
			$data['username'] = $user->first_name." ".$user->last_name;
			$data['vehicles'] = $this->itindata_model->get_vehiclesfull();
			//$data['inspections'] = $this->itindata_model->get_inspectionsfull(array('inspector_inspection' => $user->id));
			$this->load->view('header', $data);
			$this->load->view('vehicleslist', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('auth/login');
		}
		

	}

	public function inspections_pdf() 
	{
	
		if ($this->ion_auth->logged_in() && $this->ion_auth->in_group('inspectors'))
		{
			$id = $this->input->post('id');
			$user = $this->ion_auth->user()->row();
			$data = $this->data;
			$ulang = $data['user_lang'];
			$data['userid'] = $user->id;
			$data['username'] = $user->first_name." ".$user->last_name;
			$inspections = $this->itindata_model->get_inspectionsfull(array('id_inspection' => $id));
			$data['inspection'] = $inspections[0];
			$data['inspremark'] = $this->itindata_model->get_inspectionremarks($id);
			$inspection = $inspections[0];
			$score1 = $inspection->s1score_inspection;
			$score2 = $inspection->s2score_inspection;
			$score3 = $inspection->s3score_inspection;
			if ( ($score1 >= 92) && ($score2 >= 53) && ($score3 >= 12))
			{
				$data['result'] = 1;
			} else {
				$data['result'] = 0;
			}
			$data['sec1score'] = round(100*($inspection->s1score_inspection / 112), -1);
			$data['sec2score'] = round(100*($inspection->s2score_inspection / 62), -1);
			$data['sec3score'] = round(100*($inspection->s3score_inspection / 16), -1);
			$data['inspscore'] = $this->itindata_model->get_inspectionscore($id);
			$data['inspectionid'] = $id;
			$data['dynimg'] = $this->dynimg($id);
			$data['inspimg'] = $this->itindata_model->get_inspectionimages($id);
			$data['checkpoints'] = $this->itindata_model->get_checkpoints();
			//$html = $this->load->view('header', $data, true);
			//$this->load->view('testview', $data);
			if ($ulang == "greek") {
				$langprefix ="";
				$oldlang = "greek";
				$newlang = "english";
				$newprfx = "en_";
			} else {
				$langprefix ="en_";
				$newlang = "greek";
				$oldlang = "english";
				$newprfx = "";
				}
			//$this->load->view('pdfreport', $data);
			$html = $this->load->view('pdfreport', $data, true);
			//$this->load->view('pdfreport');
			//$html .= $this->load->view('footer', $data, true);
			
			$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
			$mpdf->img_dpi = 96;
			$mpdf->debug = true;
			$mpdf->setFooter('{PAGENO}');
			$mpdf->WriteHTML($html);
			$filename = $langprefix;
			$filename .= $this->_stringclean($inspection->number_inspection);
			$dir ="/home/site/wwwroot/assets/pdfs/";
			//$mpdf->Output();
			$mpdf->Output($dir.$filename.".pdf",\Mpdf\Output\Destination::FILE);
			$this->itindata_model->upd_inspection($inspection->id_inspection, array($langprefix."filename_inspection" => $filename.".pdf", "status_inspection" => 1));
			$status[$langprefix."certfile_inspection"] = $filename.".pdf";
			$this->lang->load('itin',$newlang);
			$this->session->set_userdata('site_lang', $newlang);
			$sesdata = $this->session->userdata;
			$data['user_lang'] = $sesdata['site_lang'];
			$html = $this->load->view('pdfreport', $data, true);
			$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
			$mpdf->setFooter('{PAGENO}');
			$mpdf->WriteHTML($html);
			$langprefix = $newprfx;
		 	$filename = $langprefix;
			$filename .= $this->_stringclean($inspection->number_inspection);
			$dir ="/home/site/wwwroot/assets/pdfs/";
		
	$mpdf->Output($dir.$filename.".pdf",\Mpdf\Output\Destination::FILE);
	 $this->itindata_model->upd_inspection($inspection->id_inspection, array($langprefix."filename_inspection" => $filename.".pdf"));
	 $status[$langprefix."certfile_inspection"] = $filename.".pdf";
		$status['created'] = "ok";
	 $this->lang->load('itin', $oldlang);
		$this->session->set_userdata('site_lang', $oldlang);

//redirect ('inspection/inspections_list', 'refresh');
$this->output->set_header("Cache-Control: no-cache, must-revalidate");
$this->output->set_header("Expires: Mon, 4 Apr 1994 04:44:44 GMT");
$this->output->set_header("Content-type: application/json");
echo json_encode($status) ;  
		 
		} else {
			redirect('auth/login');
		}
		

	}

	public function cert_pdf() 
	{
	
		if ($this->ion_auth->logged_in() && $this->ion_auth->in_group('inspectors'))
		{
			$id = $this->input->post('id');
			$user = $this->ion_auth->user()->row();
			$data = $this->data;
			$ulang = $data['user_lang'];
			$data['userid'] = $user->id;
			$data['username'] = $user->first_name." ".$user->last_name;
			$inspections = $this->itindata_model->get_inspectionsfull(array('id_inspection' => $id));
			$data['inspection'] = $inspections[0];
			$inspection = $inspections[0];
			$score1 = $inspection->s1score_inspection;
			$score2 = $inspection->s2score_inspection;
			$score3 = $inspection->s3score_inspection;
			if ( ($score1 >= 92) && ($score2 >= 53) && ($score3 >= 12))
			{
					$data['result'] = 1;
			} else {
				$data['result'] = 0;
			}
			$data['sec1score'] = round(100*($inspection->s1score_inspection / 112), -1);
			$data['sec2score'] = round(100*($inspection->s2score_inspection / 62), -1);
			$data['sec3score'] = round(100*($inspection->s3score_inspection / 16), -1);
			$data['inspscore'] = $this->itindata_model->get_inspectionscore($id);
			$data['inspectionid'] = $id;
			$data['checkpoints'] = $this->itindata_model->get_checkpoints();
			if ($ulang == "greek") {
				$langprefix ="";
				$oldlang = "greek";
				$newlang = "english";
				$newprfx = "en_";
			} else {
				$langprefix ="en_";
				$newlang = "greek";
				$oldlang = "english";
				$newprfx = "";
				}
				$this->load->view('pdfcert', $data);
			$html = $this->load->view('pdfcert', $data, true);
			//$html .= $this->load->view('footer', $data, true);
			$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
			$mpdf->setFooter('{PAGENO}');
			$mpdf->WriteHTML($html);
			$filename = $langprefix;
				 $filename .= $this->_stringclean($inspection->number_inspection);
				 $filename .= "_cert";
			$dir ="/home/site/wwwroot/assets/pdfs/";//$this->mpdfgenerator->generate($html, $filename, True, 'A4', 'portrait');	
			//$mpdf->Output();
			$mpdf->Output($dir.$filename.".pdf",\Mpdf\Output\Destination::FILE);
		 $this->itindata_model->upd_inspection($inspection->id_inspection, array($langprefix."certfile_inspection" => $filename.".pdf", "status_inspection" => 1));
		 $status[$langprefix."certfile_inspection"] = $filename.".pdf";
		 $this->lang->load('itin',$newlang);
		 $this->session->set_userdata('site_lang', $newlang);
		 $html = $this->load->view('pdfcert', $data, true);
		 //$html .= $this->load->view('footer', $data, true);
		 $mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
		 $mpdf->setFooter('{PAGENO}');
		 $mpdf->WriteHTML($html);
		 $langprefix = $newprfx;
		 $filename = $langprefix;
				$filename .= $this->_stringclean($inspection->number_inspection);
				$filename .= "_cert";
		 $dir ="/home/site/wwwroot/assets/pdfs/";//$this->mpdfgenerator->generate($html, $filename, True, 'A4', 'portrait');	
		 //$mpdf->Output();
		 $mpdf->Output($dir.$filename.".pdf",\Mpdf\Output\Destination::FILE);
		$this->itindata_model->upd_inspection($inspection->id_inspection, array($langprefix."certfile_inspection" => $filename.".pdf", "status_inspection" => 1));
		$status[$langprefix."certfile_inspection"] = $filename.".pdf";
		$status['created'] = "ok";
		$this->lang->load('itin',$oldlang);
		$this->session->set_userdata('site_lang', $oldlang);
		//redirect ('inspection/inspection_view/'.$id, 'refresh');
		$this->output->set_header("Cache-Control: no-cache, must-revalidate");
		$this->output->set_header("Expires: Mon, 4 Apr 1994 04:44:44 GMT");
		$this->output->set_header("Content-type: application/json");
		echo json_encode($status) ;  
			   
		} else {
			redirect('auth/login');
		}
		

	}
	public function inspection_view($id) 
	{
	
		if ($this->ion_auth->logged_in() && $this->ion_auth->in_group('inspectors'))
		{
			$data = $this->data;
			$user = $this->ion_auth->user()->row();
			$data['userid'] = $user->id;
			$data['username'] = $user->first_name." ".$user->last_name;
			$inspections = $this->itindata_model->get_inspectionsfull(array('id_inspection' => $id));
			$data['inspection'] = $inspections[0];
			$inspection = $inspections[0];
			$data['sec1score'] = $inspection->s1score_inspection;
			$data['sec2score'] = $inspection->s2score_inspection;
			$data['sec3score'] = $inspection->s3score_inspection;
			$data['inspscore'] = $this->itindata_model->get_inspectionscore($id);
			$data['inspimg'] = $this->itindata_model->get_inspectionimages($id);
			$data['inspectionid'] = $id;
$data['signature'] = $this->_checksignature($id);
			$data['checkpoints'] = $this->itindata_model->get_checkpoints();
			$this->load->view('header', $data);
			$this->load->view('inspectionview', $data);
			$this->load->view('footer', $data);
		 
		} else {
			redirect('auth/login');
		}
		

	}
	public function inspection_new()
	{
		if ($this->ion_auth->logged_in() && $this->ion_auth->in_group('inspectors'))
		{
			$data = $this->data;
			$user = $this->ion_auth->user()->row();
			$data['userid'] = $user->id;
			$data['username'] = $user->first_name." ".$user->last_name;
			$data['vehicles'] = $this->itindata_model->get_unisnpvehicles();
			$this->load->view('header', $data);
			$this->load->view('inspectionintro', $data);
			$this->load->view('footer', $data);

		} else {
			redirect('auth/login');
		}
	}

	public function inspection_save()
	{
		if ($this->ion_auth->logged_in() && $this->ion_auth->in_group('inspectors'))
		{
			$data = $this->data;
			$user = $this->ion_auth->user()->row();
			$data['userid'] = $user->id;
			$data['username'] = $user->first_name." ".$user->last_name;
			$points = $_POST['checkpoint'];
			if (isset($_POST['remark'])) {
			$remarks = $_POST['remark'];
			}
			$sectors = $_POST['chpsect'];
			if (isset($_POST['inspimg'])) {
			$photos = $_POST['inspimg'];
			}
foreach ($points as $key => $value):
 
	$insdata[] = array('inspectionid_insres' => $this->input->post('inspectionid_insres'), 'chkpointsect_insres' => $sectors[$key], 'chkpointid_insres' => $key, 'chpointscore_insres' => $value);

endforeach;
if(isset($photos)) {
foreach ($photos as $key => $filename):
	if ($filename!=""){
	$imgdata[] = array('inspectionid_img' => $this->input->post('inspectionid_insres'), 'filename_img' => basename($filename));
	}
endforeach;
}
if(isset($remarks)) {
foreach ($remarks as $key => $value):
	if ($value!=""){
	$remdata[] = array('inspectionid_insrem' => $this->input->post('inspectionid_insres'), 'chkpointid_insrem' => $key, 'remark_insrem' => $value);
	}
endforeach;
}
//print_r($insdata);
$this->itindata_model->set_inspectionscore($this->input->post('inspectionid_insres'), $insdata);
if ($remdata && count($remdata) > 0) {
$this->itindata_model->set_inspectionremarks($this->input->post('inspectionid_insres'), $remdata);
}
if (isset($imgdata) && count($imgdata) > 0) {
$this->itindata_model->set_inspectionimg($this->input->post('inspectionid_insres'), $imgdata);
}
$updata['s1score_inspection'] = $this->itindata_model->get_sectionscore($this->input->post('inspectionid_insres'), 1);
$updata['s2score_inspection'] = $this->itindata_model->get_sectionscore($this->input->post('inspectionid_insres'), 12);
$updata['s3score_inspection'] = $this->itindata_model->get_sectionscore($this->input->post('inspectionid_insres'), 16);
$this->itindata_model->upd_inspection($this->input->post('inspectionid_insres'), $updata);
redirect('inspection/inspections_list', 'refresh');
	} else {
		redirect('auth/login');
	}
	}

	public function vehicle_add() {
		if ($this->ion_auth->logged_in() && $this->ion_auth->in_group('inspectors'))
		{
			$data = $this->data;
			$user = $this->ion_auth->user()->row();
			$data['userid'] = $user->id;
			$data['username'] = $user->first_name." ".$user->last_name;
			$data['carbrands'] = $this->_getcarbrands();
			$data['vhcltypes'] = $this->_getvhcltypes();
			$data['clients'] = $this->itindata_model->get_clientsplain();
			$this->load->view('header', $data);
			$this->load->view('vehiclesform', $data);
			$this->load->view('footer', $data);

		} else {
			redirect('auth/login');
		}
		
	}

	public function vehicle_save() {

		if ($this->ion_auth->logged_in() && $this->ion_auth->in_group('inspectors'))
		{
			$data = $this->data;
			$user = $this->ion_auth->user()->row();
			$data['userid'] = $user->id;
			$data['username'] = $user->first_name." ".$user->last_name;
			
			$insdata['client_vhcl'] = $this->input->post('client_vhcl');
			$insdata['reg_vhcl'] = $this->input->post('reg_vhcl');
			$insdata['vin_vhcl'] = $this->input->post('vin_vhcl');
			$insdata['mlg_vhcl'] = $this->input->post('mlg_vhcl');
			$insdata['type_vhcl'] = $this->input->post('type_vhcl');
			$insdata['make_vhcl'] = $this->input->post('make_vhcl');
			$insdata['model_vhcl'] = $this->input->post('model_vhcl');
			$insdata['displ_vhcl'] = $this->input->post('displ_vhcl');
			$insdata['pow_vhcl'] = $this->input->post('pow_vhcl');
			$insdata['doors_vhcl'] = $this->input->post('doors_vhcl');
			$insdata['colour_vhcl'] = $this->input->post('colour_vhcl');
			$insdata['firstreg_vhcl'] = date('Y-m-d', strtotime(date('Y-d-m', strtotime('01/' . str_replace('-', '/', $this->input->post('firstreg_vhcl'))))));
			$insdata['nxtdate_vhcl'] = date('Y-m-d', strtotime(date('Y-d-m', strtotime('01/' . str_replace('-', '/', $this->input->post('nxtdate_vhcl'))))));
			if (isset($_POST['id_vhcl'])) {
			$this->itindata_model->upd_vehicle($this->input->post('id_vhcl'), $insdata);
			redirect('inspection/vehicles_list', 'refresh');
			} else {
			$vehicleid = $this->itindata_model->set_vehicle($insdata);
			redirect('inspection/index', 'refresh');
			}
			
		} else {
			redirect('auth/login');
		}

	}

	public function client_add() {
		if ($this->ion_auth->logged_in() && $this->ion_auth->in_group('inspectors'))
		{
			$data = $this->data;
			$user = $this->ion_auth->user()->row();
			$data['userid'] = $user->id;
			$data['username'] = $user->first_name." ".$user->last_name;
			$this->load->view('header', $data);
			$this->load->view('clientsform', $data);
			$this->load->view('footer', $data);

		} else {
			redirect('auth/login');
		}
		
	}

	public function client_save() {

		if ($this->ion_auth->logged_in() && $this->ion_auth->in_group('inspectors'))
		{
			$data = $this->data;
			$user = $this->ion_auth->user()->row();
			$data['userid'] = $user->id;
			$data['username'] = $user->first_name." ".$user->last_name;
			
				if (isset($_POST['id_client'])) {
				$id = $this->input->post('id_client');
				$updata['firstname_client'] = $this->input->post('firstname_client');
				$updata['lastname_client'] = $this->input->post('lastname_client');
				$updata['name_client'] = $this->input->post('name_client');
				$updata['vatno_client'] = $this->input->post('vatno_client');
				$updata['address_client'] = $this->input->post('address_client');
				$updata['zip_client'] = $this->input->post('zip_client');
				$updata['since_client'] = date('Y-m-d');
				$updata['tel_client'] = $this->input->post('tel_client');
				$updata['email_client'] = $this->input->post('email_client');
				if (isset($_POST['createaccount']) && $_POST['createaccount'] == 1) 
				{


					$username = $this->input->post('email_client');
    			$password = $this->_genpassword();
    			$email = $this->input->post('email_client');
    			$additional_data = array(
                							'first_name' => $this->input->post('firstname_client'),
											'last_name' => $this->input->post('lastname_client'),
											'company' => $this->input->post('name_client'),
											);
					if (!$this->ion_auth->username_check($username))
					{
						$group = array('5'); // Sets user to clients.
						$updata['accid_client'] = $this->ion_auth->register($username, $password, $email, $additional_data, $group);
					} else {
						$user = $this->ion_auth->where('username', $this->input->post('email_client'))->users()->result();
						
						$updata['accid_client'] = $user[0]->id;
					}


				}
				$this->itindata_model->upd_client($id, $updata);
				redirect('inspection/clients_list', 'refresh');
				} else {
			//	print_r($_POST);
				if (isset($_POST['createaccount']) && $_POST['createaccount'] == 1) 
				{


					$username = $this->input->post('email_client');
    			$password = $this->_genpassword();
    			$email = $this->input->post('email_client');
    			$additional_data = array(
                							'first_name' => $this->input->post('firstname_client'),
											'last_name' => $this->input->post('lastname_client'),
											'company' => $this->input->post('name_client'),
											);
					if (!$this->ion_auth->username_check($username))
					{
						$group = array('5'); // Sets user to clients.
						$insdata['accid_client'] = $this->ion_auth->register($username, $password, $email, $additional_data, $group);
					} else {
						$user = $this->ion_auth->where('username', $this->input->post('email_client'))->users()->result();
						
						$insdata['accid_client'] = $user[0]->id;
					}
					
				}
				$insdata['firstname_client'] = $this->input->post('firstname_client');
				$insdata['lastname_client'] = $this->input->post('lastname_client');
				$insdata['name_client'] = $this->input->post('name_client');
				$insdata['vatno_client'] = $this->input->post('vatno_client');
				$insdata['address_client'] = $this->input->post('address_client');
				$insdata['zip_client'] = $this->input->post('zip_client');
				$insdata['since_client'] = date('Y-m-d');
				$insdata['tel_client'] = $this->input->post('tel_client');
				$insdata['email_client'] = $this->input->post('email_client');
				$clientid = $this->itindata_model->set_client($insdata);
				redirect('inspection/index', 'refresh');
		
			}
		} else {
			redirect('auth/login');
		}

	} 


    public function clients_list() {
		if ($this->ion_auth->logged_in() && $this->ion_auth->in_group('inspectors'))
		{
			$data = $this->data;
			$user = $this->ion_auth->user()->row();
			$data['userid'] = $user->id;
			$data['username'] = $user->first_name." ".$user->last_name;
			$data['clients'] = $this->itindata_model->get_clients();
			//print_r($data['clients']);
			$this->load->view('header', $data);
			$this->load->view('clientslist', $data);
			$this->load->view('footer', $data);

		} else {
			redirect('auth/login');
		}
		
	}

	public function client_edit($id_client) {

		if ($this->ion_auth->logged_in())
		{
			$data = $this->data;
			$user = $this->ion_auth->user()->row();
			$data['userid'] = $user->id;
			$data['username'] = $user->first_name." ".$user->last_name;
			$data['cldata'] = $this->itindata_model->get_clients(array('id_client' => $id_client));
			$data['hasaccount'] = $this->ion_auth->email_check($data['cldata'][0]->email_client);
			//print_r($data['clients']);
				$this->load->view('header', $data);
				$this->load->view('clientsform', $data);
				$this->load->view('footer', $data);
		} else {
			redirect('auth/login');
		}


	}

	public function vehicle_edit($id_vhcl) {

		if ($this->ion_auth->logged_in() && $this->ion_auth->in_group('inspectors'))
		{
			$data = $this->data;
			$user = $this->ion_auth->user()->row();
			$data['userid'] = $user->id;
			$data['username'] = $user->first_name." ".$user->last_name;
			$data['carbrands'] = $this->_getcarbrands();
			$data['vhcltypes'] = $this->_getvhcltypes();
			$data['clients'] = $this->itindata_model->get_clientsplain();
			$data['vhcldata'] = $this->itindata_model->get_vehiclesfull(array('id_vhcl' => $id_vhcl));
			//print_r($data['clients']);
				$this->load->view('header', $data);
				$this->load->view('vehiclesform', $data);
				$this->load->view('footer', $data);
		} else {
			redirect('auth/login');
		}


	}

	public function client_delete($id) {
		if ($this->ion_auth->logged_in() && $this->ion_auth->in_group('inspectors'))
		{
			$this->itindata_model->del_client($id);
			redirect('inspection/clients_list', 'refresh');
		} else {
			redirect('auth/login');
		}

	}

	public function vehicle_delete($id) {
		if ($this->ion_auth->logged_in())
		{
			$this->itindata_model->del_vehicle($id);
			redirect('inspection/vehicles_list', 'refresh');
		} else {
			redirect('auth/login');
		}

	}


	public function vindecoder($vinr) {
		if ($this->ion_auth->logged_in() && $this->ion_auth->in_group('inspectors'))
		{
		
$apiPrefix = "https://api.vindecoder.eu/2.0";
$apikey = "17f275ff3136";   // Your API key
$secretkey = "853a46ba0d";  // Your secret key
$vin = $vinr; // Requested VIN
$id = $vin;

$controlsum = substr(sha1("{$id}|{$apikey}|{$secretkey}"), 0, 10);

$data = file_get_contents("{$apiPrefix}/{$apikey}/{$controlsum}/decode/{$vin}.json", false);
$result = json_decode($data);
print_r($result);
} else {
	redirect('auth/login');
}
	}
public function checkifexists(){
if (isset($_POST['chk_fld']) && isset($_POST['chk_val'])) {

$fieldtables = array (
	'vin_vhcl' => 'vehicles_tbl',
	'reg_vhcl' => 'vehicles_tbl',
	'vatno_client'=> 'clients_tbl',
	'email_client'=> 'clients_tbl',
	'number_inspection' => 'inspections_tbl'
);
$chk_fld = $this->input->post('chk_fld');
$chk_val = $this->input->post('chk_val');
$chk_tbl = $fieldtables[$chk_fld];
$data['rows'] = $this->itindata_model->checkifexists($chk_fld, $chk_val, $chk_tbl);
	if (empty($data['rows'])) {
		$status[] = array(
		'EXISTS' => 'notexists'
		);
	} else {
		$status[] = array(
		'EXISTS' => 'exists'
		);
		}
$this->output->set_header("Cache-Control: no-cache, must-revalidate");
$this->output->set_header("Expires: Mon, 4 Apr 1994 04:44:44 GMT");
$this->output->set_header("Content-type: application/json");
echo json_encode($status) ;  
}
}


	private function _getcarbrands(){

		
		$carbrands = $this->itindata_model->get_carbrands();
	
		return $carbrands;
		}

	private function _getvhcltypes(){

		$vhcltype = array(
			array('nametype' => 'ΙΧ Επιβατικό'),
			array('nametype' => 'Ελαφρύ Φορτηγο')
		);

		return $vhcltype;
	}
	
	private function _getclients() {

		$clients = $this->itindata_model->get_clients();
	
		return $clients;

	}

	private function _genpassword() {
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890$#!@';
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}


	private function _stringclean($string) {
		$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
		$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
 
		return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
 }

 private function _createinspnum($vhclid) {
	$user = $this->ion_auth->user()->row();
			
	$part1 = date('Ymd');
	$part2 = $user->id;
	$part3 = $this->itindata_model->getlatsinspectionid() + 1;
	$part4 = $vhclid;

	$inspnum = $part1.$part2.$part3.$part4;
	return $inspnum; 
 }

 public function photoupload(){

	$filename = 'pic_'.date('YmdHis') . '.jpeg';

$url = '';
if( move_uploaded_file($_FILES['webcam']['tmp_name'],'upload/'.$filename) ){
   $url = 'https://' . $_SERVER['HTTP_HOST'] .'/upload/' . $filename;
}

// Return image url
echo $url;

 }


 public function imgupload(){
	/* Get the name of the uploaded file */
   $filename = str_replace(' ', '_', $_FILES['file']['name']);
   
   /* Choose where to save the uploaded file */
   $location = "upload/".$filename;
   
   /* Save the uploaded file to the local filesystem */
   if ( move_uploaded_file($_FILES['file']['tmp_name'], $location) ) { 
	   $url = 'https://' . $_SERVER['HTTP_HOST'] .'/upload/' . $filename;
   } 
   $response['url'] = $url;
   
		 echo json_encode($response);
		 exit;
	}
 public function dynimg($id) {
	$pointscore = $this->itindata_model->get_scoreforoutside($id);
	
	$img = file_get_contents(base_url()."assets/images/carframe.svg");
	$imgparts = explode('</style>',$img);
	$imgnew = $imgparts[0];
	foreach ($pointscore as $cpoint=>$cscore) {
		$npoint = $cpoint - 57;
	if ($cscore < 0) {
		$imgnew .= '.p_'.$npoint.'{fill:red;}';
	}
	if ($cscore > 0) {
		$imgnew .= '.p_'.$npoint.'{fill:green;}';
	}
	}
	$imgnew .= '</style>';
	$imgnew .= $imgparts[1];
	return $imgnew;
 }


public function removeimg() {
	$imgid = $this->input->post('id');
	$filename = $this->itindata_model->getsingleimg($imgid);
	$delete=unlink('upload/'.$filename);    
if($delete){  
	$this->itindata_model->delsingleimg($imgid);
	$status = "ok";
}else{  
	$status = "nok";
}
	$this->output->set_header("Cache-Control: no-cache, must-revalidate");
	$this->output->set_header("Expires: Mon, 4 Apr 1994 04:44:44 GMT");
	$this->output->set_header("Content-type: application/json");
	echo json_encode($status);  
}

public function getsignature($inspid=null) {
	if ($this->ion_auth->logged_in() && $this->ion_auth->in_group('inspectors'))
	{

		if(!empty($_POST)) {
			//print_r($_POST);// Something has been posted
			date_default_timezone_set('Europe/Athens');
			$timestamp = date('Y-m-d H:i:s', time());
			//echo $timestamp;
			$sgndata['inspectionid_signature'] = $this->input->post('inspectionid');
			$sgndata['clientid_signature'] = $this->input->post('id_client');
			$sgndata['clientfname_signature'] = $this->input->post('firstname_client');
			$sgndata['clientlname_signature'] = $this->input->post('lastname_client');
			$sgndata['signature_signature'] = $this->input->post('signature');
			$sgndata['date_signature'] = $timestamp;
			if ($this->itindata_model->set_signature($sgndata)) {
				redirect('inspection/inspection_edit/'.$this->input->post('inspectionid'));
			}
			
			

		} else {

			$inspdata = $this->itindata_model->get_inspectionsfull(array('id_inspection' => $inspid));
			if ($inspdata) {
			$custinfo = $this->itindata_model->get_clients(array('id_client' => $inspdata[0]->client_inspection));
			$data = $this->data;
			$user = $this->ion_auth->user()->row();
			$data['id_client'] = $inspdata[0]->client_inspection;
			$data['firstname_client'] = $custinfo[0]->firstname_client;
			$data['lastname_client'] = $custinfo[0]->lastname_client;
			$data['inspectionid'] = $inspid;


				$this->load->view('header', $data);
				$this->load->view('signatureform', $data);
				$this->load->view('footer', $data);
			} else {
				redirect('inspection/inspections_list');
			}
		}
			} else {
				redirect('auth/login');
			}
}

private function _checksignature($inspid) {

	$signatureinfo = $this->itindata_model->get_signature(array('inspectionid_signature'=>$inspid));
	if ($signatureinfo) {
		return $signatureinfo[0];
	} else {
		return null;
	}

 }
}

