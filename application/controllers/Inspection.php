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
			$data['checkpoints'] = $this->itindata_model->get_checkpoints();
			$this->load->view('header', $data);
			$this->load->view('inspectionform', $data);
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
			print_r($_POST);
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
						$data['accid_client'] = $this->ion_auth->register($username, $password, $email, $additional_data, $group);
					}

				}
				$data['firstname_client'] = $this->input->post('firstname_client');
				$data['lastname_client'] = $this->input->post('lasttname_client');
				$data['name_client'] = $this->input->post('name_client');
				$data['vatno_client'] = $this->input->post('vatno_client');
				$data['address_client'] = $this->input->post('address_client');
				$data['zip_client'] = $this->input->post('zip_client');
				$data['tel_client'] = $this->input->post('tel_client');
				$data['email_client'] = $this->input->post('email_client');
				$clientid = $this->itindata_model->set_client($data);

		
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

	private functiop _genpassword() {
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
