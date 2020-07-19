<?php
include_once("db.php");
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>KEC Student+</title>
    <link rel="icon" type="image/png" href="./KEC.png">
    <meta charset="utf-8" />
    <meta name="dark-theme" color="#181818" />

    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta property="og:title" content="KEC Student+" />
    <meta property="og:description" content="KEC Student+;Kec;cse;Kongu Engineering College;KEC Student+ website;" />
    <meta property="og:type" content="On-Duty" />
    <meta property="og:url" content="index.php" />
    <meta property="og:site_name" content="KEC Student+" />
    <meta name="description"
        content="KEC Student+, An initiative managed by geeks from CSE, KEC which is Integrated with On-Duty Management, Kongu Engineering College, Perundurai." />
    <meta name="keywords"
        content="KEC Student+, kongu, kec, kongu engineering college, On-Duty Management,http://www.kongu.edu, http://www.kongu.ac.in , http://student.kongu.edu ,students,Certificates Repository ,perundurai" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="author" content="Abinash S Arul Prasath V Ajay R Adhithiya GJ">
    <script src="./assets/jquery.min.js"></script>


    <link rel="stylesheet" href="./assets/css/main.css" />
    <!-- No Script Part -->
    <noscript>
        <meta http-equiv="refresh" content="0; URL='./errorfile/noscript.html'" /></noscript>
    <!-- -------- -->

    <!-- <script src="https://use.fontawesome.com/4daae1ed5b.js"></script> -->
    <style>
    .preloader {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background-image: url('./images/giphy3.svg');
        background-repeat: no-repeat;
        background-color: #FFF;
        background-size: auto;
        background-position: center;
        overflow: hidden;
    }
    </style>
    <style>
    body {
        background-size: cover;
        font-family: 'Open Sans', sans-serif;
        overflow: hidden;
    }

    html {
        scroll-behavior: smooth;
    }
    </style>

</head>

<body class="homepage is-preload">
    <div class="preloader"></div>

    <div id="page-wrapper">

        <!-- Header -->
        <div id="header">

            <!-- Inner -->
            <div class="inner">
                <header>
                    <h1><a href="index.php" id="logo">KEC Student+ </a></h1>
                    <hr />
                    <p>Student Life made simple. </p>
                </header>
                <footer>
                    <a href="#banner" class="button circled scrolly">Start</a>
                </footer>
            </div>

            <!-- Nav -->
            <nav id="nav">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="studLog">Login</a></li>
                    <li><a href="registration">Registration</a></li>
                    <li><a href="staffLog">Staff</a></li>
                    <li><a href="./entity/faq/index.html">FAQ </a></li>
                    <li><a href="aboutUs">About Us</a></li>
                </ul>
            </nav>
        </div>
        <?php
		$cert = ($con->query("SELECT `appno` FROM `oddetails` WHERE `STATUS` LIKE 'Approved' UNION SELECT `appno` FROM `othercert` WHERE `STATUS` LIKE 'Approved'"))->num_rows;
		$user = ($con->query("SELECT `name` FROM `staff` UNION SELECT `name` FROM `registration` WHERE `STATUS` LIKE 'Verified'"))->num_rows;
		?>
        <!-- Banner -->
        <section id="banner">
            <header>
                <h2>Hi! You're looking at <strong>KEC Student+</strong></h2>
                <p>
                    An initiative by a group of teens from CSE, working for the students' utmost
                    <strong>satisfaction</strong>
                    <br></br>
                </p>
            </header>


            <div class="ui statistic" style="margin-right:2%">
                <div class="value">
                    <?php echo $user ?>
                </div>
                <div class="label">
                    Registered Users
                </div>
            </div>

            <!-- Visitors Count -->
            <div class="ui statistic" style="margin-right:2%;"><br>
                <div class="powr-hit-counter" id="51e3286c_1588395910"></div>
            </div>
            <!--  -->
            <div class="ui statistic">
                <div class="value">
                    <?php echo $cert ?>
                </div>
                <div class="label">
                    Certificates Uploaded
                </div>
            </div>
        </section>
        <div class="row" style="margin:3%">
            <div class="ui stackable four column grid">
                <div class="column">
                    <div class="ui raised compact segment" style="text-align:center;padding:5%">
                        <a href="#"><img class="ui fluid rounded image" src="images/pic01.png"></a>
                        <div class="ui header">
                            <a href="#">E-Mail Integration</a>
                        </div>
                        <div class="ui content">
                            With Responsive E-Mail support, you will be notified with your Status making it
                            User-friendly
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="ui raised compact segment" style="text-align:center;padding:2%">
                        <a href="#"><img class="ui  rounded image" src="images/pic12.jpg"></a>
                        <div class="ui header">
                            <a href="#">Student And Teacher</a>
                        </div>
                        <div class="ui content">
                            <!-- Now student and teacher have different logins for their specified roles. -->
                            Now student and teacher can <br>co-ordinate in this e-Platform for their specific needs.
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="ui raised compact  segment" style="text-align:center;padding:2%">
                        <a href="#"><img class="ui  rounded image" src="images/pic04.jpg"></a>
                        <div class="ui header">
                            <a href="#">On-Duty</a>
                        </div>
                        <div class="ui content">
                            Applications can be applied anywhere wihtout the need of pen and paper.
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="ui raised compact  segment" style="text-align:center;padding:2%">
                        <a href="#"><img class="ui  rounded  image" src="images/pic81.png"></a>
                        <div class="ui header" style="padding-top:4%">
                            <a href="#">Amazon AWS Integrated</a>
                        </div>
                        <div class="ui content">
                            Through a prominent software solutions, integrated with AWS clients like SES and SNS.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main -->
        <div class="ui raised segment" style="width:96%;margin:0 auto;text-align:center;margin-bottom:2%">
            <a href="#"><img class="ui fluid rounded  image" src="images/pic06.jpg"></a>
            <div class="ui header">
                <br>
                <h2><a>Students made website</a></h2>
            </div>
            <p style="padding:2% 3%;font-size:160%;text-align:center;">
                This website was created by students of CSE, Kongu Engineering College. <a href="./aboutUs.html">About
                    Us!</a>
            </p>
            <div class="ui content" style="padding:2% 4%;font-size:20px">
                <p>
                    Kongu Engineering College, one of the foremost multi professional research-led Institutions is
                    internationally a recognized leader in professional and career-oriented education. It provides
                    an integral, inter-disciplinary education - a unique intersection between theory and practice,
                    passion and reason. The College offers courses of study that are on the frontiers of knowledge and
                    it connects the spiritual and practical dimensions of intellectual life, in a stimulating
                    environment
                    that fosters rigorous scholarship and supportive community. This Institute is a great possession of
                    the committed Trust called 'The Kongu Vellalar Institute of Technology Trust' in Erode District,
                    Tamilnadu. The noble Trust has taken the institute to greater heights since its inception in 1983
                    and has established the college as a forum for imparting value based education for men and women.
                </p>
            </div>
        </div>

        <!-- Features -->

        <!-- Footer -->
        <div id="footer">
            <div class="container">
                <div class="row">

                    <!-- Tweets -->
                    <section class="col-4 col-12-mobile">
                        <header>
                            <h2 class="icon solid fa-heart circled"><span class="label">Tweets</span></h2>
                        </header>
                        <ul class="divided">
                            <li>
                                <article class="post stub">
                                    <h3>User-friendly</h3>

                                </article>
                            </li>
                            <li>
                                <article class="post stub">
                                    <h3>Simple and clear</h3>

                                </article>
                            </li>
                            <li>
                                <article class="post stub">
                                    <h3>Proper updation</h3>

                                </article>
                            </li>
                            <li>
                                <article class="post stub">
                                    <h3>Enhanced UI</h3>
                                </article>
                            </li>
                        </ul>
                    </section>

                    <!-- Posts -->
                    <section class="col-4 col-12-mobile">
                        <header>
                            <h2 class="icon solid fa-check-square circled"><span class="label">Posts</span></h2>
                        </header>
                        <ul class="divided">
                            <li>
                                <article class="post stub">
                                    <header>
                                        <h3><a href="#"></a>UX Focused</h3>
                                    </header>

                                </article>
                            </li>
                            <li>
                                <article class="post stub">
                                    <header>
                                        <h3><a href="#">On-Duty Management</a></h3>
                                    </header>

                                </article>
                            </li>
                            <li>
                                <article class="post stub">
                                    <header>
                                        <h3><a href="#">E-Mail Integrated</a></h3>
                                    </header>

                                </article>
                            </li>
                            <li>
                                <article class="post stub">
                                    <header>
                                        <h3><a href="#">Student & Faculty Oriented</a></h3>
                                    </header>

                                </article>
                            </li>
                        </ul>
                    </section>
                    <section class="col-4 col-12-mobile">
                        <header>
                            <h2 class="icon solid fa-bell circled"></h2><br><span class="label">What's New <i
                                    class="lightbulb yellow icon"></i></span>
                        </header>

                        <marquee direction="up" height="250px">
                            <ul type="disc">
                                <li>Bugs fixed.</li><br>
                                <li>Loaders on Process.</li><br>
                                <li>Mobile view improved.</li><br>
                                <li>Sidebar given for Staff and Students.</li><br>
                                <li>Reduced Page loading time</li>
                                <li>Added Animations</li>
                            </ul>
                        </marquee>

                        <h6 style="text-align:center;font-size:13px;font-family: Arial, Helvetica, sans-serif;">
                            <span>Last Updated on <span class="ui green text">06-July-2020 <div
                                        class="ui purple horizontal label">New</div></span></span><br>
                            <spans>Version : 4.0 Alpha</span>
                        </h6>

                    </section>

                </div>
                <hr />
                <div class="row">
                    <div class="col-12">
                        <!-- Contact -->
                        <section class="contact">
                            <header>
                                <h3>KEC Student+ </h3>
                            </header>
                            <p>An initiative managed by a group of developers, working for the students' utmost
                                satisfaction.
                            </p>

                            <!-- <ul class="icons">
								<li><a href="mailto:studentplus@kongu.edu" class="icon brands fa fa-google"><span class="label">Gmail</span></a></li>
								<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
							</ul> -->
                            <ul class="icons">
                                <a
                                    href="https://forms.office.com/Pages/ResponsePage.aspx?id=DQSIkWdsW0yxEjajBLZtrQAAAAAAAAAAAAN__hxfHbFUOFNCUEFCVzQ1TERNTThDRVFFRk1FVzZJNi4u">
                                    Give us Feedback<em data-emoji="slight_smile"></em></a>
                            </ul>

                        </section>
                        <!-- Copyright -->
                        <div class="contact">
                            <ul class="menu">
                                <li><a ondragend="window.location.href='./admin/login.php'">Admin <i
                                            class="fa fa-user-secret" aria-hidden="true"></i></a></li>
                                <li><span><a href="./aboutUs.html">About Us <i class="fas fa-users"></i> </a></span>
                                </li>
                                <li><span> <a href="mailto:studentplus@kongu.edu?subject=Hey Buddy!"
                                            target="_blank">Send Mail
                                            <i class="far fa-envelope"></i></a></span></li>
                                <li><span><a href="http://t.me/kecstudent" target="_blank">Telegram <i
                                                class="fab fa-telegram-plane"></i>
                                        </a></span></li>


                            </ul>
                            <br>
                            <h5 class="ui text">Made with <i class="fa fa-heart heart" style="color:red"></i> in KEC

                            </h5>

                        </div>

                    </div>

                </div>
            </div>
            <br><br><br>
            <div class="copyright">

                <ul class="menu">
                    <li> &copy; Kongu Engineering College</li>
                    <li>All rights reserved</li>
                    <li><a href="./entity/policy/privacy-policy">Privacy Policy</a> </li>
                    <li><a href="./entity/policy/terms-conditions">Terms & Conditions</a> </li>
                    <li><a href="./entity/policy/cookie-policy">Cookie Policy</a> </li>
                    <li>Version : 4.0 Alpha</li>

                </ul>
            </div>

        </div>
    </div>
    <link rel="stylesheet" href="./assets/Fomantic/dist/semantic.min.css" type="text/css" />
    <style>
    /* Refers the whole setup */
    ::-webkit-scrollbar {
        width: 13px;
        border-radius: 13px;
    }

    /* Refers tracking path */
    ::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        border-radius: 13px;
        opacity: 1.0;
        /* background-color: #F5F5F5; */
    }

    /* Refers Draggable Bar */
    ::-webkit-scrollbar-thumb {
        border-radius: 13px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
        box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
        background-color: #555;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #ef8376;
    }
    </style>

    <script>
    //Notiflix.Notify.Init({position:'left-bottom', closeButton: true, borderRadius:'15px', width:'350px',});		
    $(window).on("load", function() {
        $('.preloader').hide();
        $('body').css({
            overflow: 'auto',
        });
        //Cookie Policy
        //Notiflix.Notify.Info('Cookies help us deliver our services. By using our services, you agree to our cookie policy. Click for Details',function(){window.location.href='./entity/policy/cookie-policy.html'});
    });
    </script>
    <link href='https://fonts.googleapis.com/css?family=Oregano' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <!-- Scripts -->
    <!-- <script src="https://www.powr.io/powr.js?platform=html"></script> -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.dropotron.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
    <!-- <script src="./assets/Fomantic/dist/semantic.min.js"></script> -->

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    window.addEventListener("load", function() {

        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/5e88048d35bcbb0c9aada123/default';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();

        function includeJS(filename) {
            var head = document.getElementsByTagName('head')[0];

            var script = document.createElement('script');
            script.src = filename;
            script.type = 'text/javascript';

            head.appendChild(script)
        }
        includeJS("https://www.powr.io/powr.js?platform=html");
    });
    </script>

    <!--End of Tawk.to Script-->
</body>

</html>