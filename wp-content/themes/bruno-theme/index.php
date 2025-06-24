<?php
get_header();
?>

<main class="site-main">
  <div class="container content-wrapper bordered">
   <?php 
        if(!empty(get_the_content())){
                the_content();
        }
    ?>
  </div>
</main>

<?php
get_footer();
?>
