<?php
/**
 * Template for displaying the footer
 *
 * Contains the closing of the id=main div and all content
 * after. Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Rustic_Modern
 * @since Rustic Modern 1.0
 */
?>

		</main><!-- #main -->

		<footer id="site-footer" role="contentinfo">
			<div class="wrapper">
				<?php 
				$menu_attr = array(
					'container_id'    => 'footer-nav',
					'container_class'    => 'nav-container',
					'theme_location'  => 'footer',
					'menu_class'      => 'nav'
					);
				wp_nav_menu( $menu_attr );
				?>
				<div class="latest_blogs">
					<ul class="blog_list">
					<?php 
					$args = array(
						'posts_per_page'   => 2,	
						'post_type' => 'post',
						'post_status' => 'publish'
						);
					$blogs = get_posts( $args );

					foreach ($blogs as $post) { 
						setup_postdata($post); 
					?>
					    <li class="blog-item">
							<h6><?php the_title();?></h6>
							<p><?=excerpt(11)?></p>
						</li>
					<?php
					}		
					wp_reset_postdata();
					
					?>
					</ul>
				</div>

				<figure id="site-info">
					<?php $site_logo = get_field('site_logo', 'options'); ?>
					<img src="<?=$site_logo['sizes']['thumbnail']?>" alt="<?=$site_logo['title']?>">
					<figcaption>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam massa sapien, gravida vel justo euismod, accumsan pulvinar diam. Donec aliquam diam a ante efficitur porttitor.</p>
					</figcaption>
				</figure>
			</div>
			
			<div class="other_elements">
				<input type="hidden" value="<?php bloginfo('template_directory');?>" id="theme_url"/>
				<input type="hidden" value="<?=home_url();?>" id="site_url"/>
			</div>
		</footer><!-- #footer -->

	</div><!-- #wrapper -->

</div><!-- #page -->

<?php
	/*
	 * Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>


</body>
</html>
