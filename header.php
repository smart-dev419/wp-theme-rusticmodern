<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Rustic_Modern
 * @since Rustic Modern 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">

	<aside id="site-sidebar">
		<figure id="site-branding">
			<a href="<?=home_url()?>">
				<?php $site_logo = get_field('site_logo', 'options'); ?>
				<img src="<?=$site_logo['sizes']['thumbnail']?>" alt="<?=$site_logo['title']?>">
				<h1><?php bloginfo( 'name' ); ?></h1>
			</a>	
		</figure>

		<?php 
		$menu_attr = array(
			'container_id'    => 'primany-nav',
			'container_class'    => 'nav-container',
			'theme_location'  => 'primary',
			'menu_class'      => 'nav'
			);
		wp_nav_menu( $menu_attr );
		?>

		<div class="latest_blogs">
			<h3>latest blogs</h3>
			<ul class="blog_list">
			<?php 
			$args = array(
				'posts_per_page'   => 7,	
				'post_type' => 'post',
				'post_status' => 'publish'
				);
			$blogs = get_posts( $args );

			foreach ($blogs as $post) { 
				setup_postdata($post); 
			?>
			    <li class="blog-item">
					<h6><a href="<?php the_permalink();?>"><?php the_title();?></a></h6>
				</li>
			<?php
			}		
			wp_reset_postdata();
			
			?>
			</ul>
			<h5 class="all_blogs_link"><a href="<?=home_url()?>/blog">view all blogs</a></h5>
		</div>

	</aside><!-- #header -->

	<div id="wrapper" class="hfeed">

		<main id="site-main">
