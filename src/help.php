<?php include("conn.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Zest - Help</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Stylesheets -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/global.css" rel="stylesheet">
	<link href="css/home.css" rel="stylesheet">
	<link href="css/overrides.css" rel="stylesheet">

	<!-- Favicon -->
	<link rel="icon" href="../resources/icons/lemon-icon.png">

	<!-- Bootstrap JS and jQuery-->
	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Scripts -->
	<script src="js/sidebar.js"></script>
	<script src="js/moment.min.js"></script>
	<script>
		$(function() {
			$("[data-toggle='tooltip']").tooltip()
		})
	</script>

	<!-- Setting the default timezone for all PHP date() calls -->
	<?php date_default_timezone_set("Asia/Manila"); ?>
</head>

<?php include('notification.php'); ?>
<?php
	session_start();
	if(!$_GET || !in_array($_GET['help'], array("help", "features", "change", "about"))){
		$default = 'help';
	}
	else if ($_GET){
		$default = $_GET['help'];
	} 
	$_SESSION['default'] = $_GET['help'];
?>
<body class="help-bg">
	<nav class="navbar fixed-top navbar-dark bg-dark">
  		<a class="navbar-brand" href="../src">
			<img src="../resources/icons/lemon-icon.png" width="30" height="30" class="d-inline-block align-top">  ZEST 
  		</a>
	</nav>

	<br><br>
	<div class="container-fluid">
		<div id="top" class="help-banner">
			<h2 class="helpHeader centered"><img src="/Zest/resources/icons/lemon-icon.png" width="70" height="70" class="d-inline-block">ZEST SUPPORT</h2>
		</div>

		<br>

		<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
				<ul class="nav nav-tabs nav-pills with-arrow flex-sm-row">
					<li class="nav-item flex-sm-fill text-center helpTitle">
						<a class="nav-link<?php if ($default == "help"){echo " active";} ?>" data-toggle="pill" href="#help">Getting Started</a>
					</li>
					<li class="nav-item flex-sm-fill text-center helpTitle">
						<a class="nav-link<?php if ($default == "features"){echo " active";} ?>" data-toggle="pill" href="#features">Features</a>
					</li>
					<li class="nav-item flex-sm-fill text-center helpTitle">
						<a class="nav-link<?php if ($default == "change"){echo " active";} ?>" data-toggle="pill" href="#change">Change your Password?</a>
					</li>
					<li class="nav-item flex-sm-fill text-center helpTitle">
						<a class="nav-link<?php if ($default == "about"){echo " active";} ?>" data-toggle="pill" href="#about">About Us</a>
					</li>
					<li class="nav-item flex-sm-fill text-center helpTitle">
						<a class="nav-link<?php if ($default == "contact"){echo " active";} ?>" data-toggle="pill" href="#contact">Contact Us</a>
					</li>
				</ul>
				<br>
				<div class="tab-content">
					<div id="help" class="tab-pane container<?php if ($default == "help"){echo " active";} else {echo " fade";}?>">
						<div class="row  bg-white rounded shadow">
							<br>
							<div class="col-4">
								<br>
								<img src="../resources/icons/lemon-icon.png">
								
							</div>
							<div class="col-7">
								<br>
								<h3 class="text-center">Zest</h3>
								<div class="text-dark font-weight-bold text-center">
									Your web-based productivity app.
								</div>
								<br>
								<div class=" text-center text-break text-dark">
									ZEST is a Productivity App, an application created by a group of aspiring software developers designed to help you in your school work with absolute productivity. It has different features and services that will surely help you in your important work needs.
									<br>...<br>
									<a class="helpLink" href="help.php?help=about"><button class="btn btn-warning"><div class="font-weight-bold">Learn more </div></button></a>
								</div>
								<br>
								<br>
							</div>
							<div class="col-1"></div>
							
						</div>
						<br><br>
						<div class="row bg-white rounded shadow">
							<div class="col-1"></div>
							
							<div class="col-10">
								<br><br>
								<h3 class="text-center">What do we offer?</h3>
								<br>
								<div class="text-center"><img class="rounded" src="../resources/help/features.png" style="height:10rem">
								</div>
								<br>
								<div class="text-break text-center">
									
									Our <a class="helpLink" href="help.php?help=features">features</a> include the <b>SUBJECTS</b>, <b>TASK</b> and <b>SUBJECTS</b> sections, as well as different <br>customization tools available for different types of users.
									<br><br>
									<a class="helpLink" href="index.php"><button class="btn btn-warning"><div class="font-weight-bold">Try Now </div></button></a>
									</div>
									<br>
									<a class="helpLink text-center" href="#top">⬆ Back to top</a>
									<br><br>

							</div>
							<div class="col-1"></div>
						</div>
						
						<br><br>

						<div class="row bg-white shadow rounded ">
							<div class="col-md-12">
								<br>
								<h3 class="text-center">Account Basics</h3>
								<div class="text-center">
									<br>Here are the basic account controls you can modify
								</div>
								<br>
							</div>
						</div>

						<br>
						<div class="row">

							<div class="col-6 d-flex align-items-stretch">
								<div class="card">
									<img class="card-img-top" src="/Zest/resources/help/help-register.jpg">
									<div class="card-body">
										<h4 class="card-title">Registration</h4>
										<div class="card-text text-justify">
											Creating an account in Zest is simple, you will be asked to enter a Username, an existing e-mail and your desired password. Registration for Zest is completely free. When you register for Zest, you will not be asked sensitive information like your bank account or credit card information. When choosing a password for Zest make sure to use a strong password for maximum security!
										</div>
									</div>
								</div>
							</div>
							<div class="col-6 d-flex align-items-stretch">
								<div class="card">
									<img class="card-img-top" src="/Zest/resources/help/help-login.jpg">
									<div class="card-body">
										<h4 class="card-title">Logging In</h4>
										<div class="card-text text-justify">
											To log-in to your existing Zest account, you will be asked to enter your username and password. We guarantee that this will take less than a few seconds and that there are no extra steps. Once logged-in, you will be able to fully access the features that Zest has to offer.
										</div>
									</div>
								</div>
							</div>
						</div>

						<br>
						<div class="row">
							<div class="col-6 d-flex align-items-stretch">
								<div class="card">
									<img class="card-img-top" src="/Zest/resources/help/help-home.png">
									<div class="card-body">
										<h4 class="card-title">Home Page</h4>
										<div class="card-text text-justify">
											The Home Page is where the productivity starts. We want this experience to be welcoming and informative, wasting absolutely no time. After logging in, you will arrive at your home page. Upon landing in the home page, you will be greeted with your upcoming tasks (tasks that are due for the day and due for the following day). The home page is where you can access all the features such as the Subjects, Tasks, and Notebook.
										</div>
									</div>
								</div>
							</div>

							<div class="col-6 d-flex align-items-stretch">
								<div class="card">
									<img class="card-img-top" src="/Zest/resources/help/help-profile.png">
									<div class="card-body">
										<h4 class="card-title">Profile Page</h4>
										<div class="card-text text-justify">
											The Profile Page allows you to give additional information such as your profile description or bio, as well as update/edit your existing information such as your username and email address. You can also select from various avatars and themes that satisfy to your liking.
											<br><br>
											You can go to your profile page by clicking your username in the sidebar to the left of your screen. This sidebar can be accessed throughout all the different pages.
										</div>
									</div>
								</div>
							</div>
						</div>

						<br>
						<div class="row">
							<div class="col-6 d-flex align-items-stretch">
								<div class="card">
									<img class="card-img-top" src="/Zest/resources/help/help-avatars.jpg">
									<div class="card-body">
										<h4 class="card-title">Avatars and Themes</h4>
										<div class="card-text text-justify">
											Introducing Avatar and Theme support in Zest. This allows you to change your profile avatar or icon and choose from a variety of themes that will give your workspace more vibrance and personality depending on your personal preferences.
											<br><br>
											To change your avatar and theme, simply go to the Profile page and click "Edit Profile", there you can choose a new avatar and new theme, as well as edit your profile information.
										</div>
									</div>
								</div>
							</div>
							<div class="col-6 d-flex align-items-stretch">
								<div class="card">
									<img class="card-img-top" src="/Zest/resources/help/help-banner.jpg">
									<div class="card-body">
										<h4 class="card-title">Quick Links</h4>
										<div class="card-text">
											<div class="helpText text-center">
												<a class="helpLink" href="help.php?help=features">Check out our features...</a><br>
												<a class="helpLink" href="help.php?help=change">Do you want to change your password?</a><br>
												<a class="helpLink" href="help.php?help=about">Want to know more about us?</a><br>
												<a class="helpLink" href="help.php?help=contact">Do you want to contact the developers?</a>
												<br><br>
												<img src="../resources/icons/lemon-icon.png">

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<br><br>
						<a class="helpLink text-center" href="#top">⬆ Back to top</a>
									<br>
					</div>

					<div id="features" class="tab-pane container helpContent rounded px-4 py-5<?php if ($default == "features"){echo " active";} else {echo " fade";}?>">
						<div class="row rounded shadow bg-white">
							<div class="col-12">
								<br>
								<h1 class="text-center">Features</h1>
								<br>
								<div class="text-muted text-center">
									Zest offers three major features: <b>Subjects</b>, <b>Tasks</b> and <b>Notebook</b>.<br>
									You may learn how these feature works below.<br>
									Go and try something new!<br>
								</div>
								<br>
							</div>
						</div>

						<br>

						<div class="row">
							<div class="col-12 d-flex align-items-stretch">
								<div class="card rounded-all-1rem">	
									<div class="card-body">
										<h4 class="card-title">Subjects</h4>
										<h6 class="card-subtitle mb-2 text-muted">The "Subjects" section allows you to organize, edit and personalize your subjects.</h6>
										<br>
									</div>
									<img class="card-img-top" src="/Zest/resources/help/help-subjects.png">
									<div class="card-body">
										<div class="card-text text-justify">
											In this section, you can be able to add, edit or delete subjects. 
											<br><br>
											<h4>Creating a Subject</h4> 
											<ol>
												<li>lick the "New Subject" button on the top left of the screen. This will show a dialog box that you will enter the subject information inside.</li>
												<li>Enter the subject name. This name is required and will be used in order to track this subject later on.</li>
												<li>Choose if the subject is a Lecture or a Laboratory.</li>
												<li>Enter a short descripiton. You may enter the subject's instructor and the schedule of the subject with the days of the week and time that it is scheduled.</li>
												<li>Choose a subject banner from the different selections for style and customization.</li>
												<li>Click "Save" at the bottom of the box. If you decided that you don't want to add this subject anymore, you can click "Cancel" to remove it. If you want to clear the form, you may click on "Clear".</li>
											</ol>
											<br><br>
											<h4>Edit Subject</h4>
											<ol>
												<li>Click on the "Details" button at the bottom of the subject you want to edit. </li>
												<li>Once the dialog box is opened, you may start editing your subject.</li>
												<li>Click "Save" at the bottom of the box. If you decided that you don't want to save these changes anymore, you can click "Cancel".
												</li>
											</ol>
											<br><br>

											<h4>Delete Subject</h4>
											<ol>
												<li>Click the "Delete" button at the bottom of the subject. A message will appear stating that you will delete the subject permanently and will never see it again. </li>
												<li>Click on the "Delete" button to permanently delete the subject. If you decided that you don't want to delete it anymore, you may simply click "Cancel".</li>
											</ol>
										</div>
									</div>
								</div>
							</div>

						</div>
						<br>
						<br>
						<div class="row">
							<div class="col-12 d-flex align-items-stretch">
								<div class="card rounded-all-1rem">
									<div class="card-body">
										<h4 class="card-title">Task</h4>
										<h6 class="card-subtitle mb-2 text-muted">The "Tasks" section allows you to arrange and organize your tasks in a form of a To-Do list.</h6>
										<br>
									</div>
									<img class="card-img-top" src="/Zest/resources/help/help-tasks.png">
									<div class="card-body">
										<div class="card-text text-justify">
											In this section, you can be able to add, edit or delete tasks.
											<br>
											<h4>Add Task</h4>
											<ol>
												<li>Click the "New Task" button on the top left of the screen. This will show a dialog box that you will enter the task information inside. Once the dialog box is opened, you may start writing your task. </li>
												<li>Enter the task name. This name is required and will be used in order to track this task later on.</li>
												<li>You may put a due date and a reminder date. The due date is the date you must finish this task, while the reminder date will be the date you will be reminded of this task. You can be reminded before or after the due date. However, it is more productive when the reminder date is before the due date. </li>
												<li>Place tags for this task so that you can filter this out when searching.</li>
												<li>Click "Save" at the bottom of the box. If you decided that you don't want to add this task anymore, you can click "Cancel" to remove it. If you want to clear the form, you may click on "Clear".</li>
											</ol>
											<br><br>
											<h4>Edit Task</h4>
											<ol>
												<li>Click on the "Details" button at the bottom of the task you want to edit. Once the dialog box is opened, you may start editing your task.</li>
												<li>Click "Update" at the bottom of the box. If you decided that you don't want to save these changes anymore, you can click "Cancel".</li>
											</ol>
											<br><br>
											<h4>Delete Task</h4>
											<ol>
												<li>Click the "Delete" button at the bottom of the task. A message will appear stating that you will delete the task permanently and will never see it again. </li>
												<li>Click on the "Delete" button to permanently delete the task. If you decided that you don't want to delete it anymore, you may simply click "Cancel".</li>
											</ol>
										</div>
									</div>
								</div>
							</div>
						</div>
						<br>
						<a class="helpLink" href="#top">⬆ Back to top</a>
						<br><br><br>			
						<div class="row">
							<div class="col-1"></div>
							<div class="col-10 d-flex align-items-stretch">
								<div class="card rounded-all-1rem">
									<div class="card-body">
										<h4 class="card-title">Notebook</h4>
										<h6 class="card-subtitle mb-2 text-muted">The "Notebook" section allows you to create notes for different uses.</h6>
										<br>
									</div>
									<img class="card-img-top" src="/Zest/resources/help/help-notes.png">
									<div class="card-body">
										<div class="card-text text-justify">
											In this section, you can be able to add, edit or delete notes. <br>
											<h4>Add Note</h4>
											<ol>
												<li>Click the "New Note" button on the top left of the screen. This will show a dialog box that you will enter the note information inside. Once the dialog box is opened, you may start writing your note.</li>
												<li>Enter the note title. This title is required and will be used in order to track this note later on.</li>
												<li>Place tags for this note so that you can filter this out when searching. Lastly, start writing the note. There are also different formatting styles which will be useful when writing these notes.</li>
												<li>Click "Save" at the bottom of the box. If you decided that you don't want to add this note anymore, you can click "Cancel" to remove it.</li>
											</ol>
											<br><br>
											<h4>Edit Note</h4>
											<ol>
												<li>Click on the "Details" button at the bottom of the note you want to edit. Once the dialog box is opened, you may start editing your note.</li>
												<li>Click "Save" at the bottom of the box. If you decided that you don't want to save these changes anymore, you can click "Cancel".</li>
											</ol>
											<br><br>
											<h4>Delete Note</h4>
											If you want to delete a note, simply click the "Delete" button at the bottom of the note. A message will appear stating that you will delete the note permanently and will never see it again. Click on the "Delete" button to permanently delete the note. If you decided that you don't want to delete it anymore, you may simply click "Cancel".
										</div>
									</div>
								</div>
							</div>
							<div class="col-1"></div>
						</div>
						<br>
						<a class="helpLink" href="#top">⬆ Back to top</a>
						<br><br><br>
						<div class="row">
							<div class="col-6 d-flex align-items-stretch">
								<div class="card rounded-all-1rem">
									<img class="card-img-top" src="/Zest/resources/help/help-banner.jpg">
									<div class="card-body">
										<h4 class="card-title">Upcoming Features</h4>
										<h6 class="card-subtitle mb-2 text-muted"></h6>
										<div class="card-text text-justify">
											We will probably have more features in our web app when the time comes. For now, just enjoy the existing ones that will surely catch your attention and help you on your daily needs. If you have any suggestions with new features or modifications to existing one, please feel free to <a class="helpLink" href="help.php?help=contact">contact us</a>.
										</div>
									</div>
								</div>
							</div>
							<div class="col-6 d-flex align-items-stretch">
								<div class="card rounded-all-1rem">
									<img class="card-img-top" src="/Zest/resources/help/help-banner.jpg">
									<div class="card-body">
										<h4 class="card-title">Quick Links</h4>
										<div class="card-text">
											<div class="helpText text-center">
												<a class="helpLink" href="help.php?help=help">Let's get started!!!</a><br>
												<a class="helpLink" href="help.php?help=change">Do you want to change your password?</a><br>
												<a class="helpLink" href="help.php?help=about">Want to know more about us?</a><br>
												<a class="helpLink" href="help.php?help=contact">Do you want to contact the developers?</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<br>
						<a class="helpLink" href="#top">⬆ Back to top</a>
					</div>
					<div id="change" class="tab-pane container helpContent rounded px-4 py-5<?php if ($default == "change"){echo " active";} else {echo " fade";}?>">
						<div class="row rounded shadow bg-white">
							<div class="col-12"><
								<center><h1>Change your Password?</h1></center>
								<br>
								<div class="helpText text-center">
									Is your old password too boring? Has it gotten under you skin?<br>
									Maybe under the orange's ZEST? Well, we've got you covered.<br><br>
									<!--Please follow the steps below to change your account's password.-->
								</div>
								<br>
								<center><a class="helpLink" href="change.php">Click here to change password</a></center><br><br>
								<!--
								<div class="helpText">
									<form type="GET" action="change.php">
										<ol>
											<li>
												<div class="form-group">
													<input class="helpFormText" type="hidden" name="changeType" value="change">
												</div>
												<div>We will send a non-existent message to your email for verification.<br>
													<link href="../src/index.php" rel="import" />
												Please input your username and email.</div>
												<br>
												<div class="form-group">
													Username: <input class="helpFormText" type="text" name="userName" placeholder="ex: Username123" required="">
												</div>
												<div class="form-group">
													Email: <input class="helpFormText" type="email" name="userEmail" placeholder="ex: jdcruz@email.com" required="">
												</div>
											</li>
											<li>
												<div>Please input your current password and new password.</div>
												<br>
												<div class="form-group">
													Current Password: <input class="helpFormText" type="password" name="userPassword" placeholder="Enter password" required="">
												</div>
												<div class="form-group">
													Reenter Password: <input class="helpFormText" type="password" name="userRePassword" placeholder="Reenter password" required="">
												</div>
												<div class="form-group">
													New Password: <input class="helpFormText" type="password" name="userNewPassword" placeholder="Enter new password" required="">
												</div>
											</li>
											<li>
												<div>We must know that you are human. Please enter the code in the picture:</div>
												<img src="../resources/fake-captcha.png" style="width: 300px">
												<div class="form-group">
													Code: <input class="helpFormText" type="text" name="code" placeholder="Enter code" required="">
												</div>
											</li>
											<li>
												<div>Lastly, check the box to ensure that you agree with our currently non-existent terms of service.<br>
												You are not allowed to change your password after 60 days.</div><br>
												<div class="form-group">
													<input type="checkbox" name="agree" required=""> I will not change my password again for the next 60 days or I will recieve proper disciplinary action.
												</div>
											</li>
											<button class="btn btn-dark" type="submit">Submit</button>
										</ol>
									</form>
								</div>
							-->
							</div>
						</div>
					</div>
					<div id="about" class="tab-pane container helpContent rounded px-4 py-5<?php if ($default == "about"){echo " active";} else {echo " fade";}?>">
						<h1>About Us</h1>
						<br>
						<img src="../resources/icons/lemon-icon.png">
						<br><br>
						<div class="helpText text-center">
							ZEST is an application designed to help you in your work, school, or office with absolute productivity. It is created by 11 aspiring software developers from the University of the Philippines Visayas, located in Miag-ao, Iloilo, Philippines. We provide hands on features and services to your important work needs at the comfort of your own laptop in your own home during this pandemic.
						</div>
						<br>
						<div class="helpText text-center">
							We understand that the fast paced work or school life, busy schedules and long commutes often leave you with little time to actually pursue your passion. Zest will be there for you whenever you need to take note of your journey and be creative at the same time. Zest will remind you of your upcoming tasks and will absolutely be your friend in the process as well.
						</div>
						<br>
						<div class="helpText text-center">
							Have no fear for ZEST is here!
						</div>
						<br>
						<div class="helpText text-center">
							We at ZEST have a strong network of software developers who provide frequent updates to cater to your productivity needs. With our flexible time slots, on-time service guarantee and quality assurance, you can be assured of getting tasks done at your convenience.
						</div>
						<br>
						<div class="helpText text-center">
							ZEST is at your BEST (in productivity)!!!
						</div>
						<br><br>
						<h3>Quick Links</h3>
						<br>
						<div class="helpText text-center">
							<a class="helpLink" href="help.php?help=help">Let's get started!!!</a><br>
							<a class="helpLink" href="help.php?help=features">Check out our features...</a><br>
							<a class="helpLink" href="help.php?help=change">Do you want to change your password?</a><br>
							<a class="helpLink" href="help.php?help=contact">Do you want to contact the developers?</a>
						</div>
					</div>
					<div id="contact" class="tab-pane container helpContent rounded px-4 py-5<?php if ($default == "contact"){echo " active";} else {echo " fade";}?>">
						<h1>Contact Us</h1>
						<br>
						<div class="helpText text-center">
							You want to find us?<br>
							Some may say... ZEST is the life!!!<br><br>
							You may contact us in the following totally real platforms:
						</div>
						<br><br>
						<div class="helpText text-center">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
  							<path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
							</svg> zest_official@fakeEmail.com
						</div> <br>
						<div class="helpText text-center">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
							</svg> Zest - Work with Productivity (Officially Fake)
						</div> <br>
						<div class="helpText text-center">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
  							<path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
							</svg> Zest - Work with Productivity (@zestthebestfakeaccount)
						</div> <br>
						<div class="helpText text-center">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
  							<path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
							</svg> Zest - Work with Productivity (@zestthebestfakeaccount)
						</div> <br>
						<div class="helpText text-center">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
  							<path fill-rule="evenodd" d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.122C.002 7.343.01 6.6.064 5.78l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
							</svg> Zest The App Officially Fake
						</div>
						<br><br>
						<h3>Quick Links</h3>
						<br>
						<div class="helpText text-center">
							<a class="helpLink" href="help.php?help=help">Let's get started!!!</a><br>
							<a class="helpLink" href="help.php?help=features">Check out our features...</a><br>
							<a class="helpLink" href="help.php?help=change">Do you want to change your password?</a><br>
							<a class="helpLink" href="help.php?help=about">Want to know more about us?</a><br>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
			spawnNotification()
		</script>
	</div>
</body>