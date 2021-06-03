<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' type='text/css' href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel='stylesheet' type='text/css' href='registracija.css'>

    <script src='fajlovi/bootstrap.min.js'></script>
</head>
<body style="background-color:gray;">
    <form name="pretraga" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class='container+fluid'>
        <div class='row'>
            <div class='col-sm-12'>
                <nav class='navbar navbar-expand-sm lightgraybg'>
                    <h2>Registracija</h2>

                    

                    <ul class='navbar-nav'>
                        <li class='nav-item'>
                            <a href='#'>
                            <!-- <img src="slike/pocetak.PNG" style="height:40px; width:100px;" alt="pocetak"> -->
                             <input type="button" name='button' class=' btn btn-light ' value="Pocetak"> 
                        </a>
                        </li>
                    </ul>
                </nav>

                
            </div>
        </div>
        <div class='row'>
           <div class='col-lg-12  center'>
               <table class='table '>
                   <tr>
                       <td style="text-align: right"><b>Ime</b>
                           <input type="hidden" name="controller" value="registracija"/>
                            <input type="hidden" name="akcija" value="registrujSe"/></td>
                       <td><input type="text" name='ime'> </td>
                    
                   </tr>
                   <tr>
                    <td style="text-align: right">Prezime</td>
                    <td><input type="text" name='prezime'></td>
                 
                </tr>
                <tr>
                    <td style="text-align: right">Email</td>
                    <td><input type="text" name='email'></td>
                 
                </tr>
                <tr>
                    <td style="text-align: right">Korisnicko ime</td>
                    <td><input type="text" name='user'></td>
                 
                </tr>

                <tr>
                    <td style="text-align: right">Lozinka</td>
                    <td><input type="password" name="password"></td>
                </tr>

                <tr>
                    <td style="text-align: right">Ponovljena lozinka</td>
                    <td><input type="password" name='povrda'></td>
                </tr>
                <tr>
                    <td style="text-align: right">Tip korisnika</td>
                    <td>
                        <select name="tip">
                            <option value="1">
                                Administrator
                            </option>
                            <option value="2">
                                VIP
                            </option>
                        </select>
                    </td>
                </tr>
                 <tr class='sredina'>
                    <td colspan="2" style="text-align: center"><input type="submit" name='button' class=' btn btn-light b1' value="Registruj se"></td>
                     <!-- Kako da centiram ovo dugme i kako tabela da mi se prostire preko celog ekrana  -->
                </tr> 
               </table>
               

           </div>

           
        </div>
        
        
    </div>
    </form>
</body>
</html>