<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Template extends MX_Controller {

	public function layout1($val)
	{
		$this->load->view('header',$val);
		$this->load->view('nav1');
		$this->load->view('body');
		$this->load->view('footer');
	}
	
}


