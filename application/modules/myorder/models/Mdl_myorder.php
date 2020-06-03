<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Mdl_myorder extends MX_Controller {
    private $table;
    function __construct(){
        parent::__construct();
        $this->table1='orderhead';
        $this->table2='orders';
    }
    
    function insertOrder($data){
        $this->db->insert($this->table1,$data);
        return $this->db->insert_id();
    }
    function insertOrderItems($data = array()){
        $this->db->insert_batch($this->table2,$data);
        return $this->db->insert_id();
    }
    
    
}