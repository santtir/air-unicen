<?php
require_once 'apimodel.php';
require_once 'apiview.php';

class apiController{
    private $model;
    private $view;

    function __construct(){
        $this->model=new apiModel();
        $this->view=new apiView();
        $this->data = file_get_contents("php://input");

    }

    function obtenerVuelo($params=null){
        $nro_vuelo=$this->model->obtenerVuelo($params[":NRO_VUELO"]);
        
        if(!empty($nro_vuelo)){
            return $this->view->response($nro_vuelo,200);
        }else{
            return $this->view->response("vuelo no encontrado",404);
        }
       
    }

    function obtenerCiudades($params=null){
        if(empty($params)){
            $ciudades=$this->model->obtenerCiudades();

            return $this->view->response($ciudades,200);
        }
    }

    function getData(){
        return json_decode($this->data);
    }

    function getBody(){
        $data=file_get_contents("php://input");
        return json_decode($data);
    }

    function insertarVuelo($params=null){
        $data=$this->getBody();

        $nro_vuelo=$data->nro_vuelo;
        $fecha_salida=$data->fecha_salida;
        $ciudad_origen_id=$data->ciudad_origen_id;
        $ciudad_destino_id=$data->ciudad_destino_id;
        $estado=$data->estado;

        $vuelo=$this->model->insertarVuelo($nro_vuelo,$fecha_salida,$ciudad_origen_id,$ciudad_destino_id,$estado);

        if($vuelo){
            $this->view->response("el vuelo fue agregado correctamente", 200);
        }else{
            $this->view->response("hubo un error al intentar agregar el vuelo", 500);
        }
    }

    function obtenerAllVuelos(){
        $vuelos=$this->model->obtenerVuelos();
        return $this->view->response($vuelos,200);
    }
}