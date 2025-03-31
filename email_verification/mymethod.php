<?php
include('phpmailer/PHPMailerAutoload.php');
//ndxgpllzvlaidnhy
function addExample($data)
{
$name=$data['name'];
$email=$data['email'];
$password=$data['password'];
$contact=$data['contact'];


$conn= mysqli_connect('localhost', 'root', '', 'email_ex');
$sql= "insert into example(name,email,contact,password) values ('$name', '$email', '$contact','password')";
$res= mysqli_query($conn,$sql);
return $res;
}

function resetPassword($email, $password)
{
    $conn=mysqli_connect('localhost', 'root', '', 'email_ex');
    $sql= "update example set password='$password' where email='$email'";
    $res= mysqli_query($conn , $sql);
    return $res;
}

function sendEmail($email, $otp)
{
    $mail = new PHPMailer;
    $mail->isSMTP();  //Only enable when use in local server 

    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';

    $mail->Username = 'sneharupu@gmail.com';
    $mail->Password = 'ndxgpllzvlaidnhy';

    $mail->setFrom('sneharupu@gmail.com', 'Email Verification');
    $mail->addAddress($email);
    $mail->addReplyTo('sneharupu@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'OTP (One Time Password) for Registraion.';
    $mail->Body = '<h1>Your OTP(One Time Password) is : '.$otp.'</h1>';

    if($mail->send())
    {
        return "1";
    }
    else{
        return "0";
    }
}
?>