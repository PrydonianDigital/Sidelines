<?php get_header(); ?>

	<div class="row" id="home">
		<div class="large-12 columns">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			
			
		    <?php endwhile; ?>
		
		    <?php else : ?>
		    
		    <?php endif; ?>	

		</div>
	</div>
	
	<div class="row">
		<div class="large-12 columns">		
			<ul class="cat_list">
				<li class="active"><a href="/work/english-language-projects/">English language projects</a></li>
				<li><a href="/work/localisation-projects/">Localisation projects</a></li>
			</ul>
			<div class="row" id="filtered">
    		<?php
    			$args = array (
    				'post_type' => 'projects',
    				'posts_per_page' => '9',
    				'category_name' => 'english-language-projects',
    				'order' => 'DESC',
    				'orderby' => 'menu_order'
    			);
    			$projects = new WP_Query( $args );if ( $projects->have_posts() ) {
    				while ( $projects->have_posts() ) {
    					$projects->the_post();
    		?>	
    			<div class="large-4 columns <?php $post_cats = get_the_category(); foreach( $post_cats as $category ) { echo $category->slug.' ';} ?>">
    				<div class="row">
    					<div class="small-6 large-12 columns">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('slider'); ?></a>
    					</div>
    					<div class="small-6 large-12 columns">
							<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>					
    					</div>
    				</div>
    			</div>
    		<?php
    				}
    			} else {
    				// no posts found
    			}
    			
    			// Restore original Post Data
    			wp_reset_postdata();
    		?>		
    		</div>
		</div>
	</div>	
	
	<div class="row">
		<div class="large-12 columns">
			<hr />
		</div>
	</div>
	
	<div class="row">
		<div class="large-12 columns">
			<h3 class="list">Project List</h3>
		</div>
	</div>
	<div class="row">
		<div class="large-12 columns listMe">
		<?php
			$args = array (
				'post_type' => 'projects',
				'posts_per_page' => '1000',
				'order' => 'ASC',
				'orderby' => 'title'
			);
			
			// The Query
			$project = new WP_Query( $args );
			
			// The Loop
			if ( $project->have_posts() ) {
				while ( $project->have_posts() ) {
					$project->the_post();
		?>
			
				<p><?php the_title(); ?></p>
			
		<?php
				}
			} else {
				// no posts found
			}
			
			// Restore original Post Data
			wp_reset_postdata();		
		?>
		</div>
	</div>

<?php get_footer(); ?>