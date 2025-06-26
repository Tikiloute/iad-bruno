<?php
// page-contact.php

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

<div class="homepage-content content-wrapper bordered">
  <div class="elementor-wrapper">
    <?php
      while (have_posts()) : the_post();
        the_content(); // Elementor
      endwhile;
    ?>
  </div>
</div>

<?php get_footer(); ?>
