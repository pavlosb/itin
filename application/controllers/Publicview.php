<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicview extends CI_Controller {
	public function index($id)
	{
echo $id;
	}

	public function show($id)
	{
		echo "show";
		echo "<br />";
echo $id;
	}


}
