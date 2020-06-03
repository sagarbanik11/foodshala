<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function abc($g,$h)
	{
		return $g+$h;
		//$this->load->view('welcome_message');
	}
	public function def($a,$e)
	{
		$val=$this->abc($a,$e);
		echo $val;
		///$this->load->view('welcome_message');
	}
	public function xyz($nm,$ag)
	{
		$a['name']=$nm;
		$a['age']=$ag;
		$this->load->view('testme',$a);
	}
}
