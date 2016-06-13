<?php
$slides = '';
	$style_name = 'slider_1280x590_';
	foreach ($items as $item) {
		$field_collection_item = $item['entity']['field_collection_item'];
		foreach ($field_collection_item as $field_item) {
			$url = "";
			$field_caption = '';
			$field_enlace1 = '';
			$field_enlace2 = '';
			$enlace1_title = '';
			$enlace2_title = '';

			if (isset($field_item['field_imagen']['#items'][0]['uri'])){
				$url = '/sites/default/files/sliders/'.str_replace("public://slider/","",$field_item['field_imagen']['#items'][0]['uri']);
			}

			$url = image_style_url($style_name, $field_item['field_imagen']['#items'][0]['uri']);
			image_style_create_derivative($style_name, $field_item['field_imagen']['#items'][0]['uri'], $url);

			/*if (isset($field_item['field_enlace_1']['#items'][0]['#element']['url'])){
				$field_enlace1 = $field_item['field_enlace_1']['#items'][0]['#element']['url'];
			}

			if (isset($field_item['field_enlace_1']['#items'][0]['#element']['title'])){
				$enlace1_title = $field_item['field_enlace_1']['#items'][0]['#element']['title'];
			}


			if (isset($field_item['field_enlace_2']['#items'][0]['#element']['url'])){
				$field_enlace2 = $field_item['field_enlace_2']['#items'][0]['#element']['url'];
			}

			if (isset($field_item['field_enlace_2']['#items'][0]['#element']['title'])){
				$enlace2_title = $field_item['field_enlace_2']['#items'][0]['#element']['title'];
			}*/

			if (isset($field_item['field_caption']['#items'][0]['value'])){
				$field_caption = '<div class="container-flex-caption"><div class="flex-caption">'.$field_item['field_caption']['#items'][0]['value'].'</div></div>';
			}

			$slides .= '<li><img src="'.$url.'" alt="" title=""/>'. $field_caption .'</li>';
		}
	}
?>
<?php flexslider_add();  ?>
<div class="flexslider">
  	<ul class="slides">
		<?php print $slides ?>
	</ul>
</div>