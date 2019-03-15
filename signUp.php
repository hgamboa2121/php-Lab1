<?php
$users = "users.txt";

$email=$_POST['email']; // i think is because this is not getting the values
echo($email);
$password=$_POST['password'];// also this
echo($password);
$confirmpassword=$_POST['checkPassword'];
$ofile = fopen($users, "r");
$read = fread($ofile,filesize($users));
foreach($read as $user) {
    list($e,$p) = explode("-",$user);
    if($e===$email) {
        exit("You already have an account");
    }
}
fclose($ofile);

$ofile=fopen($users, "a+");

//$current=file_get_contents($users);
$current = $email;
echo ($current);
//file_put_contents($users,$current,FILE_APPEND|LOCK_EX);

header("Location:http://localhost:63342/Lab1/userPlaylist.html");
exit;
?>