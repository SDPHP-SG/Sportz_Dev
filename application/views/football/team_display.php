<main class="football">
	<div class="row">
		<div class="col-lg-4 col-lg-offset-4">
			<ul class="list-unstyled">
				<?php if($team_data["name"] == 'Error') { ?>
					<li>Error in creating team</li>
				<?php }else { ?>
					<li><?php echo $team_data["name"]; ?></li>
					<li><?php echo $team_data["city"]; ?></li>
					<li><?php echo $team_data["state"]; ?></li>
					<li><?php echo $team_data["date_start"]; ?></li>
					<li><?php echo $team_data["date_end"]; ?></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</main>