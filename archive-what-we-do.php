<?php get_header(); ?>

	<div class="row">
		<div class="large-12 columns" id="whatWeDo">
			<div class="row">
				<div class="large-2 columns">
					<div class="whatWeDoMobile">
						<?php
							$args = array (
			    				'post_type' => 'what-we-do',
			    				'pagination' => false,
			    				'order' => 'ASC',
			    				'orderby' => 'menu_order',
			    			);
			    			$what = new WP_Query( $args );
			    			if ( $what->have_posts() ) {
			    				while ( $what->have_posts() ) {
			    					$what->the_post();
			    		?>		
						<div class="whatWeDo">
				    		<p class="title"><a href="#<?php global $post; echo $post->post_name; ?>" id="<?php global $post; echo $post->post_name; ?>"><?php the_title(); ?></a></p>
						</div>
						<?php
								}
							} else {
								// no posts found
							}
							wp_reset_postdata();
						?>
					</div>
					<?php
						$args = array (
		    				'post_type' => 'what-we-do',
		    				'pagination' => false,
		    				'order' => 'ASC',
		    				'orderby' => 'menu_order',
		    			);
		    			$what = new WP_Query( $args );
		    			if ( $what->have_posts() ) {
		    				while ( $what->have_posts() ) {
		    					$what->the_post();
		    		?>	
					<?php
							}
						} else {
							// no posts found
						}
						wp_reset_postdata();
					?>					
				</div>
				<div class="large-10 columns">
					<?php
						$args = array (
		    				'post_type' => 'what-we-do',
		    				'pagination' => false,
		    				'order' => 'ASC',
		    				'orderby' => 'menu_order',
		    			);
		    			$what = new WP_Query( $args );
		    			if ( $what->have_posts() ) {
		    				while ( $what->have_posts() ) {
		    					$what->the_post();
		    		?>						
					<div class="content whatWeDoContent" data-slug="<?php global $post; echo $post->post_name; ?>">
				    	<div class="text">
				    		<div class="row">
								<div class="large-12 columns">
						    		<h3 class="awards"><?php the_title(); ?></h3>
								</div>
				    		</div>
				    		<?php global $post; $image1 = get_post_meta( $post->ID, '_cmb_wwd1', true ); if( $image1 != '' ) :  ?>
				    		<div class="row" id="images">
				    		<div class="hide-for-small">
					    		<div class="large-4 columns">
					    			<p><img src="<?php global $post; $image1 = get_post_meta( $post->ID, '_cmb_wwd1', true ); echo $image1;  ?>"></p><p><?php global $post; $title1 = get_post_meta( $post->ID, '_cmb_wwdt1', true ); echo $title1;  ?></p>
								</div>
					    		<div class="large-4 columns">
					    			<p><img src="<?php global $post; $image2 = get_post_meta( $post->ID, '_cmb_wwd2', true ); echo $image2;  ?>"></p><p><?php global $post; $title2 = get_post_meta( $post->ID, '_cmb_wwdt2', true ); echo $title2;  ?></p>
								</div>
					    		<div class="large-4 columns">
					    			<p><img src="<?php global $post; $image3 = get_post_meta( $post->ID, '_cmb_wwd3', true ); echo $image3;  ?>"></p><p><?php global $post; $title3 = get_post_meta( $post->ID, '_cmb_wwdt3', true ); echo $title3;  ?></p>
								</div>
				    		</div>
				    		</div>
							<?php endif; ?>
				    		<div class="row">
								<div class="large-12 columns">
									<?php the_content(); ?>
								</div>
				    		</div>
				    		<div class="row">
								<div class="large-12 columns">
									<div class="quote large-8 columns" data-quote="<?php global $post; echo $post->post_name; ?>">	
				    					<?php foreach ( $post->connected as $post ) : setup_postdata( $post ); ?>
				    					<div class="quote-content"><?php the_content(); ?></div>
				    					<cite class="quote-author"><?php the_title(); ?></cite>
				    					<?php endforeach; ?>
				    					<?php wp_reset_postdata(); ?>					
				    				</div>
								</div>
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
	</div>
	
<?php get_footer(); ?>	