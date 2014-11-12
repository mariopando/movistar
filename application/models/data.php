<?php

class Data extends CI_Model{
    function __construct(){
        //Call the Model Constructor
        parent::__construct();
    }
    
    public function getDataRecording($user_id){
        $this->db->select('sales.id, 
                            sales.Nombre_Cliente, 
                            sales.Rut_Cliente, 
                            sales.Franquiciado, 
                            sales.Proceso, 
                            sales.Estado, 
                            sales.Terminado, 
                            communes.name as comuna, 
                            cities.name as ciudad, 
                            regions.name as region');
        $this->db->from('sales');
        $this->db->where('user_id = '.(int)$user_id);
        $this->db->join('communes', 'communes.id = sales.Comuna_Particular');
        $this->db->join('cities', 'communes.parent = cities.id');
        $this->db->join('regions', 'cities.parent = regions.id');
        $query = $this->db->get();
        
        if($query->num_rows() > 0){
            //$data['success'] = true;
            return $query->result();
        }
        else{
            return false;
        }
    }     
    
    public function getExternalLogisticDataRecording($user_id){
        $this->db->select('sales.id, 
                            sales.Nombre_Cliente, 
                            sales.Rut_Cliente, 
                            sales.Franquiciado, 
                            sales.Proceso, 
                            sales.Estado, 
                            sales.Terminado, 
                            sales.logistic_id, 
                            communes.name as comuna_envio, 
                            cities.name as ciudad_envio, 
                            regions.name as region_envio');
        $this->db->from('sales');
        $this->db->where('user_id = '.(int)$user_id);
        $this->db->join('communes', 'communes.id = sales.Comuna_Envio');
        $this->db->join('cities', 'communes.parent = cities.id');
        $this->db->join('regions', 'cities.parent = regions.id');
        $query = $this->db->get();
        
        if($query->num_rows() > 0){
            //$data['success'] = true;
            return $query->result();
        }
        else{
            return false;
        }
    }     
    
    public function getStatusDataRecording($user_id){
        $this->db->select('sales.id, 
                            sales.Nombre_Cliente, 
                            sales.Rut_Cliente, 
                            sales.Franquiciado, 
                            sales.Proceso, 
                            sales.Estado, 
                            sales.Terminado, 
                            sales.logistic_id, 
                            sales_dispatchers.logistic_id, 
                            sales_dispatchers.status_id, 
                            sales_dispatchers.rejected_id, 
                            sales_dispatchers.dispatcher_id, 
                            communes.name as comuna_envio, 
                            cities.name as ciudad_envio, 
                            regions.name as region_envio');
        $this->db->from('sales');
        $this->db->where('user_id = '.(int)$user_id);
        $this->db->where('sales.Proceso','Logistica');
        $this->db->where('sales.Estado','enviado a despachador');
        $this->db->join('communes', 'communes.id = sales.Comuna_Envio');
        $this->db->join('sales_dispatchers', 'sales.id = sales_dispatchers.sale_id');
        $this->db->join('cities', 'communes.parent = cities.id');
        $this->db->join('regions', 'cities.parent = regions.id');
        $query = $this->db->get();
        
        if($query->num_rows() > 0){
            //$data['success'] = true;
            return $query->result();
        }
        else{
            return false;
        }
    }     
    
    public function getStatusValues(){
        $this->db->from('values');
        $this->db->where('type','STATUS_FIRSTLEVEL');
        $query = $this->db->get();   
        
        return $query->result();
    }


    public function getComunas(){
        $this->db->from('communes');
        $query = $this->db->get();
        
        return $query->result();
    }
    public function getCiudades(){
        $this->db->from('cities');
        $query = $this->db->get();
        
        return $query->result();        
    }
    public function getRegiones(){
        $this->db->from('regions');
        $query = $this->db->get();
        
        return $query->result();        
    }
    function getLogistics(){
        $this->db->from('logistics');
        $query = $this->db->get();
        
        return $query->result();          
    }
    function getDispatchers(){
        $this->db->from('dispatchers');
        $query = $this->db->get();
        
        return $query->result();          
    }
    
    function setLogistics($sales_id,$value){
        if($value === 0 || $value === "0"):
            $data = array(
                'logistic_id' => $value,
                'Proceso' => 'Importado',
                'Estado' => 'Importado'
                );
        else:
            $data = array(
                'logistic_id' => $value,
                'Proceso' => 'Logistica',
                'Estado' => 'enviado a LE'
                );            
        endif;
        
        $this->db->where('id', $sales_id);
        
        if($this->db->update('sales', $data)):
            $data_ = array('sale_id' => $sales_id, 'logistic_id' => $value);
            return $this->db->insert('sales_dispatchers', $data_);
        endif;
        
        //return $this->db->update('sales', $data);         
    }
    
    function setDispatcher($sales_id,$value){
        if($value === 0 || $value === "0"):
            $data_ = array(
                'Proceso' => 'Logistica',
                'Estado' => 'enviado a LE'
                );
        else:
            $data_ = array(
                'Proceso' => 'Logistica',
                'Estado' => 'enviado a despachador'
                );              
        endif;
        
        $this->db->where('sales_dispatchers.sale_id', $sales_id);
        $data = array('dispatcher_id'=>$value);
        if($this->db->update('sales_dispatchers', $data)):
            $this->db->where('sales.id', $sales_id);
            return $this->db->update('sales', $data_);         
        endif;
        
    }
    
    public function getAssignDataRecording($user_id){
        $this->db->select('sales.id, 
                            sales.Nombre_Cliente, 
                            sales.Rut_Cliente, 
                            sales.Franquiciado, 
                            sales.Proceso, 
                            sales.Estado, 
                            sales.Terminado, 
                            sales.logistic_id, 
                            sales_dispatchers.logistic_id, 
                            sales_dispatchers.dispatcher_id, 
                            communes.name as comuna_envio, 
                            cities.name as ciudad_envio, 
                            regions.name as region_envio');
        $this->db->from('sales');
        $this->db->where('user_id = '.(int)$user_id);
        $this->db->where('sales.Proceso','Logistica');
        //$this->db->where('sales.Estado','enviado a LE');
        $this->db->join('communes', 'communes.id = sales.Comuna_Envio');
        $this->db->join('sales_dispatchers', 'sales.id = sales_dispatchers.sale_id');
        $this->db->join('cities', 'communes.parent = cities.id');
        $this->db->join('regions', 'cities.parent = regions.id');
        $query = $this->db->get();
        
        if($query->num_rows() > 0){
            //$data['success'] = true;
            return $query->result();
        }
        else{
            return false;
        }
    }
    
    public function setStatus($sale_id, $status_value, $rejected_value, $geolocation){   
        $this->db->where('sales_dispatchers.sale_id', $sale_id);
        $data = array('status_id' => $status_value,'rejected_id'=>$rejected_value, 'geolocation' => $geolocation); 

        return $this->db->update('sales_dispatchers', $data);
    }
    
    public function getStatusRejectedValues(){
        $this->db->from('rejectedvalues');
        $query = $this->db->get();
        
        return $query->result();        
    }
    public function saveImage($ola,$src,$date){
        $data_ = array('ola' => $ola, 'src' => $src);
        return $this->db->insert('dispatcherimages', $data_);   
    }
    
    public function getImages($user_id){
        $this->db->from('dispatcherimages');
        $query = $this->db->get();
        
        return $query->result();        
    }
    
    public function deleteImage($user_id,$image_id){
        return $this->db->delete('dispatcherimages', array('id' => $image_id)); 
    }
}
?>
