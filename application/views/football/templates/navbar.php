<nav class="navbar navbar-inverse">
	<div class="navbar-inner">
		<div class="container">
			<button class="btn btn-navbar" data-target=".nav-collapse" data-toggle="collapse" type="button">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<div class="nav-collapse collapse">
				<ul class="nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Team<b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li><?php echo anchor('football/team/display/5', 'Display') ?></li>
							<li><?php echo anchor('football/team/create', 'Create') ?></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Player<b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li><?php echo anchor('football/player/display/1', 'Display') ?></li>
							<li><?php echo anchor('football/player/create', 'Create') ?></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>