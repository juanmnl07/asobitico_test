<?php
foreach ($items as $item) { ?>
    <a class="colorbox-load" href="<?php echo $item['#element']['url']?>">
		<div id="play">
		</div>
		<div class="play-titulo">
			<?php echo $item['#element']['title']?>
		</div>
	</a>
<?php } ?>