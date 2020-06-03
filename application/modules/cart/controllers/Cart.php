<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Cart extends MX_Controller {
	function __construct() {
		
		if(empty($_SESSION['u_id']))
		redirect('login');
		elseif($this->session->userdata['authorization']==1)
		redirect('home');
		}

	public function index()
	{	
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('items', 'items.u_id = user.u_id');
		$val['qry']=$this->db->get();
		$val['title']='Homepage Php Tutorial';
		$val['file']='cart/cart_view';
		echo Modules::run('template/layout1',$val);
	}

	public function add()  
    {  
		$this->load->library("cart");
		
		$data = array(
			"id"  => $_POST["product_id"],
			"name"  => $_POST["product_name"],
			"rest"  => $_POST["rest_name"],
			"restid"  => $_POST["rest_id"],
			"qty"  => $_POST["quantity"],
			"price"  => $_POST["product_price"]
		 );
		 $this->cart->insert($data);
	}  
	function load()
	{
	 	echo $this->view();
	}

	function remove()
	{
		$this->load->library("cart");
		$row_id = $_POST["row_id"];
		$data = array(
		'rowid'  => $row_id,
		'qty'  => 0
	 );
		$this->cart->update($data);
		echo $this->view();
	}
	function clear()
 	{
		$this->load->library("cart");
		$this->cart->destroy();
		echo $this->view();
 	}
	
	function view()
	{
		$this->load->library("cart");
		$output = '';
		$output .= '

		<div class="table-responsive">
		<div align="right">
		
			<button type="button" id="clear_cart" class="btn btn-dark"><svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
			<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
			<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
		  </svg></button>
		</div>
		<br />
		<table class="table table-bordered">
			<tr>
			<th >Item</th>
			<th >Restaurant</th>
			<th >Quantity</th>
			<th >Price</th>
			<th >Total</th>
			<th >Action</th>
			</tr>

		';
		$count = 0;
		foreach($this->cart->contents() as $items)
		{
		$count++;
		$output .= '
		<tr> 
			<td>'.$items["name"].'</td>
			<td>'.$items["rest"].'</td>
			<td>'.$items["qty"].'</td>
			<td>'.$items["price"].'</td>
			<td>'.$items["subtotal"].'</td>
			<td><button type="button" name="remove" class="btn btn-dark btn-xs remove_inventory" id="'.$items["rowid"].'"><svg class="bi bi-x" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
			<path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
			<path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
		  </svg></button></td>
		</tr>
		';
		}
		$output .= '
		<tr>
			<td colspan="5" align="right">Grand Total</td>
			<td>'.$this->cart->total().'</td>
		</tr>
		
		</table>
		<div align="right">
		<a href="'.site_url('myorder/order').'" class="btn btn-dark">Place Order</a>
		</div>
		</div>
		';

		if($count == 0)
		{
		$output = '<h3 align="center">Your Cart is Empty</h3>';
		}
		return $output;
	}

	

	
	
}
