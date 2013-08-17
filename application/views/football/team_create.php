<main class="football">
	<div class="row">
		<h2 class="col-lg-offset-3">Create A Football Team</h2>
		<div class="col-6 col-lg-offset-2">
			<?php echo validation_errors(); ?>

			<form action="football/team/create" class="form-horizontal" role="form">
				<div class="form-group">
					<label for="name" class="col-lg-2 control-label">Name</label>
					<div class="col-lg-4">
						<input type="text" class="form-control" id="name" placeholder="Name">
					</div>
				</div>
				<div class="form-group">
					<label for="city" class="col-lg-2 control-label">City</label>
					<div class="col-lg-4">
						<input type="text" class="form-control" id="city" placeholder="City">
					</div>
				</div>
				<div class="form-group">
					<label for="state" class="col-lg-2 control-label">State</label>
					<div class="col-lg-4">
						<input type="text" class="form-control" id="state" placeholder="State">
					</div>
				</div>
				<div class="form-group">
					<label for="date_start" class="col-lg-2 control-label">Formed Date</label>
					<div class="col-lg-4">
						<input type="text" class="form-control" id="date_start" placeholder="Formed Date">
					</div>
				</div>
				<div class="form-group">
					<label for="date_end" class="col-lg-2 control-label">End Date</label>
					<div class="col-lg-4">
						<input type="text" class="form-control" id="date_end" placeholder="End Date">
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-offset-2 col-lg-6">
						<button type="submit" class="btn btn-default">Create Team</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</main>