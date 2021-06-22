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
    
    /*MIHAJLO KRPOVIC
     * dohvata atribut klase User ciji je naziv zadat kao parametar $atribute
     */
    public function __get($atribute) {
        return $this->$atribute;
    }
    
    /*MIHAJLO KRPOVIC
     * funkcija dohvata korisnika cije je korisnicki ime jednako username
     * ukoliko u bazi u tabeli korisnik ne postoji korisniksa zadatim korisnickim imenom vrace se NULL
     * u suprotnom se vraca objekat klase User
     */
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
    
    /*MIHAJLO KRPOVIC
     * funkcija proverava da li je lozinka jednaka parametru funcije $password
     * ukoliko jeste vraca true
     * ukoliko nije vraca false
     */
    public function passwordOK($password){
        if($this->password==$password){
            return true;
        }
        else{
            return false;
        }
    }
    
    /*MIHAJLO KRPOVIC
     * funckija menja lozinku za korisnika ciji je username=$username 
     * nova loznika je zadata kao parametar funkcije newPassword
     * kao rezultat fje polje lozinka u tabeli korisnik ima novu vrednost a to je newPassword
     */
    public static function newPassword($username, $newPassword){
        $connection= Database::getInstance();
        $connection->query("UPDATE korisnik SET Lozinka='$newPassword' WHERE Korisnicko_ime='$username'");
    }
    
    /*MIHAJLO KRPOVIC
     * funkcija dodeljuje vip status korisniku cije je korisnicko ime zadato kao parametar fje username
     * kao rezultat funkcije korisnik koji je bio tip Obican dobija tip Vip i postvljaju se vrednosti polja datumOd i datumDo 
     * datumOd se postavlja danasnji datum
     * datumDo se postavlja danasnji datum mesec dana kasnije
     */
    public static function giveVip($username, $newType){
        $dateToday=date("Y-m-d");
        $dateTodayNextMonth=date('Y-m-d', strtotime('+1 month'));
        $connection= Database::getInstance();
        $connection->query("UPDATE korisnik SET Tip='$newType' WHERE Korisnicko_ime='$username'");
        $connection->query("UPDATE korisnik SET Datum_od='$dateToday' WHERE Korisnicko_ime='$username'");
        $connection->query("UPDATE korisnik SET Datum_do='$dateTodayNextMonth' WHERE Korisnicko_ime='$username'");
    }
    
    /*MIHAJLO KRPOVIC
     * funkcija dodeljuje status Obican korisniku cije je korisnicko ime zadato kao parametar fje username
     * kao rezultat funkcije korisnik koji je bio tip Vip dobija tip Obican i postvljaju se vrednosti polja datumOd i datumDo 
     * datumOd i datumDo se postavlja na sve 0
     */
    public static function takeVip($username, $newType){
        $dateNew=date('Y-m-d', strtotime('0000-00-00'));
        $connection= Database::getInstance();
        $connection->query("UPDATE korisnik SET Tip='$newType' WHERE Korisnicko_ime='$username'");
        $connection->query("UPDATE korisnik SET Datum_od='$dateNew' WHERE Korisnicko_ime='$username'");
        $connection->query("UPDATE korisnik SET Datum_do='$dateNew' WHERE Korisnicko_ime='$username'");
    }
    
    /*MIHAJLO KRPOVIC
     * funkcija brise iz sistema korisnika cije je korisnicko ime zadato kao parametar funkcije
     * kao rezultat uklanja se red iz tabele korisnik gde je Korisnicko_ime jednako username
     * pored toga uklanjaju se i svi redovi iz svih tabela gde postoji red u kom polje idKorisnik ima istu vrednost
     */
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
    
    /*STEFAN PEJOVIC
     * funckija proverava da li je korisnicko ime i email jedinstveno
     * ukoliko u bazi postoji korisnik ciji je username=$username ili email=$email vraca true 
     * u suprotnom vraca false
     */
    public static function check($username, $email){
        // ako vrati true onda ima vec neko
        $conn= Database::getInstance();  
        $upit=$conn->prepare("SELECT * FROM korisnik WHERE Korisnicko_ime = ?"
                . "OR Email = ? ");
        $values = array($username, $email);
        $upit->execute($values);
        $result=$upit->fetchAll();
        
        //echo count($result);
        if (count($result)>0){
            
            return true;
        }        
            return false;                                
    }
    
    /*STEFAN PEJOVIC
     * funkcija dodaje novog korisnika u sistem, 
     * kao rezultat u tabeli korisnik se pojavljuje novi red cija polja imaju vrednosti kao parametri funckije
     * ukoliko se za tip izabere VIP polja datumOd i datumDo dobijaju vrednosti danasnji datum i danasanji datum sledeci mesec tim redom
     * u suoprotnom vrednosyi ovih polja su 0000-00-00
     */
    public static function signIn($firstname, $lastname, $email, $phone, $username, $password, $tip){                
        $conn= Database::getInstance();
        if($tip=="Obican" || $tip=="Admin"){
        $dateStart=date('Y-m-d', strtotime('0000-00-00'));
        $dateEnd=date('Y-m-d', strtotime('0000-00-00'));
        }
        else{
            $dateStart=date("Y-m-d");
            $dateEnd=date('Y-m-d', strtotime('+1 month'));
        }
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
    
    /*STEFAN PEJOVIC, MIHAJLO KRPOVIC
     * funkcija dohvata username korisnika koji je postavio oglas ciji je id jednak idOglas
     */
    public static function dohvatiUsername($idOglas){
        $conn= Database::getInstance();
        $result=$conn->query("SELECT * FROM oglas o, korisnik k WHERE o.idKorisnik=k.idKorisnik AND idOglas='$idOglas' ");
        $result=$result->fetchAll();
        $ime="";
        foreach ($result as $rez){
            $ime=$rez['Korisnicko_ime'];
        }
        return $ime;
        
    }
    
    /*STEFAN PEJOVIC, MIHAJLO KRPOVIC
     * funkcija dohvata Telefon korisnika koji je postavio oglas ciji je id jednak idOglas
     */
    public static function dohvatiTelefon($idOglas){
        $conn= Database::getInstance();
        $result=$conn->query("SELECT Telefon FROM oglas o, korisnik k  WHERE o.idKorisnik=k.idKorisnik AND idOglas='$idOglas' ");
        foreach ($result as $rez){
            $ime=$rez['Telefon'];
        }
        return $ime;
    }
    
    

}



