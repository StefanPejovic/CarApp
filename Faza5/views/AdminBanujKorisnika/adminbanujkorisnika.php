
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel='stylesheet' type='text/css' href='fajlovi/bootstrap.min.css'>
<link rel='stylesheet' type='text/css' href='adminbanujkorisnika.css'>

<script src='fajlovi/bootstrap.min.js'></script>
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
                    <img src='slike/logo.png'>
                </a>
                <div id="odjaviSe">
                    <a href="">
                        <h4>Odjavi se</h3>
                    </a>
                    
                </div>

                <table id="prva_tabela">
                    <from>
                    <tr>
                        <td><img src="slike/ikon.PNG" alt=""></td>
                        <td><input type="text" placeholder="Username"></td>
                    </tr>
                    <tr>
                        <td id="td4" colspan="2">
                            <img src="slike/nazz.PNG" style="height:40px; width:100px;" alt="naz">
                        </td>
                    </tr>
                </from>
                </table> 





                <!-- <ul class='navbar-nav'>
                    <li class='nav-item'>
                        <input type="button" name='button' class=' btn btn-light' value="Odjavi se">
                    </li> 
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;

                    <li class='nav-item'>
                        <input type="button" name='button' class=' btn btn-light' value="nazad">
                    </li> 
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;

                    <li class='nav-item'>
                        <input type="text" placeholder='Username' name="Username">
                    </li>



                    


                </ul> -->
            </nav>
        </div>
    </div>
    <div class='row'>
        <div class='col-sm-3 center'>
            
                <table class='table table-striped'>
                    <form>
                    <tr>
                <td>
                    <input type='button' name='button' class='btn btn-dark b1' value='Obrisi oglas'>
                </td>
                
                </tr>

                <tr>
                    <td>
                        <input type='button' name='button' class='btn btn-dark b1' value='Dodaj korisnika'>
                    </td>
                    
                </tr>

                    <tr>
                        <td>
                            <input type='button' name='button' class='btn btn-dark b1' value='Dodeli VIP'>
                        </td>
                        
                </tr>

                    <tr>
                        <td>
                                <input type='button' name='button' class='btn btn-dark b1' value='Banuj korisnika'>
                            </td>
                            
                </tr>

                <tr>
                     <td>
                        <input type='button ' name='button' class='btn btn-dark b1' value='Banuj korisnika'>
                    </td>
                                
                 </tr>

                </form>
    


            </table>
            
        </div>
        <div class='col-sm-9 right'>
            <h2> Banuj korisnika</h2>
          
            <table class='table '>
                <form>
                <tr>
                <td>Unesite korisnicko ime za banovanje korisnika

                </td>
                &nbsp;
                &nbsp;
                <td>
                    <input type="text" name='ID' placeholder="Unesite ID">

                </td>
                </tr>
                &nbsp;
                &nbsp;
            </form>
                
            </table>
            <form>

            
                    <input type='button' name='button' class=' btn btn-light' value="Banuj">
                    </form>
                    

             
           

        </div>

    </div>
</div>
</body>