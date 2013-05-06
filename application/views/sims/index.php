<h2>All SIM Entries</h2>

<table>
    
    <thead>
        
        <tr>
        
            <th>SIM Number</th>

            <th>Plan Value</th>

            <th>Activation Date</th>

            <th>Mobile Number</th>
            
            <th></th>
        
        </tr>
        
    </thead>
    
    <tbody>
        
        <?php 

foreach ( $sims as $sims_item ) { ?>
        
        <tr>
            
            <td><?php echo $sims_item['sim_num']; ?></td>
            
            <td><?php echo $sims_item['value']; ?></td>
            
            <td><?php echo $sims_item['act_date']; ?></td>
            
            <td><?php echo $sims_item['mob_num']; ?></td>
            
            <td><a href="<?php echo $sims_item['sim_num']; ?>">Link</a></td>
            
        </tr> 
        
        <?php } ?>
        
    </tbody>
    
    
    
</table>