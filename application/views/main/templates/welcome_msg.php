<div id="welcome_container" class="user_form">
	<?php
	echo '<div>';
	echo 'Welcome ' . $this->session->userdata('username');
	echo '</div>';
	echo '<div>';
	echo anchor('logout', 'Logout');
	echo '</div>';

echo '</div>'; //div welcome_container