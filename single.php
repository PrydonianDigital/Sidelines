<?php get_header(); ?>

	<div class="row" id="page-header">
		<div class="large-12 columns">
			<h4 class="page-title"><?php the_title(); ?></h4>
			<hr />
		</div>
	</div>
	<div class="row">
		<div class="large-8 columns" id="newsContent">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>
			<br />
			<p class="sharing" data-url="<?php the_permalink(); ?>"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="facebookShare" target="_blank"><i class="icon-facebook"></i><span class="sharecount">-</span></a> <a href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&url=<?php the_permalink(); ?>&via=SideUK" class="twitterShare" target="_blank"><i class="icon-twitter"></i><span class="tweetcount">-</span></a> <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="oneShare" target="_blank"><i class="icon-google-plus"></i><span class="onecount">-</span></a></p>
	    <?php endwhile; ?>
	
	    <?php else : ?>
	    
	    <?php endif; ?>
		</div>
	

<?php get_footer(); ?>	