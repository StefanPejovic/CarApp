<?php
require_once('models/ModelUser.php');
require_once('models/ModelAd.php');
require_once ('models/ModelRecenzija.php');

class Users{
    
    public function __construct() {
        session_start();
        if(!(isset($_SESSION['user']))){
            header("Location: ?controller=guest&action=index");
        }
        else{
           $user=$_SESSION['user'];
            switch($user->type){
                case "Vip":
                    header("Location: ?controller=vip&action=index");
                    break;
                case "Admin":
                    header("Location: ?controller=admin&action=index");
                    break;
            }
        }
    }
    
    /*MIHAJLO KRPOVIC
     * akcija kotrolera za pocetnu stranicu
     */
    public function index(){
        require_once('views/GlavnaKorisnikObican/glavnaKorisnikObican.php');
    }
    
    /*MIHAJLO KRPOVIC
     * akcija kotrolera za odjavu sa sistema
     */
    public function logout(){
        session_destroy();
        header("Location: ?controller=guest&action=index");
    }
    
    /*MIHAJLO KRPOVIC
     * akcija kotrolera za  prikaz mojih oglasa
     * izvrsava pozivanje odg modela i pogleda kroz koji se prikazuje rezultat
     */
    public function myAd(){
        $idK=$_SESSION['user']->id;
        $myAd=Ad::getMyAd($idK);
        //require_once('views/header_user.php');
        require_once('views/MojiOglasiObican/mojiOglasiObican.php');
    }
    
     /*MIHAJLO KRPOVIC
     * akcija kotrolera za prikaz sacuvane oglase
     * izvrsava pozivanje odg modela i pogleda kroz koji se prikazuje rezultat
     */
    public function savedAd(){
        $idK=$_SESSION['user']->id;
        $savedAd=Ad::getSavedAd($idK);
        //require_once('views/header_user.php');
        require_once('views/SacuvaniOglasiObican/sacuvaniOglasiObican.php');
    }
    
     /*MIHAJLO KRPOVIC
     * akcija kotrolera za cuvanje oglasa
     * izvrsava pozivanje odg modela i pogleda kroz koji se prikazuje rezultat
     */
    public function saveAd(){
        $idK=$_SESSION['user']->id;
        if($_POST['idOglasaZaCuvanje']){
        $idO=$_POST['idOglasaZaCuvanje'];
        Ad::saveAd($idK, $idO);
        $savedAd=Ad::getSavedAd($idK);
        //Ad::saveAd($idK, $idO);
        require_once('views/SacuvaniOglasiObican/sacuvaniOglasiObican.php');
        }
    }
    
     /*MIHAJLO KRPOVIC
     * akcija kotrolera za izbacivanje sacuvanog oglasa 
     * izvrsava pozivanje odg modela i pogleda kroz koji se prikazuje rezultat
     */
    public function unsaveAd(){
        $idK=$_SESSION['user']->id;
        if($_POST['idOglasaZaIzbacivanje']){
        $idO=$_POST['idOglasaZaIzbacivanje'];
        Ad::unsaveAd($idK, $idO);
        $savedAd=Ad::getSavedAd($idK);
        require_once('views/SacuvaniOglasiObican/sacuvaniOglasiObican.php');
    }
    }
    
     /*STEFAN PEJOVIC
     * akcija kotrolera za dodavanje oglsa, kada se klikne na dugme u meniju
      * tacnije za preusmeravanje na odgovarajuci pogled
     
     */
    public function adAdShow($message=NULL, $messageCorrect=NULL){
        require_once ('./views/PostaviOglasObican/postaviOglasObican.php');
    }
    
    /**
     * 
     * STEFAN MLADENOVIC
     *
     *
     */
    public function azurirajAdShow($message=NULL, $messageCorrect=NULL,$oglas){
        require_once ('./views/AzurirajOglas/azurirajOglas.php');
    }
    
    
    /*STEFAN PEJOVIC
     * akcija kotrolera za dodavanje oglsa, 
     * pozivanje modela
     * prikaz rezultata kroz odg pogled
     */
    public function adAd(){
        $message="";
        if (empty($_POST['marka'])){
            $message="Marka automobila nije izabrana. ";
        }
        if (empty($_POST['model']))
        {  $message.="Model automobila nije izabran. ";
        }
        if (empty($_POST['godiste']))
        {  
            $message.="Godiste automobila nije izabrano. ";
        }
        if (empty($_POST['cena']))
        {  
            $message.="Cena nije uneta. <br>";
        }
        if (empty($_POST['mesto']))
        {
            $message.="Mesto nije uneto. ";
        } 
        if (empty($_POST['kilometraza']))
        {  
            $message.="Kilometraza nije uneta. ";
        }
        if (empty($_POST['gorivo']))
        {  
            $message.="Gorivo nije uneto. ";
        }
        if (empty($_POST['menjac']))
        {  
            $message.="Menjac nije izabran. ";
        }
        if (empty($_POST['snaga']))
        {  
            $message.="Snaga nije uneta. ";
        }
        $navigacija;         
        if (empty($_POST['navigacija']))
        {  
            $navigacija="0";
            
        }       
        else {
            $navigacija=$_POST['navigacija'];
        }
          $rate;         
        if (empty($_POST['rate']))
        {  
            $rate="0";
            
        }       
        else {
            $rate=$_POST['rate'];
        }    
        
          $garancija;         
        if (empty($_POST['garancija']))
        {  
            $garancija="0";
            
        }       
        else {
            $garancija=$_POST['garancija'];
        }    
          $fiksna;         
        if (empty($_POST['fiksna']))
        {  
            $fiksna="0";
            
        }       
        else {
            $fiksna=$_POST['fiksna'];
        }   
         if (empty($_POST['zamena']))
        {  
            $zamena="0";
            
        }       
        else {
            $zamena=$_POST['zamena'];
        }    
        
         if (empty($_POST['panorama']))
        {  
            $panorama="0";
            
        }       
        else {
            $panorama=$_POST['panorama'];
        }    
        
         if (empty($_POST['elpodizaci']))
        {  
            $elpodizaci="0";
            
        }       
        else {
            $elpodizaci=$_POST['elpodizaci'];
        }
         if (empty($_POST['alufelne']))
        {  
            $alufelne="0";
            
        }       
        else {
            $alufelne=$_POST['alufelne'];
        }    
         if (empty($_POST['xenon']))
        {  
            $xenon="0";
            
        }       
        else {
            $xenon=$_POST['xenon'];
        }    
         if (empty($_POST['ledfarovi']))
        {  
            $ledfarovi="0";
            
        }       
        else {
            $ledfarovi=$_POST['ledfarovi'];
        }    
        
         if (empty($_POST['tempomat']))
        {  
            $tempomat="0";
            
        }       
        else {
            $tempomat=$_POST['tempomat'];
        }    
        
         if (empty($_POST['vazdvesanje']))
        {  
            $vazdvesanje="0";
            
        }       
        else {
            $vazdvesanje=$_POST['vazdvesanje'];
        }    
         if (empty($_POST['multifunvolan']))
        {  
            $multifunvolan="0";
            
        }       
        else {
            $multifunvolan=$_POST['multifunvolan'];
        }    
        if(!empty($_POST['marka']) && !empty($_POST['model']) && !empty($_POST['godiste']) && $_POST['cena']!="" && $_POST['mesto']!="" && $_POST['kilometraza']!="" && $_POST['gorivo']!="" && !empty($_POST['menjac']) && $_POST['snaga']!=""){
         Ad::adAd($_POST['marka'],$_POST['model'],$_POST['godiste'],$_POST['cena'],
                 $_POST['mesto'] ,$_POST['kilometraza'],$_POST['gorivo'] ,$_POST['menjac'] ,$_POST['snaga'],
                 $_POST['opis'],$rate,$garancija,$fiksna
                 ,$zamena,$panorama,$elpodizaci,$alufelne,$xenon
                 ,$ledfarovi,$tempomat,$navigacija,$vazdvesanje,$multifunvolan
                 );
                $messageCorrect="Uspesno ste dodali oglas.";
                $this->adAdShow(NULL, $messageCorrect);
        }
        else{
            $this->adAdShow($message, NULL);
        }
    }
    
    /*STEFAN PEJOVIC
     * akcija kotrolera za pretrazivanje oglasa
     * izvrsava se odgovarajuci model i poziva se odgovarajuci pogled za prikaz rezultata
     */
    public function searchAd(){
        if (empty($_POST['marka'])){
            $marka="";
        }
        else {
            $marka=$_POST['marka'];
        }
        if (empty($_POST['model'])){
            $model="";
        }
        else {
            $model=$_POST['model'];
        }
        if (empty($_POST['godiste_od'])){
            $godisteOd="";
        }
        else {
            $godisteOd=$_POST['godiste_od'];
        }
        if (empty($_POST['godiste_do'])){
            $godisteDo="";
        }
        else {
            $godisteDo=$_POST['godiste_od'];
        }
        if (empty($_POST['cena_od'])){
            $cenaOd="";
        }
        else {
            $cenaOd=$_POST['cena_od'];
        }
        if (empty($_POST['cena_do'])){
            $cenaDo="";
        }
        else {
            $cenaDo=$_POST['cena_do'];
        }
        if (empty($_POST['rate'])){
            $rate="";
        }
        else {
            $rate=$_POST['rate'];
        }
         if (empty($_POST['garancija'])){
            $garancija="";
        }
        else {
            $garancija=$_POST['garancija'];
        }
        
    
      $nizOglasi=Ad::searchAd($marka,$model,$godisteOd,$godisteDo,$cenaOd,$cenaDo,$garancija,$rate);
      //$nizOglasiVip=Ad::searchAdVip($marka,$model,$godisteOd,$godisteDo,$cenaOd,$cenaDo,$garancija,$rate);//ovo smo dodali
      //$nizOglasiObican=Ad::searchAdObican($marka,$model,$godisteOd,$godisteDo,$cenaOd,$cenaDo,$garancija,$rate);//ovo smo dodali
      require_once 'views/PretragaOglasaObican/pretragaOglasa.php';
    }
    
    /*STEFAN PEJOVIC
     * akcija kotrolera za prikaz detaljnog oglasa
     */
     public function fullAd(){
        
        $idOglas=$_POST['idOglasaZaPrikaz'];
        $oglas= Ad::getAdWithId($idOglas);
          require_once 'views/DetaljanOglasObican/detaljanOglas.php';
        
    } 
    
    /*STEFAN PEJOVIC
     * akcija kotrolera za prikaz polja za postavljanje komentara
     */
     public function postaviKomPre(){
        $idOglasa=$_POST['idOglasa'];
        $oglas= Ad::getAdWithId($idOglasa);
        require_once './views/RecenzijeObican/recenzija.php';    
        
      
        
    }
    
    /*STEFAN PEJOVIC
     * akcija kotrolera zapostavljanje komentara
     * poziva odg model i prikazuje rezultat kroz odgovarajuci pogled
     */
    public function postaviKom(){
        
        if (empty($_POST['komentar']) || empty($_POST['ocena'])  )
            return call('prvi','greska');
         
           
        Ad::postaviKomentar($_POST['komentar'], $_POST['ocena'],$_POST['idOglasa']);
        $idOglasa=$_POST['idOglasa'];
        $oglas= Ad::getAdWithId($idOglasa);
        require_once 'views/RecenzijeObican/recenzija.php';
        
        //$nizRecenzija= Recenzija::dohvatiSveKomentare($idOglasa);
      //  require_once 'views/oglasi/prikaz_recenzija.php';
    }
    
    /*STEFAN PEJOVIC
     * akcija kotrolera za prikaz postavljenih komentara kda se doda novi
     */
    public function postaviPre(){
        require_once 'views/PostaviOglasObican/postaviOglasObican.php';
        
    }
    
     /*STEFAN PEJOVIC
     * akcija kotrolera za prikaz postavljenih komentara
     */
    public function prikaz_rezultata() {
            require_once 'views/oglasi/forma_pretraga.php';
    }
    
     /*STEFAN PEJOVIC
     * akcija kotrolera za dovijanje vip statusa
      * pozivanje odgovarajuceg pogleda kako bi se prikazao rezultat
     */
    public function beVipShow(){
        if (isset($_POST['submitic'])){
         if ($_POST['months']=="1"){
            $porukaMesec="";
            $porukaUplata="Postovani, molimo Vas da uplatite cenu za izabrani period  na racun 123-00034567-12 sa pozivom na broj Vaseg ID-a. <br> Nakon uplate Administrator ce Vam dodeliti VIP status na period na koji ste se pretplatili.";
           
        }
        else {
            
            $porukaMesec="Niste izabrali period pretplate!";
              $porukaUplata="";
          
        }
        }
        else{
            $porukaMesec="";
       
            $porukaUplata="";
        }
      
            
               $cena=1200;
            require_once './views/PostaniVIP/postaniVIP.php';      
    }
    
     /*STEFAN PEJOVIC, MIHAJLO KRPOVIC
     * akcija kotrolera za brisanje oglasa
      * pozivane odgovarajuceg modela plus pogleda za prikaz rezultata
     */
    public function deleteAd(){
        $idK=$_SESSION['user']->id;
                Ad::deleteAd($_POST['idOglasaZaBrisanje']);
                $myAd=Ad::getMyAd($idK);
        //require_once('views/header_user.php');
        require_once('views/MojiOglasiObican/mojiOglasiObican.php');
                
    
        
    }
    
    /**
     * Stefan Mladenovic
     */
    public function azuriraj(){
        
            $idOglas=$_POST['idOglasaZaAzuriranje'];
            $oglas= Ad::getAdWithId($idOglas);
          require_once 'views/AzurirajOglas/azurirajOglas.php';
        
        
    }

    /**
     * Stefan Mladenovic
     */
    public function azurirajOglas() {
        $idOglas=$_POST['idOglasaZaAzuriranje'];
        $oglas= Ad::getAdWithId($idOglas);
  
        
           $message="";
       
       
     
        $navigacija;         
        if (empty($_POST['navigacija']))
        {  
            $navigacija="0";
            
        }       
        else {
            $navigacija=$_POST['navigacija'];
        }
          $rate;         
        if (empty($_POST['rate']))
        {  
            $rate="0";
            
        }       
        else {
            $rate=$_POST['rate'];
        }    
        
          $garancija;         
        if (empty($_POST['garancija']))
        {  
            $garancija="0";
            
        }       
        else {
            $garancija=$_POST['garancija'];
        }    
          $fiksna;         
        if (empty($_POST['fiksna']))
        {  
            $fiksna="0";
            
        }       
        else {
            $fiksna=$_POST['fiksna'];
        }   
         if (empty($_POST['zamena']))
        {  
            $zamena="0";
            
        }       
        else {
            $zamena=$_POST['zamena'];
        }    
        
         if (empty($_POST['panorama']))
        {  
            $panorama="0";
            
        }       
        else {
            $panorama=$_POST['panorama'];
        }    
        
         if (empty($_POST['elpodizaci']))
        {  
            $elpodizaci="0";
            
        }       
        else {
            $elpodizaci=$_POST['elpodizaci'];
        }
         if (empty($_POST['alufelne']))
        {  
            $alufelne="0";
            
        }       
        else {
            $alufelne=$_POST['alufelne'];
        }    
         if (empty($_POST['xenon']))
        {  
            $xenon="0";
            
        }       
        else {
            $xenon=$_POST['xenon'];
        }    
         if (empty($_POST['ledfarovi']))
        {  
            $ledfarovi="0";
            
        }       
        else {
            $ledfarovi=$_POST['ledfarovi'];
        }    
        
         if (empty($_POST['tempomat']))
        {  
            $tempomat="0";
            
        }       
        else {
            $tempomat=$_POST['tempomat'];
        }    
        
         if (empty($_POST['vazdvesanje']))
        {  
            $vazdvesanje="0";
            
        }       
        else {
            $vazdvesanje=$_POST['vazdvesanje'];
        }    
         if (empty($_POST['multifunvolan']))
        {  
            $multifunvolan="0";
            
        }       
        else {
            $multifunvolan=$_POST['multifunvolan'];
        }    
            Ad::azurirajAd($idOglas,$_POST['marka'],$_POST['model'],$_POST['godiste'],$_POST['cena'],
                 $_POST['mesto'] ,$_POST['kilometraza'],$_POST['gorivo'] ,$_POST['menjac'] ,$_POST['snaga'],
                 $_POST['opis'],$rate,$garancija,$fiksna
                 ,$zamena,$panorama,$elpodizaci,$alufelne,$xenon
                 ,$ledfarovi,$tempomat,$navigacija,$vazdvesanje,$multifunvolan
                 );
                $messageCorrect="Uspesno ste azurirali oglas.";
                $this->azurirajAdShow(NULL, $messageCorrect,$oglas);
        }
        
    }
        


