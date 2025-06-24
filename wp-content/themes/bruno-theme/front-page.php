<?php
// Sécurité
if (!defined('ABSPATH')) {
    exit;
}

// Inclut le header
get_header();
?>

<div class="homepage-content content-wrapper bordered">

    <section class="hero">
        <div class="hero-inner">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/face.jpg" alt="Bruno Etcheverry" class="hero-photo">
            <h1>Bruno Etcheverry</h1>
            <p>Conseiller immobilier indépendant affilié IAD France</p>
        </div>

        <div class="hero-contact">
            <a class="contact-link" href="tel:+33787030855">
                📞 <strong>07 87 03 08 55</strong>
            </a>
            <a class="contact-link" href="mailto:bruno.etcheverry@iadfrance.fr">
                ✉️ <strong>bruno.etcheverry@iadfrance.fr</strong>
            </a>
        </div>
    </section>

  <?php
    while (have_posts()) : the_post();
      the_content(); // Elementor injectera ici ton contenu personnalisé
    endwhile;
  ?>
</div>

<?php
// Inclut le footer
get_footer();
