<?php
// page-articles.php

// Empêche l'accès direct
if (!defined('ABSPATH')) exit;

// Exécuter ce template uniquement si la page a l'ID 13
if (!is_page(13)) {
    get_template_part('index');
    exit;
}

get_header();

if (has_post_thumbnail()) {
    echo '<div class="article-header">';
    echo get_the_post_thumbnail(null, 'large', ['class' => 'article-page-thumbnail']);
    echo '<h1 class="article-page-title">' . get_the_title() . '</h1>';
    echo '</div>';
}

// Elementor : afficher le contenu édité si présent
while (have_posts()) : the_post();
    the_content();
endwhile;


echo '<div class="site-wrapper">'; // ✅ ici, uniquement autour du contenu

// Inclure le contrôleur
require_once get_template_directory() . '/controllers/ArticlesController.php';

// Récupérer les articles depuis le contrôleur
$articles = ArticlesController::getRecentArticles();

// Inclure la vue avec les articles
require locate_template('views/articles-list.php');

echo '</div>'; // 🔚 fermeture juste avant le footer

get_footer();