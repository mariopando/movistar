<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Camera extends CI_Controller {
    
    function __construct(){
        //Call the Model Constructor
        parent::__construct();
        $this->load->helper('html');
        $this->load->helper('form');            
        $this->load->helper('url');          
//        $this->load->model('database');
    }  
    
    public function index(){
	$this->load->view('camera');
    }
    
    public function save_img(){
        $data = $this->input->post('data');
        $dir = 'uploads/';
        $name = md5(uniqid()) . '.png';

        $uri =  substr($data,strpos($data,","));

        if(file_put_contents($dir.$name, base64_decode($uri))){
            $data_ = array('success' => true,'server_file_name'=>$name);
        }
        else{
            $data_ = array('success' => false);
        }

        echo json_encode($data_);
        
    }
   
}