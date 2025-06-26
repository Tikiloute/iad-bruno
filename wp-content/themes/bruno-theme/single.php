<?php
// page-articles.php

if (!defined('ABSPATH')) exit;

get_header();
?>

<?php if (has_post_thumbnail()) : ?>
  <div class="article-header">
    <div class="single-card-thumb">
      <?php the_post_thumbnail('large'); ?>
    </div>
    <h1 class="single-page-title"><?php the_title(); ?></h1>
  </div>
<?php endif; ?>

<?php
    // Inclure la vue avec les articles
    require locate_template('views/article.php');
  ?>

<div class="homepage-content content-wrapper bordered">

    <?php
      while (have_posts()) : the_post();
        the_content(); // Elementor contenu
      endwhile;
    ?>

</div> <!-- /.bordered -->

<?php get_footer(); ?>
