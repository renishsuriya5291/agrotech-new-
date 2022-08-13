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

<!-- Mirrored from themetechmount.net/html/agrotek/home-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Aug 2022 04:29:54 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="Agrotek – Agriculture HTML Template" />
<meta name="author" content="https://www.themetechmount.com/" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>Agrotek – Agriculture HTML Template</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
    


    <style>
      #user_request {
        overflow: scroll;
        height: 100vh;
        max-height: 260px;
      }

      #request_form {
        display: flex;
        gap: 5px;
      }

      .card {
        margin-bottom: 10px;
      }

      #main_userimg {
        width: 40px;
      }

      #sub_userimg {
        width: 100%;
        box-shadow: 1px 1px 6px black;
      }

      #user {
        display: flex;
        align-items: center;
      }

      #user_name {
        margin-left: 10px;
        margin-bottom: 17px;
      }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    


  </head>

  <body>
    <section style="background-color: #eee">
      <div class="container py-5">
        <div class="row">
          <div class="col">
            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                  User Profile
                </li>
              </ol>
            </nav>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4">
            <div class="card mb-4">
              <div class="card-body text-center">
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
                <img
                  src="<?php echo $userinfo['picture'];?>"
                  alt="avatar"
                  class="rounded-circle img-fluid"
                  style="width: 150px"
                />
                <?php
                }
                ?>
                <h5 class="my-3"><?php echo $userinfo['fullname']; ?></h5>
                <!-- <p class="text-muted mb-1">abcd@gmail.com</p> -->
                <div class="d-flex justify-content-center mb-2">
                  <button type="button" class="btn btn-primary">
                    Edit Profile
                  </button>
                  <button type="button" class="btn btn-outline-primary ms-1">
                    Edit Photo
                  </button>
                </div>
              </div>
            </div>
            <div class="card mb-4 mb-lg-0" id="user_request">
              <div class="card-body p-0">
                <div class="card">
                  <!-- <div class="card-header">
                                    Featured
                                </div> -->
                  <div class="card-body">
                    <div id="user">
                      <div class="col-md-6 mb-4" id="main_userimg">
                        <img
                          class="rounded-circle z-depth-2"
                          alt="100x100"
                          src="https://mdbootstrap.com/img/Photos/Avatars/img%20(31).jpg"
                          data-holder-rendered="true"
                          id="sub_userimg"
                        />
                      </div>
                      <h5 class="card-title" id="user_name">ABCD</h5>
                    </div>
                    <p class="card-text">ABCD Requested 5 min Ago.</p>

                    <div id="request_form">
                      <form action="profile-detail.html">
                        <input
                          type="submit"
                          value="Accept"
                          class="btn btn-primary"
                        />
                      </form>

                      <form action="profile-detail.html">
                        <input
                          type="submit"
                          value="Decline"
                          class="btn btn-primary"
                        />
                      </form>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <!-- <div class="card-header">
                                    Featured
                                </div> -->
                  <div class="card-body">
                    <div id="user">
                      <div class="col-md-6 mb-4" id="main_userimg">
                        <img
                          class="rounded-circle z-depth-2"
                          alt="100x100"
                          src="https://mdbootstrap.com/img/Photos/Avatars/img%20(31).jpg"
                          data-holder-rendered="true"
                          id="sub_userimg"
                        />
                      </div>
                      <h5 class="card-title" id="user_name">ABCD</h5>
                    </div>

                    <div id="request_form">
                      <form action="profile-detail.html">
                        <input
                          type="submit"
                          value="Accept"
                          class="btn btn-primary"
                        />
                      </form>

                      <form action="profile-detail.html">
                        <input
                          type="submit"
                          value="Decline"
                          class="btn btn-primary"
                        />
                      </form>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <!-- <div class="card-header">
                                    Featured
                                </div> -->
                  <div class="card-body">
                    <div id="user">
                      <div class="col-md-6 mb-4" id="main_userimg">
                        <img
                          class="rounded-circle z-depth-2"
                          alt="100x100"
                          src="https://mdbootstrap.com/img/Photos/Avatars/img%20(31).jpg"
                          data-holder-rendered="true"
                          id="sub_userimg"
                        />
                      </div>
                      <h5 class="card-title" id="user_name">ABCD</h5>
                    </div>

                    <div id="request_form">
                      <form action="profile-detail.html">
                        <input
                          type="submit"
                          value="Accept"
                          class="btn btn-primary"
                        />
                      </form>

                      <form action="profile-detail.html">
                        <input
                          type="submit"
                          value="Decline"
                          class="btn btn-primary"
                        />
                      </form>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <!-- <div class="card-header">
                                    Featured
                                </div> -->
                  <div class="card-body">
                    <div id="user">
                      <div class="col-md-6 mb-4" id="main_userimg">
                        <img
                          class="rounded-circle z-depth-2"
                          alt="100x100"
                          src="https://mdbootstrap.com/img/Photos/Avatars/img%20(31).jpg"
                          data-holder-rendered="true"
                          id="sub_userimg"
                        />
                      </div>
                      <h5 class="card-title" id="user_name">ABCD</h5>
                    </div>

                    <div id="request_form">
                      <form action="profile-detail.html">
                        <input
                          type="submit"
                          value="Accept"
                          class="btn btn-primary"
                        />
                      </form>

                      <form action="profile-detail.html">
                        <input
                          type="submit"
                          value="Decline"
                          class="btn btn-primary"
                        />
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="card mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Full Name</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?php echo $userinfo['fullname']; ?></p>
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?php echo $userinfo['email']; ?></p>
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Contact No.</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">(097) 234-5678</p>
                  </div>
                </div>
                <hr />

                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Address</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
                  </div>
                </div>

                <hr />

                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Gender</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">Male</p>
                  </div>
                </div>

                <hr />

                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Age</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">20</p>
                  </div>
                </div>

                <hr />

                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Work Hour</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">10 Hours</p>
                  </div>
                </div>

                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Approx. Salary</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">20,000</p>
                  </div>
                </div>
              </div>
            </div>
            <a href="../logout.php" class="btn btn-primary">
            Logout
          </a>
            <!-- <div class="row">
              <div class="col-md-6">
                <div class="card mb-4 mb-md-0">
                  <div class="card-body">
                    <p class="mb-4">
                      <span class="text-primary font-italic me-1"
                        >assigment</span
                      >
                      Project Status
                    </p>
                    <p class="mb-1" style="font-size: 0.77rem">Web Design</p>
                    <div class="progress rounded" style="height: 5px">
                      <div
                        class="progress-bar"
                        role="progressbar"
                        style="width: 80%"
                        aria-valuenow="80"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                    <p class="mt-4 mb-1" style="font-size: 0.77rem">
                      Website Markup
                    </p>
                    <div class="progress rounded" style="height: 5px">
                      <div
                        class="progress-bar"
                        role="progressbar"
                        style="width: 72%"
                        aria-valuenow="72"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                    <p class="mt-4 mb-1" style="font-size: 0.77rem">One Page</p>
                    <div class="progress rounded" style="height: 5px">
                      <div
                        class="progress-bar"
                        role="progressbar"
                        style="width: 89%"
                        aria-valuenow="89"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                    <p class="mt-4 mb-1" style="font-size: 0.77rem">
                      Mobile Template
                    </p>
                    <div class="progress rounded" style="height: 5px">
                      <div
                        class="progress-bar"
                        role="progressbar"
                        style="width: 55%"
                        aria-valuenow="55"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                    <p class="mt-4 mb-1" style="font-size: 0.77rem">
                      Backend API
                    </p>
                    <div class="progress rounded mb-2" style="height: 5px">
                      <div
                        class="progress-bar"
                        role="progressbar"
                        style="width: 66%"
                        aria-valuenow="66"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </section>
    <!-- Remove the container if you want to extend the Footer to full width. -->
    <div class="containerr">
  <!-- Footer -->
<?php
include "footer.php";
?>
  <!-- Footer -->
</div>
<!-- End of .container -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
      integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
      integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK"
      crossorigin="anonymous"
    ></script>
    <script src="https://kit.fontawesome.com/a39e83833a.js" crossorigin="anonymous"></script>
     <!-- <script src="js/jquery.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.easing.js"></script>    
        <script src="js/jquery-waypoints.js"></script>    
        <script src="js/jquery-validate.js"></script> 
        <script src="js/slick.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/numinate.min6959.js?ver=4.9.3"></script>
        <script src="js/main.js"></script>

         Revolution Slider 
        <script src="revolution/js/revolution.tools.min.js"></script>
        <script src="revolution/js/rs6.min.js"></script>
        <script src="revolution/js/slider.js"></script>  -->
  </body>
</html>
