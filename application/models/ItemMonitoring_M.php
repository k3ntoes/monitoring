<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ItemMonitoring_M
 *
 * @author Kent-os
 */
class ItemMonitoring_M extends CI_Model{
    public function __construct() {
	  parent::__construct();
    }
    
    public function ListItem(){
	  $res=[];
	  $data=[];
	  
	  $q= $this->db->get("m_item_monitoring");
	  if($q->num_rows() >0){
		foreach ($q->result() as $d){
		    array_push($data, $d);	    
		}
		
		$res= $this->ResponseModel->res200($data);
	  }
	  
	  return json_encode($res);
    }
}
