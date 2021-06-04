<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' type='text/css' href='fajlovi/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' href='prijava.css'>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src='fajlovi/bootstrap.min.js'></script>
</head>
<body style="background-color:#dcdcdc; width: 100%">
    <div class='container-fluid'>
        <div class='row'>
            <div class='offset-sm-3 col-sm-6 text-center'>
                <br>
                <br>
                <h2>Prijava</h2>
            </div>
            <div class="offset-sm-2 col-sm-1">
                <br>
                <br>
                <a href="?controller=guest&action=index"><input type="button" name='button' class=' btn btn-light' value="Pocetak"></a>
            </div>
        </div>
        <div class='row justify-content-center'>
           <div class='offset-sm-3 col-sm-6 offset-sm-3'>
               <br>
               <br>
               <br>
               <br>
               <br>
                <br>
               <form name="loginform" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?controller=guest&action=login">
               <table>
        <tr>
            <td>
                <b>Korisnicko ime:</b>
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
            <td>
                <b>Lozinka:</b>
            </td>
            <td>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="password" name="password" placeholder="Unesite Lozinku..." value="<?php if(isset($password)) echo $password; ?>"/>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <font color='red'><?php if(isset($messagePassword)) echo $messagePassword; ?></font>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <br>
                <br>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">
                <input type='submit' name="submit" value="Prijavi se"/>
            </td>
        </tr>
    </table>
               </form>
           </div>

           
        </div>
        
        
    </div>
    
</body>
</html>

