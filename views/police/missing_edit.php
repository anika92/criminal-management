<?php
//session_start();
include_once('../../vendor/autoload.php');
use App\Controller\MissingPerson;
use App\Controller\Auth;
use App\Controller\RegAdmin;
use App\Message\Message;
use App\Utility\Utility;
$mp = new MissingPerson();
$singleView = $mp->prepare($_GET)->view();
//use App\Message\Message;

$auth= new Auth();
$status= $auth->logged_in();
if($status== FALSE){
    Message::message("<div class=\"alert alert-success\">
  <strong>Hey!</strong>You have to log in before view this page
</div>");
     Utility::redirect('../../index.php');

}
$fetch=$auth->fetchInfo();
$station=new RegAdmin();
$all_station=$station->indexstation();
$_SESSION['image']=$fetch->image;
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../Resources/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../Resources/css/one-page-wonder.css">
    <link rel="stylesheet" type="text/css" href="../../Resources/bootstrap/js/bootstrap.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<!--<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->

<!-- Collect the nav links, forms, and other content for toggling -->

<!-- /.navbar-collapse -->
<!--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
        <li class="active">
            <a href="../../index.php" >Home</a>
        </li>
        <li>
            <a href="#about">Missing Person</a>
        </li>
        <li>
            <a href="#services">Most Wanted</a>
        </li>
        <li>
            <a href="#contact">Contact Us</a>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Register As <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="views/police/regPolice.php">Police</a></li>
                <li><a href="views/user/regUser.php">Public</a></li>

            </ul>
        </li>
    </ul>
    <ul class="dropdown-menu">Register As
        <li><a href="#">HTML</a></li>
        <li><a href="#">CSS</a></li>
        <li><a href="#">JavaScript</a></li>
    </ul>
</div></nav>
<!-- /.container -->


<!-- Full Width Image Header -->
<br>

<div class="view">
    <div class="row" >

        <div class="col-lg-12">
            <h1 class="page-header" align="center">View Individual Missing Person</h1>
        </div>

        <div class="table-bordered" style="border: solid gray">
            <br>
            <form role="form" action="../missing_person/update.php" method="post" enctype="multipart/form-data">
                <div class="thumbnail">
                    <img class="img-responsive" src="../../Resources/images/missing_persons/<?php echo $singleView->image?>" alt="" height="300px" width="400px">
                    <level>Select Image:</level><buttn><input type="file" class="input-group-lg form-control" id="pwd" name="image"></buttn>
                </div>




                <table class="table table-striped">

                    <tbody>
                    <tr><td>Name:</td><td>
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo $singleView->missing_id ?>">
                                <input type="text" class="form-control" id="usr" name="name" value="<?php echo $singleView->missing_name?>">
                            </div>
                        </td></tr>

                    <tr><td>Description:</td><td>
                            <div class="form-group">
                                <input type="text" class="form-control" id="des" name="description" value="<?php echo $singleView->description?>">
                            </div>
                        </td></tr>
                    <tr><td>Age:</td><td>
                            <div class="form-group">
                                <input type="text" class="form-control" id="age" name="age" value="<?php echo $singleView->age?>">
                            </div>
                        </td></tr>

                    <tr><td>Height:</td><td>
                            <div class="form-group">
                                <input type="text" class="form-control" id="height" name="height" value="<?php echo $singleView->height?>">
                            </div>
                        </td></tr>

                    <tr><td>Gender:</td><td>
                            <div class="column column1"><label>
                                    <input type="radio" name="gender" value="Male" value="Male" name="gender" <?php if($singleView->gender==="Male")echo "checked";  ?> />
                                    <span>Male</span></label>
                                <label><input type="radio" name="gender" value="Female" <?php if($singleView->gender==="Female")echo "checked";  ?>  />
                                    <span>Female</span></label>
                            </div><span class="clearfix"></span>
                        </td></tr>
                    <tr><td>station:</td><td>
                    <select name="station_name" >
                        <?php
                        foreach($all_station as $p_station){

                            ?>
                            <option value="<?php echo $p_station->station_id ?>" <?php if($p_station->station_name==$singleView->station_name)echo "selected" ?>><?php echo $p_station->station_name ?></option>

                        <?php }?></select>
                        </td></tr>

                    <tr><td>Address:</td><td>
                            <div class="form-group">
                                <input type="text" class="form-control" id="address" name="address" value="<?php echo $singleView->address?>">
                            </div>
                        </td></tr>

                    <tr><td>Date:</td><td>
                            <div class="form-group">
                                <div class="element-date"><label class="title">

                                    </label><div class="item-cont">
                                        <input type="date" name="date" data-format="yyyy-mm-dd" class="form-control" id="date" value="<?php echo $singleView->date ?>" />
                                        <!-- <input class="form-control" data-format="yyyy-mm-dd" type="date" id="date" name="date" value="<?php /*echo $singleView->date */?>"/>
                                    --><span class="icon-place"></span></div></div>

                            </div>
                        </td></tr>

                    <tr><td>Status:</td><td>
                            <div class="form-group">
                                <select name="status" >

                                    <option value="Still Missing" <?php if($singleView->status==="Still Missing")echo "selected";  ?>>Still Missing</option>
                                    <option value="Found" <?php if($singleView->status==="Found")echo "selected";  ?>>Found</option>
                                </select>
                            </div>
                        </td></tr>



                    </tbody>
                </table>
                </br>
                <div>
                    <input type="submit" value="Update">
                </div>

            </form>
            <!-- Stop Formoid form-->

        </div>
        <p class="frmd"><a href="http://formoid.com/v29.php">form html</a> Formoid.com 2.9</p><script type="text/javascript" src="../../Resources/formoid_files/formoid1/formoid-solid-blue.js"></script>



    </div>
</div>
</div>





<hr>



<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
