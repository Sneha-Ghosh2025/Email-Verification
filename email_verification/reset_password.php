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
        <center><br><br> <legend><b><u>Reset Password</u></b></legend></center>
            <br><br><br><center>
                Enter New Paaword:
            <input type="text" name="newPassword" id="" placeholder="Enter your new password">
           <br><br>
           Enter Confirm Paaword:
            <input type="text" name="cPassword" id="" placeholder="Enter your confirm password">
            <br><br>
            <input type="submit" value="Change" name="change"><br><br></center>
        </fieldset>
    </form>

    <?php
        if(isset($_POST['change']))
        {
            session_start();
            $newPassword=$_POST['newPassword'];
            $cPassword=$_POST['cPassword'];

            //store data in session
            //$_SESSION['password']=$cPassword;
            //$_SESSION['password']=$newPassword;

            
                if($newPassword==$cPassword)
                {
                    $email = $_SESSION['email'];
                    $res = resetPassword($email, $newPassword);
                    if($res == 1)
                    {
                        echo "Password Recoverd";
                        header("location: register.php");
                    }
                    else
                    echo "Password Not Recovered";
                }
                else{
                        echo "Both Password not matched";
                }
            
            
        }
    ?>
</body>
</html>