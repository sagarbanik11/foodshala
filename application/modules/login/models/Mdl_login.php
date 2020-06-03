<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class Mdl_login extends CI_Model
{
 
    function __construct() {
        parent::__construct();
        
    }
 
    public function validate_user($data) {
        $this->db->where('email', $_POST['email']);
        $this->db->where('password',md5($_POST['password']));
        return $this->db->get('user')->row();
    }
 
    function __destruct() {
        $this->db->close();
    }
    
  
}