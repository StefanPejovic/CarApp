<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' type='text/css' href='./views/RecenzijeObican/fajlovi/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' href='./views/RecenzijeObican/recenzija.css'>

    <script src='./views/RecenzijeObican/fajlovi/bootstrap.min.js'></script>

</head>
<body style="background-color: lightgray;">
    <form name="pretraga" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?controller=user&action=postaviKom">
      
      
      <input type="hidden" name="idOglasa" value="<?php echo $oglas->idO;  ?>"/>
  <div class='container+fluid'>
            <div class='row prvi_red'>
                <div class='col-sm-12'>
                    <nav class='navbar navbar-expand-sm lightgraybg'>
                        <a class='navbar-brand' href='#'>
                            <img src='./views/RecenzijeObican/slike/logo.png' id="logo">
                        </a>


                        <div id="postaviOglas">
                            <a href="?controller=user&action=adAdShow" style="color:white; text-decoration: none">
                                <h4>Postavi Oglas</h4>    
                            </a>
                            
                        </div>
                        <div id="postaniVIP">
                            <a href="?controller=user&action=beVipShow" style="color:white; text-decoration: none">
                                <h4>Postani VIP</h4>    
                            </a>
                            
                            
                        </div>
                        <div id="odjaviSe">
                            <a href="?controller=user&action=logout" style="color:white; text-decoration: none">
                                <h4>Odjavi se</h4>    
                            </a>
                        </div>



                        <table id="prva_tabela">
                            <tr>
                                <td><img src="./views/RecenzijeObican/slike/ikon.PNG" alt=""></td>
                                <td><input type="text" value="<?php echo $_SESSION['user']->username?>"></td>
                            </tr> 
                            <tr>
                                <td id="td4" colspan="2">
                                    <a href="?controller=user&action=index"><img src="./views/Recenzije/slike/nazz.PNG" style="height:40px; width:100px;" alt="naz"></a>
                                </td>
                            </tr>
                        </table>    
                    </nav>

                </div>

            </div>
            <div class='row'>  
                <div class='col-sm-10 drugi_red'>
                    <h2>&nbsp &nbsp Rezultati Pretrage</h2>
                            
                        <div class="unutra">
                            <table id="drugatb">
                                <tr>
                                    <th>
                                        <span id="labelaZaImeOglasa" class="label_other_1"><?php echo $oglas->marka." ".$oglas->model; ?></span>
                                    </th>
                                </tr>
                                <tr>                                    
                                    <td id="td1">
                                        <img src="./views/RecenzijeObican/slike/kuga.PNG" style="height: 180px; width: 290px;" alt="slika">
                                    </td>
                                    <td id="td2">
                                       <ul style="list-style-type:none;">
                                           <li>
                                               <label class="label_other"><u><?php echo $oglas->godiste." "."god"; ?></u></label>
                                           </li>
                                           <li>
                                               <label class="label_other"><u><?php echo $oglas->kilometraza." "."km"; ?></u></label>
                                           </li>
                                           <li>
                                                <label class="label_other"><u><?php echo $oglas->snaga." "."ks"; ?></u></label>
                                            </li>
                                            <li> 
                                                <label class="label_other"><u><?php echo $oglas->menjac; ?></u></label>
                                            </li>
                                            <li>
                                                <label class="label_other"><u><?php echo $oglas->gorivo; ?></u></label>
                                            </li>
                                            <li>
                                                <label class="label_other"><u><?php echo $oglas->mesto; ?></u><hr></hr></label>
                                            </li>
                                       </ul>
                                    </td>
                                    <td>
                                        <ul style="list-style-type:none;">
                                            <li>
                                                <button name="button_cena" type="button" class="btn btn-primary" style="height: 50px; width: 100px;"> &nbsp 5556$ &nbsp<span class="badge"></span></button>
                                            </li>

                                            <li><button name="button_pogledaj_vise" style="  background-color: #00ced1; color: white; height: 50px; width: 170px" id="dugme"><b><h4>Pogledaj više</h4></b></button></li>
                                        </ul>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <table class="tabelaKomentari">
                            <tr>
                                <td id="jao"> <label for=""></label> <b>Neko</b> </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td id="hue"><img src="./views/Recenzije/slike/au.PNG" style="width: 100px; height: 80px" alt=""></td>
                                <td>
                                </td>
                                <td>
                               
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
                                <td></td>
                                <td>
                                    <textarea name="komentar" style="background-color: white; color: black; height: 100px; width: 350px" disableds name="" id="" cols="30" rows="10"></textarea>
                                 </td>
                                <td>
                                    <div name="oc" class="rate">
                                        <p>Ocena</p>    
                                        <select name="ocena">
                                            <option name="1">1</option>  
                                            <option name="2">2</option>  
                                            <option name="3">3</option> 
                                            <option name="4">4</option>
                                        </select>   
                                      </div>
                                </td>
                            </tr>
                     
   
                        
                     
                         
                       <!--     <tr>
                                <td colspan="3" id="donja">
                                    <button type="submit" style=" color:  white; background-color: #a7a7a7; height: 50px; width: 150px"> <b>Postavi Recenziju </b></button>
                                </td>
                            </tr> -->
                        </table>
                    <table class="donjaTabelica">
                         <tr>
                                <td colspan="3" id="donja">
                                    <button type="submit" style=" color:  white; background-color: #a7a7a7; height: 50px; width: 150px"> <b>Postavi Recenziju </b></button>
                                </td>
                            </tr>
                                                   <?php 
    $idOglasa=$oglas->idO;
    $nizRecenzija= Recenzija::dohvatiSveKomentare($idOglasa);
    foreach((array)$nizRecenzija as $recenzija){
            
        
           
        
            echo "<tr>"
                     
                    . "<td colspan='3'>"
                    ."<textarea  style='margin-left:200px; background-color:gray; color:white; height:100px; width:350px; "
                    . " cols:30; rows:10;'>".$recenzija->Sadrzaj."</textarea>"
                    . "</td>"
                     ."<td>Ocena: ".$recenzija->Ocena."</td>"
                    . "</tr>";
        
          
    }
    
  ?>
                    </table>
                </div>
                    
                
                <div class="col-sm-2 third" style="background-color: lightgray;">
                    <a href="?controller=user&action=myAd"><button  class="blue_dugme" name="moji_oglasi"><b>Moji Oglasi</b> </button></a>
                    <a href="?controller=user&action=savedAd"><button  class="blue_dugme" name="moji_oglasi"><b>Sacuvani Oglasi</b></button></a>
                    
                </div>     
                
            </div>
        </div>
    


  
                
  
        

    

</form>
    
</body>
</html>