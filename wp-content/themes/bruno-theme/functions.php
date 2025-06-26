<?php
// Sécurité : empêche l'accès direct au fichier
if (!defined('ABSPATH')) {
    exit;
}

// 1. Charger les styles et scripts
function bruno_theme_enqueue_scripts() {
    // Style principal WordPress (style.css)
    wp_enqueue_style('bruno-style', get_stylesheet_uri());

    // Style global commun (typographie, layout, header/footer, etc.)
    wp_enqueue_style('bruno-main', get_template_directory_uri() . '/assets/css/main.css', [], '1.0');

    // Styles conditionnels
    if (is_front_page()) {
        wp_enqueue_style('accueil', get_template_directory_uri() . '/assets/css/accueil.css');
        wp_enqueue_style('accueil-responsive', get_template_directory_uri() . '/assets/css/accueil-responsive.css');
    }

    if (is_singular('post')) {
        wp_enqueue_style('post', get_template_directory_uri() . '/assets/css/post.css');
        wp_enqueue_style('post-responsive', get_template_directory_uri() . '/assets/css/post-responsive.css');
        wp_enqueue_style('articles', get_template_directory_uri() . '/assets/css/articles.css'); 
    }

    if (is_page('mes-annonces')) {
        wp_enqueue_style('annonce', get_template_directory_uri() . '/assets/css/annonce.css');
        wp_enqueue_style('annonce-responsive', get_template_directory_uri() . '/assets/css/annonce-responsive.css');
    }

    if (is_page('contact')) {
        wp_enqueue_style('formulaire', get_template_directory_uri() . '/assets/css/formulaire.css');
        wp_enqueue_style('formulaire-responsive', get_template_directory_uri() . '/assets/css/formulaire-responsive.css');
        wp_enqueue_style('articles', get_template_directory_uri() . '/assets/css/articles.css');
    }

    if (is_page('articles') || is_page('annonces') || is_page(17)) {
        wp_enqueue_style('articles', get_template_directory_uri() . '/assets/css/articles.css');
    }

    

    // Style custom global éventuel
    wp_enqueue_style('bruno-custom', get_template_directory_uri() . '/assets/css/custom.css', [], '1.0');

      // script JS menu burger
    wp_enqueue_script('bruno-menu-toggle', get_template_directory_uri() . '/assets/js/menu-toggle.js', array(), '1.0', true);

    // Script principal JS 
    wp_enqueue_script('bruno-main', get_template_directory_uri() . '/assets/js/main.js', [], '1.0', true);
}
add_action('wp_enqueue_scripts', 'bruno_theme_enqueue_scripts');

// 2. Activer les fonctionnalités du thème
function bruno_theme_setup() {
    // Titre automatique
    add_theme_support('title-tag');

    // Images mises en avant
    add_theme_support('post-thumbnails');

    // Menus
    register_nav_menus([
        'main_menu' => 'Menu principal',
        'footer_menu' => 'Menu de pied de page'
    ]);

    // HTML5 support
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
}
add_action('after_setup_theme', 'bruno_theme_setup');

// 3. Raccourci pour les images du thème
function bruno_theme_image_path($path = '') {
    return get_template_directory_uri() . '/assets/img/' . $path;
}

add_image_size('card-thumbnail', 19820, 1080, true);

