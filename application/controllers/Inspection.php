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
			
			
	}
	public function index()
	{
		if ($this->ion_auth->logged_in())
		{
			$user = $this->ion_auth->user()->row();
			$data['userid'] = $user->id;
			$data['username'] = $user->first_name." ".$user->last_name;
			$this->load->view('header', $data);
			$this->load->view('inspections', $data);
			$this->load->view('footer', $data);

		}
	}

	public function inspection_add()
	{
		if ($this->ion_auth->logged_in())
		{
			$user = $this->ion_auth->user()->row();
			$data['userid'] = $user->id;
			$data['username'] = $user->first_name." ".$user->last_name;
			if (isset($_POST['vehicle_inspection']) && $_POST['vehicle_inspection'] > 0)
			{
				$vehicle = $this->itindata_model->get_vehicle(array('id_vhcl'=> $this->input->post('vehicle_inspection')));
				$insdata['vehicle_inspection'] = $vehicle->id_vhcl;
				$insdata['client_inspection'] = $vehicle->client_vhcl;
				$insdata['inspector_inspection'] = $user->id;
				$insdata['number_inspection'] = $this->input->post('number_inspection');
				$insdata['date_inspection'] = $this->input->post('date_inspection');
				$insdata['status_inspection'] = 0;
				$data['inspectionid'] = $this->itindata_model->set_inspection($insdata);
				
				$clients = $this->_getclients();
				
				foreach ($clients as $client) :
					 if ($client->id_client == $vehicle->client_vhcl) 
					 	{
							$data['clientname'] = $client->name_client;
	 					}
				endforeach;
				
				$data['vehicleinfo'] = array ('vhclreg' => $vehicle->reg_vhcl, 'vhclmake' => $vehicle->make_vhcl, 'modelvhcl' => $vehicle->model_vhcl);
				$data['checkpoints'] = $this->itindata_model->get_checkpoints();
				$this->load->view('header', $data);
				$this->load->view('inspectionform', $data);
				$this->load->view('footer', $data);
			
			} else {
				redirect('inspection/inspection_new', 'refresh');
		}
		}
	}

	public function inspections_list() 
	{
	
		if ($this->ion_auth->logged_in())
		{
		$user = $this->ion_auth->user()->row();
			$data['userid'] = $user->id;
			$data['username'] = $user->first_name." ".$user->last_name;
		
			$data['inspections'] = $this->itindata_model->get_inspectionsfull('inspector_inspection' => $user->id);
			$this->load->view('header', $data);
			$this->load->view('inspectionlist', $data);
			$this->load->view('footer', $data);
		}
		

	}

	public function inspection_new()
	{
		if ($this->ion_auth->logged_in())
		{
			$user = $this->ion_auth->user()->row();
			$data['userid'] = $user->id;
			$data['username'] = $user->first_name." ".$user->last_name;
			$data['vehicles'] = $this->itindata_model->get_unisnpvehicles();
			$this->load->view('header', $data);
			$this->load->view('inspectionintro', $data);
			$this->load->view('footer', $data);

		}
	}

	public function inspection_save()
	{
		if ($this->ion_auth->logged_in())
		{
			$user = $this->ion_auth->user()->row();
			$data['userid'] = $user->id;
			$data['username'] = $user->first_name." ".$user->last_name;
			print_r($_POST);
		}
	}

	public function vehicle_add() {
		if ($this->ion_auth->logged_in())
		{
			$user = $this->ion_auth->user()->row();
			$data['userid'] = $user->id;
			$data['username'] = $user->first_name." ".$user->last_name;
			$data['carbrands'] = $this->_getcarbrands();
			$data['vhcltypes'] = $this->_getvhcltypes();
			$data['clients'] = $this->_getclients();
			$this->load->view('header', $data);
			$this->load->view('vehiclesform', $data);
			$this->load->view('footer', $data);

		}
		
	}

	public function vehicle_save() {

		if ($this->ion_auth->logged_in())
		{
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
			$insdata['firstreg_vhcl'] = date('Y-m-d', strtotime(date('Y-d-m', strtotime('01/' . str_replace('-', '/', $this->input->post('firstreg_vhcl'))))));
			$insdata['nxtdate_vhcl'] = date('Y-m-d', strtotime(date('Y-d-m', strtotime('01/' . str_replace('-', '/', $this->input->post('nxtdate_vhcl'))))));

			$vehicleid = $this->itindata_model->set_vehicle($insdata);

		}

	}

	public function client_add() {
		if ($this->ion_auth->logged_in())
		{
			$user = $this->ion_auth->user()->row();
			$data['userid'] = $user->id;
			$data['username'] = $user->first_name." ".$user->last_name;
			$this->load->view('header', $data);
			$this->load->view('clientsform', $data);
			$this->load->view('footer', $data);

		}
		
	}

	public function client_save() {

		if ($this->ion_auth->logged_in())
		{
			$user = $this->ion_auth->user()->row();
			$data['userid'] = $user->id;
			$data['username'] = $user->first_name." ".$user->last_name;
			if (isset($_POST))
			{
				print_r($_POST);
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

		
			}
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
}
