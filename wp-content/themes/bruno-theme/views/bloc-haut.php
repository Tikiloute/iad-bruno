<div class="article-header">
  <?php if (has_post_thumbnail()) : ?>
      <div class="single-card-thumb">
      <?php the_post_thumbnail('large'); ?>
      </div>
  <?php endif; ?>
  <h1 class="single-page-title"><?php the_title(); ?></h1>
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
