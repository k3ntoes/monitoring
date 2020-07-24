<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ItemMonitoring
 *
 * @author Kent-os
 */
class ItemMonitoring extends CI_Controller {

    public function __construct() {
	  parent::__construct();
	  $this->load->model("ItemMonitoring_M");
    }

    public function listItem() {
	  $res = $this->ItemMonitoring_M->ListItem();
	  echo $res;
    }

}
