<?php 
	include_once("../../../../wp-config.php");
	$page_id = $_POST['page_id'];
	$portfolios = get_field('portfolios', $page_id);
?>

<?php 
for  ($index = 18 ; $index < count($portfolios) ; $index++ ) { 
	$portfolio = $portfolios[$index];
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
