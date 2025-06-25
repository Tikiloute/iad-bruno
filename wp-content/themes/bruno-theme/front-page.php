<?php
// Sécurité
if (!defined('ABSPATH')) {
    exit;
}

// Inclut le header
get_header();
?>

<div class="homepage-content content-wrapper bordered">

    <div class="hero-card">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/face.jpg" alt="Bruno Etcheverry" class="hero-photo" />
        <h2>Bruno Etcheverry</h2>
        <p>Conseiller immobilier<br>indépendant, affilié IAD France</p>
        <div class="hero-contact">
            <div class="contact-row">
                <i class="fas fa-phone contact-icon"></i>
                <span class="contact-text">07 87 03 08 55</span>
            </div>
            <div class="contact-row">
                <i class="fas fa-envelope contact-icon"></i>
                <a href="mailto:bruno.etcheverry@iadfrance.fr" class="contact-text">bruno.etcheverry@iadfrance.fr</a>
            </div>
            
            <div class="social-row">
                <a href="#" class="social-icon" aria-label="LinkedIn">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="#" class="social-icon" aria-label="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="social-icon" aria-label="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </div>
        </div>
    </div>

  <?php
    while (have_posts()) : the_post();
      the_content(); // Elementor injectera ici ton contenu personnalisé
    endwhile;
  ?>
</div>

<?php
// Inclut le footer
get_footer();
