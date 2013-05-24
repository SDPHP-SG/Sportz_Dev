<div id="header_login_container" class="user_form">
	<?php
	echo form_open('main/users/login');

	echo '<div>';
	/* username */
	$username_data = array(
		'name' => 'username',
		'id' => 'username',
		'type' => 'text',
		'class' => 'inputtext',
		'value' => '',
		'tabindex' => '1'
	);
	echo form_label("User Name", "username");
	echo form_input($username_data);
	echo '</div>';

	echo '<div>';
	/* password */
	$password_data = array(
		'name' => 'password',
		'id' => 'password',
		'type' => 'password',
		'class' => 'inputtext',
		'value' => '',
		'tabindex' => '2'
	);
	echo form_label("Password", "password");
	echo form_input($password_data);

	/* submit */
	$submit_data = array(
		'name' => 'login_button',
		'id' => 'login_button',
		'class' => 'button',
		'value' => 'Log In',
		'tabindex' => '3',
		'onclick' => 'test()',
		'onsubmit' => 'test()'
	);
	echo form_submit($submit_data);
	echo '</div>';

	echo '<div>';
	/* persist (stay logged in) */
	$persist_data = array(
		'name' => 'persist',
		'id' => 'persist',
		'value' => '1',
		'checked' => FALSE,
		'tabindex' => '4'
	);
	echo form_label("Stay Logged In", "persist");
	echo form_checkbox($persist_data);

	echo '<a href="signup">Sign Up</a>';
	echo '</div>';

	echo form_close();
	echo '</div>'; //end of div header_login_container
	?>