<?php session_start();?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="favicon.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/mystyles.css">

    <title>Slicer & Grater</title>
</head>
<body style="margin-top: 6%;">
<header>
    <nav class="navbar navbar-fixed-top myNavbar1 myNavbar2" style="background: lightblue;" role="navigation">
        <div class="container">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <a class="navbar-brand" href="#mainSlide">
                        <img src="assets/img/logo3.png" class="d-inline-block align-top logo1" id="logo2" alt="">
                    </a>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-->
    </nav>
    <div class="col-md-12 col-sm-12" id="thankText">
        <h1>THANK YOU !</h1>
        <i class="fa fa-check fa-3x" style="color: greenyellow;"></i>
        <h2>Your order has been <span style="color: greenyellow;">successfully</span> done !<br/> Our call operator will get in touch with you soon.</h2>
    </div>
    <div class="row">
        <div class="col-md-offset-1 col-md-10 col-sm-12">
            <div class="col-md-6  col-sm-12 frame" style="font-weight:600; font-size: 3vh; ">
                <div class="row">
                    <div class="col-md-6">
                        <p>Order Information</p>
                        <br/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-sm-2 col-xs-3">
                        Name<br/>Phone <br/> City<br/>Product<br/>Price
                    </div>
                    <div class="col-md-1 col-sm-2 col-xs-2">
                        <p>
                            :<br/>:<br/>:<br/>:<br/>:
                        </p>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6" style="color:blue ;">
                        <p>
                            <?=$_SESSION['POST']['name']?><br/>
                            <?=$_SESSION['POST']['phone']?><br/>
                            <?=$_SESSION['POST']['city']?><br/>
                            Slicer & Grater<br/>13.99 KWD
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <br/>
                        <a href="index.php" class="btn btn-lg btn-success">Main page</a>
                        <a href="#" class="btn btn-lg btn-primary">Edit form</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="text-align: center;">
                <img style="height: 70%; width: 75%;"
                     src="assets/img/product1flippedtrans53.png">
            </div>
        </div>
    </div>

</body>
</html>
<?php
    // message order has been done:
?>