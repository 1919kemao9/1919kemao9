<?php get_header(); ?>

<?php // Get Theme Options from Database
	$theme_options = momentous_theme_options();
?>

	<div id="wrap" class="container clearfix">
		
		<section id="content" class="primary" role="main">

			<h2 id="tag-title" class="archive-title">
				<?php printf(__('Tag Archives: %s', 'momentous-lite'), '<span>' . single_cat_title( '', false ) . '</span>'); ?>
			</h2>

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