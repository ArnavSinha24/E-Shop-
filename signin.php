<?php
    session_start();
    echo "Successfully Logged In ";
    $conn=mysqli_connect('localhost','root');
    if($conn){
        echo "Connection Successfully";
    }
    else{
        echo "No Connection";
    }
    mysqli_select_db($conn,'users');
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql= "SELECT * FROM `users` WHERE email = '$email' && password ='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num==1)
    {
        $_SESSION['email']= $email;
        header('Location:index.html');
    }
    else{
        header('Location:login.html');
    }   
?>  