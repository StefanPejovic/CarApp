<?php

class Ad{
    private $idO;
    private $marka;
    private $model;
    private $godiste;
    private $mesto;
    private $cena;
    private $kilometraza;
    private $gorivo;
    private $menjac;
    private $snaga;
    private $opis;
    private $cenaJeFiksna;
    private $rate;
    private $garancija;
    private $zamena;
    private $panorama;
    private $eiPodizaci;
    private $aluFelne;
    private $xenon;
    private $ledfarovi;
    private $tempomat;
    private $navigacija;
    private $vazdVesanje;
    private $multifunVolan;
    private $idK;
    
    public function __construct($idO, $marka, $model, $godiste, $mesto, $cena, $kilometraza, $gorivo, $menjac, $snaga, $opis, $cenaJeFiksna, $rate, $garancija, $zamena, $panorama, $eiPodizaci, $aluFelne, $xenon, $ledfarovi, $tempomat, $navigacija, $vazdVesanje, $multifunVolan, $idK) {
        $this->idO = $idO;
        $this->marka = $marka;
        $this->model = $model;
        $this->godiste = $godiste;
        $this->mesto = $mesto;
        $this->cena = $cena;
        $this->kilometraza = $kilometraza;
        $this->gorivo = $gorivo;
        $this->menjac = $menjac;
        $this->snaga = $snaga;
        $this->opis = $opis;
        $this->cenaJeFiksna = $cenaJeFiksna;
        $this->rate = $rate;
        $this->garancija = $garancija;
        $this->zamena = $zamena;
        $this->panorama = $panorama;
        $this->eiPodizaci = $eiPodizaci;
        $this->aluFelne = $aluFelne;
        $this->xenon = $xenon;
        $this->ledfarovi = $ledfarovi;
        $this->tempomat = $tempomat;
        $this->navigacija = $navigacija;
        $this->vazdVesanje = $vazdVesanje;
        $this->multifunVolan = $multifunVolan;
        $this->idK = $idK;
    }
    
    //dohvata elemente sa nazivom atribute
    public function __get($atribute){
        return $this->$atribute;
    }
    
    //dohvata moje oglase iz baze za korisnika ciji je id idK
    public static function getMyAd($idK){
        $connection= Database::getInstance();
        $result=$connection->query("SELECT * FROM oglas WHERE idKorisnik='$idK'");
        $myAd=[];
        foreach ($result->fetchAll() as $ad){
            $myAd[] = new Ad($ad['idOglas'], $ad['Marka'], $ad['Model'], $ad['Godiste'], $ad['Mesto'], $ad['Cena'], 
                    $ad['Kilometraza'], $ad['Gorivo'], $ad['Menjac'], $ad['Snaga'], 
                    $ad['Opis'], $ad['CenaJeFiksna'], $ad['Rate'], $ad['Garancija'], 
                    $ad['Zamena'], $ad['Panorama'], $ad['ElPodizaci'], $ad['AluFelne'],
                    $ad['Xenon'], $ad['LedFarovi'], $ad['Tempomat'], $ad['Navigacija'], 
                    $ad['VazdVesanje'], $ad['MultifunVolan'], $ad['idKorisnik']);
        }
        return $myAd;
    }
    
    //dohvata sacuvane oglase iz baze za korisnika sa id-jem idK
    public static function getSavedAd($idK){
        $connection= Database::getInstance();
        $result=$connection->query("SELECT * FROM sacuvani s, oglas o WHERE s.idKorisnik='$idK' AND s.idOglas=o.idOglas");
        $savedAd=[];
        foreach($result->fetchAll() as $ad){
            $savedAd[] = new Ad($ad['idOglas'], $ad['Marka'], $ad['Model'], $ad['Godiste'], $ad['Mesto'], $ad['Cena'], 
                    $ad['Kilometraza'], $ad['Gorivo'], $ad['Menjac'], $ad['Snaga'], 
                    $ad['Opis'], $ad['CenaJeFiksna'], $ad['Rate'], $ad['Garancija'], 
                    $ad['Zamena'], $ad['Panorama'], $ad['ElPodizaci'], $ad['AluFelne'],
                    $ad['Xenon'], $ad['LedFarovi'], $ad['Tempomat'], $ad['Navigacija'], 
                    $ad['VazdVesanje'], $ad['MultifunVolan'], $ad['idKorisnik']);
        }
        return $savedAd;
    }
    
    public static function saveAd($idK, $idO){
        $connection= Database::getInstance();
        $result=$connection->query("SELECT * FROM sacuvani WHERE idKorisnik='$idK' AND idOglas='$idO'");
        $i=0;
        foreach($result->fetchAll() as $red){
            $i++;
        }
        if($i==0){
            $upit="INSERT INTO sacuvani (idKorisnik, idOglas) VALUES (:idk, :ido)";
            $result=$connection->prepare($upit);
            $result->execute(['idk'=>$idK, 'ido'=>$idO]);
        }
    }
    
    public static function unsaveAd($idK, $idO){
        $connection= Database::getInstance();
        $result=$connection->query("DELETE FROM sacuvani WHERE idKorisnik='$idK' AND idOglas='$idO'");
    }
    
    public static function deleteAd($idO){
        $connection= Database::getInstance();
        $connection->query("DELETE FROM recenzija WHERE idOglas='$idO'");
        $connection->query("DELETE FROM sacuvani WHERE idOglas='$idO'");
        $connection->query("DELETE FROM oznaceni WHERE idOglas='$idO'");
        $connection->query("DELETE FROM oglas WHERE idOglas='$idO'");
    }
    
     //dohvata oglas sa idjem $id
    public static function getAd($id){
        $connection= Database::getInstance();
        $result=$connection->query("SELECT * FROM oglas WHERE idOglas='$id'");
        $ad=$result->fetch();
        if($ad!=NULL){
            return new Ad($ad['idOglas'], $ad['Marka'], $ad['Model'], $ad['Godiste'], $ad['Mesto'], $ad['Cena'], 
                    $ad['Kilometraza'], $ad['Gorivo'], $ad['Menjac'], $ad['Snaga'], 
                    $ad['Opis'], $ad['CenaJeFiksna'], $ad['Rate'], $ad['Garancija'], 
                    $ad['Zamena'], $ad['Panorama'], $ad['ElPodizaci'], $ad['AluFelne'],
                    $ad['Xenon'], $ad['LedFarovi'], $ad['Tempomat'], $ad['Navigacija'], 
                    $ad['VazdVesanje'], $ad['MultifunVolan'], $ad['idKorisnik']);
        }
        else{
            return NULL;
        }
    }
    
    public static function adAd($marka,$model,$godiste,$cena,$mesto,$kilometraza,$gorivo,$menjac,$snaga,$opis,$rate,$garancija,$fiksna,$zamena,$panorama,$elpodizaci,$alufelne,$xenon,$ledfarovi,$tempomat,$navigacija,$vazdvesanje,$multifunvolan) {
            
        $conn= Database::getInstance();
        $idKorisnik=$_SESSION['user']->id;
        $upit="INSERT INTO oglas (Marka,Model,Godiste,Cena,idKorisnik,Mesto,Kilometraza,Gorivo,Menjac,Snaga,Opis,Rate,Garancija,CenaJeFiksna,Zamena,Panorama,ElPodizaci,AluFelne,Xenon,LedFarovi,Tempomat,Navigacija,VazdVesanje,MultifunVolan)"
                . " VALUES(:marka,:model,:godiste,:cena,:idKorisnik,:mesto,:kilometraza,:gorivo,:menjac,:snaga,:opis,:rate,:garancija,:fiksna,:zamena,:panorama,:elpodizaci,:alufelne,:xenon,:ledfarovi,:tempomat,:navigacija,:vazdvesanje,:multifunvolan) ";
        $result=$conn->prepare($upit);
        $result->execute(['marka' => $marka , 'model' => $model, 'godiste' => $godiste , 'cena'=>$cena,'idKorisnik'=>$idKorisnik,
               'mesto'=>$mesto , 'kilometraza'=>$kilometraza , 'gorivo' => $gorivo , 'menjac'=>$menjac , 'snaga'=>$snaga  ,'opis'=>$opis, 'rate'=>$rate,'garancija'=>$garancija
                 ,'fiksna'=>$fiksna , 'zamena'=>$zamena  ,'panorama'=>$panorama ,'elpodizaci'=>$elpodizaci , 'alufelne'=>$alufelne, 'xenon'=>$xenon,'ledfarovi'=>$ledfarovi ,'tempomat'=>$tempomat, 'navigacija'=>$navigacija , 'vazdvesanje'=>$vazdvesanje,'multifunvolan'=>$multifunvolan ]);
        
        
        
    }
    
    
    public static function searchAd($marka,$model,$godisteOd,$godisteDo,$cenaOd,$cenaDo,$garancija,$rate){
        
        $conn= Database::getInstance();
        $string="SELECT * FROM oglas ";
        $filter=[];
        $values=[];
        if ($marka !=""){
          $filter[]=" Marka = ? ";
          $values[]=$marka;
        }
        if ($model!= ""){
            $filter[] = " Model = ? ";
            $values[]=$model;
        }
        if ($godisteOd!= ""){
            $filter[] = " Godiste >= ? ";
            $values[]=$godisteOd;
        }
        if ($godisteDo!= ""){
            $filter[] = " Godiste <= ? ";
            $values[]=$godisteDo;
        }
        if ($cenaOd!= ""){
            $filter[] = " Cena >= ? ";
            $values[]=$cenaOd;
        }
         if ($cenaDo!= ""){
            $filter[] = " Cena <= ? ";
            $values[]=$cenaDo;
        }
         if ($garancija!= ""){
            $filter[] = " Garancija = ? ";
            $values[]=$garancija;
        }
         if ($rate!= ""){
            $filter[] = " Rate = ? ";
            $values[]=$rate;
        }
        if (count($filter)>0){
            $string.= "WHERE ".implode(' AND ', $filter);
            $sql = $conn->prepare($string);
            $sql->execute($values);
            $result = $sql->fetchAll();
        }
        else {
           $sql = $conn->prepare($string);
           $sql->execute();
           $result = $sql->fetchAll();
                  
        }
        
        $niz=[];
        foreach ($result as $ad){
            
            $niz[]=   new Ad($ad['idOglas'], $ad['Marka'], $ad['Model'], $ad['Godiste'], $ad['Mesto'], $ad['Cena'], 
                    $ad['Kilometraza'], $ad['Gorivo'], $ad['Menjac'], $ad['Snaga'], 
                    $ad['Opis'], $ad['CenaJeFiksna'], $ad['Rate'], $ad['Garancija'], 
                    $ad['Zamena'], $ad['Panorama'], $ad['ElPodizaci'], $ad['AluFelne'],
                    $ad['Xenon'], $ad['LedFarovi'], $ad['Tempomat'], $ad['Navigacija'], 
                    $ad['VazdVesanje'], $ad['MultifunVolan'], $ad['idKorisnik']);
            
        }
            return $niz;
   }
   
   public static function getAdWithId($idOglas){
    
       $conn= Database::getInstance();
        $string="SELECT * FROM oglas WHERE idOglas=:idOglas";
            $sql = $conn->prepare($string);
            $sql->execute(['idOglas'=>$idOglas]);
        $result= $sql->fetchAll();
        $oglas="";
        foreach ($result as $ad){
            
            $oglas=   new Ad($ad['idOglas'], $ad['Marka'], $ad['Model'], $ad['Godiste'], $ad['Mesto'], $ad['Cena'], 
                    $ad['Kilometraza'], $ad['Gorivo'], $ad['Menjac'], $ad['Snaga'], 
                    $ad['Opis'], $ad['CenaJeFiksna'], $ad['Rate'], $ad['Garancija'], 
                    $ad['Zamena'], $ad['Panorama'], $ad['ElPodizaci'], $ad['AluFelne'],
                    $ad['Xenon'], $ad['LedFarovi'], $ad['Tempomat'], $ad['Navigacija'], 
                    $ad['VazdVesanje'], $ad['MultifunVolan'], $ad['idKorisnik']);
            
        }
            return $oglas;
    }
    
    //za dodavanje komentara, ne znam da li je ok
     public static function postaviKomentar($komentar, $ocena, $idoglas) {
            
        $conn= Database::getInstance();
        $idKorisnik=$_SESSION['user']->id;
       
        $upit="INSERT INTO recenzija (Sadrzaj,Ocena,idKorisnik,idOglas)"
                . " VALUES(:sadrzaj,:ocena,:idkorisnik,:idoglas) ";
        $result=$conn->prepare($upit);
        $result->execute(['sadrzaj' => $komentar , 'ocena' => $ocena, 'idkorisnik' => $idKorisnik , 'idoglas'=>$idoglas]);
        
       
        
    }

}

