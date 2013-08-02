<?php
//Generate different doctypes based on the browser used ie quirks mode
echo doctype();
?>

<head>
<?php echo link_tag('css/base.css'); ?>
<!-- 	<link rel="stylesheet" type="text/css" href="/css/base.css" /> -->
<?php echo link_tag('css/main/main.css'); ?>
<!-- 	<link rel="stylesheet" type="text/css" href="/css/main/main.css" /> -->

	<title><?php echo $title ?></title>
</head>

<body>
	<div id="wrapper">
