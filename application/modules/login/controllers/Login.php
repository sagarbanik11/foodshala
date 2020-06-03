<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends MX_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model("Mdl_login","login"); 
      
    }

	public function index(){
		$val['file']='login/login_view';
		echo Modules::run('template/layout1',$val); 
        if($_POST) 
        {
            $result = $this->login->validate_user($_POST);
            if(!empty($result)) {
                $data = [
                    'u_id' => $result->u_id,
                    'email' => $result->email,
                    'authorization'=>$result->authorization,
                    'name'=>$result->name,
                ];
 
                $this->session->set_userdata($data);
                redirect('home');
            } else {
                $this->session->set_flashdata('flash_data', '<b style="color:red;">Username or password is wrong!</b>');
                redirect('login');
            }
        }
    }
    public function logout()  
    {  
        $data = $this->session->all_userdata();
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
        redirect('home');
    }  
}


