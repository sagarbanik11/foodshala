<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends MX_Controller {

	public function index()
	{	
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('items', 'items.u_id = user.u_id');
		$val['qry']=$this->db->get();
		$val['title']='Homepage Php Tutorial';
		$val['file']='home/home_view';
		echo Modules::run('template/layout1',$val);
	}
	
}
