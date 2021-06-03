<!--kod pisao Stefan Pejovic-->
<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" > </script>

<?php

    $idOglasa=1;
    
   /*      echo "<script language='javascript'  >
                                               
               
                $('#labelaZaImeOglasa').text('Fordic');
            $('.tabelaKomentari').append('<tr> <td>
                       <textarea  style=background-color: gray; color: white; height: 100px; width: 350px'  cols='30' rows='10'>
                       
                    .'</textarea>
                                 </td></tr> );

        </script>"; */
    
        
    
 /*   foreach((array)$nizRecenzija as $recenzija){
            
            echo "<script language='javascript'  >
             red1 = $('<tr></tr>');
             col = $('<td></td>');
             coll = $('<td></td>');
             area = $('<textarea></textarea>')
             //let text = ('<>>');
             area.text('".$recenzija->Sadrzaj."');
                 red1.append(coll);
                 red1.append(col);
                 area.css('background-color','gray');
                 area.css('color','white');
                 area.css('height','100px');
                 area.css('width','350px');
                 area.css('cols','30');
                 area.css('rows','10');
                 col.append(area);
                $('.tabelaKomentari').append(red1);
        

        </script>
        ";  
    }*/
    
  ?>

 <!--   echo "<h1>Prikaz rezencija </h1>";
    $output='';
    foreach ((array)$nizRecenzija as $recenzija) {
        
      //  echo "<a href='{$_SERVER['PHP_SELF']}?controller=oglas&akcija=prikaz&id={$oglas->idOglasa}'>"
      //  . "{$oglas->marka} " ." {$oglas->model} " . "</a><br/>";
        
        
        $output .= '    <table>
                            <tr>
                                <td id="jao"> <label for=""></label> <b>Neko</b> </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td id="hue"><img src="./views/Recenzije/slike/au.PNG" style="width: 100px; height: 80px" alt=""></td>
                                <td>
                                    <textarea name="komentar" style="background-color: gray; color: white; height: 100px; width: 350px" disableds name="" id="" cols="30" rows="10"></textarea>
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
                                    <textarea name="komentar" style="background-color: white; color: black; height: 100px; width: 350px" disableds name="" id="" cols="30" rows="10">'.$recenzija->Sadrzaj.'</textarea>
                                 </td>
                                <td>
                                    <div name="oc" class="rate">
                                        <select name="ocena">
                                            <option name="1">1</option>  
                                            <option name="2">2</option>  
                                            <option name="3">3</option> 
                                            <option name="4">4</option>
                                        </select>   
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
                                <td colspan="3" id="donja">
                                    <button type="submit" style=" color:  white; background-color: #a7a7a7; height: 50px; width: 150px"> <b>Postavi Recenziju </b></button>
                                </td>
                            </tr>
                        </table>';
             
             
        
        
        
        
    }
    
    $okoloPlavo='"<div style=" background-color:#4863a0; border:1px solid black; width:50%; ">"';
    $okoloPlavo.=$output;
    $okoloPlavo.="</div>";
    echo $okoloPlavo;
    
   */ 
          
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

-->