<?php echo link_tag('css/football/football.css'); ?>

<title><?php echo $title ?> - Football</title>
<h1>Football Header</h1>
<nav class="navbar navbar-inverse" role="navigation">
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Team<b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="/football/team/display">Display</a></li>
					<li><a href="/football/team/create">Create</a></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Player<b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="/football/player/display">Display</a></li>
					<li><a href="/football/player/create">Create</a></li>
				</ul>
			</li>
		</ul>
	</div>
</nav>
<?php echo $content; ?>
<div>Football Footer</div>
