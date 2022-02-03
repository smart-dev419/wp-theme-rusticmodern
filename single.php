<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div id="blog_page" class="page_wrapper">
	<?php $bg_imgs = get_field('blog_background_images', 'options'); ?>
	<section class="blog_bg" style="background-image:url(<?=$bg_imgs[0]['left_image']['url'];?>)"></section>
	<section class="blog_wrapper">
		<?php if ( has_post_thumbnail() ) { ?>
		<figure class="blog_featured">
			<?php the_post_thumbnail( 'large' ); ?>
		</figure>
		<?php } ?>
		<h2 class="blog_title"><?php the_title(); ?></h2>
		<div class="blog_meta">
			<?php 
			printf( '<span class="author">author: <a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
				get_author_posts_url( get_the_author_meta( 'ID' ) ),
				esc_attr( sprintf( __( 'View all posts by %s', 'rusticmodern' ), get_the_author() ) ),
				get_the_author()
			);
			printf( '<a class="published_date" href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
				get_permalink(),
				esc_attr( get_the_time() ),
				get_the_date()
			);
			?>
		</div>
		<div class="blog_contents"><?php the_content(); ?></div>
	</section>
	<section class="blog_bg" style="background-image:url(<?=$bg_imgs[0]['right_image']['url'];?>)"></section>

</div>

<?php endwhile; ?>		

<?php get_footer(); ?>