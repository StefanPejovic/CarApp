<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' type='text/css' href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel='stylesheet' type='text/css' href='./views/Registracija/registracija.css'>

    <script src='./views/Registracija/fajlovi/bootstrap.min.js'></script>
</head>
<body style="background-color:#dcdcdc;">
    <div class='container+fluid'>
        <div class='row'>
            <div class='offset-sm-3 col-sm-6 text-center'>
                <br>
                <br>
                <h2>Registracija</h2>
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
              
               
               <form name="registracijaform" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?controller=guest&action=signIn">
    <table>
        <tr>
            <td>
                Ime:
            </td>
            <td>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="text" placeholder="Unesite Ime..." name="firstname" value="<?php if(isset($firstname)) echo $firstname; ?>"/>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <font color='red'><?php if(isset($messageFirstName)) echo $messageFirstName; ?></font>
            </td>
        </tr>
        <tr>
            <td>
                Prezime:
            </td>
            <td>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="text" placeholder="Unesite Prezime..." name="lastname" value="<?php if(isset($lastname)) echo $lastname; ?>"/>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <font color='red'><?php if(isset($messageLastName)) echo $messageLastName; ?></font>
            </td>
        </tr>
        <tr>
            <td>
                Email:
            </td>
            <td>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="text" placeholder="Unesite Email..." name="email" value="<?php if(isset($email)) echo $email; ?>"/>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <font color='red'><?php if(isset($messageEmail)) echo $messageEmail; ?></font>
            </td>
        </tr>
         <tr>
            <td>
                Telefon:
            </td>
            <td>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="text" placeholder="Unesite Telefon..." name="phone" value="<?php if(isset($phone)) echo $phone; ?>"/>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <font color='red'><?php if(isset($messagePhone)) echo $messagePhone; ?></font>
            </td>
        </tr>
        <tr>
            <td>
                Korisnicko ime:
            </td>
            <td>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="text" placeholder="Unesite Korisnicko ime..." name="username" value="<?php if(isset($username)) echo $username; ?>"/>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <font color='red'><?php if(isset($messageUsername)) echo $messageUsername; ?></font>
            </td>
        </tr>
        <tr>
            <td>
                Lozinka:
            </td>
            <td>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="password" placeholder="Unesite Lozinku..." name="password" value="<?php if(isset($password)) echo $password; ?>"/>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <font color='red'><?php if(isset($messagePassword)) echo $messagePassword; ?></font>
            </td>
        </tr>
        <tr>
            <td>
                Ponovljena lozinka:
            </td>
            <td>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="password" placeholder="Unesite Ponovljenu lozinku..." name="newnewPassword" value="<?php if(isset($newnewPassword)) echo $newnewPassword; ?>"/>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <font color='red'><?php if(isset($messageNewNewPassword)) echo $messageNewNewPassword; ?></font>
            </td>
        </tr>
        <tr>
            <td>
                Tip korisnika:
            </td>
            <td>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<select name="tip">
                    <option value="0">Izaberite Tip korisnika...</option>
                    <option value="1">Obican korisnik</option>
                    <option value="2">VIP korisnik</option>
                    <option value="3">Administrator</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <font color='red'><?php if(isset($messageTip)) echo $messageTip; ?></font>
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
            <td colspan="2" style="text-align: center">
                <input type='submit' name="submitp" value="Registruj se"/>
            </td>
        </tr>
    </table>
</form>
           </div>

           
        </div>
        
        
    </div>
    
</body>
</html>