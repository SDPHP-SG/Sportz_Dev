<link rel="stylesheet" type="text/css" href="css/main/navbar.css" />

<div id="navbar">
	<ul id="navlist">
		<li<? if ($thispage == "home") echo " id=\"currentpage\"";?>><a href="index.php?id=home">Home</a></li>
		<li<? if ($thispage == "basketball") echo " id=\"currentpage\"";?>><a href="index.php/basketball">Basketball</a></li>
	</ul>
</div>