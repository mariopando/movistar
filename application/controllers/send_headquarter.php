<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Send_headquarter extends CI_Controller {
    
    function __construct(){
        //Call the Model Constructor
        parent::__construct();
        $this->load->helper('html');
        $this->load->helper('form');            
        $this->load->helper('url');          
        $this->load->model('data');
    }  
    
    public function index(){
	$this->load->view('send_headquarter');
    }
  
   
}