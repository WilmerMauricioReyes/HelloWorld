<?php

class Home extends CI_Controller{
    public function index(){
      $data=array('title'=>'home','mensaje'=>'Hola mundo desde codeIgniter');
       $this->load->view("home",$data);
    }
}