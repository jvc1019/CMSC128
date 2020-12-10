<?php include('header.php'); ?>
<?php include('notification.php'); ?>
<?php
	session_start();
	$default = $_GET['help'];
	$_SESSION['default'] = $_GET['help'];
?>

<body class="help-bg">
	<!-- navbar goes here -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10 helpHolder">
				<h2>HELP & SUPPORT</h2>
				<br>
				<img class="helpPic" src="/cmsc128/resources/help-banner.jpg">
				<br><br>
				<ul class="nav nav-tabs nav-pills with-arrow flex-sm-row">
					<li class="nav-item flex-sm-fill text-center helpTitle">
						<a class="nav-link<?php if ($default == "help"){echo " active";} ?>" data-toggle="pill" href="#help">Getting Started</a>
					</li>
					<li class="nav-item flex-sm-fill text-center helpTitle">
						<a class="nav-link<?php if ($default == "features"){echo " active";} ?>" data-toggle="pill" href="#features">Features</a>
					</li>
					<li class="nav-item flex-sm-fill text-center helpTitle">
						<a class="nav-link<?php if ($default == "forgot"){echo " active";} ?>" data-toggle="pill" href="#forgot">Forgot Your Password?</a>
					</li>
					<li class="nav-item flex-sm-fill text-center helpTitle">
						<a class="nav-link<?php if ($default == "about"){echo " active";} ?>" data-toggle="pill" href="#about">About Us</a>
					</li>
					<li class="nav-item flex-sm-fill text-center helpTitle">
						<a class="nav-link<?php if ($default == "contact"){echo " active";} ?>" data-toggle="pill" href="#contact">Contact Us</a>
					</li>
				</ul>
				<div class="tab-content">
					<div id="help" class="tab-pane container helpContent rounded px-4 py-5<?php if ($default == "help"){echo " active";} else {echo " fade";}?>">
						<h3>Getting Started</h3>
						<br>
						<div class="helpText">
							Welcome to ZEST, a developing productivity web application designed for your work/study needs.
						</div>
						<br>
						<div class="helpText">
							Tellus mauris a diam maecenas sed enim. Cras ornare arcu dui vivamus. Hendrerit gravida rutrum quisque non tellus orci ac auctor augue. Hendrerit gravida rutrum quisque non tellus orci. A cras semper auctor neque vitae tempus quam pellentesque nec. Magna eget est lorem ipsum dolor. Quis blandit turpis cursus in hac habitasse platea. Mi tempus imperdiet nulla malesuada pellentesque elit eget gravida. Et malesuada fames ac turpis egestas maecenas pharetra convallis posuere. Congue eu consequat ac felis. Sagittis eu volutpat odio facilisis mauris sit amet massa vitae. Sed vulputate odio ut enim blandit volutpat.
						</div>
						<br>
						<div class="helpText">
							Odio facilisis mauris sit amet. At auctor urna nunc id. Turpis cursus in hac habitasse platea dictumst quisque. Ut sem nulla pharetra diam sit amet nisl suscipit adipiscing. Vel pretium lectus quam id leo in vitae turpis. Gravida arcu ac tortor dignissim convallis aenean et. Donec ac odio tempor orci dapibus ultrices in. Aliquam sem et tortor consequat id porta nibh venenatis cras. Hendrerit gravida rutrum quisque non tellus orci ac auctor augue. Risus quis varius quam quisque. Sit amet mattis vulputate enim nulla aliquet porttitor lacus luctus. In hac habitasse platea dictumst vestibulum rhoncus est.
						</div>
					</div>
					<div id="features" class="tab-pane container helpContent rounded px-4 py-5<?php if ($default == "features"){echo " active";} else {echo " fade";}?>">
						<h4 class="">Subjects</h4>
						<br>
						<div class="helpText">
							The "Subjects" section allows you to organize, edit and personalize your subjects.
						</div>
						<br>
						<h4>Tasks</h4>
						<br>
						<div class="helpText">
							The "Tasks" section allows you to arrange and organize your tasks in a form of a To-Do list.
						</div>
						<br>
						<h4>Notebook</h4>
						<br>
						<div class="helpText">
							The "Notebook" section allows you to create notes for different uses.
						</div>
					</div>
					<div id="forgot" class="tab-pane container helpContent rounded px-4 py-5<?php if ($default == "forgot"){echo " active";} else {echo " fade";}?>">
						<h3>Forgot Your Password?</h3>
						<br>
						<div class="helpText">
							Have you already got an account, but forgotten your password?
						</div>
						<br>
						<div class="helpText">
							Say no more! Please follow the steps below to retrieve back your account.
						</div>
						<br>
						<div class="helpText">
							<form type="GET" action="forgot.php">
								<ol>
									<li>
										<div>We will send a message to your email for verification.<br>
										Please input your username and email here:</div>
										<br>
										<div class="form-group">
											Username: <input type="text" name="userName" placeholder="ex: Username123" required="">
										</div>
										<div class="form-group">
											Email: <input type="email" name="userEmail" placeholder="ex: jdcruz@email.com" required="">
										</div>
									</li>
									<li>
										<div>We must know that you are human. Please enter the code in the picture:</div>
										<img src="../resources/fake-captcha.png" style="width: 300px">
										<div class="form-group">
											Code: <input type="text" name="code" placeholder="Enter code" required="">
										</div>
									</li>
									<li>
										<div>Lastly, check the box to ensure that you agree with our terms of service.<br>
										You are not allowed to change your password after 60 days.</div><br>
										<div class="form-group">
											<input type="checkbox" name="agree" required=""> I will not change my password again for the next 60 days or I will recieve proper disciplinary action.
										</div>
									</li>
									<button type="submit">Submit</button>
								</ol>
							</form>
						</div>
					</div>
					<div id="about" class="tab-pane container helpContent rounded px-4 py-5<?php if ($default == "about"){echo " active";} else {echo " fade";}?>">
						<h3>About Us</h3>
						<br>
						<img src="../resources/icons/lemon-icon.png">
						<br><br>
						<div class="helpText">
							ZEST is an application designed to help you in your work, school, or office with absolute productivity. It is created by 11 aspiring software developers from the University of the Philippines Visayas, located in Miag-ao, Iloilo, Philippines. We provide hand on features and services to your important work needs at the comfort of your own laptop in your own home during this pandemic.
						</div>
						<br>
						<div class="helpText">
							We understand that the fast paced work or school life, busy schedules and long commutes often leave you with little time to actually pursue your passion.
						</div>
						<br>
						<div class="helpText">
							Have no fear for ZEST is here!
						</div>
						<br>
						<div class="helpText">
							We at ZEST have a strong network of software developers who provide frequent updates to cater to your productivity needs. With our flexible time slots, on-time service guarantee and quality assurance, you can be assured of getting tasks done at your convenience.
						</div>
						<br>
					</div>
					<div id="contact" class="tab-pane container helpContent rounded px-4 py-5<?php if ($default == "contact"){echo " active";} else {echo " fade";}?>">
						<h3>Contact Us</h3>
						<br>
						<div class="helpText text-center">
							You may contact us in the following platforms:
						</div>
						<br>
						<div class="helpText">
							E-mail: zest@fakeEmail.com
						</div> <br>
						<div class="helpText">
							Facebook: Zest - Work with Productivity (Official)
						</div> <br>
						<div class="helpText">
							Twitter: Zest (@zestthebest)
						</div> <br>
						<div class="helpText">
							Instagram: Zest (@zestthebest)
						</div> <br>
						<div class="helpText">
							YouTube: Zest Official
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>