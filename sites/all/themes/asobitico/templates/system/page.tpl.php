<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 */
?>
<header class="header">
  <div class="grid">
  <?php if ($page['utility_bar']): ?>
    <div class="utility-bar">
      <?php print render($page['utility_bar']); ?>
    </div><!-- end utility bar -->
  <?php endif; ?>


  <?php if ($logo): ?>
    <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
      <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
    </a>
  <?php endif; ?>

  <?php if ($site_name || $site_slogan): ?>

      <?php if ($site_name): ?>
        <?php if ($title): ?>

          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>

        <?php else: /* Use h1 when the content title is empty */ ?>
          <h1 id="site-name">
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
          </h1>
        <?php endif; ?>
      <?php endif; ?>

      <?php if ($site_slogan): ?>
        <?php print $site_slogan; ?>
      <?php endif; ?>

  <?php endif; ?>

  <?php print render($page['header']); ?>
</div>
</header>

<?php if ($page['above_content']): ?>
  <section class="above-content">
    <div class="inner">
      <?php print render($page['above_content']); ?>
    </div>
  </section>
<?php endif; // end Above Content ?>

<?php if ($page['banner']): ?>
  <section class="banner">
      <?php print render($page['banner']); ?>
    </section>
<?php endif; // end Above Content ?>

<div class="main-content">
  <?php if ($breadcrumb): ?>
    <?php print $breadcrumb; ?>
  <?php endif; ?>

  <?php if ($page['highlighted']): ?>
    <?php print render($page['highlighted']); ?>
  <?php endif; ?>

    <a id="main-content"></a>
    <div class="main" role="main">

      <?php if ($messages): ?>
      <div class="messages-wrapper panel grid">
        <div class="messages-content">
          <?php print $messages; ?>
        </div>
        <!--<a href="#" id="messages-toggle"><?php print t('Close');?></a>-->
      </div>
      <?php endif; ?>

      <?php print render($title_prefix); ?>
      <?php if ($title): ?><!--<h1 class="title" id="page-title"><?php print $title; ?></h1>--><?php endif; ?>
      <?php print render($title_suffix); ?>

      <?php if ($tabs): ?>
        <?php print render($tabs); ?>

      <?php endif; ?>

      <?php print render($page['help']); ?>

      <?php if ($action_links): ?>
        <ul class="action-links">
          <?php print render($action_links); ?>
        </ul>
      <?php endif; ?>

      <?php 
        global $language;
        global $base_url;
        $ruta = current_path();
        $alias = drupal_lookup_path('alias', $ruta, $language->language);
        $route = explode('/', $alias);
        $base = $route[0];
        $back_route = '';

        if(($base == 'nuestro-equipo')||($base == 'our-team')||($base == 'calendar')||($base == 'calendario')||($base == 'webform')){
          if($language->language == 'en'){
            $base = 'en/'.$base;
            if($base=='webform'){
              $base = 'en';
            }
          }else{
            if($base=='webform'){
              $base = '/';
            }
          }
          $back_route = '<a class="back" href ="'.$base_url.'/'.$base.'">'. t('Back') .'</a>';
        }

        echo $back_route;
        print render($page['content']);
        echo $back_route;

      ?>

    </div>

  <?php if ($page['sidebar_first']): ?>
    <div id="sidebar-first" class="">
      <?php print render($page['sidebar_first']); ?>
    </div> <!-- /.section, /#sidebar-first -->
  <?php endif; ?>

  <?php if ($page['sidebar_second']): ?>
    <div id="sidebar-second" class="">
      <?php print render($page['sidebar_second']); ?>
    </div> <!-- /.section, /#sidebar-second -->
  <?php endif; ?>
</div>

<?php if ($page['below_content']): ?>
  <section class="below-content">
    <?php print render($page['below_content']); ?>
  </section>
<?php endif; // end Below Content ?>

<?php if ($page['pre_footer']): ?>
  <section class="pre-footer">
    <div class="inner">
      <?php print render($page['pre_footer']); ?>
    </div>
  </section>
<?php endif; // end Pre Footer ?>

<footer class="footer">
  <div class="inner">
    <?php print render($page['footer']); ?>
  </div>
</footer>

<?php if ($page['closure']): ?>
<aside class="closure">
  <?php print render($page['closure']); ?>
</aside>
<?php endif; // end closure ?>



