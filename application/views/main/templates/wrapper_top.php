<?php
//Generates a doctype(html) which indicates html5 which is required for Twitter Bootstrap
echo doctype('html5');
?>

<head>
	<title><?php echo $title ?></title>
	<!-- Required for Twitter Bootstrap -->
	<?php echo meta(array('name' => 'viewport', 'content' => 'no-width=device-width, initial-scale=1.0'));?>

	<!-- Twitter Bootstrap -->
	<?php $bs_link = array('href' => 'css/bootstrap3.css', 'rel' => 'stylesheet', 'type' => 'text/css', 'media' => 'screen'); ?>
	<?php echo link_tag($bs_link); ?>

	<?php echo link_tag('css/base.css'); ?>
	<?php echo link_tag('css/main/main.css'); ?>

	<!-- Normally load js at bottom of body in case they are slow.  May need to put them here
		if calling before body is fully loaded or create min js and load here. -->
	<script src="<?php echo base_url();?>js/jquery-1.9.1.js"></script>
	<!--<script src="<?php //echo base_url();?>js/bootstrap3.js"></script>-->

</head>

<body>
	<div class="container">
