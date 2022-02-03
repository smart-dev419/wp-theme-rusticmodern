<?php 
	include_once("../../../../wp-config.php");
	$members = get_field('team_members', 'options');
?>

<?php 
for  ($index = 4 ; $index < count($members) ; $index++ ) { 
	$member = $members[$index];
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
