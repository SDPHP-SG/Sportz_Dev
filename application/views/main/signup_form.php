<link rel="stylesheet" type="text/css" href="/css/main/user.css" />

<div id="signup_container" class="user_form">
	<?php
	echo form_open('main/users/signup');

	echo '<div>';
	/* username */
	$username_data = array(
		'name' => 'username',
		'id' => 'username',
		'type' => 'text',
		'class' => 'inputtext',
		'value' => set_value('username'),
		'tabindex' => '6'
	);
	echo form_label("User Name", "username");
	echo form_input($username_data);
	echo form_error('username');
	echo '</div>';

	echo '<div>';
	/* password */
	$password_data = array(
		'name' => 'password',
		'id' => 'password',
		'type' => 'password',
		'class' => 'inputtext',
		'value' => set_value(),
		'tabindex' => '7'
	);
	echo form_label("Password", "password");
	echo form_input($password_data);
	echo form_error('password');
	echo '</div>';

	echo '<div>';
	/* confirm password */
	$repassword_data = array(
		'name' => 'repassword',
		'id' => 'repassword',
		'type' => 'password',
		'class' => 'inputtext',
		'value' => set_value(),
		'tabindex' => '8'
	);
	echo form_label("Confirm Password", "repassword");
	echo form_input($repassword_data);
	echo form_error('repassword');
	echo '</div>';

	echo '<div>';
	/* first name */
	$first_name_data = array(
		'name' => 'first_name',
		'id' => 'first_name',
		'type' => 'text',
		'class' => 'inputtext',
		'value' => set_value('first_name'),
		'tabindex' => '9'
	);
	echo form_label("First Name", "first_name");
	echo form_input($first_name_data);
	echo form_error('first_name');
	echo '</div>';

	echo '<div>';
	/* last name */
	$last_name_data = array(
		'name' => 'last_name',
		'id' => 'last_name',
		'type' => 'text',
		'class' => 'inputtext',
		'value' => set_value('last_name'),
		'tabindex' => '10'
	);
	echo form_label("Last Name", "last_name");
	echo form_input($last_name_data);
	echo form_error('last_name');
	echo '</div>';

	echo '<div>';
	/* email address */
	$email_data = array(
		'name' => 'email',
		'id' => 'email',
		'type' => 'text',
		'class' => 'inputtext',
		'value' => set_value('email'),
		'tabindex' => '11'
	);
	echo form_label("Email Address", "email");
	echo form_input($email_data);
	echo form_error('email');
	echo '</div>';

	echo '<div class="div_center">';
	/* submit */
	$submit_data = array(
		'name' => 'signup_button',
		'id' => 'signup_button',
		'class' => 'button',
		'value' => 'Sign Up',
		'tabindex' => '12'
	);
	echo form_submit($submit_data);
	echo '</div>';


	echo form_close();
	echo '</div>'; //div signup_container