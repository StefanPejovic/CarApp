<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' type='text/css' href='./views/PostaniVIP/fajlovi/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' href='./views/PostaniVIP/postaniVIP.css'>

    <script src='fajlovi/bootstrap.min.js'></script>

</head>
<body style="background-color: lightgray;">
     <form name="pretraga" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      
  <div class='container+fluid'>
      
            <div class='row prvi_red'>
                <div class='col-sm-12'>
                    <nav class='navbar navbar-expand-sm lightgraybg'>
                        <a class='navbar-brand' href='#'>
                            <img src='./views/PostaniVIP/slike/logo.png' id="logo">
                        </a>


                        <div id="postaviOglas">
                            <a href="../11. PostaviOglas/postaviOglas.html">
                                <h4>Postavi oglas</h4>
                            </a>
                            
                        </div>
          
                        <div id="odjaviSe">
                            <a href="">
                                <h4>Odjavi se</h4>
                            </a>
                            
                        </div>



                        <table id="prva_tabela">
                            <tr>
                                <td><img src="./views/PostaniVIP/slike/ikon.PNG" alt=""></td>
                                <td><input type="text" placeholder="Username"></td>
                            </tr>
                            <tr>
                                <td id="td4" colspan="2">
                                    <img src="./views/PostaniVIP/slike/nazz.PNG" style="height:40px; width:100px;" alt="naz">
                                </td>
                            </tr>
                        </table>    
                    </nav>

                </div>

            </div>
            <div class='row'>  
                <div class='col-sm-10 drugi_red'>
                    <h2>&nbsp &nbsp Rezultati Pretrage</h2>
                    <div class="row blank">                 
                        <table>
                            <form  >
                            <tr>
                                <td class="povecaj">
                                   Unesite period pretplate na VIP status: &nbsp &nbsp &nbsp &nbsp 
                                    <select name="months" id="mesec" style="width: 236px; height: 40px;" >
                                        <option value="0">Izaberite period</option>
                                        <option value="1">1 mesec</option>
                                       
                                    
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td class="stop" style="text-align: center">
                                    <?php echo "<p style='color:red'>"; echo $porukaMesec; echo "</p>" ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="povecaj">
                                    Cena za izabrani period: &nbsp &nbsp &nbsp &nbsp  
                                    <input name="input_money" type="text" id="spec" value="<?php echo $cena=1200;  ?>" ></input>
                                </td>
                            </tr>
                            <tr>
                                <td class="skip">

                                </td>
                            </tr>
                            <tr>
                                <td class="skip">
                                <?php echo "<p style='color:white'>"; echo $porukaUplata; echo "</p>" ?>
                           
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">    
                                    <input type="hidden" name="controller" value="oglas"/>
                                    <input type="hidden" name="akcija" value="postaniVIPpre"/>
                                   
                                    <button type="submit" name="submitic" style="text-align: center; height: 70px; width: 180px;">
                                         <h4><b>Uplati</b></h4> 
                                    </button>
                                </td>
                            </tr>
                        </from>
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


  
                
  
        

    
    </form>
        
    
</body>
</html>