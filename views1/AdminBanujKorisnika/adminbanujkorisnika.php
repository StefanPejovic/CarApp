<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
   
<link rel='stylesheet' type='text/css' href='./views/AdminBanujKorisnika/fajlovi/bootstrap.min.css'>
<link rel='stylesheet' type='text/css' href="./views/AdminBanujKorisnika/adminbanujkorisnika.css?v=<?php echo time(); ?>">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<style>
    <?php include "adminbanujkorisnika.css" ?>
</style>
        
<script src='./views/AdminBanujKorisnika/fajlovi/bootstrap.min.js'></script>


<style>
    td {
  text-align: center;
}


</style>

</head>
<body style="background-color: lightgrey;">
<div class='container+fluid'>
    <div class='row prvi_red'>
        <div class='col-sm-12'>
            <nav class='navbar navbar-expand-sm lightgraybg'>
                <a class='navbar-brand button' href='#'>
                    <img src="./views/AdminBanujKorisnika/slike/Logo.png" alt="logo">
                </a>
                <div id="odjaviSe">
                    <a href="?controller=admin&action=logout" style="color:white; text-decoration: none">
                        <h4>Odjavi se</h3>
                    </a>
                    
                </div>

                <table id="prva_tabela">
                    <from>
                    <tr>
                        <td><img src="./views/AdminBanujKorisnika/slike/ikon.PNG" alt=""></td>
                        <td><input type="text" value="<?php echo $_SESSION['user']->username ?>"></td>
                    </tr>
                    <tr>
                        <td id="td4" colspan="2">
                            <a href="?controller=admin&action=index"><img src="./views/AdminBanujKorisnika/slike/nazz.PNG" style="height:40px; width:100px;" alt="naz"></a>
                        </td>
                    </tr>
                </from>
                </table> 

            </nav>
        </div>
    </div>
    <div class='row'>
        <div class='col-sm-3 center'>
            
                <table class='table table-striped'>
                   <tr>
                <td>
                    <a href="?controller=admin&action=deleteAdShow"><input type='button' name='button' class='btn btn-dark b1' value='Obrisi oglas'></a>
                </td>
                
                </tr>

                

                  

                    <tr>
                        <td>
                            <a href="?controller=admin&action=banUserShow"><input type='button' name='button' class='btn btn-dark b1' value='Banuj korisnika'></a>
                            </td>
                            
                </tr>

                <tr>
                     <td>
                         <a href="?controller=admin&action=giveVipShow"><input type='button' name='button' class='btn btn-dark b1' value='Dodeli VIP'></a>
                    </td>
                                
                 </tr>
                 <tr>
                     <td>
                         <a href="?controller=admin&action=takeVipShow"><input type='button' name='button' class='btn btn-dark b1' value='Oduzmi VIP'></a>
                    </td>
                                
                 </tr>
    


            </table>
            
        </div>
        <div class='col-sm-9 right'>
             <br>
    <br>
            <h2> Banuj korisnika</h2>
          
            <form name="banform" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?controller=admin&action=banUser">
    
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <table>
        <tr>
            <td>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Unesite korisnicko ime za<br>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;banovanje korisnika:
            </td>
            <td>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="text" name="username" placeholder="Unesite Korisnicko ime..." value="<?php if(isset($username)) echo $username; ?>"/>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <font color='red'><?php if(isset($messageUsername)) echo $messageUsername; ?></font>
            </td>
        </tr>
         <tr>
            <td colspan="2">
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<font color='green'><?php if(isset($messageCorrect)) echo $messageCorrect; ?></font>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <br>
            </td>
        </tr>
        <tr>
            <td>
                
            </td>
            <td style="text-align: left">
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type='submit' name="submit" value="Banuj"/>
            </td>
        </tr>
    </table>
</form>
                    

             
           

        </div>

    </div>
</div>
</body>