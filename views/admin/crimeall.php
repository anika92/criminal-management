<?php
include_once('../../vendor/autoload.php');

use App\Controller\Auth;
use App\Message\Message;
use App\Utility\Utility;
use App\Controller\RegPolice;
use App\Controller\CriminalInfo;

$auth= new Auth();
$status= $auth->logged_in();
if($status == TRUE) {
    $fetch=$auth->fetchInfo();

    $criminal= new CriminalInfo();
    $all= $criminal->allName();

    $commaSeparated= implode('","',$all);
    $allcrime= $criminal->indexcrime();
    $allcriminaltype= $criminal->indexcriminal();

    if(array_key_exists('itemPerPage',$_SESSION)) {
        if (array_key_exists('itemPerPage', $_GET)) {
            $_SESSION['itemPerPage'] = $_GET['itemPerPage'];
        }
    }
    else{
        $_SESSION['itemPerPage']=5;
    }

//Utility::dd($_SESSION['itemPerPage']);

    $itemPerPage=$_SESSION['itemPerPage'];
    $totalItem=$criminal->count();



    $totalPage=ceil($totalItem/$itemPerPage);
//Utility::dd($itemPerPage);
    $pagination="";


    if(array_key_exists('pageNumber',$_GET)){
        $pageNumber=$_GET['pageNumber'];
    }else{
        $pageNumber=1;
    }
    for($i=1;$i<=$totalPage;$i++){
        $class=($pageNumber==$i)?"active":"";
        $pagination.="<li class='$class'><a href='crimeall.php?pageNumber=$i'>$i</a></li>";
    }

    $pageStartFrom=$itemPerPage*($pageNumber-1);

    if(strtoupper($_SERVER['REQUEST_METHOD']=='GET')) {
        $allcriminal=$criminal->paginator($pageStartFrom,$itemPerPage);
    }
    if(strtoupper($_SERVER['REQUEST_METHOD']=='POST')) {
        $allcriminal=$criminal->prepare($_POST)->index();
    }
    if(strtoupper(($_SERVER['REQUEST_METHOD']=='GET')) && isset($_GET['search'])) {
        $allcriminal=$criminal->prepare($_GET)->index();
    }


    ?>

    <!DOCTYPE html>
    <!--
    This is a starter template page. Use this page to start your new project from
    scratch. This page gets rid of all links and provides the needed markup only.
    -->
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Starter</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="../../Resources/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../Resources/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        -->
        <link rel="stylesheet" href="../../Resources/css/skins/skin-blue.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <!--
    BODY TAG OPTIONS:
    =================
    Apply one or more of the following classes to get the
    desired effect
    |---------------------------------------------------------|
    | SKINS         | skin-blue                               |
    |               | skin-black                              |
    |               | skin-purple                             |
    |               | skin-yellow                             |
    |               | skin-red                                |
    |               | skin-green                              |
    |---------------------------------------------------------|
    |LAYOUT OPTIONS | fixed                                   |
    |               | layout-boxed                            |
    |               | layout-top-nav                          |
    |               | sidebar-collapse                        |
    |               | sidebar-mini                            |
    |---------------------------------------------------------|
    -->
    <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="#" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Admin</b>LTE</span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->

                        <!-- /.messages-menu -->

                        <!-- Notifications Menu -->

                        <!-- Tasks Menu -->

                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="../../Resources/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs"><?php echo $fetch->name ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="../../Resources/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    <p>
                                       <?php echo $fetch->name ?>

                                    </p>
                                </li>
                                <!-- Menu Body -->

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../authentication/logout.php" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="../../Resources/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo $fetch->name ?></p>
                        <!-- Status -->

                    </div>
                </div>

                <!-- search form (Optional) -->

                <!-- /.search form -->

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu">
                    <li class="header">HEADER</li>
                    <!-- Optionally, you can add icons to the links -->
                    <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-link"></i> <span>Police</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="policeall.php">View List</a></li>
                            <li><a href="station.php">Add Station</a></li>
                            <li><a href="police_add.php">Add Police</a></li>

                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-link"></i> <span>Crime Control</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="crimeall.php">View List</a></li>
                            <li><a href="../crime_type/crime.php">Manage Crime</a></li>
                            <li><a href="criminal_add.php">Manage Criminals</a></li>

                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-link"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="userall.php">View List</a></li>

                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-link"></i> <span>Missing People</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="missingall.php">View List</a></li>

                        </ul>
                    </li>


                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>

                    <small></small>
                </h1>

            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Crime List</h3>
                            </div>
                            <div class="box-body">
                                <table id="crimetable" class="table table-bordered table-striped">
                                    <tr>

                                        <th>Id</th>
                                        <th>Crime Type</th>
                                       <th>Action</th>
                                    </tr>
                                    <?php
                                    foreach($allcrime as $crime){

                                        ?>

                                        <tr>
                                            <td><?php echo $crime->crime_id ?></td>
                                            <td><?php echo $crime->crime_type ?></td>

                                            <td>
                                                <a href="crimeType_edit.php?id=<?php echo $crime->crime_id ?>" class="btn bg-teal" role="button">Edit</a>
                                                <a href="delete_crime_type.php?id=<?php echo $crime->crime_id ?>" id="delete" class="btn btn-danger" role="button">Delete</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                        </div>

                        <div class="col-md-6">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Criminal Type List</h3>
                                </div>
                                <div class="box-body">

                                    <table id="crimetable" class="table table-bordered table-striped">
                                        <tr>

                                            <th>Id</th>
                                            <th>Criminal Type</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php
                                        foreach($allcriminaltype as $criminal){

                                            ?>

                                            <tr>
                                                <td><?php echo $criminal->c_t_id ?></td>
                                                <td><?php echo $criminal->c_t_type ?></td>

                                                <td>
                                                    <a href="edit.php?id=<?php echo $criminal->c_t_id ?>" class="btn bg-teal" role="button">Edit</a>
                                                    <a href="delete.php?id=<?php echo $criminal->c_t_id ?>" class="btn btn-danger" role="button">Delete</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Criminals</h3>
                    </div>
                    <form role="form">
                        <div class="form-group">
                            <label>item per page:</label>
                            <select class="form-control" name="itemPerPage">
                                <option <?php if($itemPerPage==5 ){?>selected<?php  } ?>>5</option>
                                <option <?php if($itemPerPage==10 ){?>selected<?php } ?>>10</option>
                                <option <?php if($itemPerPage==15 ){?>selected<?php } ?>>15</option>
                                <option <?php if($itemPerPage==20 ){?>selected<?php } ?>>20</option>
                                <option <?php if($itemPerPage==25 ){?>selected<?php } ?>>25</option>

                            </select>
                            <button type="submit">Go!</button>

                        </div>
                    </form>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form role="form" action="crimeall.php" method="post">
                                    <div class="form-group">
                                        <label>Filter by Name:</label>
                                        <input type="text" name="filterByName" value="" id="filterByName">
                                        <button type="submit">Submit!</button>
                                    </div>

                                </form>
                            </div>
                            <div class="col-md-6">
                                <form role="form" action="crimeall.php" method="get">
                                    <div class="form-group">
                                        <label>Search:</label>
                                        <input type="text" name="search" value="">
                                        <button type="submit">Search</button>
                                    </div>

                                </form>
                            </div>
                        </div>

                        <table id="crimetable" class="table table-bordered table-striped">
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Crime Type</th>
                                <th>Criminal Type</th>
                                <th>Age</th>
                                <th>Height</th>
                                <th>Description</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            foreach( $allcriminal as $info){

                                ?>

                                <tr>
                                    <td><img src="../../Resources/images/criminals/<?php echo $info->image ?>" alt="image" height="100px" width="100px"/></td>
                                    <td><?php echo $info->name ?></td>
                                    <td><?php echo $info->crime_type ?></td>
                                    <td><?php echo $info->c_t_type ?></td>
                                    <td><?php echo $info->age ?></td>
                                    <td><?php echo $info->height ?></td>
                                    <td><?php echo $info->description ?></td>
                                    <td><?php echo $info->gender ?></td>
                                    <td><?php echo $info->address ?></td>
                                    <td>
                                        <a href="criminal_view.php?id=<?php echo $info->c_id ?>" class="btn bg-navy" role="button">View</a>
                                        <a href="criminal_edit.php?id=<?php echo $info->c_id ?>" class="btn bg-teal" role="button">Edit</a>
                                        <a href="delete.php?id=<?php echo $info->c_id ?>" class="btn btn-danger" role="button">Delete</a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                    <ul class="pagination">
                        <?php if($pageNumber>1){?>
                            <li><a href="crimeall.php?pageNumber=<?php echo $pageNumber-1?>">Prev</a></li><?php };?>
                        <?php echo $pagination?>
                        <?php if($pageNumber<$totalPage){?>
                            <li><a href="crimeall.php?pageNumber=<?php echo $pageNumber+1?>">Next</a></li><?php };?>
                    </ul>
                </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="pull-right hidden-xs">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane active" id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading">Recent Activity</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript::;">
                                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                    <p>Will be 23 on April 24th</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                    <h3 class="control-sidebar-heading">Tasks Progress</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript::;">
                                <h4 class="control-sidebar-subheading">
                                    Custom Template Design
                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                </div>
                <!-- /.tab-pane -->
                <!-- Stats tab content -->
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                <!-- /.tab-pane -->
                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <form method="post">
                        <h3 class="control-sidebar-heading">General Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Report panel usage
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Some information about this general settings option
                            </p>
                        </div>
                        <!-- /.form-group -->
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.2.3 -->
    <script src="../../Resources/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="../../Resources/bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../Resources/js/app.min.js"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
    <script type="text/javascript">

        $('.message').show().delay(2000).fadeOut();

        $(document).ready(function(){


            $("#delete").click(function(){
                if (!confirm("Do you want to delete")){
                    return false;
                }
            });
        });
    </script>
    <script>
        $( function() {
            var availableTags = [
                <?php echo '"'.$commaSeparated.'"' ?>
            ];
            $( "#filterName" ).autocomplete({
                source: availableTags
            });

        } );
    </script>
    </body>
    </html>
<?php } ?>