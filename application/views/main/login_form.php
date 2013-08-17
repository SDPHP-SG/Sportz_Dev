<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h2>Please Log In</h2>
			</div>
			<div class="modal-body">
				<form action="login" method="post" class="form-horizontal" role="form">
					<fieldset>
						<div class="form-group">
							<label for="username" class="col-lg-4 control-label">User Name</label>
							<div class="col-lg-8">
								<input name="username" id="username" type="text"
									   class="form-control input-sm"
									   value="<?php set_value('username'); ?>"
									   placeholder="User Name" tabindex="1">
							</div>
							<div class="col-lg-8 col-lg-offset-4 has-error">
								<?php echo form_error('username'); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="col-lg-4 control-label">Password</label>
							<div class="col-lg-8">
								<input name="password" id="password" type="password" class="form-control"
									   value="<?php set_value('password'); ?>" placeholder="Password" tabindex="2">
							</div>
							<div class="col-lg-8 col-lg-offset-4 has-error">
								<?php echo form_error('password'); ?>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-offset-4 col-lg-8">
								<div class="checkbox">
									<label><input type="checkbox" tabindex="3">Remember me</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-offset-4 col-lg-8">
								<button type="submit" class="btn btn-default" tabindex="4">Sign In</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
			<div class="modal-footer">
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
	$(document).ready(function() {
		$('#myModal').modal();
	});
</script>