<?php //iniciamos php
// Creamos una clase llamada Db 
class Db{
    // Creamos las variables con los datos de nuestra base de datos
    private $servidor = "localhost";
    private $user = "root";
    private $pswd = "";
    private $base_datos = "tfg";

    //Creamos una funcion que nos servira para conectarnos a nuestra base de datos 
    protected function connect(){
        $dsn = "mysql:host=".$this->servidor.";dbname=".$this->base_datos;
        // Creamos un objeto pdo que crea la conexion con la base de datos
        $db = new  PDO($dsn, $this->user, $this->pswd);
        // Añadimos un atributo que hara que los datos que nos devuelva la base de datos
        // se agrupen en forma de array asociativo
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        // Devolvemos el objeto db
        return $db;
    }
}