<?php
/*
Template Name: BLOG
*/
?>
<h1>BLOG</h1>
<?php
if(have_posts()): while(have_posts()): the_post();?>
<h2><?php the_title(); ?></h2>

<?php the_content(); ?>

<?php endwhile; endif; ?>

<?php get_header(); ?>

<?php query_posts('post_type=post&paged='.$paged); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <div class="post">
            <p><?php the_time("Y年m月j日") ?></p>
            <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
            <?php if(has_post_thumbnail()) { the_post_thumbnail(); } ?>
            <?php global $more; $more = FALSE; ?>
                <?php the_content('続きを読む'); ?>
            <?php $more = TRUE; ?>
        </div>
    <?php endwhile; ?>
<?php else : ?>
    <div class="post">
        <h2>記事が見つかりません</h2>
        <p>このページは存在しないか、消去されました…</p>
    </div>
<?php endif; ?>
<?php wp_reset_query(); ?>
 
// 略
 
<?php get_sidebar(); ?>
<?php get_footer(); ?>

