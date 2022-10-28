 <?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';
$con = new MongoDB\Client("mongodb+srv://profile:profile@cluster0.7e1ierx.mongodb.net/?retryWrites=true&w=majority");

if(isset($_POST['create'])){

    $db = $con->selectDatabase('Profiledb');
    $collection = $db->selectCollection('userdetails');
    
    $data = [
        'name' => $_POST['name'],
        'mobile' => $_POST['mobile'],
        'country' => $_POST['country'],
    ];
    $result = $collection->insertOne($data);
    $id = $result->getInsertedId();
}
?>

<!DOCTYPE html>
<html>

<head>
   
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
        <title>Profile</title>

    <link rel="stylesheet" href="../css/profile.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
 
</head>
<body>
   
            <div class="profile">
    <h1 class="text-center">Profile</h1>
    
    <?php if (isset($data)): ?>
     <div class="content">
        <p class="text-center">Welcome <?= htmlspecialchars($data["name"]) ?>!!!</p>
        <p >Your Mobile: <?= htmlspecialchars($data["mobile"]) ?></p>
        <p >Your Country: <?= htmlspecialchars($data["country"]) ?></p>
       
       <button class="lbutton"> <a href="http://localhost/guvi-intern/profile.html">Update</a></button>

      <button class="rbutton"> 
      <?php session_unset(); session_destroy();?><a href="http://localhost/guvi-intern/index.html">Log out</a><?= exit; ?></button>
    </div>

    <?php else: ?>
        <a href="http://localhost/guvi-intern/index.html">Home</a>
    <?php endif; ?> 
    
    </div>

    </body>

</html> 