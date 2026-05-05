<?php
/*
Template Name: Catalog — Mice
*/
get_header();
?>

<section class="section hero" style="padding-top:16px;">
  <div class="container">

    <div class="section-head">
      <div>
        <h1 class="page-title" style="margin-bottom:6px;">Миші</h1>
        <p class="muted" style="margin:0;">
          Ігрові, офісні, дротові або бездротові — обери мишу під свій стиль та задачі.
        </p>
      </div>

      <a class="head-link" href="<?php echo esc_url(home_url('/catalog/')); ?>">
        Весь каталог <span class="arr">→</span>
      </a>
    </div>

    <!-- ✅ FILTER -->
    <div class="filter-bar" id="filterBar" data-filter="mice"></div>
    <p class="filter-empty muted" id="filterEmpty" hidden>Нічого не знайдено за фільтром.</p>

    <!-- ✅ PRODUCTS -->
    <div class="product-grid" id="products" style="margin-top:14px;">

      <!-- CARD 1 -->
      <article class="p-card"
        data-brand="logitech"
        data-type="gaming"
        data-connection="wireless"
        data-sensor="optical"
        data-dpi="25600"
        data-price="3999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mouse-1.png'); ?>"
            alt="Logitech G Pro X Superlight"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Logitech G Pro X Superlight</h3>
          <p class="p-desc">Wireless • 25600 DPI • Ultra Light</p>

          <div class="p-meta">
            <span class="pill">PRO</span>
            <span class="pill pill-outline">eSports</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">3 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Logitech G Pro X Superlight"
              data-price="3 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mouse-1.png'); ?>"
              data-desc="Надлегка професійна миша для кіберспорту з максимально точним сенсором."
              data-specs="Тип: Gaming|Підключення: Wireless|DPI: 25600|Сенсор: Optical|Вага: ~63г"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 2 -->
      <article class="p-card"
        data-brand="razer"
        data-type="gaming"
        data-connection="wired"
        data-sensor="optical"
        data-dpi="20000"
        data-price="2599">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mouse-2.png'); ?>"
            alt="Razer DeathAdder V2"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Razer DeathAdder V2</h3>
          <p class="p-desc">Wired • 20000 DPI • Ergonomic</p>

          <div class="p-meta">
            <span class="pill">Хіт</span>
            <span class="pill pill-outline">Gaming</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">2 599 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Razer DeathAdder V2"
              data-price="2 599 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mouse-2.png'); ?>"
              data-desc="Класична ергономічна форма та точний сенсор для FPS і MOBA."
              data-specs="Тип: Gaming|Підключення: Wired|DPI: 20000|Сенсор: Optical|Форма: Ergonomic"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 3 -->
      <article class="p-card"
        data-brand="logitech"
        data-type="office"
        data-connection="wireless"
        data-sensor="optical"
        data-dpi="4000"
        data-price="1799">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mouse-3.png'); ?>"
            alt="Logitech MX Master 3S"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Logitech MX Master 3S</h3>
          <p class="p-desc">Wireless • Silent • Office</p>

          <div class="p-meta">
            <span class="pill">ТОП</span>
            <span class="pill pill-outline">Work</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">1 799 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Logitech MX Master 3S"
              data-price="1 799 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mouse-3.png'); ?>"
              data-desc="Ідеальна миша для роботи: тиха, ергономічна, підтримує мульти-девайс."
              data-specs="Тип: Office|Підключення: Wireless|DPI: 4000|Сенсор: Optical|Колесо: MagSpeed"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 4 -->
      <article class="p-card"
        data-brand="a4tech"
        data-type="office"
        data-connection="wired"
        data-sensor="optical"
        data-dpi="1600"
        data-price="399">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mouse-4.png'); ?>"
            alt="A4Tech Office Mouse"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">A4Tech Office Mouse</h3>
          <p class="p-desc">Wired • 1600 DPI • Budget</p>

          <div class="p-meta">
            <span class="pill">Бюджет</span>
            <span class="pill pill-outline">Office</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">399 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="A4Tech Office Mouse"
              data-price="399 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mouse-4.png'); ?>"
              data-desc="Проста та надійна миша для офісу й навчання."
              data-specs="Тип: Office|Підключення: Wired|DPI: 1600|Сенсор: Optical"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 5 -->
      <article class="p-card"
        data-brand="steelseries"
        data-type="gaming"
        data-connection="wired"
        data-sensor="optical"
        data-dpi="18000"
        data-price="2299">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mouse-5.png'); ?>"
            alt="SteelSeries Rival 3"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">SteelSeries Rival 3</h3>
          <p class="p-desc">Wired • 18000 DPI • RGB</p>

          <div class="p-meta">
            <span class="pill">Gaming</span>
            <span class="pill pill-outline">RGB</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">2 299 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="SteelSeries Rival 3"
              data-price="2 299 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mouse-5.png'); ?>"
              data-desc="Точна ігрова миша з RGB-підсвіткою та легким корпусом."
              data-specs="Тип: Gaming|Підключення: Wired|DPI: 18000|Сенсор: Optical|RGB: є"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 6 -->
        <article class="p-card"
        data-brand="corsair"
        data-type="gaming"
        data-connection="wireless"
        data-sensor="optical"
        data-dpi="26000"
        data-price="3299">

        <div class="p-imgwrap">
            <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mouse-6.png'); ?>"
            alt="Corsair Dark Core RGB Pro"
            loading="lazy">
        </div>

        <div class="p-body">
            <h3 class="p-title">Corsair Dark Core RGB Pro</h3>
            <p class="p-desc">Wireless • 26000 DPI • RGB • Gaming</p>

            <div class="p-meta">
            <span class="pill">NEW</span>
            <span class="pill pill-outline">Gaming</span>
            </div>

            <div class="p-bottom">
            <div class="p-price">
                <div class="price">3 299 грн</div>
                <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
                data-title="Corsair Dark Core RGB Pro"
                data-price="3 299 грн"
                data-stock="В наявності • відправка 1–2 дні"
                data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mouse-6.png'); ?>"
                data-desc="Потужна бездротова ігрова миша з високою точністю, RGB та ергономічною формою."
                data-specs="Тип: Gaming|Підключення: Wireless|DPI: 26000|Сенсор: Optical|RGB: є|Форма: Ergonomic"
            >Детальніше</button>
            </div>
        </div>
        </article>

    </div><!-- /product-grid -->

  </div><!-- /container -->
</section>

<?php get_footer(); ?>
