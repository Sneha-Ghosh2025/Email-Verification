<?php
    include('mymethod.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>otpPage</title>
    <link rel="stylesheet" href="stylesheet.css">
    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="style.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>
<body>
<div class="container">
      <header>
        <i class="bx bxs-check-shield"></i>
      </header>
      <h4>Enter OTP Code</h4>
      <form action="" method="post">
        <div class="input-field">
          <input type="number" name="v1"/>
          <input type="number" name="v2"/>
          <input type="number" name="v3"/>
          <input type="number" name="v4"/>
          <input type="number" name="v5"/>
          <input type="number" name="v6"/>
        </div>
        <input class="" type="submit" name="verify" value="Verify OTP">
      </form>

      <?php
            if(isset($_POST['verify']))
            {
                $v1 = $_POST['v1'];
                $v2 = $_POST['v2'];
                $v3 = $_POST['v3'];
                $v4 = $_POST['v4'];
                $v5 = $_POST['v5'];
                $v6 = $_POST['v6'];

                $userotp = $v1."".$v2."".$v3."".$v4."".$v5."".$v6;

                session_start();
                $otp = $_SESSION['otp'];

                if($otp == $userotp)
                {
                    $data = $_SESSION['data'];
                    $res = addExample($data);
                    if($res == 1)
                    {
                        echo "<script>alert('Registration Successfully')</script>";
                    }
                    else{
                        echo "<script>alert('Registration failed')</script>";
                    }
                    header('location: register.php');
                }
                else{
                    $chance = $_SESSION['chance'];
                    $chance = $chance - 1;
                    $_SESSION['chance'] = $chance;
                    if($chance == 0)
                    {
                        header('location: register.php');
                    }
                    echo "OTP Not Matched, Try again.". $chance. " more left";
                }
            }
      ?>
    </div>
</body>
</html>