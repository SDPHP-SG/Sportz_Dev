<main>
	<div class="row-fluid">
		<div class="col6 offset4">
			 <h2>Create A Football Team</h2>

			<?php echo validation_errors(); ?>

			<?php echo form_open('football/team/create') ?>
				<label for="name">Name</label>
				<input type="input" name="name" /><br />

				<label for="city">City</label>
				<input type="input" name="city" /><br />

				<label for="state">State</label>
				<input type="input" name="state" /><br />

				<label for="date_start">Formed Date</label>
				<input type="input" name="date_start" /><br />

				<label for="date_end">End Date</label>
				<input type="input" name="date_end" /><br />

				<input type="submit" name="submit" value="Create New Team" />
			</form>
		</div>
	</div>
</main>