<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">
			
					<div id="main" class="col620 left first clearfix" role="main">
					
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						
						<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						<header>
							
							<h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1>
							
							<?php 
								global $custom_project_metabox;  
								if ($custom_project_metabox->get_the_value('git_repo')) {
							?>
							<div class="git-link">
								<a href="<?php $custom_project_metabox->the_value('git_repo'); ?>" target="_blank">View Related Code on GitHub</a>
							</div>
							<?php } ?>							
							
							<p class="meta"><?php echo get_the_term_list( $post->ID, 'portfolio_project_categories', 'Area of Expertise: ', ', ', '' ); ?> &nbsp;|&nbsp; <?php echo get_the_term_list( $post->ID, 'project_skills', 'Toolbelt: ', ', ', '' ); ?></p>
						
						</header> <!-- end article header -->
					
						<section class="post_content clearfix" itemprop="articleBody">
							<?php the_content(); ?>
							
					
						</section> <!-- end article section -->
						
						<footer>
			
							<?php 
								global $custom_people_metabox;
								$collabs = array();
								
								while($custom_project_metabox->have_fields('collaborators')) {
								    $collab_ids[] = $custom_project_metabox->get_the_value();
								}
								
								if( count($collab_ids) > 0) { $collab_string = "Collaborators: ";
								
							    	$collabs = new WP_Query( array('post__in' => $collab_ids, 'post_type' => 'people' ) );
							    	
							    	while ( $collabs->have_posts() ) : $collabs->the_post();
										$collab_string .= '<a href="'.$custom_people_metabox->get_the_value('personal_url').'" target="_blank">'. get_the_title() .'</a>';
									endwhile;
							    	wp_reset_query();
							    	
							    	echo $collab_string;
						    	}
							?>
							
							<?php the_tags('<p class="tags"><span class="tags-title">Tags:</span> ', ', ', '</p>'); ?>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
						
						<?php //comments_template(); ?>
						
						<?php endwhile; ?>			
						
						<?php else : ?>
						
						<article id="post-not-found">
						    <header>
						    	<h1>Not Found</h1>
						    </header>
						    <section class="post_content">
						    	<p>Sorry, but the requested resource was not found on this site.</p>
						    </section>
						    <footer>
						    </footer>
						</article>
						
						<?php endif; ?>
					
					</div> <!-- end #main -->
    				
					<?php get_sidebar(); // sidebar 1 ?>
    			
    			</div> <!-- #inner-content -->
    			
			</div> <!-- end #content -->

<?php get_footer(); ?>