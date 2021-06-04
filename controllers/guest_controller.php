<?php
require_once('models/ModelUser.php');
require_once('models/ModelAd.php');
require_once('models/ModelRecenzija.php');
class Guest{
    //provera da li je korisnik mozda vec ulogovan
    public function __construct() {
        session_start();
        if(isset($_SESSION['user'])){
            $user=$_SESSION['user'];
            switch($user->type){
                case "Obican": 
                    header("Location: ?controller=user&action=index");
                    break;
                case "Vip":
                    header("Location: ?controller=vip&action=index");
                    break;
                case "Admin":
                    header("Location: ?controller=admin&action=index");
                    break;
            }
        }
    }
    
    //prikazuje formu za prijavu na sistem
    public function loginShow($username=NULL, $password=NULL, $messageUsername=NULL, $messagePassword=NULL){
        require_once('views/Prijava/prijava.php');
    }
    
    //pocetna stranica za gosta
    public function index(){
        $controller="guest";
        require_once('views/Dobrodosli/dobrodosli.php');
    }
    
    //glavna za gosta
    public function index1(){
        $controller="guest";
        require_once('views/GlavnaGost/glavnaGost.php');
    }
    
    //funkcija za logovanje, ako su uspesni parametri za login
    //ispis gresaka ukoliko parametri nisu ok
    public function login(){
        if($_POST['username']==""){
            $messageUsername="Korisnicko ime nije uneto.";
        }
        else{
            $messageUsername=NULL;
        }
        if($_POST['password']==""){
            $messagePassword="Lozinka nije uneta.";
        }
        else{
            $messagePassword=NULL;
        }
        if($_POST['username']!="" && $_POST['password']!=""){
            $user=User::getUser($_POST['username']);
            if($user==NULL){
                $messageUsername="Korisnicko ime nije ispravno.";
                $this->loginShow(NULL, NULL, $messageUsername, NULL);
            }
            else{
                if(!($user->passwordOK($_POST['password']))){
                    $messagePassword="Lozinka nije ispravna.";
                    $this->loginShow(NULL, NULL, NULL, $messagePassword);
                }
                else{
                    $_SESSION['user']=$user;
                    switch($user->type){
                        case "Obican": 
                            header("Location: ?controller=user&action=index");
                            break;
                        case "Vip":
                            header("Location: ?controller=vip&action=index");
                            break;
                        case "Admin":
                            header("Location: ?controller=admin&action=index");
                            break;
                    }
                }
            }
        }
        else{
            $this->loginShow(NULL, NULL, $messageUsername, $messagePassword);
        }
    }
    
    //prikazuje formu za promenu lozinke
    public function changePasswordShow($username=NULL, $oldPassword=NULL, $newPassword=NULL, $newnewPassword=NULL, $messageUsername=NULL, $messageOldPassword=NULL, $messageNewPassword=NULL, $messageNewNewPassword=NULL){
        require_once('views/Promenalozinke/promenalozinke.php');
    }
    
    //funkcija za promenu lozinke, ako su uspesni parametri za promenu
    //ispis gresaka ukoliko parametri nisu ok
    public function changePassword(){
        if($_POST['username']==""){
            $messageUsername="Korisnicko ime nije uneto.";
        }
        else{
            $messageUsername=NULL;
        }
        if($_POST['oldPassword']==""){
            $messageOldPassword="Stara lozinka nije uneta.";
        }
        else{
            $messageOldPassword=NULL;
        }
        if($_POST['newPassword']==""){
            $messageNewPassword="Nova lozinka nije uneta.";
        }
        else{
            $messageNewPassword=NULL;
        }
        if($_POST['newnewPassword']==""){
            $messageNewNewPassword="Ponovljena lozinka nije uneta.";
        }
        else{
            $messageNewNewPassword=NULL;
        }
        if($_POST['username']!="" && $_POST['oldPassword']!="" && $_POST['newPassword']!="" && $_POST['newnewPassword']!=""){
            $user=User::getUser($_POST['username']);
            if($user==NULL){
                $messageUsername="Korisnicko ime nije ispravno.";
                $this->changePasswordShow(NULL, NULL, NULL, NULL, $messageUsername, NULL, NULL, NULL);
            }
            else{
                if(!($user->passwordOK($_POST['oldPassword']))){
                    $messageOldPassword="Stara lozinka nije ispravna.";
                    $this->changePasswordShow(NULL, NULL, NULL, NULL, NULL, $messageOldPassword, NULL, NULL);
                }
                else{
                    if($_POST['newPassword']!=$_POST['newnewPassword']){
                        $messageNewNewPassword="Ponovljena lozinka nije ista kao nova lozinka.";
                        $this->changePasswordShow(NULL, NULL, NULL, NULL, NULL, NULL, NULL, $messageNewNewPassword);
                    }
                    else{
                        User::newPassword($_POST['username'], $_POST['newPassword']);
                        $this->changePasswordShow(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
                        echo 'Uspesno ste promenili lozinku.';
                    }
                }
            }
        }
        else{
            $this->changePasswordShow(NULL, NULL, NULL, NULL, $messageUsername, $messageOldPassword, $messageNewPassword, $messageNewNewPassword);
        }
    }
    
    //za prikaz forme za registraciju
    public function signInShow($firstname=NULL, $lastname=NULL, $email=NULL, $phone=NULL, $username=NULL, $password=NULL, $newnewPassword=NULL, $tip=NULL, $messageFirstName=NULL, $messageLastName=NULL, $messageEmail=NULL, $messagePhone=NULL,$messageUsername=NULL, $messagePassword=NULL, $messageNewNewPassword=NULL, $messageTip=NULL, $messageCorrect=NULL){
        require_once('./views/Registracija/registracija.php');
    }
    
    public function signIn(){
        if($_POST['firstname']==""){
            $messageFirstName="Ime nije uneto.";
        }
        else{
            $messageFirstName=NULL;
        }
        if($_POST['lastname']==""){
            $messageLastName="Prezime nije uneto.";
        }
        else{
            $messageLastName=NULL;
        }
        if($_POST['username']==""){
            $messageUsername="Korisnicko ime nije uneto.";
        }
        else{
            $messageUsername=NULL;
        }
        if($_POST['password']==""){
            $messagePassword="Lozinka nije uneta.";
        }
        else{
            $messagePassword=NULL;
        }
        if($_POST['email']==""){
            $messageEmail="Email nije unet.";
        }
        else{
            $messageEmail=NULL;
        }
        if($_POST['phone']==""){
            $messagePhone="Telefon nije unet.";
        }
        else{
            $messagePhone=NULL;
        }
        if($_POST['tip']==0){
            $messageTip="Tip nije izabran.";
        }
        else{
            $messageTip=NULL;
        }
        if($_POST['newnewPassword']==""){
            $messageNewNewPassword="Ponovljena lozinka nije uneta.";
        }
        else{
            $messageNewNewPassword=NULL;
        }
        if($_POST['firstname']!="" && $_POST['lastname']!="" && $_POST['username']!="" && $_POST['password']!="" 
                && $_POST['email']!="" && $_POST['phone']!="" && $_POST['tip']!=0 && $_POST['newnewPassword']!=""){
            $postoji=User::check($_POST['username'], $_POST['email']);
            if($postoji==true){
                $messageUsername="Vec postoji korisnik sa unetim korisnickim imenom. Morate izabrati drugacije korisnicko ime.";
                $this->signInShow(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $messageUsername, NULL, NULL, NULL, NULL);
            }
            else{
                if($_POST['password']!=$_POST['newnewPassword']){
                        $messageNewNewPassword="Ponovljena lozinka nije ista kao lozinka.";
                        $this->signInShow(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $messageNewNewPassword, NULL, NULL);
                }
                else{
                    if($_POST['tip']==1){
                        $tip="Obican";
                    }
                        else{
                            if($_POST['tip']==2){
                                $tip="Vip";
                            }
                            else{
                                $tip="Admin";
                            }
                        }
                    
                    User::signIn($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['phone'], $_POST['username'], $_POST['password'], $tip);
                    $messageCorrect="Uspesno ste se registrovali";
                    $this->signInShow(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $messageCorrect);
                
                }
            }
        }
        else{
            $this->signInShow(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $messageFirstName, $messageLastName, $messageEmail, $messagePhone,$messageUsername, $messagePassword, $messageNewNewPassword, $messageTip, NULL);
        
        }
    }
    
    
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
      require_once 'views/PretragaOglasaGost/pretragaOglasa.php';
    }
    
     public function fullAd(){
        
        $idOglas=$_POST['idOglasaZaPrikaz'];
        $oglas= Ad::getAdWithId($idOglas);
          require_once 'views/DetaljanOglas/detaljanOglas.php';
        
    } 
    
    
    
    
    
    
    
    
    
    //ovo je sve dole za recenzije, nisam siguran da li je ok
     public function postaviKomPre(){
        $idOglasa=$_POST['idOglasa'];
        $oglas= Ad::getAdWithId($idOglasa);
        require_once './views/Recenzije/recenzija.php';    
        
      
        
    }
    
    public function postaviKom(){
        
        if (empty($_POST['komentar']) || empty($_POST['ocena'])  )
            return call('prvi','greska');
         
           
        Ad::postaviKomentar($_POST['komentar'], $_POST['ocena'],$_POST['idOglasa']);
        $idOglasa=$_POST['idOglasa'];
        $oglas= Ad::getAdWithId($idOglasa);
        require_once 'views/Recenzije/recenzija.php';
        
        //$nizRecenzija= Recenzija::dohvatiSveKomentare($idOglasa);
      //  require_once 'views/oglasi/prikaz_recenzija.php';
    }
    
    
    public function postaviPre(){
        require_once 'views/PostaviOglasObican/postaviOglasObican.php';
        
    }
    
    //ovo zaista ne znam sta je
    public function prikaz_rezultata() {
            require_once 'views/oglasi/forma_pretraga.php';
    }
}


?>

