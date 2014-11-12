<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assign extends CI_Controller {
    
    function __construct(){
        //Call the Model Constructor
        parent::__construct();
        $this->load->helper('html');
        $this->load->helper('form');            
        $this->load->helper('url');          
        $this->load->model('data');
    }  
    
    public function index(){
        $data['dispatchers'] = $this->data->getDispatchers();
	$this->load->view('assign',$data);
    }
    
    public function getAssignDataRecording(){
        $user_id = 1;
        if($this->data->getAssignDataRecording($user_id)):
            $data['success'] = true;
            $data['data'] = $this->data->getAssignDataRecording($user_id);
        else:
            $data['success'] = false;
        endif;
        
        echo json_encode($data);          
    }
    
    public function setDispatcher(){
        if($this->data->setDispatcher($this->input->post('sale_id'),$this->input->post('value'))):
            $data['success'] = true;
        else:
            $data['success'] = false;
            $data['msg'] = 'Error: setDispatcher:controller';
        endif;
        echo json_encode($data);
    }
    
    public function getDispatchers(){
        echo json_encode($this->data->getDispatchers());
    }    
   
}