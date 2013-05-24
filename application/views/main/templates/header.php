<link rel="stylesheet" type="text/css" href="/css/main/user.css" />

<div id="header_container" class="container_ctr">

	<div id="header">
		<img src="/assets/images/main/logo.jpg" />
		<?php
		//If user is logged in already, display the welcome username message in the header.
		if ($is_logged_in) {
			include "welcome_msg.php";
		//If user is not logged in and the current page isn't the login or signup page
		//then display the login form in the header.
		}elseif($this->router->method <> 'login') { // and $this->router->method <> 'signup') {
			include("header_login_form.php");
		}
		?>
	</div> <!-- end div header -->
</div> <!-- end div header_container -->
<div class="div_clear"></div>