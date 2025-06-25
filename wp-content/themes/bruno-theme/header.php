<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Inter:wght@400;600&display=swap" rel="stylesheet">


  <title><?php wp_title('|', true, 'right'); ?></title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header class="site-header sticky-header">

  <div class="site-branding">
    <a href="<?php echo home_url(); ?>" class="site-logo">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-blanc.png" alt="Logo">
    </a>
    <p class="site-identity">Bruno Etcheverry – Conseiller immobilier indépendant, affilié IAD France</p>
  </div>
    
  <nav class="site-nav" role="navigation" aria-label="Menu principal">
    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">☰</button>
    <?php wp_nav_menu(array(
        'theme_location' => 'primary',
        'menu_id'        => 'primary-menu',
        'menu_class'     => 'menu',
        'container'      => false,
        'fallback_cb'    => false
    )); ?>
  </nav>
</header>
