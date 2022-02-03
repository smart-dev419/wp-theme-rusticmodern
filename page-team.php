<?php
/**
 * Template Name: Team
 */
?>

<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div id="team_page" class="page_wrapper">
	
	<div class="wrapper">
		<h3>We work with Experts</h3>
		<?php $members = get_field('team_members', 'options'); ?>
		<ul class="team_members">
			<?php 
			foreach ($members as $key => $member) { 
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
	</div>

</div>

<?php endwhile; ?>		

<?php get_footer(); ?>