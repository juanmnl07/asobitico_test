<?php

/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 *
 * @ingroup themeable
 */
?><!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->

<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>

  <?php print $styles; ?>
  <?php print $scripts; ?>

  <!-- HTML5 element support for IE6-8 -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<body class="<?php print $classes; ?>" <?php print $attributes;?>>

<?php 
  global $base_url; 
  global $language; 
?>

  <!--[if lt IE 8]>
      <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
  <![endif]-->

  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>

  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>

<div class="bloque-lateral" id="redes-sociales-lateral">
  <ul>
    <li><a href="https://www.facebook.com/asobitico" target="_blank"><img alt="fb2" src="<?php echo $base_url?>/sites/all/themes/asobitico/images/fb2.png" /> </a></li>
    <li><a href="https://twitter.com/asobitico" target="_blank"><img alt="tw2" src="<?php echo $base_url?>/sites/all/themes/asobitico/images/tw2.png" /> </a></li>
  </ul>
  <p class="texto-vertical"><?php echo t('Follow ASOBITICO')?></p>
</div>
<?php 
  $pf_estudiantes = '/preguntas-frecuentes-estudiantes';
  $pf_profesores = '/preguntas-frecuentes-profesores';
  $pf_padres = '/preguntas-frecuentes-padres';
  $pf_aliados = '/preguntas-frecuentes-aliados';
  if($language->language == 'en'){
    $pf_estudiantes = '/en/frequently-asked-questions-students';
    $pf_profesores = '/en/frequently-asked-questions-educators';
    $pf_padres = '/en/frequently-asked-questions-parents';
    $pf_aliados = '/en/frequently-asked-questions-partners';
  }
?>
<?php if(drupal_is_front_page()): ?>
<div class="bloque-lateral" id="informacion-lateral">
  <ul>
    <li><a href="<?php echo $pf_estudiantes ?>" target="_blank"><img alt="" src="<?php echo $base_url?>/sites/all/themes/asobitico/images/1.png" /> </a></li>
    <li><a href="<?php echo $pf_profesores ?>" target="_blank"><img alt="" src="<?php echo $base_url?>/sites/all/themes/asobitico/images/2.png" /> </a></li>
    <li><a href="<?php echo $pf_padres ?>" target="_blank"><img alt="" src="<?php echo $base_url?>/sites/all/themes/asobitico/images/3.png" /> </a></li>
    <li><a href="<?php echo $pf_aliados ?>" target="_blank"><img alt="" src="<?php echo $base_url?>/sites/all/themes/asobitico/images/4.png" /> </a></li>
  </ul>
  <p class="texto-vertical"><?php echo t('Information')?></p>
</div>
<?php endif; ?>

<?php if(current_path() == 'forme-parte-de-asobitico'){ ?>
  <div class="menu-anclas" id="menu-anclas-forme-parte-de-asobitico">
    <ul>
      <li><a href="#ancla-como-ayudo">¿Cómo ayudo?</a></li>
      <li><a href="#ancla-beneficios">Beneficios</a></li>
      <li><a href="#ancla-asesoria">Asesoría</a></li>
      <li><a href="#ancla-costo-afiliacion">Afiliación</a></li>
    </ul>
  </div>
<?php } else if(current_path() == '/en/become-a-part-of-asobitico'){ ?>
<div class="menu-anclas" id="menu-anclas-forme-parte-de-asobitico">
    <ul>
      <li><a href="#ancla-como-ayudo">How do I help?</a></li>
      <li><a href="#ancla-beneficios">Benefits</a></li>
      <li><a href="#ancla-asesoria">Advisory</a></li>
      <li><a href="#ancla-costo-afiliacion">Affiliation</a></li>
    </ul>
  </div>
<?php } ?>
<script type="text/javascript" src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
</body> 
</html>
