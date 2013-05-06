<h2>Add SIM Numbers</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('sims/create') ?>

	<label>Sim Number</label>
        
	<input type="input" name="sim_num" />
        
        <br />

        <label>Plan Value</label>
        
	<input type="input" name="value" />
        
        <br />
        
        <label>Activation Date</label>
        
	<input type="input" name="act_date" />
        
        <br />
        
        <label>Mobile Number</label>
        
	<input type="input" name="mob_num" />
        
        <br />
        
	<input type="submit" name="submit" value="Add SIM Number" /> 

</form>