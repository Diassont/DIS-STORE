</main>

<?php
  $footer_logo      = get_field('footer_logo', 'option');       
  $footer_desc      = get_field('footer_desc', 'option');       
  $footer_email     = get_field('footer_email', 'option');      
  $footer_phone     = get_field('footer_phone', 'option');      
  $footer_copy      = get_field('footer_copy', 'option');    
  $footer_instagram = get_field('footer_instagram', 'option');  
?>

<footer class="site-footer">
  <div class="container footer-inner">
    <div class="footer-col">

      <a class="footer-logo logo" href="<?php echo esc_url(home_url('/')); ?>" style="text-decoration:none;color:var(--text);font-weight:900;display:flex;align-items:center;gap:8px;width:fit-content;">
        <?php if (!empty($footer_logo) && !empty($footer_logo['url'])): ?>
          <img
            src="<?php echo esc_url($footer_logo['url']); ?>"
            alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
            style="height:32px;width:auto;display:block;"
          >
        <?php else: ?>
          DIS<span style="color:var(--orange);">STORE</span>
        <?php endif; ?>
      </a>

      <p class="muted"><?php echo esc_html($footer_desc); ?></p>

      <?php if (!empty($footer_instagram)): ?>
        <p class="muted" style="margin-top:10px;">
          <a class="footer-link" href="<?php echo esc_url($footer_instagram); ?>" target="_blank" rel="noopener noreferrer">
            Instagram
          </a>
        </p>
      <?php endif; ?>
    </div>

    <div class="footer-col">
      <div class="footer-title"></div>
      <?php
        wp_nav_menu([
          'theme_location' => 'footer_menu',
          'container' => false,
          'menu_class' => 'footer-menu',
          'fallback_cb' => false,
        ]);
      ?>
    </div>

    <div class="footer-col">
      <div class="footer-title">Контакти</div>

      <?php if (!empty($footer_email)): ?>
        <p class="muted">
          <a class="footer-link" href="mailto:<?php echo esc_attr($footer_email); ?>">
            <?php echo esc_html($footer_email); ?>
          </a>
        </p>
      <?php endif; ?>

      <?php if (!empty($footer_phone)): ?>
        <p class="muted">
          <a class="footer-link" href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $footer_phone)); ?>">
            <?php echo esc_html($footer_phone); ?>
          </a>
        </p>
      <?php endif; ?>
    </div>
  </div>

  <div class="container footer-bottom">
  <p class="muted">
    © <?php echo date('Y'); ?> <?php echo esc_html($footer_copy); ?>. 
    <?php if (!empty(get_field('footer_author', 'option'))): ?>
      Розробка сайту — <strong><?php the_field('footer_author', 'option'); ?></strong>.
    <?php endif; ?>
  </p>
</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>