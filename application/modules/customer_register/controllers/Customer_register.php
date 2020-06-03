<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Customer_Register extends MX_Controller {
    function __construct(){
		parent::__construct();
		$this->load->model('mdl_customer_register');
		{
			if(!empty($_SESSION['u_id']))
			redirect('home');
			
			}
	}
	
	  

	public function index()
	{
		$val['file']='customer_register/customer_register_view';
		echo Modules::run('template/layout1',$val);
	}
	public function save()
	{
		$this->load->library('form_validation'); 
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','valid_email|required|is_unique[user.email]',array('is_unique' => 'This %s already exists.'));
		$this->form_validation->set_rules('mobile','Mobile Number','numeric|is_unique[user.mobile]',array('is_unique' => 'This %s already exists.'));
		$this->form_validation->set_rules('password','Password','required|matches[password]');
		$this->form_validation->set_rules('confirmpassword','ConfirmPassword','required|matches[password]');

		if ($this->form_validation->run() == FALSE)
		{
			
			$this->index();
		}
		else
		{
			$data['name']=$_POST['name'];
			$data['email']=$_POST['email'];
			$data['mobile']=$_POST['mobile'];
			$data['choice']=$_POST['chice'];
			$data['password']=md5($_POST['password']);
			$data['authorization']=$_POST['auth']; 

			$id=$this->mdl_customer_register->add($data);
			$this->session->set_flashdata('msg', '<b style="color:green;">Congratulations!, Your registration was successful as a customer</b>');
		    redirect('login'); 

		}
	}
}
