<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Myorder extends MX_Controller {
	function __construct() {
		$this->load->library('cart');
		$this->load->model('mdl_myorder');
		if(empty($_SESSION['u_id']))
		redirect('login');
		elseif($this->session->userdata['authorization']==1)
		redirect('home');
		}
	

	public function index()
	{
		$this->db->select('*');
		$this->db->from('orderhead');
		$this->db->join('orders', 'orders.oh_id= orderhead.oh_id');
		$this->db->join('items', 'orders.item_id = items.i_id');
		$this->db->join('user', 'orders.restaurant_id = user.u_id');
		$this->db->where('customer_id',$this->session->userdata('u_id'));
		$this->db->order_by("o_id", "desc");
		$val['qry']=$this->db->get();
		$val['file']='myorder/myorder_view';
		echo Modules::run('template/layout1',$val);
	}

	public function order()
	{	

		$ordData = array(
            'customer_id' => $this->session->userdata['u_id'],
            'grand_total' => $this->cart->total()
        );
		$insertOrder = $this->mdl_myorder->insertOrder($ordData);
        
        if($insertOrder){
            // Retrieve cart data from the session
            $cartItems = $this->cart->contents();
            
            // Cart items
            $ordItemData = array();
            $i=0;
            foreach($cartItems as $item){
                $ordItemData[$i]['oh_id']     = $insertOrder;
				$ordItemData[$i]['restaurant_id'] = $item['restid'];
				$ordItemData[$i]['item_id']     = $item['id'];
				$ordItemData[$i]['quantity']     = $item['qty'];
                $ordItemData[$i]['subtotal']     = $item["subtotal"];
                $i++;
            }
            
            if(!empty($ordItemData)){
                // Insert order items
                $insertOrderItems =  $this->mdl_myorder->insertOrderItems($ordItemData);
                
                if($insertOrderItems){
                    // Remove items from the cart
					$this->cart->destroy();
					$this->session->set_flashdata('msg', '<b style="color:green;">Congratulations on successfully placing your favourite food!</b>');
                    redirect('myorder'); 
                    // Return order ID
                    return $insertOrder;
                }
            }
        }
        return false;
					
	}

	
}
