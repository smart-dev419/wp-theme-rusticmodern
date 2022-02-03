<?php
/**
 * Template Name: Home
 */
?>

<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div id="home_page" class="page_wrapper">
	<?php $images = get_field('images', $post->ID); ?>
	<?php $texts = get_field('textareas', $post->ID); ?>
	<section class="home_first">
		<img class="first_image" src="<?=$images[0]['image']['url'];?>" alt="<?=$images[0]['image']['title'];?>">
		<div class="first_content">
			<?=$texts[0]['textarea'];?>
		</div>
	</section>

	<section class="home_second">
		<div class="second_image" style="background-image:url(<?=$images[1]['image']['sizes']['rusticmodern-medium'];?>)"></div>
		<div class="second_content">
			<div class="wrapper">
				<?=$texts[1]['textarea'];?>
			</div>
		</div>
	</section>

	<section class="home_third">
		<div class="third_content">
			<?=$texts[2]['textarea'];?>
		</div>
		<div class="third_image" style="background-image:url(<?=$images[2]['image']['sizes']['large'];?>)">
	</section>

	<section class="home_fourth" style="background-image:url(<?=$images[3]['image']['url'];?>)">
		<div class="fourth_content">
			<?=$texts[3]['textarea'];?>
		</div>
	</section>

	<section class="team">
		<div class="wrapper">
			<h3>We work with Experts</h3>
			<?php $members = get_field('team_members', 'options'); ?>
			<ul class="team_members">
				<?php 
				foreach ($members as $key => $member) { 
					if ($key >= 4) break;
				?>
				<li>
					<figure>
						<img src="<?=$member['photo']['sizes']['medium']?>" alt="<?=$member['name']?>">
						<figcaption>
							<h5><?=$member['name']?><br/><?=$member['position']?></h5>
						</figcaption>
					</figure>
				</li>
				<?php } ?>
			</ul>
			<?php if (count($members) > 4) { ?>
				<div class="members_ctrl">
					<span class="ctrl_btn more">show more</span>
				</div>
			<?php } ?>
		</div>
	</section>

</div>

<?php endwhile; ?>		

<?php get_footer(); ?>