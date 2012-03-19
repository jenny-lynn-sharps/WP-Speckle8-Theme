<div class="my_meta_control">
 
	<label>Collaborators</label>
	 

	    <?php 
		    $args = array(
			    'orderby'         => 'title',
			    'post_type'       => 'people',
			    'post_status'     => 'publish' );
			    	
	    	$people = get_posts( $args ); 
	    ?>
	    
	    <?php $selected = ' selected="selected"'; ?>
	    <?php while($metabox->have_fields_and_one('collaborators')): ?>
	    <p>
	        <select name="<?php $metabox->the_name(); ?>">
	        	<option value=""></option>
	        	
	        	<?php foreach( $people as $post ) { ?>
	        	
		        <option value="<?php echo $post->ID; ?>"<?php if ($metabox->get_the_value() == $post->ID) echo $selected; ?>><?php the_title(); ?></option>
		        
		        <?php }?>
	        </select>
	    </p>
    <?php endwhile; ?>
    
    <p>
    	<label>GIT Repository</label> 
    	<input type="text" name="<?php $metabox->the_name('git_repo'); ?>" value="<?php $metabox->the_value('git_repo'); ?>"/>
	</p>
    
</div>