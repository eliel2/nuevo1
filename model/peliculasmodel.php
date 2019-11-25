<?php

require_once('imagenesmodel.php');

class peliculamodel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_cine;charset=utf8', 'root', '');
    } 

	public function Getpeliculas(){
        $sentencia = $this->db->prepare( "SELECT * FROM peliculas");
        $sentencia->execute();
        $peliculas = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $peliculas;
    }

    public function GetPelicula($id){
        $sentencia = $this->db->prepare( "SELECT * FROM peliculas WHERE id_pelicula = ?");
        $sentencia->execute(array($id));
        $pelicula = $sentencia->fetch(PDO::FETCH_OBJ);
        
        return $pelicula;
    }

    public function EditarPeliculas($titulo,$sinopsis,$id_generoFK,$id){
        $sentencia = $this->db->prepare("UPDATE peliculas SET titulo=?,sinopsis=?,id_generoFK=? WHERE id_pelicula=?");
        $sentencia->execute(array($titulo,$sinopsis,$id_generoFK,$id));
    }

    public function Insertarpeliculas($id,$titulo,$sinopsis,$id_generoFk){

        $sentencia = $this->db->prepare("INSERT INTO peliculas(id_pelicula,titulo, sinopsis, id_generoFK) VALUES(?,?,?,?)");
        $sentencia->execute(array($id,$titulo,$sinopsis,$id_generoFk));
    }

    public function BorrarPelicula($id){
        $sentencia = $this->db->prepare("DELETE FROM peliculas WHERE id_pelicula=?");
        $sentencia->execute(array($id));
    }


    public function GetPeliculasConImagenes(){
        $sentencia = $this->db->prepare( "SELECT * FROM peliculas JOIN imagenes ON peliculas.id_peliculas = imagenes.id_peliculasfk ");
        $sentencia->execute();
        $peliculas = $sentencia->fetchAll(PDO::FETCH_OBJ);

        $modelImagenes = new imagenesmodel();
        foreach ($peliculas as $pelicula) {
            $pelicula["imagenes"] = $modelImagenes->GetImagenesPorPelicula($pelicula->id_pelicula);
        }
        
        return $peliculas;
    }
}