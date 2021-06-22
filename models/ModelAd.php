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
    
    //dohvata elemente(atribute klase Ad) sa nazivom atribute
    public function __get($atribute){
        return $this->$atribute;
    }
    
    /*MIHAJLO KRPOVIC
    funkcija dohvata moje oglase iz baze za korisnika ciji je id idK
    vraca niz oglasa iz baze ciji je idKorisnik jednak idK(tj vraca oglase koje je postavio korisnik sa tim idjem)
    ukoliko korisnik nije postavio nijedan oglas vraca prazan niz
    */
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
    
    /*MIHAJLO KRPOVIC
     * dohvata sacuvane oglase iz baze za korisnika sa id-jem idK
     * iz tabele sacuvani dohvata sve oglase ciji je idKorisnik jednak idK
     * rezultat vraca kroz niz oglasa $savedAd
     * ukoliko korisnik sa zadatim id-jem nije sacuvao nijedan oglas vraca prazan niz
     */
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
    
    /*MIHAJLO KRPOVIC
     * funkcija cuva oglas ciji je id jednak idK
     * korisnik ciji je id jednak idK cuva oglas ciji je id jednak idO
     * kao rezultat funkcije u tabeli sacuvani se dodaje novi red(novi sacuvani oglas) idKorisnik=$idK idOglas=$idO
     */
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
    
    /*MIHAJLO KRPOVIC
     * funkcija uklanja iz sacuvanih oglasa za korisnika sa id-jem idK oglas ciji je id jednak idO koji je prethodno sacuvan
     * kao rezultat funkcije iz tabele sacuvani se brise red gde je idKorisnik=$idK idOglas=$idO
     */
    public static function unsaveAd($idK, $idO){
        $connection= Database::getInstance();
        $result=$connection->query("DELETE FROM sacuvani WHERE idKorisnik='$idK' AND idOglas='$idO'");
    }
    /*MIHAJLO KRPOVIC
     * uklanja oglas ciji je id jednak idO
     * kao rezultat oglas sa id-jem idO je uklonjen iz svih tabela u kojima je postojao u bazi
     */
    public static function deleteAd($idO){
        $connection= Database::getInstance();
        $connection->query("DELETE FROM recenzija WHERE idOglas='$idO'");
        $connection->query("DELETE FROM sacuvani WHERE idOglas='$idO'");
        $connection->query("DELETE FROM oznaceni WHERE idOglas='$idO'");
        $connection->query("DELETE FROM oglas WHERE idOglas='$idO'");
    }
    
    /*MIHAJLO KRPOVIC
     * dohvata oglas ciji je id jednak $id
     * kao rezultat vraca objekat klase Ad ukoliko u bazi postoji oglas sa zadatim id-jem
     * u suprotnom vraca NULL
     */
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
    
    /*STEFAN PEJOVIC
     * funkcija dodaje novi oglas u bazu(u tabelu oglasi)
     * parametri funkcije su osobine oglasa(vrednosti koje ce imati kolone u tabeli)
     * idKorisnika koji postavlja oglas se dobija iz super globalne promenljive SESSION, jer je ulogovani korisnik sacuvan u sesiji(njegov id)
     */
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
    
    /**
     * Stefan Mladenovic
     */
    
   public static function azurirajAd($idOglasa,$marka,$model,$godiste,$cena,$mesto,$kilometraza,$gorivo,$menjac,$snaga,$opis,$rate,$garancija,$fiksna,$zamena,$panorama,$elpodizaci,$alufelne,$xenon,$ledfarovi,$tempomat,$navigacija,$vazdvesanje,$multifunvolan) {
   
        
     
        
        $conn= Database::getInstance();
        $string="UPDATE oglas ";
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
        if ($godiste!= ""){
            $filter[] = " Godiste = ? ";
            $values[]=$godiste;
        }
        
        if ($cena!= ""){
            $filter[] = " Cena = ? ";
            $values[]=$cena;
        }
      
         if ($garancija!= ""){
            $filter[] = " Garancija = ? ";
            $values[]=$garancija;
        }
         if ($rate!= ""){
            $filter[] = " Rate = ? ";
            $values[]=$rate;
        }
        
         if ($mesto!= ""){
            $filter[] = " Mesto = ? ";
            $values[]=$mesto;
        }
      
         if ($kilometraza!= ""){
            $filter[] = " Kilometraza = ? ";
            $values[]=$kilometraza;
        }
         if ($gorivo!= ""){
            $filter[] = " Gorivo = ? ";
            $values[]=$gorivo;
        }
           if ($menjac!= ""){
            $filter[] = " Menjac = ? ";
            $values[]=$menjac;
        }
            if ($snaga!= ""){
            $filter[] = " Snaga = ? ";
            $values[]=$snaga;
        }
           if ($opis!= ""){
            $filter[] = " Opis = ? ";
            $values[]=$opis;
        }
            if ($rate!= ""){
            $filter[] = " Rate = ? ";
            $values[]=$rate;
        }
           if ($garancija!= ""){
            $filter[] = " Garancija = ? ";
            $values[]=$garancija;
        }
            if ($snaga!= ""){
            $filter[] = " Snaga = ? ";
            $values[]=$snaga;
        }
           if ($menjac!= ""){
            $filter[] = " Menjac = ? ";
            $values[]=$menjac;
        }
            if ($fiksna!= ""){
            $filter[] = " CenaJeFiksna = ? ";
            $values[]=$fiksna;
        }
             if ($zamena!= ""){
            $filter[] = " Zamena = ? ";
            $values[]=$zamena;
        }
             if ($panorama!= ""){
            $filter[] = " Panorama = ? ";
            $values[]=$panorama;
        }
             if ($elpodizaci!= ""){
            $filter[] = " ElPodizaci = ? ";
            $values[]=$elpodizaci;
        }
            if ($alufelne!= ""){
            $filter[] = " AluFelne = ? ";
            $values[]=$alufelne;
        }
             if ($xenon!= ""){
            $filter[] = " Xenon = ? ";
            $values[]=$xenon;
        }
             if ($ledfarovi!= ""){
            $filter[] = " LedFarovi = ? ";
            $values[]=$ledfarovi;
        }
            if ($tempomat!= ""){
            $filter[] = " Tempomat = ? ";
            $values[]=$tempomat;
        }
            if ($navigacija!= ""){
            $filter[] = " Navigacija = ? ";
            $values[]=$navigacija;
        }
            if ($vazdvesanje!= ""){
            $filter[] = " VazdVesanje = ? ";
            $values[]=$vazdvesanje;
        }
            if ($multifunvolan!= ""){
            $filter[] = " MultifunVolan = ? ";
            $values[]=$multifunvolan;
        }
    
        if (count($filter)>0){
            $string.= "SET ".implode(' , ', $filter);
            $string.=" WHERE idOglas='$idOglasa'  ";
            $sql = $conn->prepare($string);
            $sql->execute($values);
           // $result = $sql->fetchAll();
        }     
        
      
       
   }
   
   
    /*STEFAN PEJOVIC
     * funckija koja pretrazuje sve oglase iz baze
     * parametri funkcije su parametri pretrage, moze nijedan da ne bude zadat a mogu i svi da budu zadati
     * kao rezultat se vraca niz objekata klase Ad 
     * ukoliko se ne zada nijedan parametar, vraca se niz objekata svih oglasa koji postoje u tabeli oglasi
     * ukoliko ne postoje oglasi sa trazenim parametrima vraca se prazan  niz
     */
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
   
   /*STEFAN PEJOVIC
    * funkcija dohvata oglas iz baze ciji je id jednak idOglas, idOglas se zadaje kao parametar funckije
    * kao rezultat funkcije vraca se objekat klase Ad
    */
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
    
    /*STEFAN PEJOVIC
     * funkcija koja postavlja komentar i ocenu za oglas ciji je id zadat kao parametar funkcije
     * sadrzaj komentara se prosledjuje kao parametar funkcije komentar
     * ocena se prosledjuje kao parametar funkcije ocena
     * kao rezultat funkcije se u bazi u tabeli recenzije dodaje novi red gde je idOglas=oglas, sadrzaj=komentar, ocena=ocena
     * id korisnika koje je postavio komentar i ocenu se dobija iz superglobalne promenljive $_SESSION(jer je u sesiji zapamcen korisnik koji je ulogovan)
     */
     public static function postaviKomentar($komentar, $ocena, $idoglas) {
            
        $conn= Database::getInstance();
        $idKorisnik=$_SESSION['user']->id;
       
        $upit="INSERT INTO recenzija (Sadrzaj,Ocena,idKorisnik,idOglas)"
                . " VALUES(:sadrzaj,:ocena,:idkorisnik,:idoglas) ";
        $result=$conn->prepare($upit);
        $result->execute(['sadrzaj' => $komentar , 'ocena' => $ocena, 'idkorisnik' => $idKorisnik , 'idoglas'=>$idoglas]);
        
       
        
    }
    
    /*MIHAJLO KRPOVIC, STEFAN PEJOVIC
     * funkcija dohvata oglase iz baze koje su postavili krisnici ciji je tip='VIP'
     * parametri funkcije su parametri pretrage
     * ukoliko se ne zada nista od parametara funkcija vraca sve oglase koje su postavili VIP korisnici
     * u suprotnom vraca samo one oglase koji zadovoljavaju kriterijume
     * rezultat funkcije je niz objekata klase Ad(ili prazan niz ukoliko nije pronadjen nijedan oglas)
     */
    public static function searchAdVip($marka,$model,$godisteOd,$godisteDo,$cenaOd,$cenaDo,$garancija,$rate){
        
        $conn= Database::getInstance();
        $string="SELECT * FROM oglas o, korisnik k ";
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
        $string.="WHERE o.idKorisnik=k.idKorisnik AND Tip='Vip' ";
        if (count($filter)>0){
            $string.= " AND ".implode(' AND ', $filter);
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
   
   /*MIHAJLO KRPOVIC, STEFAN PEJOVIC
     * funkcija dohvata oglase iz baze koje su postavili krisnici ciji je tip='Obican'
     * parametri funkcije su parametri pretrage
     * ukoliko se ne zada nista od parametara funkcija vraca sve oglase koje su postavili obicni korisnici
     * u suprotnom vraca samo one oglase koji zadovoljavaju kriterijume
     * rezultat funkcije je niz objekata klase Ad(ili prazan niz ukoliko nije pronadjen nijedan oglas)
     */
   public static function searchAdObican($marka,$model,$godisteOd,$godisteDo,$cenaOd,$cenaDo,$garancija,$rate){
        
        $conn= Database::getInstance();
        $string="SELECT * FROM oglas o, korisnik k ";
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
        $string.="WHERE o.idKorisnik=k.idKorisnik AND Tip='Obican' ";
        if (count($filter)>0){
            $string.= " ".implode(' AND ', $filter);
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
   
   /*MIHAJLO KRPOVIC, STEFAN PEJOVIC
    * funkcija dohvata oznacene oglase za korisnika ciji je id jednak idK
    * id korisnika ciji se oznaceni oglasi traze se zadaje kao parametar fje 
    * funkcija dohvata sve redove iz tabele oznaceni u kojima je idKorinik jednak idK
    * kao rezultat vraca se niz objekata klase Ad, ili prazan niz ukoliko takvi oglasi ne postoje
    */
    public static function getOznaceniAd($idK){
        $connection= Database::getInstance();
        $result=$connection->query("SELECT * FROM oznaceni oz, oglas o WHERE oz.idKorisnik='$idK' AND oz.idOglas=o.idOglas");
        $oznaceniAd=[];
        foreach($result->fetchAll() as $ad){
            $oznaceniAd[] = new Ad($ad['idOglas'], $ad['Marka'], $ad['Model'], $ad['Godiste'], $ad['Mesto'], $ad['Cena'], 
                    $ad['Kilometraza'], $ad['Gorivo'], $ad['Menjac'], $ad['Snaga'], 
                    $ad['Opis'], $ad['CenaJeFiksna'], $ad['Rate'], $ad['Garancija'], 
                    $ad['Zamena'], $ad['Panorama'], $ad['ElPodizaci'], $ad['AluFelne'],
                    $ad['Xenon'], $ad['LedFarovi'], $ad['Tempomat'], $ad['Navigacija'], 
                    $ad['VazdVesanje'], $ad['MultifunVolan'], $ad['idKorisnik']);
        }
        return $oznaceniAd;
    }
    
    /*STEFAN PEJOVIC, MIHAJLO KRPOVIC
     * funkcija oznacava oglas ciji je id jednak idO za korisnika ciji je id jednak IdK
     * rezultat funkcije je da se u tabeli oznaceni oglasi doda novi red gde je idOglas=idO a idKorisnik=idK
     * ukoliko u tabeli vec postoji takav red funkcija ne radi nista
     */
    public static function oznaciAd($idK, $idO){
        $connection= Database::getInstance();
        $result=$connection->query("SELECT * FROM oznaceni WHERE idKorisnik='$idK' AND idOglas='$idO'");
        $i=0;
        foreach($result->fetchAll() as $red){
            $i++;
        }
        if($i==0){
            $upit="INSERT INTO oznaceni (idKorisnik, idOglas) VALUES (:idk, :ido)";
            $result=$connection->prepare($upit);
            $result->execute(['idk'=>$idK, 'ido'=>$idO]);
        }
    }
    
    /*STEFAN PEJOVIC, MIHAJLO KRPOVIC
     * funkcija brise red u tabeli oznaceni gde je idKorisnik=idK a idOglas=idO
     * idK i idO se zadaju kao parametri funkcije
     */
    public static function unoznaciAd($idK, $idO){
        $connection= Database::getInstance();
        $result=$connection->query("DELETE FROM oznaceni WHERE idKorisnik='$idK' AND idOglas='$idO'");
    }

    
    
    
    
}

