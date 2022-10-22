<?php

session_start();

if (isset($_SESSION["user_id"])) {
    //database connection
    $host = "localhost";
$dbname = "login";
$username = "root";
$password = "";

$mysqli = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname);
                     
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

    
    $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/profile.css">
</head>
<body>
   
            <div class="profile">
    <h1 class="text-center">Profile</h1>
    
    <?php if (isset($user)): ?>
        
        <p class="text-center">Hello <?= htmlspecialchars($user["name"]) ?></p>
        <p class="text-center">Your Email Id: <?= htmlspecialchars($user["email"]) ?></p>
        
        <p class="text-center"><?php session_unset(); session_destroy();?><a href="http://localhost/guvi-intern/index.html">Log out</a><?= exit; ?></p>
        
    <?php else: ?>
        <a href="http://localhost/guvi-intern/index.html">Home</a>
    <?php endif; ?> 
    
    </div>
   
</body>
</html>
    
    
