
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' type='text/css' href='./views/PostaviOglasVip/fajlovi/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' href='./views/PostaviOglasVip/postaviOglasVip.css'>

    <script src='./views/PostaviOglasVip/fajlovi/bootstrap.min.js'></script>

</head>
<body style="background-color: lightgray;">
    <form name="postavi" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?controller=vip&action=adAd">
      
      
  <div class='container+fluid'>
            <div class='row prvi_red'>
                <div class='col-sm-12'>
                    <nav class='navbar navbar-expand-sm lightgraybg'>
                        <a class='navbar-brand' href='#'>
                            <img src='./views/PostaviOglasVip/slike/logo.png' id="logo">
                        </a>


                        <div id="postaviOglas">
                            
                        </div>
                        <div id="postaniVIP">
                          
                        </div>
                        <div id="odjaviSe">
                           
                        </div>



                        <table id="prva_tabela">
                            <tr>
                                <td><img src="./views/PostaviOglasVip/slike/ikon.PNG" alt=""></td>
                                <td><input type="text" value="<?php echo $_SESSION['user']->username ?>"></td>
                            </tr>
                            <tr>
                                <td id="td4" colspan="2">
                                    <a href="?controller=vip&action=index"><img src="./views/PostaviOglasVip/slike/nazz.PNG" style="height:40px; width:100px;" alt="naz"></a>
                                </td>
                            </tr>
                        </table>    
                    </nav>

                </div>

            </div>
            <div class='row'>  
                <div class='col-sm-10 drugi_red'>
                    
                    <h2> &nbsp;Postavi oglas</h2>
                    <div class="row blank">                 
                    <table>
                        <tr>
                            <td colspan="4">
                                <font color='red'><?php if(isset($message)) echo $message; ?></font>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <font color='white'><?php if(isset($messageCorrect)) echo $messageCorrect; ?></font>
                            </td>
                        </tr>
                        <tr>
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
                                <input name="fiksna" class="chek" type="checkbox" value="1"/> Cena je fiksna
                            </td>
                            <td>
                                <input name="garancija" class="chek" type="checkbox" value="1"/> Garancija
                            </td>
                        </tr>
                        <tr>
                            <td class="skip">

                            </td>
                        </tr>
                        <tr>
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
                            <td>
                                
                            </td>
                            <td>
                                <input  name="zamena" class="chek" type="checkbox" value="1"> Zamena
                            </td>
                        </tr>
                        <tr>
                            <td class="skip">

                            </td>
                        </tr>
                        <tr id="red_selekcija">
                            <td>
                                <select name="godiste" class="godiste" id="godiste" style="height: 40px; width: 150px">
                                    <option value="">Godiste</option>
                                    <option value="1980">1980</option>
                                    <option value="1981">1981</option>
                                    <option value="1982">1982</option>
                                    <option value="1983">1983</option>
                                    <option value="1984">1984</option>
                                    <option value="1985">1985</option>
                                    <option value="1986">1986</option>
                                    <option value="1987">1987</option>
                                    <option value="1988">1988</option>
                                    <option value="1989">1989</option>
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
                                <input style="height: 38px;" class="mesto" name="mesto" type="text" placeholder="Mesto">
                            </td>
                        </tr>
                        <tr>
                            <td class="skip">

                            </td>
                        </tr>
                        <tr>
                        </tr>
                        <tr>
                            <td class="skip">

                            </td>
                        </tr>
                        <tr>
                            <td class="skip">

                            </td>
                        </tr>

                    </table>

                    <div id="ovaj">
                            <input style="height: 38px;" name="cena" type="text" placeholder="Cena  (€)" class="rajt">
                            <input style="height: 38px;" name="kilometraza" type="text" placeholder="Kilometraza" class="rajt_d">
                            <label for="Oprema"><b><h3>Oprema</h3></b></label>

                    </div>

                    <table>
                        <tr>
                            <td>
                                <input style="height: 38px;" name="gorivo" type="text" placeholder="Gorivo">
                            </td>
                            <td>
                                <input name="panorama" class="chek" type="checkbox" value="1"> Panorama &nbsp &nbsp &nbsp
                                <input name="elpodizaci"  class="chek" type="checkbox" value="1"> El. podizaci &nbsp &nbsp &nbsp
                                
                            </td>
                        </tr>
                        <tr>
                            <td class="skip">

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <select name="menjac" class="menjac" id="menjac" style="height: 40px; width: 150px">
                                    <option value="">Menjac</option>
                                    <option value="Automatski">Automatik</option>
                                    <option value="Manuelni">Manuelac</option>
                                </select>
                            </td>
                            <td>
                                <input name="alufelne" class="chek" type="checkbox" value="1"> Alu. felne &nbsp &nbsp &nbsp
                                <input name="xenon" class="chek" type="checkbox" value="1"> Xenon &nbsp &nbsp &nbsp
                                <input name="ledfarovi" class="chek" type="checkbox" value="1"> Led farovi
                            </td>
                        </tr>
                        <tr>
                            <td class="skip">

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input style="height: 38px;" name="snaga" type="text" placeholder="Snaga u KS" id="novirajt">
                            </td>
                            <td>
                                <input name="tempomat" class="chek" type="checkbox" value="1"> Tempomat &nbsp &nbsp &nbsp
                                <input name="navigacija" class="chek" type="checkbox" value="1"> Navigacija &nbsp &nbsp &nbsp
                                <input name="rate" class="chek" type="checkbox" value="1"> Rate
                            </td>
                        </tr>

                        <tr>
                            <td>
                                
                            </td>
                            <td>
                                <input name="vazdvesanje"class="chek" type="checkbox" value="1">Vazd vesanje &nbsp &nbsp &nbsp
                                <input name="multifunvolan" class="chek" type="checkbox" value="1">Multifun. volan &nbsp &nbsp &nbsp
                                
                            </td>
                        </tr>

                        <tr id="aparat">
                            <td>
                                <a href="">
                                    <img src="./views/PostaviOglasVip/slike/upldimage.PNG" alt="Slika">
                                </a>

                                
                            </td>
                            <td colspan="2">
                                <textarea name="opis" style="width: 400px; height:150px;" >
                                </textarea>
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
                        <tr id="cent">
                            <td style="text-align: center;" colspan="4">
                                <button type="submit" style="text-align: center; height: 30px; width: 120px;">
                                    Postavi oglas
                                </button>
                            </td>
                        </tr>

                    </table>


                    </div>

                </div> 
                
            </div>
        </div>
</form>   
    
</body>
</html>