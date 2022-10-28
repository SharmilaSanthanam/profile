<?php
if (empty($_POST["name"])) {
    die("Name is required");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 6) {
    die("Password must be at least 6 characters");
}
$connection=mysqli_connect('localhost','root','','login');

if($connection)
{
  
   $name=$_POST["name"];
   $email=$_POST['email'];
   $password=$_POST['password'];

    $insertUser="INSERT into users (name, email, password) values ('$name','$email','$password')";
    $results=mysqli_query($connection,$insertUser);
    
    if($results)
    {
        echo "Registered successfully";
       
    }
    else{
        echo "Registration failed";
    }
}
?>