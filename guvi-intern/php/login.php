<?php
$email = $_POST['email'];
$password = $_POST['password'];

$con = mysqli_connect("localhost", "root", "", "login");

$query = mysqli_query($con, "SELECT `id` FROM `users` WHERE `email`='$email' AND `password`='$password'");
$fetch = mysqli_fetch_assoc($query);
$id = isset($fetch['id']);

$num = mysqli_num_rows($query);

if(!$email & !$password)
{
    echo "All fields required!";
}
else
if(!$email)
{
    echo "Email Required";
}
else
if(!$password)
{
    echo "Password Required";
}
else
if($num == 0)
{
    echo "Incorrect credentials";
}

else
{

    session_start();
    $_SESSION['id'] = $id;
    $_SESSION['email'] = $email;
    echo "<script>window.location.href='http://localhost/guvi-intern/profile.html';</script>";

    // echo "Success!!!";
}

?>