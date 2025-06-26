<?php
// page-contact.php

if (!defined('ABSPATH')) exit;

get_header();
?>


  <div class="article-header">
    <?php if (has_post_thumbnail()) : ?>
        <div class="single-card-thumb">
        <?php the_post_thumbnail('large'); ?>
        </div>
    <?php endif; ?>
    <h1 class="single-page-title" style="text-align: center; margin-top:60px;"><?php the_title(); ?></h1>
  </div>


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
