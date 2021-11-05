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
        $query=$this->db->prepare('SELECT v.id_vuelo AS ID, v.nro_vuelo AS vuelo, v.fecha_salida AS fecha, c.nombre AS origen, d.nombre AS destino, v.estado AS estado
         FROM vuelo v
         INNER JOIN ciudad c
         ON v.ciudad_origen_id=c.id_ciudad
         INNER JOIN ciudad d
         ON v.ciudad_destino_id=d.id_ciudad');
        
        $query->execute();

        $vuelos=$query->fetchAll(PDO::FETCH_OBJ);

        return $vuelos;
    }


}

//          INNER JOIN ciudad 
//         ON vuelo.ciudad_origen_id=ciudad.id_ciudad 
//         INNER JOIN ciudad 
//         ON vuelo.ciudad_destino_id=ciudad.id_ciudad'


// SELECT v.id_vuelo as ID, v.nro_vuelo as vuelo,v.fecha_salida as Fecha, c.nombre as origen,d.nombre as Destino,v.estado as Estado 
// FROM vuelos v 
//INNER JOIN ciudad c 
// ON v.ciudad_origen_id_fk =c.id_ciudad 
// INNER JOIN ciudad d 
// ON v.ciudad_destino_id_fk=d.id_ciudad;