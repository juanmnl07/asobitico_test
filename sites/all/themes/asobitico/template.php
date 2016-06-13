<?php
/**
 * @file
 * HTML template functions.
 */

/**
 * Implements hook_preprocess_html().
 * Meta tags https://drupal.org/node/1468582#comment-5698732
 */
function asobitico_preprocess_html(&$variables) {
  $meta_charset = array(
    '#tag' => 'meta',
    '#attributes' => array(
      'charset' => 'utf-8',
    ),
  );
  drupal_add_html_head($meta_charset, 'meta_charset');

  $meta_x_ua_compatible = array(
    '#tag' => 'meta',
    '#attributes' => array(
      'http-equiv' => 'X-UA-Compatible',
      'content' => 'IE=edge',
    ),
  );
  drupal_add_html_head($meta_x_ua_compatible, 'meta_x_ua_compatible');

  $meta_mobile_optimized = array(
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'MobileOptimized',
      'content' => 'width',
    ),
  );
  drupal_add_html_head($meta_mobile_optimized, 'meta_mobile_optimized');

  $meta_handheld_friendly = array(
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'HandheldFriendly',
      'content' => 'true',
    ),
  );
  drupal_add_html_head($meta_handheld_friendly, 'meta_handheld_friendly');

  $meta_viewport = array(
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'viewport',
      'content' => 'width=device-width, initial-scale=1',
    ),
  );
  drupal_add_html_head($meta_viewport, 'meta_viewport');

  /*$meta_cleartype = array(
    '#tag' => 'meta',
    '#attributes' => array(
      'http-equiv' => 'cleartype',
      'content' => 'on',
    ),
  );
  drupal_add_html_head($meta_cleartype, 'meta_cleartype');*/

   // Use html5shiv.
  if (theme_get_setting('html5shim')) {
    $element = array(
      'element' => array(
        '#tag' => 'script',
        '#value' => '',
        '#attributes' => array(
          'type' => 'text/javascript',
          'src' => file_create_url(drupal_get_path('theme', 'sonambulo') . '/js/html5shiv-printshiv.js'),
        ),
      ),
    );
    $html5shim = array(
      '#type' => 'markup',
      '#markup' => "<!--[if lt IE 9]>\n" . theme('html_tag', $element) . "<![endif]-->\n",
    );
    drupal_add_html_head($html5shim, 'asobitico_html5shim');
  }

  // Use Respond.js.
  if (theme_get_setting('respond_js')) {
    drupal_add_js(drupal_get_path('theme', 'sonambulo') . '/js/respond.min.js', array('group' => JS_LIBRARY, 'weight' => -100));
  }

  // Use normalize.css
  if (theme_get_setting('normalize_css')) {
    drupal_add_css(drupal_get_path('theme', 'sonambulo') . '/css/normalize.css', array('group' => CSS_SYSTEM, 'weight' => -100));
  }
}

/**
 * Implements hook_html_head_alter().
 */
function asobitico_html_head_alter(&$head_elements) {

  // Remove system content type meta tag.
  unset($head_elements['system_meta_content_type']);
}

/**
 * Implements hook_page_alter().
 * https://gist.github.com/jacine/1378246
 */
function asobitico_page_alter(&$page) {
  // Remove all the region wrappers.
  foreach (element_children($page) as $key => $region) {
    if (!empty($page[$region]['#theme_wrappers'])) {
      $page[$region]['#theme_wrappers'] = array_diff($page[$region]['#theme_wrappers'], array('region'));
    }
  }
  // Remove the wrapper from the main content block.
  if (!empty($page['content']['system_main'])) {
    $page['content']['system_main']['#theme_wrappers'] = array_diff($page['content']['system_main']['#theme_wrappers'], array('block'));
  }
}

function asobitico_preprocess_node(&$vars) {
  // Add a striping class.
  $vars['classes_array'][] = 'node-' . $vars['zebra'];
}

function asobitico_preprocess_field(&$vars){
  //dpm($vars);
  global $language;
  //dpm($vars);

  if($language->language == 'es'){
    if(isset($vars['element']['#object']->field_genero[LANGUAGE_NONE][0]['value'])){
      //dpm($vars['element']['#object']);
      if($vars['element']['#object']->field_genero[LANGUAGE_NONE][0]['value'] == 'mujer'){
        if($vars['label'] == 'Director'){
          $vars['label'] = 'Directora'; 
        }
      }
    }
  }

  if($language->language == 'en'){
    if($vars['label'] == "Colegio BI desde")
      $vars['label'] = "IB World School since";

    if($vars['label'] == "Director")
      $vars['label'] = "School Principal";

    if($vars['label'] == 'Fecha y lugar')
      $vars['label'] = "Date and venue";

    if($vars['label'] == 'Categoría')
      $vars['label'] = "Category";

    /*if($vars['label'] == 'Fecha y lugar'){
      $value = strtotime($vars['element']['#items'][0]['value']);
      $value2 = strtotime($vars['element']['#items'][0]['value2']);
      //format date based on current language
      $separator = 'a';
      $dateFormated = format_date($value, 'custom', 'd \d\e F');
      $date2Formated = format_date($value2, 'custom', 'd \d\e F');
      if($language->language=='en'){
        $separator = 'to';
        $dateFormated = format_date($value, 'custom', 'd M');
        $date2Formated = format_date($value2, 'custom', 'd M');
      }
      $vars['element'][0]['#markup'] = '<div class="date-display-range"><span class="date-display-start" property="dc:date" datatype="xsd:dateTime" content="'.$dateFormated.'">'.$dateFormated.'</span> '.$separator.' <span class="date-display-end" property="dc:date" datatype="xsd:dateTime" content="'.$date2Formated.'">'.$date2Formated.'</span></div>';
    }*/
  }
}

function asobitico_preprocess_block(&$vars, $hook) {
  // Add a striping class.
  //dpm($vars);
  if($vars['block_html_id'] == 'block-webform-client-block-1'){
    $vars['classes_array'][] = 'gu-1-3';
  }
  $vars['classes_array'][] = 'block-' . $vars['zebra'];
}
