<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dispatch_mobile extends CI_Controller {
    
    function __construct(){
        //Call the Model Constructor
        parent::__construct();
        $this->load->helper('html');
        $this->load->helper('form');            
        $this->load->helper('url');          
        $this->load->model('data');
    }  
    
    public function index(){
	$this->load->view('dispatch_mobile');
    }
    public function getStatusDataRecording(){
        $user_id = 1;
        if($this->data->getStatusDataRecording($user_id)):
            $data['success'] = true;
            $data['data'] = $this->data->getStatusDataRecording($user_id);
        else:
            $data['success'] = false;
        endif;
        
        echo json_encode($data);          
    }    
    
    public function getStatusValues(){
        echo json_encode($this->data->getStatusValues());
    }
    
    public function setStatus(){
        if($this->data->setStatus($this->input->post('sale_id'),$this->input->post('status_value'),$this->input->post('rejected_value'),$this->input->post('geolocalization'))):
            $data['success'] = true;
        else:
            $data['success'] = false;
            $data['msg'] = 'Error: setLogistics:controller';
        endif;
        echo json_encode($data);        
    }
    
    public function getStatusRejectedValues(){
        echo json_encode($this->data->getStatusRejectedValues());
    }
    
    public function saveImage(){
        if($this->data->saveImage($this->input->post('ola'),$this->input->post('src'),$this->input->post('date'))):
            $data['success'] = true;
        else:
            $data['success'] = false;
            $data['msg'] = 'Error: saveImage:controller';
        endif;
        echo json_encode($data);         
    }
}