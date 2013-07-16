<link rel="stylesheet" type="text/css" href="/css/main/user.css" />

<div id="login_container" class="user_form">
	<?php
	echo form_open('login');

	echo '<div>';
	/* username */
	$username_data = array(
		'name' => 'username',
		'id' => 'username',
		'type' => 'text',
		'class' => 'inputtext',
		'value' => set_value('username'),
		'tabindex' => '1'
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
		'value' => set_value('password'),
		'tabindex' => '2'
	);
	echo form_label("Password", "password");
	echo form_input($password_data);
	echo form_error('password');
	echo '</div>';

	echo '<div class="div_center">';
	/* submit */
	$submit_data = array(
		'name' => 'login_button',
		'id' => 'login_button',
		'class' => 'button',
		'value' => 'Log In',
		'tabindex' => '3'
	);
	echo form_submit($submit_data);
	echo '</div>';

	echo '<div>';
	/* persist (stay logged in) */
	$persist_data = array(
		'name' => 'persist',
		'id' => 'persist',
		'type' => 'checkbox',
		'value' => 'persist',
		'checked' => set_checkbox('persist', 'persist', TRUE),
		'tabindex' => '4'
	);
	echo form_label("Stay Logged In", "persist");
	echo form_checkbox($persist_data);

	echo anchor('signup', 'Sign Up', array('title'=>'signup'));
	echo '</div>';

	echo form_close('</div>');