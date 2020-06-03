<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Orderdetails extends MX_Controller {
	function __construct() {
		
		if(empty($_SESSION['u_id']))
		redirect('login');
		elseif($this->session->userdata['authorization']==2)
		redirect('home');
		}
	

	public function index()
	{
		$this->db->select('*');
		$this->db->from('orderhead');
		$this->db->join('orders', 'orders.oh_id= orderhead.oh_id');
		$this->db->join('items', 'orders.item_id = items.i_id');
		$this->db->join('user', 'orderhead.customer_id = user.u_id');
		$this->db->where('restaurant_id',$this->session->userdata('u_id'));
		$this->db->order_by("o_id", "desc");
		$val['qry']=$this->db->get();
		$val['file']='orderdetails/orderdetails_view';
		echo Modules::run('template/layout1',$val);
	}


	
}
