<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' type='text/css' href='./views/PromenaLozinke/fajlovi/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' href='./views/PromenaLozinke/promenaLozinke.css'>

    <script src='./views/PromenaLozinke/fajlovi/bootstrap.min.js'></script>
</head>
<body style="background-color:#dcdcdc;">
    <div class='container+fluid'>
        <div class='row'>
            <div class='offset-sm-3 col-sm-6 text-center'>
                <br>
                <br>
                <h2>Promena lozinke</h2>
            </div>
            <div class="offset-sm-2 col-sm-1">
                <br>
                <br>
                <a href="?controller=guest&action=index"><input type="button" name='button' class=' btn btn-light' value="Pocetak"></a>
            </div>
        </div>
        <div class='row justify-content-center'>
           <div class='offset-sm-3 col-sm-6 offset-sm-3  center'>
               <br>
               <br>
               <br>
               <br>
               <br>
               <br>
               <form name="changepasswordform" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?controller=guest&action=changePassword">
    <table>
        <tr>
            <td>
                Korisnicko ime:
            </td>
            <td>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="text" name="username" value="<?php if(isset($username)) echo $username; ?>"/>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <font color='red'><?php if(isset($messageUsername)) echo $messageUsername; ?></font>
            </td>
        </tr>
        <tr>
            <td>
                Stara lozinka:
            </td>
            <td>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="password" name="oldPassword" value="<?php if(isset($oldPassword)) echo $oldPassword; ?>"/>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <font color='red'><?php if(isset($messageOldPassword)) echo $messageOldPassword; ?></font>
            </td>
        </tr>
        <tr>
            <td>
                Nova lozinka:
            </td>
            <td>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="password" name="newPassword" value="<?php if(isset($newPassword)) echo $newPassword; ?>"/>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <font color='red'><?php if(isset($messageNewPassword)) echo $messageNewPassword; ?></font>
            </td>
        </tr>
        <tr>
            <td>
                Ponovljena lozinka:
            </td>
            <td>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="password" name="newnewPassword" value="<?php if(isset($newnewPassword)) echo $newnewPassword; ?>"/>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <font color='red'><?php if(isset($messageNewNewPassword)) echo $messageNewNewPassword; ?></font>
            </td>
        </tr>
         
        <tr>
            <td colspan="2">
                <br>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">
                <input type='submit' name="submit" value="promeni"/>
            </td>
        </tr>
    </table>
</form>
           </div>

           
        </div>
        
        
    </div>
    
</body>
</html>