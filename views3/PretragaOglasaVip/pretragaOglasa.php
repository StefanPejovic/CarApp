<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' type='text/css' href='./views/PretragaOglasaVip/fajlovi/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' href='./views/PretragaOglasaVip/pretragaOglasa.css'>

    <script src='./views/PretragaOglasaVip/fajlovi/bootstrap.min.js'></script>

</head>
<body style="background-color: lightgray;">
    <div class='container+fluid'>
              <div class='row prvi_red'>
                <div class='col-sm-12'>
                    <nav class='navbar navbar-expand-sm lightgraybg'>
                        <a class='navbar-brand' href='#'>
                            <img src='./views/PretragaOglasaVip/slike/logo.png' id="logo">
                        </a>


                        <div id="postaviOglas">
                            <a href="?controller=vip&action=adAdShow" style="color: white; text-decoration: none"><h4>Postavi oglas</h4></a>
                        </div>
                        <div id="postaniVIP">
                           
                        </div>
                        <div id="odjaviSe">
                            <a href="?controller=vip&action=logout" style="color: white; text-decoration: none"><h4>Odjavi se</h4></a>
                        </div>



                        <table id="prva_tabela">
                            <tr>
                                <td><img src="./views/PretragaOglasaVip/slike/ikon.PNG" alt=""></td>
                                <td><input type="text" value="<?php echo $_SESSION['user']->username ?>"></td>
                            </tr>
                            <tr>
                                <td id="td4" colspan="2">
                                    <a href="?controller=vip&action=index"><img src="./views/GlavnaGost/slike/nazz.PNG" style="height:40px; width:100px;" alt="naz"></a>
                                </td>
                            </tr>
                        </table>    
                    </nav>

                </div>

            </div>
              
              <div class='row'>  
                  <div class='col-sm-10 drugi_red' style="height: 100%">
                      <br>
                      <h2>&nbsp; &nbsp; &nbsp; Prikaz pretrage</h2>
                  
                      <div style=" background-color:#4863a0; border:1px solid black; width:80%; ">

 

                      
                      
                      
                      
                          <br>                 
<?php foreach ($nizOglasi as $oglas) : ?>
 <table class="drugatb" style=" border:1px solid black; background-color:lightgray; margin-left:5%; width: 70%">               
                    

 


<tr>
<th> 

 


    <span class="label_other_1"><?php echo $oglas->marka.' '.$oglas->model; ?></span>
</th>
</tr>
<tr>
<td class="td1">
<img src="./views/PretragaOglasaVip/slike/Logo.png" style="height: 180px; width: 290px;" alt="slika">
</td>
<td class="td2">
<ul style="list-style-type:none;">
<li>
<label class="label_other"><?php echo $oglas->godiste.'.' ?></label><hr/>
</li>
<li>
<label class="label_other"><?php echo $oglas->kilometraza.'km'?></label><hr/>
</li>
<li>
<label class="label_other"><?php echo $oglas->snaga.'ks'?></label><hr/>
</li>
<li>
<label class="label_other"><?php echo $oglas->menjac?></label><hr/>
</li>
<li>
<label class="label_other"><?php echo $oglas->gorivo?></label><hr/>
</li>
<li>
<label class="label_other"><?php echo $oglas->mesto?></label>
</li>
</ul>
</td>
<td>
    
    
   
    
<ul style="list-style-type:none;">
<li>
<button name="button_cena" type="button" style=" border:0px; height: 50px; width: 170px; background-color: #4863a0;" class="btn btn-primary"><?php echo $oglas->cena.'???'?><span class="badge"></span></button><br/><br/>
</li>
<li><form name="saveform" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?controller=vip&action=saveAd">
         <input type="hidden" name="idOglasaZaCuvanje" value="<?php echo $oglas->idO; ?>"/>      
    
    <input type="submit" value="Sacuvaj" name="submit_sacuvaj" style=" background-color: #00ced1; color: white; height: 50px; width: 170px" id="sacuvaj'.$oglas->idO.'"></form>
</li><br/>  

 

<li>
    <form name="prikaziform" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?controller=vip&action=fullAd">
            
        <input type="hidden" name="idOglasaZaPrikaz" value="<?php echo $oglas->idO; ?>"/>     
         <button type="submit" name="button_pogledaj_vise" style=" background-color: #00ced1; color: white; height: 50px; width: 170px" id="vise'.$oglas->idO.'"><b>Pogledaj vi??e</b></button></form></li>
</ul>
     <!--</form>-->
</td>
</tr>
</table><br/>';

 


<?php endforeach;?>

                  </div>
  
                  </div>
                      
                  <div class="col-sm-2 third" style="background-color: lightgray;">
                    <a href="?controller=vip&action=myAd"><button  class="blue_dugme" name="moji_oglasi"><b>Moji oglasi</b> </button></a>
                    <a href="?controller=vip&action=savedAd"><button  class="blue_dugme" name="moji_oglasi"><b>Sacuvani oglasi</b></button></a>
                    <a href="?controller=vip&action=oznaceniAd"><button  class="blue_dugme" name="moji_oglasi"><b>Oznaceni oglasi</b></button></a>
                   
                </div>     
                  
              </div>
          </div>
      
  
  
    
                  
    
          
  
      
  
          
      
  </body>
  </html>