<!--kod pisao Stefan Pejovic-->
<?php

    echo "<h1>Prikaz svih ETF vesti </h1>";

    foreach ((array)$nizOglasi as $oglas) {
        
        echo "<a href='{$_SERVER['PHP_SELF']}?controller=oglas&akcija=prikaz&id={$oglas->idOglasa}'>"
        . "{$oglas->marka}</a><br/>";
    }
    
    if (sizeof((array)$nizOglasi)==0)
        echo "<h1> prazaaan </h1>";
          
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

