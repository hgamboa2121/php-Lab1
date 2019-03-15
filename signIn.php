<?php
$useremail=$_POST['email'];
$userpassword=$_POST['password'];

$useraccounts='users.txt';
foreach(file($useraccounts) as $user){
    list($email,$password) = explode('-', $user);
    $password=trim($password);
    if($useremail===$email and $userpassword===$password) {
        header("Location:http://localhost:63342/Lab1/userPlaylist.html");
        exit;
    }
    else{
        echo("Your username or password is incorrect.");
    }
}
header("Location:http://localhost:63342/Lab1/userPlaylist.html");
exit;
?>