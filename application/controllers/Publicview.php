<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicview extends CI_Controller {
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
			);
			
	}
	public function index($id)
	{
echo $id;
	}

	public function show($qc)
	{
		$data = $this->data;
			$user = $this->ion_auth->user()->row();
			$data['userid'] = $user->id;
			$data['username'] = $user->first_name." ".$user->last_name;
			$inspections = $this->itindata_model->get_inspectionsfull(array('qrcode_inspection' => $qc));
			$data['inspection'] = $inspections[0];
			$data['fueltypes'] = $this->_getfueltypes();
			$data['wheeldrives'] = $this->_getwheeldrives();
			$inspection = $inspections[0];
			$data['sec1score'] = $inspection->s1score_inspection;
			$data['sec2score'] = $inspection->s2score_inspection;
			$data['sec3score'] = $inspection->s3score_inspection;
			$data['inspscore'] = $this->itindata_model->get_inspectionscore($id);
			//$data['inspimg'] = $this->itindata_model->get_inspectionimages($id);
			$data['inspectionid'] = $id;
			$data['checkpoints'] = $this->itindata_model->get_checkpoints();
			$this->load->view('public/header', $data);
			$this->load->view('public/publicshow', $data);
			$this->load->view('public/footer', $data);
	}

	private function _getfueltypes() {
		$fueltypes = array('petrol', 'diesel', 'hybridpetrol', 'hybriddiesel', 'pluginpetrol', 'plugindiesel', 'electric', 'cng', 'lng');
		return $fueltypes;
	}

	private function _getwheeldrives() {
		$wheeldrives = array('fwd', 'rwd', 'awd');
		return $wheeldrives;
	}


}
