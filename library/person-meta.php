<div class="my_meta_control">
 
    <p>
    	<label>Professional Title</label> 
    	<input type="text" name="<?php $metabox->the_name('pro_title'); ?>" value="<?php $metabox->the_value('pro_title'); ?>"/>
	</p>
    
    <p>
    	<label>Email </label> 
    	<input type="text" name="<?php $metabox->the_name('email'); ?>" value="<?php $metabox->the_value('email'); ?>"/>
	</p>
	
	
    <p>
        <label>Personal URL</label>
        <?php $metabox->the_field('personal_url'); ?>
        <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>"/>

    </p>
 
</div>