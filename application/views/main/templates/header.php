<header>
	<div class="media">
		<a class="pull-left" href="#">
		<?php
		$image_properties = array('src' => 'images/main/logo.jpg', 'class' => 'media-object', 'data-src' => 'holder.js/64x64');
		echo img($image_properties);
		?>
		</a>
		<div class="media-body">
			<h4 class="media-heading">Feed your addiction</h4>
		</div>
		<?php
		//If user is logged in already, display the welcome username message in the header.
		if($is_logged_in) {
			include "welcome_msg.php";
			//If user is not logged in and the current page isn't the login or signup page
			//then display the login form in the header.
		}elseif($this->router->method <> 'login') { // and $this->router->method <> 'signup') {
			include("header_login_form.php");
		}
		?>
	</div>
</header>