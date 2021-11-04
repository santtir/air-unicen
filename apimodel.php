<?php

class apiModel{
    private $db;

    function __construct(){
        $this->db=new PDO('mysql:host=localhost;' . 'dbname=db_airunicen;charset=utf8', 'root', '');
    }

    function obtenerVuelo($nro_vuelo){

        $query=$this->db->prepare('SELECT * FROM vuelo WHERE nro_vuelo=?');
        $query->execute([$nro_vuelo]);

        $vuelo=$query->fetch(PDO::FETCH_OBJ);

        return $vuelo;
    }

    function obtenerCiudades(){
        $query=$this->db->prepare('SELECT * FROM ciudad');
        $query->execute();

        $ciudades=$query->fetchAll(PDO::FETCH_OBJ);

        return $ciudades;
    }

    function insertarVuelo($nro_vuelo,$fecha_salida,$ciudad_origen_id,$ciudad_destino_id,$estado){

        $query=$this->db->prepare('INSERT INTO vuelo (nro_vuelo,fecha_salida,ciudad_origen_id,ciudad_destino_id,estado) VALUES (?, ?, ?, ?, ?)');
        $query->execute([$nro_vuelo,$fecha_salida,$ciudad_origen_id,$ciudad_destino_id,$estado]);

        return $this->db->lastInsertId();
    }

    function obtenerVuelos(){
        $query=$this->db->prepare('SELECT * FROM vuelo 
        INNER JOIN ciudad 
        ON vuelo.ciudad_origen_id=ciudad.id_ciudad 
        INNER JOIN ciudad 
        ON vuelo.ciudad_destino_id=ciudad.id_ciudad');
        
        $query->execute();

        $vuelos=$query->fetchAll(PDO::FETCH_OBJ);

        return $vuelos;
    }
}