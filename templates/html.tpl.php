<?php $path_theme = base_path().drupal_get_path('theme','hosting'); ?>
<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>" >
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1">
    <?php print $head; ?>
    <title><?php print $head_title; ?></title>
    <?php print $styles; ?>
    <?php $skin = theme_get_setting('skin'); ?>
    <!-- Alternative Color Style -->
    <link rel="alternate stylesheet" type="text/css" href="<?php echo $path_theme?>/css/color/style-amethyst.css" title="style-amethyst" media="screen" <?php echo ($skin == 'amethyst') ? '' : 'disabled'  ?> />
    <link rel="alternate stylesheet" type="text/css" href="<?php echo $path_theme?>/css/color/style-carrot.css" title="style-carrot" media="screen" <?php echo ($skin == 'carrot') ? '' : 'disabled'  ?>/>
    <link rel="alternate stylesheet" type="text/css" href="<?php echo $path_theme?>/css/color/style-emerland.css" title="style-emerland" media="screen" <?php echo ($skin == 'emerland')? '' : 'disabled'  ?>/>
    <link rel="alternate stylesheet" type="text/css" href="<?php echo $path_theme?>/css/color/style-green.css" title="style-green" media="screen" <?php echo ($skin == 'green') ? '' : 'disabled'  ?>/>
    <link rel="alternate stylesheet" type="text/css" href="<?php echo $path_theme?>/css/color/style-alizarin.css" title="style-alizarin" media="screen" <?php echo ($skin == 'alizarin') ? '' : 'disabled'  ?>/>
    <link rel="alternate stylesheet" type="text/css" href="<?php echo $path_theme?>/css/color/style-peter-river.css" title="style-peter-river" media="screen" <?php echo ($skin == 'peter-river') ? '' : 'disabled'  ?>/>
    <link rel="alternate stylesheet" type="text/css" href="<?php echo $path_theme?>/css/color/style-turquoise.css" title="style-turquoise" media="screen" <?php echo ($skin == 'turquoise') ? '' : 'disabled'  ?>/>
    <?php print $scripts; ?>
  </head>

  <body class="<?php print $classes; ?>" <?php print $attributes;?>>
    <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
    </div>
    <?php print $page_top; ?>
    <?php print $page; ?>
    <?php print $page_bottom; ?>
  </body>
</html>
