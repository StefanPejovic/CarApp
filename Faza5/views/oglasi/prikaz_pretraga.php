<!--kod pisao Stefan Pejovic-->
<br>
                      <h2>Moji oglasi</h2>
                      <div style=" background-color:#4863a0; border:1px solid black; width:80%; ">

 

                      
                      
                      
                      
                      
                      
<?php foreach ($nizOglasi as $oglas) : ?>
                     

 

<table id="drugatb" style=" border:1px solid black; background-color:lightgray; margin-left:5%; width: 70%">
<tr>
<th> 

 


    <span class="label_other_1"><?php echo $oglas->marka.' '.$oglas->model; ?></span>
</th>
</tr>
<tr>
<td id="td1">
<img src="./views/Recenzije/slike/Logo.png" style="height: 180px; width: 290px;" alt="slika">
</td>
<td id="td2">
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
    
    
    <!-- <form name="saveform" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?controller=user&action=saveAd">
         <input type="hidden" name="idOglasaZaCuvanje" value="<?php echo $oglas->idO; ?>"/>      
    -->
    
<ul style="list-style-type:none;">
<li>
<button name="button_cena" type="button" style=" border:0px; height: 50px; width: 170px; background-color: #4863a0;" class="btn btn-primary"><?php echo $oglas->cena.'€'?><span class="badge"></span></button><br/><br/>
</li>
<li><form name="saveform" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?controller=oglas&action=detaljanOglas">
         <input type="hidden" name="idOglasaZaCuvanje" value="<?php echo $oglas->idOglasa; ?>"/>      
    
    <input type="submit" value="Sacuvaj" name="submit_sacuvaj" style=" background-color: #00ced1; color: white; height: 50px; width: 170px" id="sacuvaj'.$oglas->idOglasa.'"></form>
</li><br/>

 

<li>
    <form name="prikaziform" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?controller=oglas&akcija=detaljanOglas">
            
        <input type="hidden" name="idOglasaZaPrikaz" value="<?php echo $oglas->idOglasa; ?>"/>     
         <button type="submit" name="button_pogledaj_vise" style=" background-color: #00ced1; color: white; height: 50px; width: 170px" id="vise'.$oglas->idOglasa.'"><b>Pogledaj više</b></button></form></li>
</ul>
     <!--</form>-->
</td>
</tr>
</table><br/>';

 


<?php endforeach;?>
                  </div>