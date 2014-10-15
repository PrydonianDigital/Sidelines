<?php get_header(); ?>

<?php if( is_page('Welcome To Sidelines') ) { ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="row">
    	<div class="large-8 columns">
	    	<div class="slideshow-wrapper">
		    	<div class="preloader"></div>
				<ul data-orbit data-options="timer_speed:4500; bullets:false; slide_number:false;">
        		<?php
    				$args = array (
    					'post_type' => 'slider',
    					'category_name' => 'home-page',
    					'posts_per_page' => '5'
    				);
    				$awards = new WP_Query( $args );
    				if ( $awards->have_posts() ) {
    					while ( $awards->have_posts() ) {
    						$awards->the_post();
    			?>
    					<li><?php the_post_thumbnail('large'); ?></li>
    			<?php
    					}
    				} else {
    					// no posts found
    				}
    				wp_reset_postdata();    		
        		?>			
    			</ul>
		    </div>
    	</div>
    	<div class="large-3 columns">
			<?php the_content(); ?>
			<a href="https://twitter.com/SidelinesUK" class="twitter-follow-button" data-show-count="false" data-size="large" data-dnt="true">Follow @SidelinesUK</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
    	</div>
    	<div class="large-1 columns"></div>
	</div>
	  	
    <?php endwhile; ?>

    <?php else : ?>
    
    <?php endif; ?>
    
	<div class="row">
		<div class="large-12 columns">
			<hr />
		</div>
	</div> 
    
	<div class="row" id="page-awards">
		<div class="large-12 columns">
			<h3 class="inside">Latest News</h3>
		</div>
	</div> 
	
	<div class="row">
	   	<div class="large-12 columns">
			<div id="news">
			<?php 
				$args = array (
					'post_type' => 'post',
					'posts_per_page' => '10',
				);
				$news = new WP_Query( $args );
				if ( $news->have_posts() ) {
					while ( $news->have_posts() ) {
						$news->the_post(); 
			?>
				<div class="newsStory">
				<p class="title closed"><a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>"><?php the_title(); ?><span><?php the_time('M Y') ?></span></a></p>
				<div class="content">
					<div class="row" id="post-<?php the_ID(); ?>">

					</div>
				</div>
			</div>
			<?php 
					}
				} else {
					// no posts found
				}
				wp_reset_postdata(); 
			?>	
			</div>
	   	</div>	
	</div>
	
	<div class="row">
		<div class="large-10 columns hide-for-medium-up">
			<?php
				$devices = array(
				"iphone", "ipod",
				"android", "windows ce", "windows phone os",
				"blackberry", "palm", "symbian", "series60"
				);
				if(mobile_detected($devices)) :
			?>
			<hr />
			<ul class="twitter">
			<?php
				    dynamic_sidebar('tweets');
			?>
			</ul>
			<br />
			<?php endif; ?>
		</div>
	</div>
	
	
<?php } ?>

<?php if( is_page('Credits') ) { ?>
	<div class="row">
		<div class="large-12 columns">
			<h3 class="list">Sidelines Writers' credits include:</h3>
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
    
<?php } ?>

<?php if( is_page('Contact') ) { ?>	

	<div class="row" id="home">
		<div class="large-12 columns"> </div>
		<div class="large-4 columns">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<?php the_content(); ?>
			
		    <?php endwhile; ?>
		
		    <?php else : ?>
		    
		    <?php endif; ?>			
		</div>
		<div class="large-5 columns">
			<img src="<?php echo get_template_directory_uri(); ?>/img/map.png" alt="map" />
		</div>
		<div class="large-3 columns">
			&nbsp;
		</div>
	</div>
	  
<?php } ?>

<?php get_footer(); ?>	