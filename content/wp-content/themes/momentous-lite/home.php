<?php get_header(); ?>

	<div id="wrap" class="container clearfix">
	
<?php 
	// Get Theme Options from Database
	$theme_options = momentous_theme_options();

	// Display Featured Posts on homepage
	if ( is_front_page() && momentous_has_featured_content() ) :
		
		// Include the featured content template.
		get_template_part( 'featured-content' );
		
	endif;
?>
		<section id="content" class="primary" role="main">
			
		<?php // Display Latest Posts Title
		if ( isset( $theme_options['latest_posts_title'] ) and $theme_options['latest_posts_title'] <> '' ) : ?>
					
			<img src="http://local_kemao.com/content/wp-content/uploads/150802top_banner.jpg" class="topbanner">
	
		<?php endif; ?>
			
			<div id="post-wrapper" class="clearfix">
		 
			<?php if (have_posts()) : while (have_posts()) : the_post();
		
				get_template_part( 'content' );
		
				endwhile; ?>
			
			</div>
			
			<?php // Display Pagination	
				momentous_display_pagination();

			endif; ?>
			
		</section>
		
		<?php get_sidebar(); ?>
		
	</div>
	
<?php get_footer(); ?>	