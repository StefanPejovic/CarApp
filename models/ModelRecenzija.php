<?php

/* 
 * 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * STEFAN PEJOVIC
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
    
    
    
    
    /*STEFAN PEJOVIC
     * funkcija dohvata sve komentare iz baze za oglas ciji je id zadatk kao parametar funkcije
     * kao rezultat se vraca niz objekata klase Recenzija ukoliko u tabeli recenzija u bazi postoji bar jedan red gde je idOglas=idO
     * ukoliko ne postoje komentari za oglas sa zadatim idjem vraca se prazan niz
     */
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
    
    /*STEFAN PEJOVIC, MIHAJLO KRPOVIC
     * funckija racuna prosecnu ocenu za oglas ciji je id zadat kao parametar fje 
     * ukoliko ne postoji nijedna ocena za zadati oglas vraca se 0
     * u suprotnom se vraca prosecna ocena od svih ocena(od svih redova koji postoje u tabeli recenzija a gde je idOglas jednako idO)
     */
     public static function prosecnaOcena($idOglas){
        $conn= Database::getInstance();
        $result=$conn->query("SELECT * FROM recenzija WHERE idOglas='$idOglas'");
        $result= $result->fetchAll();
        $ocena=0;
        $brojac=0;
        foreach ($result as $ad){
            $ocena+=$ad['Ocena']+0;
            $brojac++;
        }
        if($brojac!=0){
            $ocena=$ocena/$brojac;
        }
        return $ocena;
    }
    
    
    
}

