<?php
/**
 * Template Name: Portfolio
 */
?>

<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div id="portfolio_page" class="page_wrapper">
	
	<?php $portfolios = get_field('portfolios', $post->ID); ?>
	<div class="portfolio_head">
		<h2 class="site_title"><?php bloginfo('name'); ?></h2>
		<h2 class="page_title"><span class="count"><?=count($portfolios)?></span> projects</h2>
	</div>

	<div class="portfolios">
		<ul class="portfolio_list">
			<?php 
			foreach ($portfolios as $key => $portfolio) { 
				if ($key >= 18) break;
			?>
			<li class="portfolio_item">
				<figure class="port_thumb">
					<img src="<?=$portfolio['featured_image']['sizes']['medium']?>" alt="<?=$portfolio['title']?>">
				</figure>			
				<div class="port_details">
					<div class="port_featured">
						<h3><?=$portfolio['title']?></h3>
						<img src="<?=$portfolio['featured_image']['sizes']['large']?>" alt="<?=$portfolio['title']?>">
					</div>
					<div class="port_contents">
						<div class="description">
							<?=$portfolio['description']?>
						</div>
						<div class="return_portfolio">
							<a href="javascript:;">Return to Portfolio</a>
						</div>
					</div>
				</div>
			</li>
			<?php } ?>
		</ul>
		<?php if (count($portfolios) > 18) { ?>
			<div class="portfolios_ctrl">
				<span class="ctrl_btn more" page-id="<?=get_the_ID()?>">show more</span>
			</div>
		<?php } ?>
	</div>

</div>

<?php endwhile; ?>		

<?php get_footer(); ?>