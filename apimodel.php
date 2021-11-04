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
        $query=$this->db->prepare('SELECT * FROM vuelo');
        $query->execute();

        $vuelos=$query->fetchAll(PDO::FETCH_OBJ);

        return $vuelos;
    }

    // 'SELECT v.id as ID, v.num_vuelo as Vuelo, v.fechaSalida as Fecha, c.nombre as Origen, d.nombre as Destino, v.estado as Estado 
    //         FROM vuelo v 
    //         INNER JOIN ciudad c 
    //         ON v.ciudad_origen_fk= c.id_ciudad 
    //         INNER JOIN ciudad d 
    //         ON  v.ciudad_destino_fk= d.id_ciudad');
}