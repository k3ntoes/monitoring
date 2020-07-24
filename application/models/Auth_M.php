<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Auth_M
 *
 * @author Kent-os
 */
class Auth_M extends CI_Model {

    public function __construct() {
	  parent::__construct();
    }

    public function menu_cek($lm, $c) {
//	  print_r($lm);
	  if (!in_array($c, $lm)) {
		echo"<script>alert('Anda Tidak Memiliki Akses!');</script>";
		redirect(base_url(), 'refresh');
	  } 
    }

}