<!--kod pisao Stefan Pejovic-->
<DOCTYPE html>
<html>
  <head>
    <title>Oglasi</title>
  </head>
  <body>
    <header>
        <?php require_once('header.inc.php'); ?>
        <a href='<?php echo $_SERVER['PHP_SELF'];?>'>Početak</a>
        
        <a href='<?php echo $_SERVER['PHP_SELF'];?>?controller=oglas&akcija=postaviPre'>Oglasi - postavi oglas</a>
       
        <a href='<?php echo $_SERVER['PHP_SELF'];?>?controller=oglas&akcija=pretraziPre'>Oglasi - pretrazi</a>
     
        <a href='<?php echo $_SERVER['PHP_SELF'];?>?controller=registracija&akcija=registrujSePre'>Registruj se</a>
        <a href='<?php echo $_SERVER['PHP_SELF'];?>?controller=oglas&akcija=postaniVIPpre'>Postani VIP</a>
   
    </header>

    <?php require_once('routes.php'); ?>

    <footer align="center">
      Copyright &#169; StefanPejovic ETF SI3PSI, 2021
    </footer>
  <body>
<html>
