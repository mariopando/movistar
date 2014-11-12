<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Send_externlogistic extends CI_Controller {
    
    function __construct(){
        //Call the Model Constructor
        parent::__construct();
        $this->load->helper('html');
        $this->load->helper('form');            
        $this->load->helper('url');          
        $this->load->model('data');
    }  
    
    public function index(){
        $data['logistics'] = $this->data->getLogistics();
	$this->load->view('send_externlogistic',$data);
    }
    
    public function getLogistics(){
        echo json_encode($this->data->getLogistics());
    }
    
    public function setLogistics(){
        if($this->data->setLogistics($this->input->post('sale_id'),$this->input->post('value'))):
            $data['success'] = true;
        else:
            $data['success'] = false;
            $data['msg'] = 'Error: setLogistics:controller';
        endif;
        echo json_encode($data);
    }
   
}