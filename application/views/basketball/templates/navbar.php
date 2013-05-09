<link rel="stylesheet" type="text/css" href="css/basketball/navbar.css" />

<div id="bb_navbar">
	<ul id="bb_navlist">
		<li<? if ($thispage == "teams") echo " id=\"currentpage\"";?>><a href="index.php?id=home">Teams</a></li>
		<li<? if ($thispage == "players") echo " id=\"currentpage\"";?>><a href="index.php/basketball">Players</a></li>
	</ul>
</div>