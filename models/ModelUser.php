<?php

class User{
    
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $username;
    private $password;
    private $phone;
    private $type;
    private $dateStart;
    private $dateEnd;
    
    public function __construct($id, $firstName, $lastName, $email, $username, $password, $phone, $type, $dateStart, $dateEnd) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->phone = $phone;
        $this->type = $type;
        $this->dateStart = $dateStart;
        $this->dateEnd = $dateEnd;
    }

    //dohvata atribut sa nazivom
    public function __get($atribute) {
        return $this->$atribute;
    }
    
    //dohvata korisnika sa korisnickim imenom $username
    public static function getUser($username){
        $connection= Database::getInstance();
        $result=$connection->query("SELECT * FROM korisnik WHERE Korisnicko_ime='$username'");
        $user=$result->fetch();
        if($user!=NULL){
            return new User($user['idKorisnik'], $user['Ime'], $user['Prezime'], $user['Email'], $user['Korisnicko_ime'], $user['Lozinka'], $user['Telefon'], $user['Tip'], $user['Datum_od'], $user['Datum_do']);
        }
        else{
            return NULL;
        }
    }
    
    //proverava da li je lozinka ispravna
    public function passwordOK($password){
        if($this->password==$password){
            return true;
        }
        else{
            return false;
        }
    }
    
    public static function newPassword($username, $newPassword){
        $connection= Database::getInstance();
        $connection->query("UPDATE korisnik SET Lozinka='$newPassword' WHERE Korisnicko_ime='$username'");
    }
    
    public static function giveVip($username, $newType){
        $dateToday=date("Y-m-d");
        $dateTodayNextMonth=date('Y-m-d', strtotime('+1 month'));
        $connection= Database::getInstance();
        $connection->query("UPDATE korisnik SET Tip='$newType' WHERE Korisnicko_ime='$username'");
        $connection->query("UPDATE korisnik SET Datum_od='$dateToday' WHERE Korisnicko_ime='$username'");
        $connection->query("UPDATE korisnik SET Datum_do='$dateTodayNextMonth' WHERE Korisnicko_ime='$username'");
    }
    
    public static function takeVip($username, $newType){
        $dateNew=date('Y-m-d', strtotime('0000-00-00'));
        $connection= Database::getInstance();
        $connection->query("UPDATE korisnik SET Tip='$newType' WHERE Korisnicko_ime='$username'");
        $connection->query("UPDATE korisnik SET Datum_od='$dateNew' WHERE Korisnicko_ime='$username'");
        $connection->query("UPDATE korisnik SET Datum_do='$dateNew' WHERE Korisnicko_ime='$username'");
    }
    
    public static function banovanje($username){
        $connection= Database::getInstance();
        $result=$connection->query("SELECT * FROM korisnik WHERE Korisnicko_ime='$username'");
        $user=$result->fetch();
        $id=$user['idKorisnik'];
        
        $connection->query("DELETE FROM recenzija WHERE idKorisnik='$id'");
        $connection->query("DELETE FROM oznaceni WHERE idKorisnik='$id'");
        $connection->query("DELETE FROM sacuvani WHERE idKorisnik='$id'");
        $connection->query("DELETE FROM oglas WHERE idKorisnik='$id'");
        $connection->query("DELETE FROM korisnik WHERE Korisnicko_ime='$username'");
    }
    
    //za proveru jedinstvenosti username-a
    public static function check($username, $email){
        // ako vrati true onda ima vec neko
        $conn= Database::getInstance();  
        $upit=$conn->prepare("SELECT * FROM korisnik WHERE Korisnicko_ime = ?"
                . "OR Email = ? ");
        $values = array($username, $email);
        $upit->execute($values);
        $result=$upit->fetchAll();
        
        echo count($result);
        if (count($result)>0){
            
            return true;
        }        
            return false;                                
    }
    
    public static function signIn($firstname, $lastname, $email, $phone, $username, $password, $tip){                
        $conn= Database::getInstance();
        $dateStart=date('Y-m-d', strtotime('0000-00-00'));
        $dateEnd=date('Y-m-d', strtotime('0000-00-00'));
        if($tip==2){
            $dateStart=date("Y-m-d");
            $dateEnd=date('Y-m-d', strtotime('+1 month'));
        }        
        $upit="INSERT INTO korisnik (Ime, Prezime, Email, Korisnicko_ime, Lozinka, Telefon, Tip, Datum_od, Datum_do)" //dodaj datumod do
                . " VALUES(:ime, :prezime, :email, :user, :password, :telefon, :tip, :d1, :d2)";
        $result=$conn->prepare($upit);
        $result->execute(['ime' => $firstname , 'prezime' => $lastname, 'email' => $email , 'user'=>$username,'password'=>$password
        , 'telefon'=>$phone , 'tip'=>$tip, 'd1'=>$dateStart, 'd2'=>$dateEnd]);        
        
    }
    
    

}



