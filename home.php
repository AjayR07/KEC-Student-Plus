<?php
include_once("db.php");
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>KEC Student+</title>
	<link rel="icon" type="image/png" href="./KEC.png">
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
          <meta property="og:title" content="KEC Student+"/>
          <meta property="og:description" content="KEC Student+;Kec;cse ;Kongu Engineering College;KEC Student+ website;"/>
          <meta property="og:type" content="On-Duty"/>
          <meta property="og:url" content="index.php"/>
          <meta property="og:site_name" content="KEC Student+" />
        <meta name="description" content="KEC Student+, A initiative managed by a group of teens, Working for the student's utmost <strong>satisfaction</strong>,Integrated with On-Duty Management, Kongu Engineering College, Perundurai,Student & Teacher Oriented"/>
        <meta name="keywords" content="KEC Student+, kongu, kec, kongu engineering college, On-Duty Management,http://www.kongu.edu, http://www.kongu.ac.in , https://kecstudent.xyz/ ,students,Certificates Repository ,perundurai"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="author" content="Abinash S Arul Prasath V Ajay R">

	<link rel="stylesheet" href="assets/css/main.css" />
<!-- No Script Part -->
	<noscript><meta http-equiv="refresh" content="0; URL='./errorfile/noscript.html'" /></noscript>
	<!-- -------- -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.4/semantic.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.4/semantic.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
	<script src="https://use.fontawesome.com/4daae1ed5b.js"></script>
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
	<script>
		$(window).on("load", function() {
			$('.preloader').hide();
			$('body').css({
			overflow: 'auto',
		});
		});
	</script>
<!-- PushAlert -->
<script type="text/javascript">
                (function(d, t) {
                        var g = d.createElement(t),
                        s = d.getElementsByTagName(t)[0];
                        g.src = "https://cdn.pushalert.co/integrate_e72bc8c16ca6aa277143fddf36527c65.js";
                        s.parentNode.insertBefore(g, s);
                }(document, "script"));
        </script>
        <!-- End PushAlert -->
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
					<li><a href="index.php">Home</a></li>
					<li><a href="studLog.php">Login</a></li>
					<li><a href="registration.php">Registration</a></li>
					<li><a href="staffLog.php">Staff</a></li>
					<li><a href="aboutUs.html">About Us</a></li>
				</ul>
			</nav>
		</div>
<?php
$cert=($con->query("SELECT `appno` FROM `oddetails` WHERE `STATUS` LIKE 'Approved' UNION SELECT `appno` FROM `othercert` WHERE `STATUS` LIKE 'Approved'"))->num_rows;
$user=($con->query("SELECT `name` FROM `staff` UNION SELECT `name` FROM `registration`"))->num_rows;
 ?>
<!-- Banner -->
		<section id="banner">
			<header>
				<h2>Hi! You're surfing at <strong>KEC Student+</strong></h2>
				<p>
					A initiative managed by a group of teens, Working for the student's utmost <strong>satisfaction</strong>
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

				<div class="ui statistic" style="margin-right:2%;"><br>
						<div class="powr-hit-counter" id="51e3286c_1588395910"></div><script src="https://www.powr.io/powr.js?platform=html"></script>

			</div>
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
											<a href="#" ><img class="ui fluid rounded image" src="images/pic01.png"></a>
													<div class="ui header">
														<a href="#">E-Mail Integration</a>
													</div>
													<div class="ui content">
														With Responsive E-Mail support, you will be updated with your Status making it User-friendly
													</div>
											</div>
									  </div>
									  <div class="column">
											<div class="ui raised compact segment" style="text-align:center;padding:2%">
													<a href="#" ><img class="ui  rounded image" src="images/pic12.jpg"></a>
													<div class="ui header">
														<a href="#">Student And Teacher</a>
													</div>
													<div class="ui content">
														<!-- Now student and teacher have different logins for their specified roles. -->
														Now student and teacher can <br>co-ordinate in this e-Platform for their specified needs.
													</div>
											</div>
										</div>
									  <div class="column">
											<div class="ui raised compact  segment" style="text-align:center;padding:2%">
													<a href="#" ><img class="ui  rounded image" src="images/pic04.jpg"></a>
													<div class="ui header">
														<a href="#">On-Duty</a>
													</div>
													<div class="ui content">
													On-Duty Applications can be applied anywhere through necessary documents uploaded
													</div>
											</div>
										</div>
									  <div class="column">
											<div class="ui raised compact  segment" style="text-align:center;padding:2%">
												<a href="#" ><img class="ui  rounded  image" src="images/pic81.png"></a>
													<div class="ui header" style="padding-top:4%">
														<a href="#">Amazon AWS Integrated</a>
													</div>
													<div class="ui content">
													Through a prominent software solutions,integrated with AWS clients like SES and SNS
													</div>
											</div>
										</div>
									</div>
								</div>

	<!-- Main -->
			<div class="ui raised segment" style="width:96%;margin:0 auto;text-align:center;margin-bottom:2%">
			<a href="#" ><img class="ui fluid rounded  image" src="images/pic06.jpg" ></a>
			<div class="ui header">
				<br>
				<h2><a>Students made product</a></h2>
			</div>
			<p  style="padding:2% 3%;font-size:160%;text-align:center;">
				This product was created by students of Kongu Engineering College, a college supporting students
				and their talents
			</p>
			<div class="ui content" style="padding:2% 4%;font-size:20px">
				<p>
					Kongu Engineering College, one of the foremost multi professional research-led Institutions is
					internationally a recognized leader in professional and career-oriented education. It provides
					an integral, inter-disciplinary education - a unique intersection between theory and practice,
					passion and reason. The College offers courses of study that are on the frontiers of knowledge and
					it connects the spiritual and practical dimensions of intellectual life, in a stimulating environment
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
										<h3><a href="#">Mail Integrated</a></h3>
									</header>

								</article>
							</li>
							<li>
								<article class="post stub">
									<header>
										<h3><a href="#">Student & Teacher Oriented</a></h3>
									</header>

								</article>
							</li>
						</ul>
					</section>
					<section class="col-4 col-12-mobile">
						<header>
		<h2 class="icon solid fa-bell circled"></h2><br><span class="label">What's New <i class="lightbulb yellow icon"></i></span>
						</header>

							<marquee  direction="up" height=250px">
								<ul type = "disc">
							 <li > Enhanced UI / UX.</li><br>
							<li>Mobile view has been improved.</li><br>
							<li>Implementation of AJAX and Dyanamic Loading.</li>
						</ul>
							</marquee>

					<h6 style="text-align:center;font-size:18px">		<span>Last Updated on <span class="ui green text">10-May-2020    <div class="ui purple horizontal label">New</div></span></span><br><spans>Version : 2.2 Dev</span></h6>

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
							<p>A initiative managed by a group of teens, Working for the students utmost satisfaction.</p>

							<ul class="icons">
								<li><a href="mailto:keca3family@gmail.com" class="icon brands fa fa-google"><span class="label">Gmail</span></a></li>
								<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
							</ul>
											<br><a href="./entity/feedback.php"> Give us Feedback<em data-emoji="slight_smile" ></em></a>
						</section>
						<!-- Copyright -->
						<div class="copyright">
							<ul class="menu">
								<li> &copy; Team A3 . All rights reserved.</li>
								<li>Admin: <span ondragend="window.location.href='./admin/login.php'"><i class="fa fa-user-secret" aria-hidden="true"></i></span></li>
								<li>Contact us: <a href="https://teama3.tech/">teama3.tech</a></li>
								<li>Made with <i class="fa fa-heart heart" style="color:red"></i> in India <i class="in flag"></i></li>
							</ul>
							<br>
							<h4  style="text-decoration:underline;text-decoration-style: dotted;">Version : 2.2 Dev</h4>
						</div>

					</div>

				</div>
			</div>
		</div>

	</div>

	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.dropotron.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/jquery.scrollex.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>

	<!--Start of Tawk.to Script-->
	<script type="text/javascript">
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
	</script>
	<!--End of Tawk.to Script-->
</body>

</html>