<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel='stylesheet' type='text/css' href='./views/GlavnaAdmin/fajlovi/bootstrap.min.css'>
<link rel='stylesheet' type='text/css' href='./views/GlavnaAdmin/glavnaadmin.css'>

<script src='./views/GlavnaAdmin/fajlovi/bootstrap.min.js'></script>
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
                    <img src='./views/GlavnaAdmin/slike/logo.png'>
                </a>

                <div id="odjaviSe">
                    <a href="?controller=admin&action=logout" style="color:white; text-decoration: none">
                        <h4>Odjavi se</h4>
                    </a>
                    
                </div>

                <table id="prva_tabela">
                    
                    <tr>
                        <td><img src="./views/GlavnaAdmin/slike/ikon.PNG" alt=""></td>
                        <td><input type="text" value="<?php echo $_SESSION['user']->username ?>"></td>
                    </tr>
                    <tr>
                        <td id="td4" colspan="2">
                            <a href="?controller=admin&action=index"><img src="./views/GlavnaAdmin/slike/nazz.PNG" style="height:40px; width:100px;" alt="naz"></a>
                        </td>
                    </tr>
                
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
            
           

        </div>

    </div>
</div>
</body>