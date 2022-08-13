<?php
// echo "hello";
require "db/db.php";
// $loggedin = true;

// if(!isset($_SESSION['email'])){
//     $loggedin = false;
//     header("location: login.php");
// }else{
//     $loggedin = true;
//     $online = $_SESSION['online'];
//     $email = $_SESSION['email'];
//     $id = $_SESSION['id'];
    
   
// }
require_once 'db/config.php';
if(!isset($_SESSION['user_token']) AND !isset($_SESSION['email'])){
    header("location: login.php");
    die();
  }else{
if(isset($_SESSION['user_token'])){

$sql = "SELECT * FROM user_profile WHERE token = '{$_SESSION['user_token']}'";
$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result) > 0){
    $userinfo = mysqli_fetch_assoc($result);
    
 }
}
else{
    $sql = "SELECT * FROM user_profile WHERE email = '{$_SESSION['email']}' ";
    $result = mysqli_query($con,$sql);

    if(mysqli_num_rows($result) > 0){
        $userinfo = mysqli_fetch_assoc($result);
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome</title>
</head>
<body>
<?php
if(!isset($userinfo['picture'])){
    ?>
    <img
      src="assets/css/img/user-default.png"
      alt="avatar"
      class="rounded-circle img-fluid"
      style="width: 150px"
    />
    
    <?php
    }else{
      ?>
      <img src="<?php echo $userinfo['picture'];?>" alt="" style="width: 150px; height: 150px;">
    <?php
    }
    ?>

    <ul>
        <li>Full name: <?php echo $userinfo['fullname']; ?></li>
        <li>Email: <?php echo $userinfo['email']; ?></li>
        <li>Gender: <?php echo $userinfo['gender']; ?></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>