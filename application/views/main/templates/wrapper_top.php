<?php
//Generates a doctype(html) which indicates html5 which is required for Twitter Bootstrap
echo doctype('html5');
?>

<head>
	<title><?php echo $title ?></title>
	<!-- Required for Twitter Bootstrap -->
	<?php echo meta(array('name' => 'viewport', 'content' => 'no-width=device-width, initial-scale=1.0'));?>

	<!-- Twitter Bootstrap -->
	<?php $bs_link = array('href' => 'css/bootstrap.css', 'rel' => 'stylesheet', 'type' => 'text/css', 'media' => 'screen'); ?>
	<?php echo link_tag($bs_link); ?>

	<?php echo link_tag('css/base.css'); ?>
	<?php echo link_tag('css/main/main.css'); ?>
	<?php echo link_tag('css/main/user.css'); ?>

</head>

<body>
	<div class="container">
