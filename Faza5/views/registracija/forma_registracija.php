<!--kod pisao Stefan Pejovic-->
<form name="pretraga" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      
      <input type="hidden" name="controller" value="registracija"/>
      <input type="hidden" name="akcija" value="registrujSe"/>
      
    Ime:
    <input type="text" name="ime"/><br/>
   
    Prezime:
    <input type="text" name="prezime"/><br/>
    
    Korisnicko ime:
    <input type="text" name="user"/><br/>
 
    Lozinka:
    <input type="password" name="lozinka"/><br/>
    
    Potvrda:
    <input type="password" name="potvrda"/><br/>
  
    Email:
    <input type="text" name="email"/><br/>
    
    Telefon:
    <input type="text" name="telefon"/><br/>
    
    Tip:
    <select name="tip">
        <option value="0">Izaberite tip</option>
        <option value="1">Admin</option>
        <option value="2">Vip korisnik</option>
        <option value="3">Obican korisnik</option>
    </select>
    
    <input type="submit" name="pretraga" value="Registruj se"/>
    
</form>    
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

