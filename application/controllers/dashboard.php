<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    function __construct(){
        //Call the Model Constructor
        parent::__construct();
        $this->load->helper('html');
        $this->load->helper('form');            
        $this->load->helper('url');          
        $this->load->model('data');
    }  
    
    public function index(){
	$this->load->view('dashboard');
    }
    public function getRecords(){
        
//        $data['aaData'] = array(
//            //array('id' => '1', 'name' => 'Adam Alister', 'date_register' => '21/01/2012', 'role' => 'staff', 'status' => 'active', 'actions' => ''),
//            //array('id' => '2', 'name' => 'Adam Alister', 'date_register' => '21/01/2012', 'role' => 'staff', 'status' => 'active', 'actions' => '')
//            0 => array('Adam Mish','21/01/2012', 'staff','active', '<a class="btn btn-success" href="#"><i class="icon-zoom-in icon-white"></i></a><a class="btn btn-info" href="#"><i class="icon-edit icon-white"></i></a><a class="btn btn-danger" href="#"><i class="icon-trash icon-white"></i> </a>'),
//            1 => array('Adam Mish','21/01/2012', 'staff','active', '<a class="btn btn-success" href="#"><i class="icon-zoom-in icon-white"></i></a><a class="btn btn-info" href="#"><i class="icon-edit icon-white"></i></a><a class="btn btn-danger" href="#"><i class="icon-trash icon-white"></i> </a>'),
//            2 => array('Adam MTestish','21/01/2012', 'staff','active', '<a class="btn btn-success" href="#"><i class="icon-zoom-in icon-white"></i></a><a class="btn btn-info" href="#"><i class="icon-edit icon-white"></i></a><a class="btn btn-danger" href="#"><i class="icon-trash icon-white"></i> </a>'),
//            3 => array('Adam MisTesth','21/01/2012', 'staff','active', '<a class="btn btn-success" href="#"><i class="icon-zoom-in icon-white"></i></a><a class="btn btn-info" href="#"><i class="icon-edit icon-white"></i></a><a class="btn btn-danger" href="#"><i class="icon-trash icon-white"></i> </a>'),
//            4 => array('Adam Mish','21/01/2012', 'staff','active', '<a class="btn btn-success" href="#"><i class="icon-zoom-in icon-white"></i></a><a class="btn btn-info" href="#"><i class="icon-edit icon-white"></i></a><a class="btn btn-danger" href="#"><i class="icon-trash icon-white"></i> </a>'),
//            5 => array('Adam Mish','21/01/2012', 'staff','active', '<a class="btn btn-success" href="#"><i class="icon-zoom-in icon-white"></i></a><a class="btn btn-info" href="#"><i class="icon-edit icon-white"></i></a><a class="btn btn-danger" href="#"><i class="icon-trash icon-white"></i> </a>'),
//            6 => array('Adam MiTestsh','21/01/2012', 'staff','active', '<a class="btn btn-success" href="#"><i class="icon-zoom-in icon-white"></i></a><a class="btn btn-info" href="#"><i class="icon-edit icon-white"></i></a><a class="btn btn-danger" href="#"><i class="icon-trash icon-white"></i> </a>'),
//            7 => array('Adam Mish','21/01/2012', 'staff','active', '<a class="btn btn-success" href="#"><i class="icon-zoom-in icon-white"></i></a><a class="btn btn-info" href="#"><i class="icon-edit icon-white"></i></a><a class="btn btn-danger" href="#"><i class="icon-trash icon-white"></i> </a>'),
//            8 => array('Adam Mish','21/01/2012', 'staff','active', '<a class="btn btn-success" href="#"><i class="icon-zoom-in icon-white"></i></a><a class="btn btn-info" href="#"><i class="icon-edit icon-white"></i></a><a class="btn btn-danger" href="#"><i class="icon-trash icon-white"></i> </a>'),
//            9 => array('Adam MiTestsh','21/01/2012', 'staff','active', '<a class="btn btn-success" href="#"><i class="icon-zoom-in icon-white"></i></a><a class="btn btn-info" href="#"><i class="icon-edit icon-white"></i></a><a class="btn btn-danger" href="#"><i class="icon-trash icon-white"></i> </a>'),
//            10 => array('Adam Test','21/01/2012', 'staff','active', '<a class="btn btn-success" href="#"><i class="icon-zoom-in icon-white"></i></a><a class="btn btn-info" href="#"><i class="icon-edit icon-white"></i></a><a class="btn btn-danger" href="#"><i class="icon-trash icon-white"></i> </a>'),
//            11 => array('Adam Mish','21/01/2012', 'staff','active', '<a class="btn btn-success" href="#"><i class="icon-zoom-in icon-white"></i></a><a class="btn btn-info" href="#"><i class="icon-edit icon-white"></i></a><a class="btn btn-danger" href="#"><i class="icon-trash icon-white"></i> </a>'),
//            12 => array('Adam Mish','21/01/2012', 'staff','active', '<a class="btn btn-success" href="#"><i class="icon-zoom-in icon-white"></i></a><a class="btn btn-info" href="#"><i class="icon-edit icon-white"></i></a><a class="btn btn-danger" href="#"><i class="icon-trash icon-white"></i> </a>'),
//            13 => array('Adam Test','22/01/2012', 'staff','active', '<a class="btn btn-success" href="#"><i class="icon-zoom-in icon-white"></i></a><a class="btn btn-info" href="#"><i class="icon-edit icon-white"></i></a><a class="btn btn-danger" href="#"><i class="icon-trash icon-white"></i> </a>')
//        );
//
        $user_id = 1;
        if($this->data->getDataRecording($user_id)):
            $val = $this->data->getDataRecording($user_id);
            
            foreach($val as $v):
                $data['aaData'][] = array( $v->id, $v->Franquiciado, $v->Nombre_Cliente,$v->Rut_Cliente, $v->region, $v->comuna, $v->Proceso, $v->Estado, $v->Terminado?'SI':'NO');
            endforeach;
        endif;
        
        $data['sEcho'] = 1;
        $data['iTotalRecords'] = count($data['aaData']);
        $data['iTotalDisplayRecords'] = 10;
        
        //print_r($data['aaData']);
        echo json_encode($data);          
    }
    
    public function getExternalLogisticDataRecording(){
        $user_id = 1;
        if($this->data->getExternalLogisticDataRecording($user_id)):
            $data['success'] = true;
            $data['data'] = $this->data->getExternalLogisticDataRecording($user_id);
        else:
            $data['success'] = false;
        endif;
        
        echo json_encode($data);          
    }
    
    public function getInfoCountries(){
        $data['comunas'] = $this->data->getComunas();
        $data['ciudades'] = $this->data->getCiudades();
        $data['regiones'] = $this->data->getRegiones();
        
        echo json_encode($data); 
    }
   
}