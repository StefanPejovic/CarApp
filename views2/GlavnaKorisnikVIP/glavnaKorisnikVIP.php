<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' type='text/css' href='./views/GlavnaKorisnikVip/fajlovi/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' href='./views/GlavnaKorisnikVip/glavnaKorisnikVIP.css'>

    <script src='./views/GlavnaKorisnikVip/fajlovi/bootstrap.min.js'></script>

</head>
<body style="background-color: lightgray;">
    <div class='container+fluid'>
              <div class='row prvi_red'>
                  <div class='col-sm-12'>
                      <nav class='navbar navbar-expand-sm lightgraybg'>
                          <a class='navbar-brand' href='#'>
                              <img src='./views/GlavnaKorisnikVip/slike/logo.png' id="logo">
                          </a>
  
  
                          <div id="postaviOglas">
                              <a href="?controller=vip&action=adAdShow" style="color:white; text-decoration: none">
                                <h4>Postavi oglas</h4>
                            </a>  
                          </div>
                          <div id="postaniVIP">
                              
                          </div>
                          <div id="odjaviSe">
                            <a href="?controller=vip&action=logout">
                                <h4>Odjavi se</h4>
                            </a>  
                          </div>
  
  
  
                          <table id="prva_tabela">
                              <tr>
                                  <td><img src="./views/GlavnaKorisnikVip/slike/ikon.PNG" alt=""></td>
                                  <td><input type="text" value="<?php echo $_SESSION['user']->username ?>"></td>
                              </tr>
                              <tr>
                                  <td id="td4" colspan="2">
                                      <a href="?controller=vip&action=index"><img src="./views/GlavnaKorisnikVip/slike/nazz.PNG" style="height:40px; width:100px;" alt="naz"></a>
                                  </td>
                              </tr>
                          </table>    
                      </nav>
  
                  </div>
  
              </div>
              <div class='row'>  
                  <div class='col-sm-10 drugi_red'>
                    <br>
                    <div id="pretrazi"><h2>Pretrazi vozilo</h2></div>
                    <div class="row blank">                 
<form name="pretraga" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?controller=vip&action=searchAd">
                        <table>
                            <tr id="red_selekcija">
                                <td>
                                <select name="marka" id="marka" style="height: 40px; width: 250px">
                                    <option value="">Marka automobila</option>
                                    <option value="Mercedes-Benz">Mercedes-Benz</option>
                                    <option value="BMW">BMW</option>
                                    <option value="Renault">Renault</option>
                                    <option value="Porsche">Porsche</option>
                                    <option value="Lada">Lada</option>
                                    <option value="Tesla">Tesla</option>
                                    <option value="Opel">Opel</option>
                                    <option value="Mazda">Mazda</option>
                                    <option value="Mitsubishi">Mitsubishi</option>
                                    <option value="Chevrolet">Chevrolet</option>
                                    <option value="Fiat">Fiat</option>
                                    <option value="Skoda">Skoda</option>
                                    <option value="Ford">Ford</option>
                                    <option value="Toyota">Toyota</option>
                                    <option value="Hyundai">Hyundai</option>
                                    <option value="Honda">Honda</option>
                                    <option value="Volvo">Volvo</option>
                                    <option value="VW">VW</option>
                                    <option value="Subaru">Subaru</option>
                                    <option value="Lexus">Lexus</option>
                                </select>
                                </td>
                                <td>
                                <select name="model" id="model" style="height: 40px; width: 250px">
                                    <option value="">Model automobila</option>
                                    <option value="Golf 1">Golf 1</option>
                                    <option value="Golf 2">Golf 2</option>
                                    <option value="Golf 3">Golf 3</option>
                                    <option value="Golf 4">Golf 4</option>
                                    <option value="Golf 5">Golf 5</option>
                                    <option value="Golf 6">Golf 6</option>
                                    <option value="Golf 7">Golf 7</option>
                                    <option value="Golf 8">Golf 8</option>
                                    <option value="Passat B6">Passat B6</option>
                                    <option value="Passat B7">Passat B7</option>
                                    <option value="Passat B8">Passat B8</option>
                                    <option value="Superb">Superb</option>
                                    <option value="Kodiaq">Kodiaq</option>
                                    <option value="XC40">XC40</option>
                                    <option value="XC60">XC60</option>
                                    <option value="XC90">XC90</option>
                                    <option value="A klasa">A klasa</option>
                                    <option value="B klasa">B klasa</option>
                                    <option value="C klasa">C klasa</option>
                                    <option value="E klasa">E klasa</option>
                                    <option value="S klasa">S klasa</option>
                                    <option value="GLE">GLE</option>
                                    <option value="GLS">GLS</option>
                                    <option value="GLK">GLK</option>
                                    <option value="GLC">GLC</option>
                                    <option value="CIVIC">CIVIC</option>
                                    <option value="Scenic">Scenic</option>
                                    <option value="Espace">Espace</option>
                                     <option value="306">306</option>
                                    <option value="307">307</option>
                                    <option value="308">308</option>
                                    <option value="406">406</option>
                                    <option value="407">407</option>
                                    <option value="408">408</option>
                                    <option value="507">507</option>
                                    <option value="508">508</option> 
                                    <option value="5008">5008</option>
                                    <option value="C1">C1</option>
                                    <option value="C2">C2</option>
                                    <option value="C3">C3</option>
                                    <option value="C4">C4</option>
                                    <option value="C5">C5</option>
                                    <option value="C6">C6</option>
                                    <option value="C7">C7</option>
                                </select>
                                </td>
                            </tr>
                            <tr id="red_selekcija">
                                <td>
                                <select name="godiste_od" id="godiste_od" style="height: 40px; width: 150px">
                                    <option value="">Godiste od</option>
                                    <option value="1990">1990</option>
                                    <option value="1991">1991</option>
                                    <option value="1992">1992</option>
                                    <option value="1993">1993</option>
                                    <option value="1994">1994</option>
                                    <option value="1995">1995</option>
                                    <option value="1996">1996</option>
                                    <option value="1997">1997</option>
                                    <option value="1998">1998</option>
                                    <option value="1999">1999</option>
                                    <option value="2000">2000</option>
                                    <option value="2001">2001</option>
                                    <option value="2002">2002</option>
                                    <option value="2003">2003</option>
                                    <option value="2004">2004</option>
                                    <option value="2005">2005</option>
                                    <option value="2006">2006</option>
                                    <option value="2007">2007</option>
                                    <option value="2008">2008</option>
                                    <option value="2009">2009</option>
                                    <option value="2010">2010</option>
                                    <option value="2011">2011</option>
                                    <option value="2012">2012</option>
                                    <option value="2013">2013</option>
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                </select>
                                </td>
                                <td>
                                <select name="godiste_do" id="godiste_do" style="height: 40px; width: 150px">
                                    <option value="">Godiste do</option>
                                        
                                         <option value="1990">1990</option>
                                    <option value="1991">1991</option>
                                    <option value="1992">1992</option>
                                    <option value="1993">1993</option>
                                    <option value="1994">1994</option>
                                    <option value="1995">1995</option>
                                    <option value="1996">1996</option>
                                    <option value="1997">1997</option>
                                    <option value="1998">1998</option>
                                    <option value="1999">1999</option>
                                    <option value="2000">2000</option>
                                    <option value="2001">2001</option>
                                    <option value="2002">2002</option>
                                    <option value="2003">2003</option>
                                    <option value="2004">2004</option>
                                    <option value="2005">2005</option>
                                    <option value="2006">2006</option>
                                    <option value="2007">2007</option>
                                    <option value="2008">2008</option>
                                    <option value="2009">2009</option>
                                    <option value="2010">2010</option>
                                    <option value="2011">2011</option>
                                    <option value="2012">2012</option>
                                    <option value="2013">2013</option>
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                </select>
                                </td>
                            </tr>
                            <tr id="red_selekcija">
                                <td>
                                    <input name="cena_od" type="text" placeholder="Cena od(€)" id="leva_cena">
                                </td>
                                <td>
                                    <input name="cena_do" type="text" placeholder="Cena do (€)" id="desna_cena">
                                </td>
                            </tr>
                            <tr>
                                <td class="skip">

                                </td>
                            </tr>
                            <tr>
                                <td class="skip">

                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <input type="checkbox" name="garancija" value="1">
                                   Garancija &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp

                                    <input type="checkbox" name="rate" value="1">
                                    Rate
                                </td>
                            </tr>
                            <tr>
                                <td class="skip">

                                </td>
                            </tr>
                            <tr>
                                <td class="skip">

                                </td>
                            </tr>
                            <tr>
                                <td class="skip">

                                </td>
                            </tr>
                            <tr>
                                <td class="skip">

                                </td>
                            </tr>
                            <tr>
                                <td class="skip">

                                </td>
                            </tr>
                            <tr>
                                <td class="skip">

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">
                                    <button name="button_trazi" type="submit" style="text-align: center; height: 70px; width: 170px" class="button_trazi">
                                        <a href="?controller=vip&action=searchAd" style="text-decoration: none"><h3>Trazi</h3></a>
                                    </button>
                                </td>
                            </tr>
                        </table>
    </form>
                    </div>

                </div>  
                <div class="col-sm-2 third" style="background-color: lightgray;">
                    <a href="?controller=vip&action=myAd"><button  class="blue_dugme" name="moji_oglasi"><b>Moji Oglasi</b> </button></a>
                    <a href="?controller=vip&action=savedAd"><button  class="blue_dugme" name="moji_oglasi"><b>Sacuvani Oglasi</b></button></a>
                    <a href="?controller=vip&action=oznaceniAd"><button  class="blue_dugme" name="moji_oglasi"><b>Oznaceni VIP Oglasi</b></button></a>
                </div>  
                
            </div>


        </div>
    

</body>
</html>