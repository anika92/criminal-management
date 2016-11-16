<?php
session_start();
include_once('vendor/autoload.php');
use App\Message\Message;
$_POST['name']="Bitm";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Resource/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="Resources/css/one-page-wonder.css">
    <link rel="stylesheet" type="text/css" href="Resource/bootstrap/js/bootstrap.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="index.php" >Home</a>
                </li>
                <li>
                    <a href="views/missing_person/missing_index.php">Missing Person</a>
                </li>
                <li>
                    <a href="views/criminal_info/mostwanted_index.php">Most Wanted</a>
                </li>
                <li>
                    <a href="views/criminal_info/criminalAll.php">View All Criminals</a>
                </li>


            </ul>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Full Width Image Header -->
<header class="header-image">
    <div class="headline">
        <div class="container">

            <h2>Welcome To Criminal Management System</h2>
        </div>
    </div>
</header>

<!-- Page Content -->
<div class="container">
    <hr class="featurette-divider">
    <div class="row">
        <div class="col-md-8">




            <!-- First Featurette -->

            <img class="featurette-image img-circle img-responsive pull-right" src="Resources/images/content.jpg">
            <h2><span>Criminals should be punished,<br> not fed pastries.</span>

            </h2>
            <p class="lead">Welcome To Criminal Database Management System. It is designed to Make people aware from crime. Here People can make online complaints to the Police Station. In order to do so first they have to register themselves on the system.
                User can also see the list of Most Wanted Criminals in various area through this web application. Here you can also see the detail of Miising person so you can contact to the person if you find such persons.</p>
        </div>
        <div class="col-md-4">

            <h2>Member Login</h2>
            <div class="message">
                <?php if((array_key_exists('message',$_SESSION)&& (!empty($_SESSION['message'])))) {
                    echo Message::message();
                }
                ?>
            </div>
            <?php $_POST['userType']="User" ?>
            <form action="views/authentication/login.php" class="" method="post">
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email Address">
                </div>

                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter Password">
                </div>



                <button type="submit" class="btn btn-default">Submit</button><br><br>
                <a href="views/user/regUser.php"> <input type="button" class="btn btn-success" value="Register" /></a>

                <!-- <label><span class="style1">Username</span></label>
                 <input type="text" value="" name="username" size="10" class="input_field" title="username" /><br>
                 <label><span class="style1">Password</span></label>
                 <input type="password" value="" name="password" class="input_field" title="password" /><br>
                 <label><span class="style1">Select User</span></label>

                 <label>
                     <select name="cmbUser" id="cmbUser">
                         <option>User</option>
                         <option>Police</option>
                         <option>Admin</option>
                     </select>
                 </label><br>
                 <input type="submit" name="login" value="Login" alt="login" id="submit_btn" title="Login" />
 -->
            </form>
            <div class="cleaner"></div>

        </div>

    </div>

    <hr class="featurette-divider">

    <!-- Second Featurette -->



    <!-- Third Featurette -->


    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
        </div>
    </footer>

</div>
<!-- /.container -->

<!-- jQuery -->

</body>

</html>
