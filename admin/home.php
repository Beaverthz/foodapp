<?php
session_start();
if(!isset($_SESSION['log_id']))
{
    header("Location:../index.php");
    }
    ?><!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Agency - Start Bootstrap Theme</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/home.css" rel="stylesheet" type="text/css"/>
        <!--<link href="css/agency.css" rel="stylesheet">-->
        <script src="../js/jquery-3.2.0.min.js" type="text/javascript"></script>
        <script src="../js/myjs.js" type="text/javascript"></script>
        <!-- Custom Fonts -->
        <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body id="page-top" class="index">

        <?php
//        session_start();
//        $hotel_name = $_SESSION["hotel_name"];
        ?>

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand page-scroll" href="#page-top"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href='home.php' class="page-scroll">Welcome Admin</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="logout.php">logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
//        session_start();
        include ('../dbconnection.php');
        $sql = "select * from hotel inner join login on hotel.log_id = login.log_id";
        ?>
        <div style="padding-top: 80px;">
            <div class="container">
                <h3>Hotels Registered</h3>
                <table class="table table-bordered">
                    <thead>
                    <th>No</th>
                    <th>Owner Name</th>
                    <th>Hotel Name</th>
                    <th>Hotel Address</th>
                    <th>Hotel Image</th>
                    <th>Phone</th>
                    <th>Action</th>
<th>Action</th>
                 <th>Food Details</th>
                    </thead>
                    <tbody>
                    <?php
                    $rs = mysqli_query($conn, $sql);
                    $c = 1;
                    while($row = $rs->fetch_assoc()){
                        $log_id = $row["log_id"];
                        $name = $row["name"];
                        $hotel = $row["hotel_name"];
                        $address = $row["hotel_desc"];
                        $phone = $row["phone"];
                        echo '<tr>';
                        echo "<td>$c</td>";
                        echo "<td>$name</td>";
                        echo "<td>$hotel</td>";
                        echo "<td>$address</td>";
                        echo "<td><img src='".$row['image']."' height='100' width='100' alt='hotel image'>";
                        echo "<td>$phone</td>";
                        echo "<td><a href='remove_hotel.php?log_id=$log_id'>Remove</a></td>";
                        if($row['status']!=1){
                        echo "<td><a href='approve.php?log_id=$log_id'>Approve</a></td>";
                        }
                        else
                        {
                            echo "<td><a style='color:green;font-weight:bold' href='approve.php?log_id=$log_id'>Approved</a></td>";
                        }
                        echo "<td><a href='getfoods.php?log_id=$log_id'>Foods</a></td>";
                        echo '</tr>';
                        $c++;
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
<!-- jQuery -->
        <script src="../js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <script src="../js/classie.js"></script>
        <script src="../js/cbpAnimatedHeader.js"></script>

        <!-- Contact Form JavaScript -->
        <script src="../js/jqBootstrapValidation.js"></script>
        <!--<script src="../js/contact_me.js"></script>-->

        <!-- Custom Theme JavaScript -->
        <script src="../js/agency.js"></script>
    </body>
</html>