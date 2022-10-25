<?php

session_start();

if (isset($_SESSION["id"])) {
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
            WHERE `id` = {$_SESSION["id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>
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

    
    