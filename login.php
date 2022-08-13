<?php
require "db/db.php";

require_once 'vendor/autoload.php';

require_once 'db/config.php';
$login = true;
if(isset($_SESSION['user_token'])){
  header("location: index3.php");
  // header("location: myprofile.php");

}else{
  $login = false;
}


// authenticate code from Google OAuth Flow




$invalid = false;
        if($_SERVER['REQUEST_METHOD'] = "post"){
            if(isset($_POST['submit'])){
                $email = $_POST['email1'];
                $pass = $_POST['password1'];

                $sql = "SELECT * FROM `register`";
                $result = mysqli_query($con,$sql);

                while($row = mysqli_fetch_assoc($result)){
                
                if($email == $row['email'] AND $pass == $row['password']){
                    echo '<div class="alert alert-success" role="alert">
                            Successfully Login.
                        </div>';
                    $_SESSION['loggedin'] = true;
                    $_SESSION['email'] = $email;
                    $_SESSION['online'] = "true";
                    $_SESSION['id'] = $row['uid'];
                    // console.log($_SESSION['id']);

                    setcookie('email',$email,time()+60*60*24*30);
                    // header("location: index1.php");
                    header("location: index2.php");

                }else{
                   
                    $invalid = true;
                    
                    // header("location: login.php");
                }

                }
                
                
            }
        }
    ?>

<?php

        if(isset($_POST['first_name'])){
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $mail = $_POST['mail'];
            $phoneno = $_POST['phoneno'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
    
            $check = "SELECT * FROM `register` WHERE `email` = '$mail'";
            $result_check = mysqli_query($con,$check);
    
            $num_check = mysqli_num_rows($result_check);
            $row = mysqli_fetch_assoc($result_check);
            if($num_check > 0){
            $valid= true;
                
               
            }
            
            else{
            if($password == $confirm_password){
              
                $user_id = rand ( 1000 , 999999 ); 
                $insert = "INSERT INTO `register` ( `uid`,`occupation`, `first_name`, `last_name`, `email`, `phoneno`, `password`, `date`) VALUES ( $user_id,'farmer', '$first_name', '$last_name', '$mail', '$phoneno', '$password', current_timestamp())";

                $fullname = $first_name . ' ' .$last_name;
                $sql = "INSERT INTO `user_profile` ( `picture`, `token`, `email`, `fullname`, `phoneno`, `address`, `gender`, `age`, `workhour`, `approxsalary`, `date`) VALUES ( NULL,NULL , '{$mail}', '{$fullname}', '{$phoneno}', NULL, NULL, NULL, NULL,NULL, CURRENT_TIMESTAMP);";
                // $insert_userprofile = "INSERT INTO `user_profile` (`id`, `email`, `fullname`, `profile_picture`, `about`, `birthdate`, `gender`, `city`, `mothertongue`, `hobbys`, `maritualstatus`, `ethencity`, `heighest_education`, `occupation`, `annual_income`, `height`, `weight`, `any_disability`, `my_habbits`, `verified`, `is_online`, `date`) VALUES ($user_id, '$mail', '$fullname', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, current_timestamp())";
                $_SESSION['email'] = $mail;
                $_SESSION['loggedin'] = true;
                $_SESSION['online'] = "true";
                $_SESSION['id'] = $row['uid'];

                $result_insert = mysqli_query($con,$insert);
                $result_user = mysqli_query($con,$sql);
                // header("location: index1.php");
                header("location: index2.php");
            }else{
                ?>
                <div class="alert alert-danger" role="alert">
                    Password Not match
                </div>
                <?php
            }
            }
        }
        

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Agrotech</title>
        <!-- FontAwesome Icons -->
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
      />

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!-- Google Fonts -->
      <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
        rel="stylesheet"
      />
    <link rel="stylesheet" href="assets/css/style.css" />
    <style>
      @media (max-width: 850px) {
        .box {
          height: 420px;
          max-width: 550px;
          overflow: auto;
          overflow-x: hidden;
        }
      }
      .btn-google {
        color: #545454;
        background-color: #ffffff;
        margin-left: 3rem;
        text-decoration: none;
     }
     .row{
      box-shadow: 0 0px 4px 1px grey;
    padding: 6px;
    border-radius: 16px;
    margin-bottom: 1rem;
     }
      </style>
  </head>
  <body>
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form action="login.php" method="post" autocomplete="off" class="sign-in-form">
              <div class="logo">
                <img src="assets/css/img/logo.png" alt="easyclass" />
                <h4>Aggregte Agro</h4>
              </div>

              <div class="heading">
                <h2>Welcome Back</h2>
                <h6>Not registred yet?</h6>
                <a href="#" class="toggle">Sign up</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="email" class="input-field" autocomplete="off" name="email1" required/>
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input type="password" class="input-field" autocomplete="off" name="password1" required/>
                  <label>Password</label>
                </div>
                <?php
                    if($invalid){
                        echo '<div class="alert alert-danger" role="alert">
                            Invalid Login Details!
                        </div>'; 
                    }
                ?>

                <input type="submit" name="submit" value="Sign In" class="sign-btn" />
                    <?php
                    if($login == false){
                      // echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";
                      ?>
                            <div class="row">
                                <div class="col-md-12">
                                  <?php
                                  echo "
                                  <a class='btn btn-lg btn-google btn-block text-uppercase btn-outline' href='".$client->createAuthUrl()."'><img src='https://img.icons8.com/color/16/000000/google-logo.png'> Login With Google</a> ";
                                    ?>

                                </div>
                            </div>
                      <?php
                    }else{
                      echo "loggedin";
                    }
                    ?>
                

                <p class="text">
                  Forgotten your password or you login datails?
                  <a href="#">Get help</a> signing in
                </p>
              </div>
            </form>

            <form action="login.php" method="post" autocomplete="off" class="sign-up-form">
              <div class="logo">
                <img src="assets/css/img/logo.png" alt="easyclass" />
                <h4>Aggregte Agro</h4>
              </div>

              <div class="heading">
                <h2>Get Started</h2>
                <h6>Already have an account?</h6>
                <a href="#" class="toggle">Sign in</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input type="text" minlength="4" class="input-field" autocomplete="off" name="first_name" required />
                  <label>First Name</label>
                </div>

                <div class="input-wrap">
                  <input type="text" minlength="4" class="input-field" autocomplete="off" name="last_name" required />
                  <label>Last Name</label>
                </div>

                <div class="input-wrap">
                  <input type="email" class="input-field" autocomplete="off" name="mail" required />
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input type="number" class="input-field" autocomplete="off" name="phoneno" required />
                  <label>Mobile No</label>
                </div>

                <div class="input-wrap">
                  <input type="password" class="input-field" autocomplete="off" name="password" required />
                  <label>Password</label>
                </div>

                <div class="input-wrap">
                  <input type="password" class="input-field" autocomplete="off" name="confirm_password" required />
                  <label>Confirm Password</label>
                </div>



                <input type="submit" name="submit1" value="Sign Up" class="sign-btn" />

                <p class="text">
                  By signing up, I agree to the
                  <a href="#">Terms of Services</a> and
                  <a href="#">Privacy Policy</a>
                </p>
              </div>
            </form>
          </div>

          <div class="carousel">
            <!-- <div class="wrapper"> -->
              <div class="count_1">
              <div class="container">
                <!-- <i class="fa-solid fa-w"></i> -->
                <span class="num" data-val="400">000</span>
                <span class="text">Worker</span>
              </div>
        
              <div class="container">
                <!-- <i class="fa-solid fa-f"></i> -->
                <span class="num" data-val="340">000</span>
                <span class="text">Farmer</span>
              </div>

            </div>
        
              <div class="count_1">          
                    <div class="container">
                      <!-- <i class="fa-solid fa-s"></i> -->
                <span class="num" data-val="225">000</span>
                <span class="text">Seller</span>
              </div>
        
              <div class="container">
                <!-- <i class="fa-solid fa-y"></i> -->
                <span class="num" data-val="280">000</span>
                <span class="text">Yard</span>
              </div>
            </div>
          <!-- </div> -->

          </div>
        </div>
      </div>
    </main>

    <!-- Javascript file -->

    <script src="assets/js/script.js"></script>
  </body>
</html>
