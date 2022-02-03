<?php
/**
 * Template Name: Contact
 */
?>

<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div id="contact_page" class="page_wrapper">
	<?php $featured_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large'); ?>
	<section class="contact_featured" style="background-image:url(<?=$featured_img[0];?>)"></section>
	<section class="contact_contents">
		<div class="wrapper">
			<h2 class="contact_head">
				<?php the_title(); ?><br/>
				<?php bloginfo('name'); ?>
			</h2>

			<div class="form_body"><?php the_content(); ?></div>
			
			<div class="contact_infos">
				<div class="wrapper">
					<?php $contact_infos = get_field('contact_information', 'options'); ?>
					<span class="location"><?=$contact_infos[0]['location'];?></span>
					<span class="phone"><b>phone:</b> <?=$contact_infos[0]['phone'];?></span>
				</div>
			</div>
		</div>
	</section>

</div>

<?php endwhile; ?>		

<?php get_footer(); ?>