<?php
    session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // form validation :
    $name  = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $city  = htmlspecialchars($_POST['city']);
    $ERROR = [];

    if(strlen(trim($name))< 3 || strlen(trim($name)) > 32){
        $ERROR['name'] = '* Name must be between 3 and 32 characters';
    }
    if(strlen(trim($phone)) < 12){
        $ERROR['phone'] = '* Please enter a valid phone number';
    }
    if(strlen($city)< 3 || strlen($city) > 32){
        $ERROR['city'] ='* City must be between 3 and 32 characters';
    }

    $_SESSION['POST']  = $_POST;

    if(empty($ERROR)){
        unset($_SESSION['ERROR']);
        header("Location:/success.php");
        exit();
    }else{
        $_SESSION['ERROR'] = $ERROR;
        header("Location:/index.php?error=true&#firstOrderSec");
    }

}elseif($_GET['error'] != 'true'){
    unset($_SESSION['ERROR']);
}
?>
<!doctype html>
<!--[if lt IE 7]>
<html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7]>
<html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8]>
<html lang="en" class="no-js ie8"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <title>Slicer & Grater</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <!-- Bootstrap 3.3.2 -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="shortcut icon" href="favicon.png">

    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/mystyles.css">

</head>




<body style="overflow-y: scroll;
overflow-x: hidden;">

<header>
    <nav class="navbar navbar-fixed-top myNavbar1 myNavbar2" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="fa fa-bars fa-lg"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <a class="navbar-brand" href="#mainSlide">
                        <img src="assets/img/logo3.png" class="d-inline-block align-top logo1" id="logo2" alt="">
                    </a>
                </ul>
                <ul class="nav navbar-nav navbar-right navBtns" style="font-weight: bold;">
                    <li><a href="#features">Features</a>
                    </li>
                    <li><a href="#screens">Look Closer</a>
                    </li>
                    <li><a href="#service">Delivery</a>
                    </li>
                    <li><a href="#reviews">Reviews</a>
                    </li>
                    <li style="background: lightblue; color: #2e6da4"><a href="#order">ORDER</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-->
    </nav>


    <!--RevSlider-->
    <div class="container-fluid" id="mainSlide" style="margin-top: 0">
        <div class="row scrollpoint sp-effect3">
           <div class="col-md-6 col-sm-6 col-xs-12 mainText"><br/>
               <h1>Slicer & Grater</h1>
               <h2>The Multi Purpose Tool</h2><br>
               <h3 class="hidden-xs">How not to injure your hands or waste a precious time on a wearisome process ?</h3>
               <div class="hidden-xs"><hr/></div>
               <a  id="orderNowbtn"  href="#firstOrderSec" class="btn btn-primary inverse btn-lg"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Order now</a>
               <a  id="learnMoreBtn" href="#features" class="btn btn-primary inverse btn-lg">Learn more</a>
           </div>
            <div class="col-md-6 col-sm-6 col-xs-12 image scrollpoint sp-effect3">
                <img id="mainPhoto" class=" hideMe scrollpoint sp-effect3" style="height: 100%; width: 100%;"
                     src="assets/img/product1flippedtrans15.png" alt="">
            </div>
        </div>
    </div>

</header>

<div class="wrapper">


    <section id="firstOrderSec" style="width: 100%; padding-left: 4%; padding-top: 2%; padding-bottom: 2%;">
        <div class="section-heading scrollpoint sp-effect3">
            <h1 style="font-weight:bold; font-size: 6vh;">Slicer & Grater</h1>
            <div class="divider"></div>
            <p style="color: black;">Every housewife loves neatly and fast sliced vegetables!</p>
        </div>
        <div class="row wrap" >
            <div class="col-md-6 firstForm" id="firstOrderForm">
                <form action="index.php" method="post">
                    <div class="form-group">
                        <label>Name <span style="color:red;">*</span></label>
                        <input type="text" name="name" class="form-control" placeholder="Your full name"
                        value="<?=$_SESSION['POST']['name']?>">
                        <label class="error"><?php echo($_SESSION['ERROR']['name']);?></label>
                    </div>
                    <div class="form-group">
                        <label>Phone <span style="color:red;">*</span></label>
                        <input name="phone" type="Phone" class="form-control" placeholder="+ 965  - - -   - - -   - -  "
                               value="<?=$_SESSION['POST']['phone']?>" >
                        <label class="error"><?php echo($_SESSION['ERROR']['phone']);?></label>
                    </div>
                    <div class="form-group" style="overflow-y: hidden;">
                        <label>City <span style="color:red;">*</span></label>
                        <textarea name="city" class="form-control" rows="2" placeholder="Your city"
                                  ><?=$_SESSION['POST']['city']?></textarea>
                        <label class="error"><?php echo($_SESSION['ERROR']['city']);?></label>
                    </div>
                    <div class="form-group"  >
                        <input style="border-color:white; font-weight: bold; " type="submit" value="ORDER NOW" class="btn btn-lg btn-block btn-info">
                    </div>
                </form>
            </div>
            <div class="col-md-6 hurryUp" style="text-align: center;">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <img id="hurryUp" src="assets/img/hurry1.jpg" style="width: 60%; height: 60%; ">
                    </div>
                </div>
                <div class="row">
                   <div class="col-md-12">
                       <p id="counter"></p>
                   </div>
                </div>
                <div class="row" style="margin: 0px;">
                    <h2  style="padding: 1%; padding-top: 0;">
                        <b><span style="color: black;">Order now for only</span>
                            <br/>
                            <b id="price">13<span class=sup>99</span>
                            <span style="font-size: large;">KWD </span>
                            </b>
                            <span style="color: black;">instead of</span>
                        <s style="color: red;">29</s> </b>
                    </h2>
                </div>
            </div>
        </div>
    </section>

    <section id="features" style="background: whitesmoke;">
        <div class="container">
            <div class="section-heading scrollpoint sp-effect3">
                <h1>Features</h1>
                <div class="divider"></div>
                <p>Slicer & Grater</p>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 scrollpoint sp-effect1">
                    <div class="media text-right feature">
                        <a class="pull-right" href="#features">
                            <i class="fa fa-check fa-2x"></i>
                        </a>
                        <div class="media-body">
                            <h3 class="media-heading">Easy to Use</h3>
                            Simple that even your child can help you
                        </div>
                    </div>
                    <div class="media text-right feature">
                        <a class="pull-right" href="#features">
                            <i class="fa fa-check fa-2x"></i>
                        </a>
                        <div class="media-body">
                            <h3 class="media-heading">Various blades</h3>
                            Stainless steel ultra sharp blades
                        </div>
                    </div>
                    <div class="media text-right feature">
                        <a class="pull-right" href="#features">
                            <i class="fa fa-check fa-2x"></i>
                        </a>
                        <div class="media-body">
                            <h3 class="media-heading">100% Safe</h3>
                            Safety pusher to keep your hands away from blades
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <img style="width: 100%; height: 100%;" src="assets/img/product5tr.png"
                         class="img-responsive scrollpoint sp-effect5" alt="">
                </div>
                <div class="col-md-4 col-sm-4 scrollpoint sp-effect2">
                    <div class="media feature">
                        <a class="pull-left" href="#features">
                            <i class="fa fa-check fa-2x"></i>
                        </a>
                        <div class="media-body">
                            <h3 class="media-heading">Easy to clean</h3>
                            All pieces are detachable for easy cleaning
                        </div>
                    </div>
                    <div class="media feature">
                        <a class="pull-left" href="#features">
                            <i class="fa fa-check fa-2x"></i>
                        </a>
                        <div class="media-body">
                            <h3 class="media-heading">No hard work</h3>
                            1 round gives 12 times of cutting
                        </div>
                    </div>
                    <div class="media feature">
                        <a class="pull-left" href="#features">
                            <i class="fa fa-check fa-2x"></i>
                        </a>
                        <div class="media-body">
                            <h3 class="media-heading">Removable Parts</h3>
                            All parts of Slicer & Grater are easy to remove
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="screens">
        <div class="container">

            <div class="section-heading scrollpoint sp-effect3">
                <h1>Take a closer look</h1>
                <div class="divider"></div>
                <p></p>
            </div>

            <!--<div class="filter scrollpoint sp-effect3">-->
            <!--<a href="javascript:void(0)" class="button js-filter-all active">All Screens</a>-->
            <!--<a href="javascript:void(0)" class="button js-filter-one">User Access</a>-->
            <!--<a href="javascript:void(0)" class="button js-filter-two">Social Network</a>-->
            <!--<a href="javascript:void(0)" class="button js-filter-three">Media Players</a>-->
            <!--</div>-->

            <div class="slider filtering scrollpoint sp-effect5">
                <div class="two">
                    <img class="slideImages" src="assets/img/product3.jpg" alt="">
                    <h4>Makes your life easier and faster</h4>
                </div>
                <div class="one">
                    <img class="slideImagesRes" style="padding-bottom: 17%; padding-top: 17%;" src="assets/img/slicerResult3.jpg" alt="">
                    <h4>Cucumber, Potato and Tomato</h4>
                </div>
                <div class="three">
                    <img class="slideImages" src="assets/img/product2.jpg" alt="">
                    <h4>Very useful various blades</h4>
                </div>
                <div class="one">
                    <img class="slideImagesRes" style="padding-bottom: 17%; padding-top: 17%;" src="assets/img/slicerResult4.jpg" alt="">
                    <h4>Chocolate </h4>
                </div>
                <div class="one">
                    <img class="slideImagesRes" style="padding-bottom: 17%; padding-top: 17%;" src="assets/img/slicerResult1.jpg" alt="">
                    <h4>Great for cheese</h4>
                </div>
                <div class="one">
                    <img class="slideImagesRes" style="padding-bottom: 17%; padding-top: 17%;" src="assets/img/slicerResult2.jpg" alt="">
                    <h4>Make healthier living fun and easy</h4>
                </div>
                <div class="one">
                    <img class="slideImages" src="assets/img/product7.jpg" alt="">
                    <h4>Take a look from different angels</h4>
                </div>
                <div class="one">
                    <img class="slideImages" src="assets/img/product5tr.png" alt="">
                    <h4>A tool that lasts for a lifetime</h4>
                </div>
            </div>
        </div>
    </section>

    <section id="service">
        <div class="section-heading scrollpoint sp-effect3" style="margin-top: 0px;">
            <h1>What do we offer</h1>
            <div class="divider"></div>

        </div>
        <div class="container scrollpoint sp-effect1">
            <div class="row row-1">
                <div class="col-md-4 ser-col-4">
                    <div class="ser-col ser-1">
                        <div class="icon-col">
                            <i class="fa fa-mobile-phone" aria-hidden="true"></i>
                        </div>
                        <h2 style="padding-top:20px;">Instant call-back</h2>
                        <p>As soon as you fill in the online form our call operator will call you back </p>
                        <span class="circle hidden-xs">
            <i class="fa fa-circle-thin" aria-hidden="true"></i>
            </span>
                    </div>
                </div>

                <div class="col-md-4 ser-col-4">
                    <div class="ser-col ser-2">
                        <div class="icon-col">
                            <i class="fa fa-truck" aria-hidden="true"></i>
                        </div>
                        <h2 style="padding-top:20px;">Free Delivery</h2>
                        <p style="padding-bottom:20px;">We have a free delivery all over Kuwait</p>
                        <span class="circle hidden-xs">
            <i class="fa fa-circle-thin" aria-hidden="true"></i>
            </span>
                    </div>
                </div>

                <div class="col-md-4 ser-col-4-l">
                    <div class="ser-col ser-3">
                        <div class="icon-col">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                        </div>
                        <h2>Shipping in 24 hours</h2>
                        <p style="padding-bottom: 20px;">Instant delivery after your confirmation</p>
                    </div>
                </div>
            </div>
            <!--=====row 1============-->

            <!--====row 2============-->
            <div class="row row-2">
                <div class="col-md-4 ser-col-4" style="border-bottom: 0;">
                    <div class="ser-col ser-4">
                        <div class="icon-col">
                            <i class="fa fa-money" aria-hidden="true"></i>
                        </div>
                        <h2>Cash on Delivery</h2>
                        <p>Pay only when you receive your package</p>
                        <span class="circle hidden-xs">
            </span>
                    </div>
                </div>

                <div class="col-md-4 ser-col-4" style="border-bottom: 0;">
                    <div class="ser-col ser-5">
                        <div class="icon-col">
                            <i class="fa fa-exchange" aria-hidden="true"></i>
                        </div>
                        <h2>Easy exchange</h2>
                        <p>change the product within 7 days if you received a faulty product</p>
                        <span class="circle hidden-xs">
            </span>
                    </div>
                </div>

                <div class="col-md-4 ser-col-4-l" style="border-bottom: 0;">
                    <div class="ser-col ser-6">
                        <div class="icon-col">
                            <i class="fa fa-check-square" aria-hidden="true"></i>
                        </div>
                        <h2>Test before Shipping</h2>
                        <p>All our products are carefully tested before shipping it to you</p>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <section id="reviews">
        <div class="container">
            <div class="section-heading inverse scrollpoint sp-effect3">
                <h1>Reviews</h1>
                <div class="divider"></div>
                <p>Read What's The People Are Saying About <br/>Slicer & Grater</p>
            </div>
            <div class="row" style="padding-top: 0;">
                <div class="col-md-10 col-md-push-1 scrollpoint sp-effect3">
                    <div class="review-filtering">
                        <div class="review">
                            <div class="row">
                                <div class="col-md-offset-1 col-md-10">
                                    <img src="assets/img/review1.png" alt=""
                                         class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="review rollitin">
                            <div class="row">
                                <div class="col-md-offset-1 col-md-10">
                                    <img src="assets/img/review2.png" alt=""
                                         class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="review rollitin">
                            <div class="row">
                                <div class="col-md-offset-1 col-md-10">
                                    <img src="assets/img/review3.png" alt=""
                                         class="img-responsive">
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="order" class="doublediagonal">
        <div class="container">
            <div class="section-heading scrollpoint sp-effect3">
                <h1>Order Now</h1>
                <div class="divider"></div>
                <h3>Fill in the form and our call operator will call you back !</h3>
            </div>
            <div class="row">
                <div class="col-md-7 scrollpoint sp-effect1" id="firstOrderForm">
                    <div class="row">
                        <div class="col-md-11 col-sm-6" style="margin:3%;text-align:center; border: solid 2px gainsboro; border-radius: 25px;">
                            <h1 style="padding-bottom: 10px;">Hurry up! Limited amount <br/> <span id="counter2"></span></h1>
                        </div>
                    </div>
                        <div class="form-group" style="padding-top: 2%;">
                            <label>Name <span style="color:red;">*</span></label>
                            <input type="text" class="form-control" placeholder="Your full name">
                        </div>
                        <div class="form-group">
                            <label>Phone <span style="color:red;">*</span></label>
                            <input type="Phone" class="form-control" placeholder="Your mobile number">
                        </div>
                        <div class="form-group" style="overflow-y: hidden;">
                            <label>City <span style="color:red;">*</span></label>
                            <textarea class="form-control" rows="2" placeholder="Your city"></textarea>
                        </div>
                        <div class="form-group"  >
                            <input style="border-color:white; font-weight: bold; " type="submit" value="ORDER NOW" class="btn btn-lg btn-block btn-info">
                        </div>
                    </div>
                <div class="col-md-5 col-sm-12 scrollpoint sp-effect1" style="text-align: center;">
                    <img  style="height: 110%; width: 110%; margin-left: -6%;"
                          src="assets/img/product1flippedtrans15.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <footer style="text-align: center; height: 150px; padding-bottom: 100px; padding-top: 20px;">
        <a style="color: whitesmoke;" href="#mainSlide"><i class="fa fa-arrow-up fa-4x"></i></a>

    </footer>


</div>

<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/scripts.js"></script>
<script>
    $(document).ready(function () {
        appMaster.preLoader();
    });
</script>
<script>

        Date.prototype.addHours= function(h) {
            this.setHours(this.getHours() + h);
            return this;
        }
// Set the date we're counting down to
var countDownDate = new Date().addHours(5);

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();

    // Find the distance between now an the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    document.getElementById("counter").innerHTML ="0"+ hours + " : <b style='color: red;'>"
        + minutes + " <span style='color: black;'>:</span> <span id='counters'>" + seconds + "</span></b> ";
    document.getElementById("counter2").innerHTML ="0"+ hours + " : <b style='color: red;'>"
        + minutes + " <span style='color: black;'>:</span> <span id='counters2'>" + seconds + "</span></b> ";

    // If the count down is finished, write some text
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("counter").innerHTML = "EXPIRED";
    }
}, 1000);
</script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter47150160 = new Ya.Metrika({
                    id:47150160,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/47150160" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<!-- Facebook Pixel Code -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-110380101-2"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-110380101-2');
</script>
<!-- end of google analysi-->
<script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '419283171822144');
    fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
               src="https://www.facebook.com/tr?id=419283171822144&ev=PageView&noscript=1"
    /></noscript>
<!-- End Facebook Pixel Code -->
<script type="text/javascript" src="assets/js/myjs.js"></script>
</body>

</html>