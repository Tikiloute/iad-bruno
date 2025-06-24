<footer class="site-footer">
  <div class="container">
    <div class="footer-branding" style="text-align: center; margin-bottom: 15px;">
      <a href="https://www.iadfrance.fr" target="_blank" rel="noopener">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-bleu.png" alt="IAD France" style="height: 40px;">
      </a>
    </div>
    <p>&copy; <?php echo date("Y"); ?> Bruno Etcheverry chez IAD France. Tous droits réservés.</p>
    <p>
      <a href="<?php echo home_url('/mentions-legales'); ?>">Mentions légales</a> |
      <a href="<?php echo home_url('/politique-de-confidentialite'); ?>">Confidentialité</a>
    </p>
  </div>
  <?php wp_footer(); ?>
</footer>

</body>
</html>
