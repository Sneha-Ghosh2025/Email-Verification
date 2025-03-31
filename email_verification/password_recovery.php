<?php
    include('mymethod.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <form action="" method="post">
        <fieldset>
            <legend><center><b><u>Password Recovery</u></b></center></legend>
            Enter your Email-id:
            <input type="email" name="email" id="">
            <input type="submit" value="Send OTP" name="submit">
        </fieldset>
    </form>
    <?php
        
        if(isset($_POST['submit']))
        {
            session_start();
            $email=$_POST['email'];
            $otp=random_int(100000, 999999);

            //store data in session
            $_SESSION['email']=$email;
            $_SESSION['otp']=$otp;
            $_SESSION['chance']=3;
    
            $res=sendEmail($email,$otp);
   
            if($res=="1")
            {
                header('location:otp_recovery.php');
            }
            else
            {
                echo "Sorry OTP not sent, Try Again...!!!";
            }
        }


    ?>
</body>
</html>