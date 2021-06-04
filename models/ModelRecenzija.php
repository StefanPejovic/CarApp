<?php

/* 
 * 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Recenzija {
    
    private $idRecenzija;
    private $Sadrzaj;
    private $Ocena;
    private $idKorisnik;
    private $idOglas;
    
    
    function __construct($idRecenzija,$Sadrzaj,$Ocena,$idKorisnik,$idOglas) {
    
    $this->idRecenzija=$idRecenzija;
    $this->Sadrzaj=$Sadrzaj;
    $this->Ocena=$Ocena;
    $this->idKorisnik=$idKorisnik;
    $this->idOglas=$idOglas;
    
    
}

 public function __get($imeAtributa) {
        
            return $this->$imeAtributa;
        
        
    }
    
    
    
    
    
     public static function dohvatiSveKomentare($idOglasa) {
            
        $conn= Database::getInstance();
        $string="SELECT * FROM  recenzija WHERE idOglas=:idOglasa ORDER BY idRecenzija DESC";

        
      
            $sql = $conn->prepare($string);
            $sql->execute(['idOglasa'=>$idOglasa]);
        $result= $sql->fetchAll();
        
        
        
        $niz=[];
        foreach ($result as $red){
            
            $niz[]= new Recenzija($red['idRecenzija'],$red['Sadrzaj'],$red['Ocena'],$red['idKorisnik'],$red['idOglas']); ;         
        }
            return $niz;
       
        
    }
    
    
    
}

