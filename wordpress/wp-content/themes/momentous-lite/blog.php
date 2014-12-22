<?php
/*
Template Name: blog
*/
?>
<?php get_header(); ?>

	<div id="wrap" class="container clearfix">
		
		<section id="content" class="primary" role="main">
		
			<div>
			
				<?php
				$blog_posts = (get_query_var('posts')) ? get_query_var('posts') : 1;
 
		 		$args = array(
				'posts' => $blog_posts,
				'posts_per_page' => 6,
				'category_name' => 'blog'
		 );
	 
	    $wp_query = new WP_Query($args);
?>
			</div>
		
		<?php if (have_posts()) : while (have_posts()) : the_post();

			get_template_part( 'content' );

			endwhile;

		endif; ?>
		
		<div class="blognavi">
		<p><?php previous_posts_link('< Previous Page'); ?>
		<?php next_posts_link('Next Page >'); ?></p>
		</div>
		
		<?php comments_template(); ?>
		
		</section>
		
		<?php get_sidebar(); ?>
		
	</div>
	
<?php get_footer(); ?>	