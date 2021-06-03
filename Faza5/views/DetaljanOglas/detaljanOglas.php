<!DOCTYPE html>
<!--kod pisao Stefan Pejovic-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' type='text/css' href='./views/DetaljanOglas/fajlovi/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' href='./views/DetaljanOglas/detaljanOglas.css'>

    <script src='fajlovi/bootstrap.min.js'></script>

</head>
<body style="background-color: lightgray;">
  <div class='container+fluid'>
            <div class='row prvi_red'>
                <div class='col-sm-12'>
                    <nav class='navbar navbar-expand-sm lightgraybg'>
                        <a class='navbar-brand' href='#'>
                            <img src='./views/DetaljanOglas/slike/logo.png' id="logo">
                        </a>


                        <div id="postaviOglas">
                        <a href="../11. PostaviOglas/postaviOglas.html">
                            <h4>Postavi Oglas</h4>
                        </a>
                        </div>
                        <div id="postaniVIP">
                            <a href="">
                                <h4>Postani VIP</h4>
                            </a>
                        </div>
                        <div id="odjaviSe">
                            <a href="">
                                <h4>Odjavi se</h3>
                            </a>
                        </div>



                        <table id="prva_tabela">
                            <tr>
                                <td><img src="./views/DetaljanOglas/slike/ikon.PNG" alt=""></td>
                                <td> <input type="text" placeholder="Username"></td>
                            </tr>
                            <tr>
                                <td id="td4" colspan="2">
                                    <img src="./views/DetaljanOglas/slike/nazz.PNG" style="height:40px; width:100px;" alt="naz">
                                </td>
                            </tr>
                        </table>    
                    </nav>

                </div>

            </div>
            <div class='row'>  
                <div class='col-sm-10 drugi_red'>
                    <div class="row blank">
                        <table id="drugatb">
                            <tr>
                                <th>
                                    <span class="label_other_1"><?php echo $oglas->marka." ".$oglas->model     ?></span>
                                </th>
                            </tr>
                            <tr>                                    
                                <td id="td1">
                                    <img src="./views/DetaljanOglas/slike/kuga.PNG" style="height: 180px; width: 290px;" alt="slika">
                                </td>
                                <td id="td2">
                                    <ul style="list-style-type:none;">
                                        <li>
                                            <label class="label_other"><u><?php echo $oglas->godiste." "."god"     ?></u></label>
                                        </li>
                                        <li>
                                             <label class="label_other"><u><?php echo $oglas->kilometraza." "."km"   ?></u></label>
                                        </li>
                                        <li>
                                             <label class="label_other"><u><?php echo $oglas->snaga. " "."ks"     ?></u></label>
                                         </li>
                                         <li>
                                             <label class="label_other"><u><?php echo $oglas->menjac    ?></u></label>
                                         </li>
                                         <li>
                                             <label class="label_other"><u><?php echo $oglas->gorivo     ?></u></label>
                                         </li>
                                         <li>
                                             <label class="label_other"><u><?php echo $oglas->mesto     ?></u></label>
                                         </li>
                                    </ul>
                                </td>
                                <td>
                                    <ul style="list-style-type:none;">
                                        <li>
                                            <button type="button" class="btn btn-primary"> &nbsp <?php echo $oglas->cena." "." € " ?> &nbsp<span class="badge"></span></button>
                                        </li>
                                        
                                        <li>
                                            <input name="zamena" id="zamena" type="checkbox" <?php if ($oglas->zamena == "1" ) echo "checked"   ?>> Zamena
                                        </li>

                                        <li>
                                            <input type="checkbox" <?php if ($oglas->rate == "1" ) echo "checked"   ?>  > Rate
                                        </li>
                                       
                                    </ul>
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
                                   <h3>Dodatna Oprema</h3>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox"> Panorama &nbsp &nbsp &nbsp
                                </td>
                                <td rowspan="6" colspan="2">
                                    <textarea disabled name="ime" id="area" cols="30" rows="10" style="height: 250px; width: 500px;"> <?php echo $oglas->opis ?>
                                    </textarea>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" <?php if ($oglas->alufelne == "1" ) echo "checked"   ?>> Alu. felne &nbsp &nbsp &nbsp</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" <?php if ($oglas->tempomat == "1" ) echo "checked"   ?>> Tempomat &nbsp &nbsp &nbsp</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" <?php if ($oglas->elpodizaci == "1" ) echo "checked"   ?>  > El. Podizaci &nbsp &nbsp &nbsp</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"  <?php if ($oglas->xenon == "1" ) echo "checked"   ?>> Xenon &nbsp &nbsp &nbsp</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" <?php if ($oglas->multifunvolan == "1" ) echo "checked"   ?>> Multifun. volan &nbsp &nbsp &nbsp</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" <?php if ($oglas->navigacija == "1" ) echo "checked"   ?>> Navigacija &nbsp &nbsp &nbsp</td>
                                <td><h4> Korisnik - fordic95  </h4> </td>
                                <td><h4> Kontakt - 064 444 3332 </h4></td>
                            </tr>
                            <tr>
                                <td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</td>
                                <td><h3>Prosecna Ocena: </h3> </td>
                                <td>
                                    <div class="rate">
                                        <input type="radio" id="star5" name="rate" value="5" />
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" />
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" />
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" />
                                        <label for="star1" title="text">1 star</label>
                                      </div>
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
                                <td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </td>
                                <td >
                                    <form name="pretraga" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      
                                    <input type="hidden" name="controller" value="oglas"/>
                                    <input type="hidden" name="akcija" value="postaviKomPre"/>
                                    <input type ="hidden" name="idOglasa" value="<?php echo $oglas->idOglasa ?>"/>
                                    <button name="recenzije" type="submit" id="recenzije" style="height: 60px; width: 150px; background-color: orange; color: white;"> <h2>Recenzije</h2></button>
                                </td>
                            </tr>
                        </table>

                    </div>

                </div>
                    
                
                <div class="col-sm-2 third" style="background-color: lightgray;">
                    <button  class="blue_dugme" name="moji_oglasi"><b>Moji Oglasi</b> </button>
                    <button  class="blue_dugme" name="moji_oglasi"><b>Sacuvani Oglasi</b></button>
                    <button  class="blue_dugme" name="moji_oglasi"><b>Oznaceni VIP Oglasi</b></button>
                </div>    
                
            </div>
        </div>
    </div>


  
                
  
        

    

        
    
</body>
</html>