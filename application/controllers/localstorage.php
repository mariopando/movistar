<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Localstorage extends CI_Controller {
    
    function __construct(){
        //Call the Model Constructor
        parent::__construct();
        $this->load->helper('html');
        $this->load->helper('form');            
        $this->load->helper('url');          
        $this->load->model('data');
    }  
    
    public function index(){
	$this->load->view('localstorage');
    }
    
    public function getImages(){
        if($images = $this->data->getImages($this->input->post('user_id'))):
            $data['images'] = $images;
            $data['success'] = true;
        else:
            $data['success'] = false;
            $data['msg'] = 'Error: getImages::Controller';
        endif;
        echo json_encode($data);
    }
    
    public function deleteImage(){
        if($this->data->deleteImage($this->input->post('user_id'),$this->input->post('image_id'))):
            $data['success'] = true;
        else:
            $data['success'] = false;
            $data['msg'] = 'Error: deleteImage::Controller';
        endif;
        echo json_encode($data);
    }
}
