<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' type='text/css' href='./views/Dobrodosli/fajlovi/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' href='./views/Dobrodosli/dobrodosli.css'>
    
    <script src='./views/Dobrodosli/fajlovi/bootstrap.min.js'></script>

</head>
<body style="background-color: lavender;">
  <div class='container-fluid'>
            <div class='row prvi_red'>
                <div class='col-sm-12'>
                    <nav class='navbar navbar-expand-sm lightgraybg'>
                        <a class='navbar-brand' href="?controller=guest&action=index">
                            <img src='./views/Dobrodosli/slike/Logo.png' id="logo">
                        </a>


                        <div id="postaviOglas">
                            <a href="?controller=guest&action=loginShow"><h4>Prijavi se</h4></a>
                        </div>
                        <div id="odjaviSe">
                            <a href="?controller=guest&action=signInShow" style="color: white; text-decoration: none"><h4>Registruj se</h4></a>
                        </div>
                        <div id="nastaviKaoGost">
                            <a href="?controller=guest&action=index1"><h4>Nastavi kao gost</h3></a>
                        </div>
                    </nav>
                    

                </div>
            </div>

            <div class="row second">
       
                    <div class=" container text-center levo">
                         <h2>Dobrodošli na CarApp!</h2> 
                    </div>
            </div>

            <div class="row footer">
                <div class='col-lg-10'>
                    <div id="promenaLozinke">
                        <a href="?controller=guest&action=changePasswordShow"><h4>Promena lozinke</h4></a>
                    </div>
                </div>
                <div class='col-lg-2'>
                        <button style="border-radius: 15px 15px; height: 70px; width: 80px;"> <h1>&nbsp ? &nbsp</h1></button>
                        <small style="display: block; width: 100% " id="small"><h4>FAQ</h4></small>
                </div>

                
               
                
            </div>
        </div>
    </div>


    

  
                
  
        

    

        
    
</body>
</html>