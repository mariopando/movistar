<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    
    function __construct(){
        //Call the Model Constructor
        parent::__construct();
        $this->load->helper('html');
        $this->load->helper('form');            
        $this->load->helper('url');          
    }  
    
    public function index(){
	$this->load->view('login');
    }
    
    public function validuser(){
            $this->load->library('session');
            $this->load->model('LoginSS');
        
            //$del_chars = array('.','-');
            //$user = str_replace($del_chars, '', $this->input->post('rut',TRUE));
            
            $request = $this->LoginSS->validUser($this->input->post('username',TRUE), $this->input->post('password',TRUE));
            
            if($request['success'] == 1){
                $datauser = array(
                        'logged' => true,
                        'fullname' => $request['fullname'],
                        'hash' => $request['hash'],
                        'id' => $request['id']);
                        $this->session->set_userdata($datauser);                
                        redirect('/dashboard', 'refresh');
            }else{
                $datauser = array('logged' => false);
                $this->session->set_userdata($datauser);      
                $data['error'] = 'El usuario y/o el password son erroneos';
                $data['n'] = $this->input->post('username',TRUE);
                $data['p'] = $this->input->post('password',TRUE);
                $this->session->sess_destroy();
                redirect('', 'refresh');
//                $this->load->view('login',$data);
            }
              
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }
}