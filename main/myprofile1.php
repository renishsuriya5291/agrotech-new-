<?php
require "db/db.php";
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
    $sql = "SELECT * FROM register WHERE email = '{$_SESSION['email']}' ";
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
    <title>Profile</title>

    <!-- ===== ===== Custom Css ===== ===== -->
    <!-- <link rel="stylesheet" href="assets/css/myprofileresponsive.css"> -->
    <link rel="icon" type="image/x-icon" href="images/logopan.png">
    
    <link rel="stylesheet" href="css/myprofilestyle.css">
    <link rel="stylesheet" href="css/myprofileresponsive.css">

    <!-- ===== ===== Remix Font Icons Cdn ===== ===== -->
    <link rel="stylesheet" href="fonts/remixicon.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        
        body {
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }

        .user_reqname {
            margin-bottom: var(--m-1-8);
            font-size: var(--m-fs);
            color: rgba(0, 0, 0, 0.6);
            line-height: 1.6rem;
            margin-top: 5px;
        }

        section#user_reqsection {
            height: 485px;
            overflow-x: hidden;
            overflow-y: scroll;
            margin-top: 27px;
        }

        section#worker_pinfo {
            margin-top: 15px;
            height: 499px;
            margin-left: 10px;
        }

        section#worker_name {
            margin-left: 10px;
        }

        .rating {
            display: flex;
            align-items: center;
        }

        .contact_Info {
            line-height: 36px;
        }

        .contact_Info ul li {
            line-height: 22px;
            margin-top: 10px;
        }

        .basic_info {
            margin-top: 36px;
        }

        h1#basic_info {
            color: black;
            font-size: 13px;
        }


    </style>
</head>

<body>
<?php
        // include "workernav.php";
    ?>
    <!-- ===== ===== Body Main-Background ===== ===== -->
    <span class="main_bg"></span>


    <!-- ===== ===== Main-Container ===== ===== -->
    <div class="container">

        <!-- ===== ===== Header/Navbar ===== ===== -->
        <header>
            <div class="brandLogo">
                <figure><img src="images/logopan.png" alt="logo" width="40px" height="40px"></figure>
                <span>Aggretech Agro</span>
            </div>
        </header>


        <!-- ===== ===== User Main-Profile ===== ===== -->
        <section class="userProfile card">
            <div class="profile">
                <?php
                if(!isset($userinfo['picture'])){
                    ?>
                <figure><img src="assets/css/img/person1.jpg" alt="profile" width="250px" height="250px"></figure>
                    <?php
                }else{
                    ?>
                    <figure><img src="<?php echo $userinfo['picture']; ?>" alt="profile" width="250px" height="250px"></figure>
                    
                    <?php
                }
                    ?>
            </div>
        </section>


        <!-- ===== ===== Work & Skills Section ===== ===== -->
        <section class="work_skills card" id="user_reqsection">

            <!-- ===== ===== Work Contaienr ===== ===== -->
            <div class="work">
                <h1 class="heading">Activity</h1>
                <div class="primary">
                    <h1>Roshan Thummar</h1>
                    <p class="user_reqname">Roshan Thummar <br> Requested You, 5 min Ago</p>
                </div>

                <div class="primary">
                    <h1>Renish Suriya</h1>
                    <p class="user_reqname">Renish Suriya <br> Requested You, 10 min Ago</p>
                </div>
            </div>

            <div class="primary">
                <h1>Patel Deep</h1>
                <p class="user_reqname">Patel Deep <br> Requested You, 10 min Ago</p>
            </div>

            <div class="primary">
                <h1>Gorasiya Jay</h1>
                <p class="user_reqname">Gorasiya Jay <br> Requested You, 10 min Ago</p>
            </div>

            <div class="primary">
                <h1>Harsh ujainiya</h1>
                <p class="user_reqname">Harsh Ujainiya <br> Requested You, 10 min Ago</p>
            </div>

            <div class="primary">
                <h1>Dharmik Hingu</h1>
                <p class="user_reqname">Dharmik Hingu<br> Requested You, 10 min Ago</p>
            </div>

            <div class="primary">
                <h1>Karan Chauhan</h1>
                <p class="user_reqname">Karan Chauhan <br> Requested You, 10 min Ago</p>
            </div>

            <div class="primary">
                <h1>Meet Dobariya</h1>
                <p class="user_reqname">Meet Dobariya <br> Requested You, 10 min Ago</p>
            </div>

            <div class="primary">
                <h1>Kheni Heet</h1>
                <p class="user_reqname">Kheni Heet <br> Requested You, 10 min Ago</p>
            </div>

            <div class="primary">
                <h1>Arpit Vavaliya</h1>
                <p class="user_reqname">Arpit Vavaliya <br> Requested You, 10 min Ago</p>
            </div>

            <div class="primary">
                <h1>Dhruv Vaghasiya</h1>
                <p class="user_reqname">Dhruv Vagashiya <br> Requested You, 10 min Ago</p>
            </div>

            <div class="primary">
                <h1>Brij Lathiya</h1>
                <p class="user_reqname">Brij Lathiya <br> Requested You, 10 min Ago</p>
            </div>

            <div class="primary">
                <h1>Adnan Dadani</h1>
                <p class="user_reqname">Adnan Dadani <br> Requested You, 10 min Ago</p>
            </div>


            <div class="primary">
                <h1>Jadav Hardik</h1>
                <p class="user_reqname">Jadav Hardik <br> Requested You, 10 min Ago</p>
            </div>

            <div class="primary">
                <h1>Rana Neel</h1>
                <p class="user_reqname">Rana Neel <br> Requested You, 10 min Ago</p>
            </div>

            <!-- ===== ===== Skills Contaienr ===== ===== -->
            <!-- <div class="skills">
                <h1 class="heading">Skills</h1>
                <div class="primary">
                    <h1>Renish Suriya</h1>
                    <span>Primary</span>
                    <p>Renish Suriya <br> Requested You, 10 min Ago</p>
                </div>
            </div> -->
        </section>


        <!-- ===== ===== User Details Sections ===== ===== -->
        <section class="userDetails card" id="worker_name">
            <div class="userName">
                <h1 class="name"><?php
                if(isset($userinfo['fullname'])){
                    echo $userinfo['fullname'];
                 }else{
                    echo $userinfo['first_name'].' '.$userinfo['last_name'];
                 } ?></h1></h1>
                <p>Surat, Gujarat</p>
            </div>

            <div class="rank">
                <h1 class="heading">Rankings</h1>
                <span>8.6</span>
                <div class="rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="ri-star-fill rate underrate"></i>
                </div>
            </div>

            <div class="btns">
                <ul>

                    <li class="sendMsg active">
                        <i class="ri-check-fill ri"></i>
                        <a href="#">Edit Profile</a>
                    </li>

                    <li class="sendMsg">
                        <a href="#">Edit Profile</a>
                    </li>

                    <li class="sendMsg active">
                        <i class="ri-check-fill ri"></i>
                        <a href="logout.php">Log Out</a>
                    </li>

                </ul>
            </div>
        </section>


        <!-- ===== ===== Timeline & About Sections ===== ===== -->
        <section class="timeline_about card" id="worker_pinfo">
            <div class="tabs">
                <ul>


                    <li class="about active">
                        <i class="ri-user-3-fill ri"></i>
                        <span>About</span>
                    </li>
                </ul>
            </div>

            <div class="contact_Info">
                <h1 class="heading">Contact Information</h1>
                <ul>
                    <li class="phone">
                        <h1 class="label">Phone:</h1>
                        <span class="info"><?php echo $userinfo['phoneno']; ?></span>
                    </li>

                    <li class="address">
                        <h1 class="label">Address:</h1>
                        <span class="info">B-303 <br> Mota Varachha, Surat, Gujarat</span>
                    </li>

                    <li class="email">
                        <h1 class="label">E-mail:</h1>
                        <span class="info"><?php echo $userinfo['email']; ?></span>
                    </li>
                    <?php
                    if(isset($userinfo['first_name'])){
                    ?>
                    <li class="site">
                        <h1 class="label">Occupation</h1>
                        <span class="info"><?php echo $userinfo['occupation']; ?></span>
                    </li>
                    <?php
                    }
                    ?>
                    
                </ul>
            </div>

            <div class="basic_info">
                <h1 class="heading" id="basic_info">Basic Information</h1>
                <ul>
                    <li class="birthday">
                        <h1 class="label">Birthday:</h1>
                        <span class="info">14-July-2005</span>
                    </li>

                    <li class="sex">
                        <h1 class="label">Gender:</h1>
                        <span class="info">Male</span>
                    </li>
                </ul>
            </div>
        </section>
    </div>

</body>

</html>