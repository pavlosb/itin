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
			$this->load->view('header', $data);
			$this->load->view('inspectionform', $data);
			$this->load->view('footer', $data);

		}
	}


}
