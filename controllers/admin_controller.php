<?php
require_once('models/ModelUser.php');
require_once('models/ModelAd.php');

class Admin{
    
    public function __construct() {
        session_start();
        if(!(isset($_SESSION['user']))){
            header("Location: ?controller=guest&action=index");
        }
        else{
            $user=$_SESSION['user'];
            switch($user->type){
                case "Obican": 
                    header("Location: ?controller=user&action=index");
                    break;
                case "Vip":
                    header("Location: ?controller=vip&action=index");
                    break;
            }
        }
    }
    
    public function index(){
        require_once('views/GlavnaAdmin/glavnaadmin.php');
    }
    
    //funkcija za odjavu sa sistema
    public function logout(){
        session_destroy();
        header("Location: ?controller=guest&action=index");
    }
    
    //prikazuje formu za dodelu vip statusa
    public function giveVipShow($username=NULL, $messageUsername=NULL, $messageCorrect=NULL){
        require_once('views/AdminDodeliVip/admindodelivip.php');
    }
    
    //aktivira se klikom na submit forme za dodelu vip statusa
    public function giveVip(){
        if($_POST['username']==""){
            $messageUsername="Korisnicko ime nije uneto.";
        }
        else{
            $messageUsername=NULL;
        }
        if($_POST['username']!=""){
            $user=User::getUser($_POST['username']);
            if($user==NULL){
                $messageUsername="Korisnik sa zadatim korisnickim imenom ne postoji.";
                $this->giveVipShow(NULL, $messageUsername, NULL);
            }
            else{
                if($user->type=="Vip"){
                    $messageUsername="Korisnik ".$user->username." vec ima VIP status.";
                    $this->giveVipShow(NULL, $messageUsername, NULL);
                }
                else{
                    if($user->type=="Admin"){
                        $messageUsername="Korisnik ".$user->username." ima status Admin.";
                        $this->giveVipShow(NULL, $messageUsername, NULL);
                    }
                    else{
                        $newType="Vip";
                        User::giveVip($_POST['username'], $newType);
                        $messageCorrect="Uspesno ste dodelili VIP status zadatom korisniku.";
                        $this->giveVipShow(NULL, NULL, $messageCorrect);
                        
                    }
                }
            }
            
        }
        else{
            $this->giveVipShow(NULL, $messageUsername, NULL);
        }
    }
    
    //prikazuje formu za oduzimanje vip statusa
    public function takeVipShow($username=NULL, $messageUsername=NULL, $messageCorrect=NULL){
        require_once('views/AdminOduzmiVip/adminoduzmivip.php');
    }
    
    //aktivira se klikom na submit forme za oduzimanje vip statusa
    public function takeVip(){
        if($_POST['username']==""){
            $messageUsername="Korisnicko ime nije uneto.";
        }
        else{
            $messageUsername=NULL;
        }
        if($_POST['username']!=""){
            $user=User::getUser($_POST['username']);
            if($user==NULL){
                $messageUsername="Korisnik sa zadatim korisnickim imenom ne postoji.";
                $this->takeVipShow(NULL, $messageUsername, NULL);
            }
            else{
                if($user->type=="Obican"){
                    $messageUsername="Korisnik ".$user->username." nema VIP status pa mu ga nije moguce ni oduzeti.";
                    $this->takeVipShow(NULL, $messageUsername, NULL);
                }
                else{
                    if($user->type=="Admin"){
                        $messageUsername="Korisnik ".$user->username." ima status Admin.";
                        $this->takeVipShow(NULL, $messageUsername, NULL);
                    }
                    else{
                        $newType="Obican";
                        User::takeVip($_POST['username'], $newType);
                       $messageCorrect="Uspesno ste oduzeli VIP status zadatom korisniku.";
                        $this->takeVipShow(NULL, NULL, $messageCorrect);
                    }
                }
            }
            
        }
        else{
            $this->takeVipShow(NULL, $messageUsername);
        }
    }
    
    //prikazuje formu za oduzimanje vip statusa
    public function banUserShow($username=NULL, $messageUsername=NULL, $messageCorrect=NULL){
        
        require_once('views/AdminBanujKorisnika/adminbanujkorisnika.php');
    }
    
    //aktivira se klikom na submit forme za oduzimanje vip statusa
    public function banUser(){
        if($_POST['username']==""){
            $messageUsername="Korisnicko ime nije uneto.";
        }
        else{
            $messageUsername=NULL;
        }
        if($_POST['username']!=""){
            $user=User::getUser($_POST['username']);
            if($user==NULL){
                $messageUsername="Korisnik sa zadatim korisnickim imenom ne postoji.";
                $this->banUserShow(NULL, $messageUsername, NULL);
            }
            else{
                User::banovanje($_POST['username']);
                $messageCorrect="Uspesno ste banovali zadatog korisnika.";
                $this->banUserShow(NULL, NULL, $messageCorrect);
    
            }
        }    
        else{
            $this->banUserShow(NULL, $messageUsername, NULL);
        }
    }
    
    public function deleteAdShow($id=NULL, $messageId=NULL, $messageCorrect=NULL){
        require_once('./views/AdminBrisanje/adminbrisanje.php');
    }
    
    public function deleteAd(){
        if($_POST['id']==""){
            $messageUsername="Id oglasa nije unet.";
        }
        else{
            $messageId=NULL;
        }
        if($_POST['id']!=""){
            $ad=Ad::getAd($_POST['id']);
            if($ad==NULL){
                $messageId="Oglas sa zadatim ID ne postoji.";
                $this->deleteAdShow(NULL, $messageId, NULL);
            }
            else{
                Ad::deleteAd($_POST['id']);
                $messageCorrect="Uspesno ste obrisali oglas ciji ste ID zadali.";
                $this->deleteAdShow(NULL, NULL, $messageCorrect);
    
            }
        }    
        else{
            $this->deleteAdShow(NULL, $messageUsername, NULL);
        }
    }
    
}

