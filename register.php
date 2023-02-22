<?php
$showError = false;
session_start();
header('Location:login.html');

$server = "localhost";
$username = "root";
$password = "";
$database = "users";

$conn = mysqli_connect($server, $username, $password, $database);

if(!$conn){
    die("Connection Failed". mysqli_connect_error());
}

if(isset($_POST['save']))
{
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];

    $existSql = "SELECT * FROM `users` WHERE email = '$email'";
    $result = mysqli_query($conn, $existSql);
    $num = mysqli_num_rows($result);
    if($num==1)
    {
        $_SESSION['email']= $email;
        header('Location:signup.html');
        $showError = "Email already in use";
    }
    else{
        $sql = "INSERT INTO `users` (`name`, `email`, `phone`, `password`) VALUES ('$name','$email','$phone','$password')";
        $result = mysqli_query($conn, $sql);
    }
    mysqli_close($conn);
}
?>