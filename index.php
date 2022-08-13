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



if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);
  
    // get profile info
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $userinfo = [
        'email' => $google_account_info['email'],
        'fullname' => $google_account_info['name'],
        'gender' => $google_account_info['gender'],
        'picture' => $google_account_info['picture'],
        'token' => $google_account_info['id'],
    ];

    $sql = "SELECT * FROM user_profile WHERE email = '{$userinfo['email']}'";
    $result = mysqli_query($con,$sql);

    if(mysqli_num_rows($result) > 0){
        $userinfo = mysqli_fetch_assoc($result);
        $token = $userinfo['token'];
    }else{
        $sql = "INSERT INTO `user_profile` ( `picture`, `token`, `email`, `fullname`, `phoneno`, `address`, `gender`, `age`, `workhour`, `approxsalary`, `date`) VALUES ( '{$userinfo['picture']}', {$userinfo['token']}, '{$userinfo['email']}', '{$userinfo['fullname']}', '4546554', 'falkjdflkj kajdflk', '{$userinfo['gender']}', '18', '10', '10000', CURRENT_TIMESTAMP);";
        $result = mysqli_query($con,$sql);
        if($result){
            $token = $userinfo['token'];
        }else{
            echo "user is not created";
            die();
        }

    }
    // $email =  $google_account_info->email;
    // $name =  $google_account_info->name;
    $_SESSION['user_token'] = $userinfo['token'];
    // header("location: index1.php");
    header("location: main/home.php");

  
    // now you can use this profile info to create account in your website and make user logged in.
  }else{
    if(!isset($_SESSION['user_token'])){
        header("location: login.php");
        die();
      }


    $sql = "SELECT * FROM user_profile WHERE token = '{$_SESSION['user_token']}'";
    $result = mysqli_query($con,$sql);

    if(mysqli_num_rows($result) > 0){
        $userinfo = mysqli_fetch_assoc($result);
        $token = $userinfo['token'];

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
    <img src="<?php echo $userinfo['picture'];?>" alt="" width="90px" height="90px">
    
    <ul>
        <li>Full name: <?php echo $userinfo['fullname']; ?></li>
        <li>Email: <?php echo $userinfo['email']; ?></li>
        <li>Gender: <?php echo $userinfo['gender']; ?></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>