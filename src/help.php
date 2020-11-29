<?php include('header.php'); ?>
<?php include('notification.php'); ?>
<?php
	session_start();
	$default = $_GET['help'];
	$_SESSION['default'] = $_GET['help'];
?>

<body class="default-bg">
	<!-- navbar goes here -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10 helpHolder">
				<h3>HELP & SUPPORT</h3>
				<img class="helpPic" src="/cmsc128/resources/help-banner.jpg">
				<br><br>
				<ul class="nav nav-tabs">
					<li class="nav-item helpTitle">
						<a class="nav-link<?php if ($default == "need"){echo " active";} ?>" data-toggle="tab" href="#help">Help</a>
					</li>
					<li class="nav-item helpTitle">
						<a class="nav-link<?php if ($default == "forgot"){echo " active";} ?>" data-toggle="tab" href="#forgot">Forgot Your Password?</a>
					</li>
					<li class="nav-item helpTitle">
						<a class="nav-link<?php if ($default == "about"){echo " active";} ?>" data-toggle="tab" href="#about">About Us</a>
					</li>
				</ul>
				<div class="tab-content">
					<div id="help" class="tab-pane container<?php if ($default == "need"){echo " active";} ?>">
						<br>
						<h3>Help</h3>
						<div class="helpText">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Etiam tempor orci eu lobortis elementum nibh. Viverra adipiscing at in tellus integer feugiat scelerisque varius. Pulvinar mattis nunc sed blandit libero volutpat sed cras. Vitae suscipit tellus mauris a diam maecenas. Lobortis elementum nibh tellus molestie nunc non blandit. Malesuada fames ac turpis egestas maecenas pharetra. Massa id neque aliquam vestibulum morbi blandit cursus risus at. Ac auctor augue mauris augue neque gravida in. Quam nulla porttitor massa id neque aliquam vestibulum morbi blandit. Malesuada nunc vel risus commodo viverra maecenas. Placerat orci nulla pellentesque dignissim enim sit amet venenatis urna.
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
					<div id="forgot" class="tab-pane container<?php if ($default == "forgot"){echo " active";} ?>">
						<br>
						<h3>Forgot Your Password?</h3>
						<div class="helpText">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Etiam tempor orci eu lobortis elementum nibh. Viverra adipiscing at in tellus integer feugiat scelerisque varius. Pulvinar mattis nunc sed blandit libero volutpat sed cras. Vitae suscipit tellus mauris a diam maecenas. Lobortis elementum nibh tellus molestie nunc non blandit. Malesuada fames ac turpis egestas maecenas pharetra. Massa id neque aliquam vestibulum morbi blandit cursus risus at. Ac auctor augue mauris augue neque gravida in. Quam nulla porttitor massa id neque aliquam vestibulum morbi blandit. Malesuada nunc vel risus commodo viverra maecenas. Placerat orci nulla pellentesque dignissim enim sit amet venenatis urna.
						</div>
						<br>
						<div class="helpText">
							Odio facilisis mauris sit amet. At auctor urna nunc id. Turpis cursus in hac habitasse platea dictumst quisque. Ut sem nulla pharetra diam sit amet nisl suscipit adipiscing. Vel pretium lectus quam id leo in vitae turpis. Gravida arcu ac tortor dignissim convallis aenean et. Donec ac odio tempor orci dapibus ultrices in. Aliquam sem et tortor consequat id porta nibh venenatis cras. Hendrerit gravida rutrum quisque non tellus orci ac auctor augue. Risus quis varius quam quisque. Sit amet mattis vulputate enim nulla aliquet porttitor lacus luctus. In hac habitasse platea dictumst vestibulum rhoncus est.
						</div>
						<br>
						<div class="helpText">
							Tellus mauris a diam maecenas sed enim. Cras ornare arcu dui vivamus. Hendrerit gravida rutrum quisque non tellus orci ac auctor augue. Hendrerit gravida rutrum quisque non tellus orci. A cras semper auctor neque vitae tempus quam pellentesque nec. Magna eget est lorem ipsum dolor. Quis blandit turpis cursus in hac habitasse platea. Mi tempus imperdiet nulla malesuada pellentesque elit eget gravida. Et malesuada fames ac turpis egestas maecenas pharetra convallis posuere. Congue eu consequat ac felis. Sagittis eu volutpat odio facilisis mauris sit amet massa vitae. Sed vulputate odio ut enim blandit volutpat.
						</div>
					</div>
					<div id="about" class="tab-pane container<?php if ($default == "about"){echo " active";} ?>">
						<br>
						<h3>About Us</h3>
						<div class="helpText">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Etiam tempor orci eu lobortis elementum nibh. Viverra adipiscing at in tellus integer feugiat scelerisque varius. Pulvinar mattis nunc sed blandit libero volutpat sed cras. Vitae suscipit tellus mauris a diam maecenas. Lobortis elementum nibh tellus molestie nunc non blandit. Malesuada fames ac turpis egestas maecenas pharetra. Massa id neque aliquam vestibulum morbi blandit cursus risus at. Ac auctor augue mauris augue neque gravida in. Quam nulla porttitor massa id neque aliquam vestibulum morbi blandit. Malesuada nunc vel risus commodo viverra maecenas. Placerat orci nulla pellentesque dignissim enim sit amet venenatis urna.
						</div>
						<br>
						<div class="helpText">
							Odio facilisis mauris sit amet. At auctor urna nunc id. Turpis cursus in hac habitasse platea dictumst quisque. Ut sem nulla pharetra diam sit amet nisl suscipit adipiscing. Vel pretium lectus quam id leo in vitae turpis. Gravida arcu ac tortor dignissim convallis aenean et. Donec ac odio tempor orci dapibus ultrices in. Aliquam sem et tortor consequat id porta nibh venenatis cras. Hendrerit gravida rutrum quisque non tellus orci ac auctor augue. Risus quis varius quam quisque. Sit amet mattis vulputate enim nulla aliquet porttitor lacus luctus. In hac habitasse platea dictumst vestibulum rhoncus est.
						</div>
						<br>
						<div class="helpText">
							Tellus mauris a diam maecenas sed enim. Cras ornare arcu dui vivamus. Hendrerit gravida rutrum quisque non tellus orci ac auctor augue. Hendrerit gravida rutrum quisque non tellus orci. A cras semper auctor neque vitae tempus quam pellentesque nec. Magna eget est lorem ipsum dolor. Quis blandit turpis cursus in hac habitasse platea. Mi tempus imperdiet nulla malesuada pellentesque elit eget gravida. Et malesuada fames ac turpis egestas maecenas pharetra convallis posuere. Congue eu consequat ac felis. Sagittis eu volutpat odio facilisis mauris sit amet massa vitae. Sed vulputate odio ut enim blandit volutpat.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>