<?php
/**
 * Template Name: Blog
 */
?>

<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div id="blog_page" class="page_wrapper">
	<?php $bg_imgs = get_field('blog_background_images', 'options'); ?>
	<section class="blog_bg" style="background-image:url(<?=$bg_imgs[0]['left_image']['url'];?>)"></section>
	<section class="blog_wrapper">
		<h2 class="blog_head"><?php bloginfo( 'name' ); ?> blog</h2>
		<ul class="blog_list">
		<?php 
		$args = array(
			'posts_per_page'   => -1,	
			'post_type' => 'post',
			'post_status' => 'publish'
			);
		$blogs = get_posts( $args );

		foreach ($blogs as $post) { 
			setup_postdata($post); 
		?>
		    <li class="blog-item">
				<h3 class="blog_title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
				<div class="blog_excerpt"><?php the_excerpt(); ?></div>
			</li>
		<?php
		}		
		wp_reset_postdata();
		
		?>
		</ul>
	</section>
	<section class="blog_bg" style="background-image:url(<?=$bg_imgs[0]['right_image']['url'];?>)"></section>

</div>

<?php endwhile; ?>		

<?php get_footer(); ?>