<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
			'user_lang' => $sesdata['site_lang']
			);
			
	}


	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function section_add(){

		if (!$this->ion_auth->logged_in())
		{
		  redirect('auth/login');
		} else if ($this->ion_auth->is_admin())
			{

			$user = $this->ion_auth->user()->row();
			$data = $this->data;
			$data['userid'] = $user->id;
			$data['username'] = $user->first_name." ".$user->last_name;
			$data['sections'] = $this->_getsections('first');
			$this->load->view('header', $data);
			$this->load->view('sectionsform', $data);
			$this->load->view('footer', $data);

}
}


public function section_save() {
	if (!$this->ion_auth->logged_in())
	{
	  redirect('auth/login');
	} else if ($this->ion_auth->is_admin())
		{
			$this->itindata_model->set_section();
			redirect('admin/section_add', 'refresh');

		}
}

public function checkpoints() {
	if (!$this->ion_auth->logged_in())
	{
	  redirect('auth/login');
	} else if ($this->ion_auth->is_admin())
		{
			$user = $this->ion_auth->user()->row();
			$data = $this->data;
			$data['userid'] = $user->id;
			$data['username'] = $user->first_name." ".$user->last_name;
			$data['checkpoints'] = $this->itindata_model->get_checkpoints();
			$this->load->view('header', $data);
			$this->load->view('checkpoints', $data);
			$this->load->view('footer', $data);
		}
}

public function checkpoint_add(){

	if (!$this->ion_auth->logged_in())
	{
	  redirect('auth/login');
	} else if ($this->ion_auth->is_admin())
		{

		$user = $this->ion_auth->user()->row();
		$data = $this->data;
		$data['userid'] = $user->id;
		$data['username'] = $user->first_name." ".$user->last_name;
		$data['sections'] = $this->_getsections('second');
		$this->load->view('header', $data);
		$this->load->view('checkpointsform', $data);
		$this->load->view('footer', $data);

}
}


public function checkpoint_save() {
	if (!$this->ion_auth->logged_in())
	{
	  redirect('auth/login');
	} else if ($this->ion_auth->is_admin())
		{
			$this->itindata_model->set_checkpoint();
			redirect('admin/checkpoint_add', 'refresh');
		}
}



private function _getsections($level = null){

if (isset($level)){

switch ($level) {
case "first" :
$where = "parent_section IS NULL";
break;
case "second" :
$where = "parent_section IS NOT NULL";
break;
}
$sections = $this->itindata_model->get_sections($where);
} else {
$sections = $this->itindata_model->get_sections();
}
return $sections;
}
}
