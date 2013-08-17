<header>
	<div class="row">
		<div class="media col-lg-8">
			<a class="pull-left" href="/home">
				<?php
				$image_properties = array(
					'src' => 'images/main/logo.png',
					'alt' => 'Sportz Logo',
					'class' => 'media-object',
				);

				echo img($image_properties);
				?>
			</a>
			<div class="media-body pull-left">
				<h2>Feed Your Addiction</h2>
			</div>
		</div>

		<?php
			//If user is logged in already, display the welcome username message in the header.
			if($is_logged_in) {
				include "header_welcome.php";
			//If user is not logged in and the current page isn't the login or signup page
			//then display the login form in the header.
			}else { //if($this->router->method <> 'login') { // and $this->router->method <> 'signup') {
				include("header_login.php");
			}
		?>
	</div>

	<div class="jumbotron">
		<h1>Large Banner Here</h1>
	</div>
</header>