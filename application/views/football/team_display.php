<main class="football">
	<div class="row-fluid">
		<div class="span12">
			<div class="row-fluid block">
				<div class="span12 text-center">
					<div class="media">
						<a class="pull-left" href="#">
							<img class="media-object" data-src="holder.js/64x64" src="">
						</a>
						<div class="media-body">
							This is a block.
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid block">
				<div class="span12 text-center">
					This is a block.
				</div>
			</div>
			<div class="row-fluid block">
				<div class="span4">
					This is a block.
				</div>
				<div class="span4">
					<ul class="">
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
				<div class="span4">
					This is a block.
				</div>
			</div>
		</div>
	</div>
</main>