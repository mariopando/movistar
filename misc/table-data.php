<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



$data['aaData'] = array(
    //array('id' => '1', 'name' => 'Adam Alister', 'date_register' => '21/01/2012', 'role' => 'staff', 'status' => 'active', 'actions' => ''),
    //array('id' => '2', 'name' => 'Adam Alister', 'date_register' => '21/01/2012', 'role' => 'staff', 'status' => 'active', 'actions' => '')
    0 => array('Adam Mish','21/01/2012', 'staff','active', '<a class="btn btn-success" href="#"><i class="icon-zoom-in icon-white"></i></a><a class="btn btn-info" href="#"><i class="icon-edit icon-white"></i></a><a class="btn btn-danger" href="#"><i class="icon-trash icon-white"></i> </a>'),
    1 => array('Adam Mish','21/01/2012', 'staff','active', '<a class="btn btn-success" href="#"><i class="icon-zoom-in icon-white"></i></a><a class="btn btn-info" href="#"><i class="icon-edit icon-white"></i></a><a class="btn btn-danger" href="#"><i class="icon-trash icon-white"></i> </a>'),
    2 => array('Adam MTestish','21/01/2012', 'staff','active', '<a class="btn btn-success" href="#"><i class="icon-zoom-in icon-white"></i></a><a class="btn btn-info" href="#"><i class="icon-edit icon-white"></i></a><a class="btn btn-danger" href="#"><i class="icon-trash icon-white"></i> </a>'),
    3 => array('Adam MisTesth','21/01/2012', 'staff','active', '<a class="btn btn-success" href="#"><i class="icon-zoom-in icon-white"></i></a><a class="btn btn-info" href="#"><i class="icon-edit icon-white"></i></a><a class="btn btn-danger" href="#"><i class="icon-trash icon-white"></i> </a>'),
    4 => array('Adam Mish','21/01/2012', 'staff','active', '<a class="btn btn-success" href="#"><i class="icon-zoom-in icon-white"></i></a><a class="btn btn-info" href="#"><i class="icon-edit icon-white"></i></a><a class="btn btn-danger" href="#"><i class="icon-trash icon-white"></i> </a>'),
    5 => array('Adam Mish','21/01/2012', 'staff','active', '<a class="btn btn-success" href="#"><i class="icon-zoom-in icon-white"></i></a><a class="btn btn-info" href="#"><i class="icon-edit icon-white"></i></a><a class="btn btn-danger" href="#"><i class="icon-trash icon-white"></i> </a>'),
    6 => array('Adam MiTestsh','21/01/2012', 'staff','active', '<a class="btn btn-success" href="#"><i class="icon-zoom-in icon-white"></i></a><a class="btn btn-info" href="#"><i class="icon-edit icon-white"></i></a><a class="btn btn-danger" href="#"><i class="icon-trash icon-white"></i> </a>'),
    7 => array('Adam Mish','21/01/2012', 'staff','active', '<a class="btn btn-success" href="#"><i class="icon-zoom-in icon-white"></i></a><a class="btn btn-info" href="#"><i class="icon-edit icon-white"></i></a><a class="btn btn-danger" href="#"><i class="icon-trash icon-white"></i> </a>'),
    8 => array('Adam Mish','21/01/2012', 'staff','active', '<a class="btn btn-success" href="#"><i class="icon-zoom-in icon-white"></i></a><a class="btn btn-info" href="#"><i class="icon-edit icon-white"></i></a><a class="btn btn-danger" href="#"><i class="icon-trash icon-white"></i> </a>'),
    9 => array('Adam MiTestsh','21/01/2012', 'staff','active', '<a class="btn btn-success" href="#"><i class="icon-zoom-in icon-white"></i></a><a class="btn btn-info" href="#"><i class="icon-edit icon-white"></i></a><a class="btn btn-danger" href="#"><i class="icon-trash icon-white"></i> </a>'),
    10 => array('Adam Test','21/01/2012', 'staff','active', '<a class="btn btn-success" href="#"><i class="icon-zoom-in icon-white"></i></a><a class="btn btn-info" href="#"><i class="icon-edit icon-white"></i></a><a class="btn btn-danger" href="#"><i class="icon-trash icon-white"></i> </a>'),
    11 => array('Adam Mish','21/01/2012', 'staff','active', '<a class="btn btn-success" href="#"><i class="icon-zoom-in icon-white"></i></a><a class="btn btn-info" href="#"><i class="icon-edit icon-white"></i></a><a class="btn btn-danger" href="#"><i class="icon-trash icon-white"></i> </a>'),
    12 => array('Adam Mish','21/01/2012', 'staff','active', '<a class="btn btn-success" href="#"><i class="icon-zoom-in icon-white"></i></a><a class="btn btn-info" href="#"><i class="icon-edit icon-white"></i></a><a class="btn btn-danger" href="#"><i class="icon-trash icon-white"></i> </a>'),
    13 => array('Adam Test','22/01/2012', 'staff','active', '<a class="btn btn-success" href="#"><i class="icon-zoom-in icon-white"></i></a><a class="btn btn-info" href="#"><i class="icon-edit icon-white"></i></a><a class="btn btn-danger" href="#"><i class="icon-trash icon-white"></i> </a>')
);

$data['sEcho'] = 1;
$data['iTotalRecords'] = count($data['aaData']);
$data['iTotalDisplayRecords'] = 10;

        
echo json_encode($data);
?>
