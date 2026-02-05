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

      <div class="footer-logo">
        <?php if (!empty($footer_logo) && !empty($footer_logo['url'])): ?>
          <img
            src="<?php echo esc_url($footer_logo['url']); ?>"
            alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
            style="height:32px;width:auto;display:block;"
          >
        <?php else: ?>
          DIS<span>STORE</span>
        <?php endif; ?>
      </div>

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
    <span class="muted">© <?php echo date('Y'); ?> <?php echo esc_html($footer_copy); ?></span>
  </div>
</footer>

<div class="modal" id="productModal" aria-hidden="true">
  <div class="modal__overlay" data-close></div>

  <div class="modal__dialog" role="dialog" aria-modal="true" aria-label="Деталі товару">
    <button class="modal__close" type="button" data-close aria-label="Закрити">✕</button>

    <div class="modal__grid">
      <div class="modal__media">
        <img id="modalImg" src="" alt="">
      </div>

      <div class="modal__content">
        <h3 class="modal__title" id="modalTitle"></h3>
        <div class="modal__price" id="modalPrice"></div>
        <p class="muted" id="modalStock" style="margin:6px 0 0;"></p>

        <p class="modal__desc" id="modalDesc"></p>

        <div class="modal__specs">
          <div class="modal__specTitle">Характеристики</div>
          <ul id="modalSpecs"></ul>
        </div>

        <div class="modal__actions">
          <a class="btn" id="modalBuy" href="<?php echo esc_url(home_url('/contacts')); ?>" target="_self">Придбати</a>
          <button class="btn btn-outline" type="button" data-close>Закрити</button>
        </div>

        <p class="modal__hint">
          Натисни <strong>«Придбати»</strong> — і ми уточнимо наявність та доставку.
        </p>
      </div>
    </div>
  </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
