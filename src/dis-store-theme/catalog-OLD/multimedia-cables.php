<?php
/*
Template Name: Catalog — Multimedia Cables
*/
get_header();
?>

<section class="section hero" style="padding-top:16px;">
  <div class="container">

    <div class="section-head">
      <div>
        <h1 class="page-title" style="margin-bottom:6px;">Мультимедійні кабелі</h1>
        <p class="muted" style="margin:0;">
          HDMI / DisplayPort / USB-C — обери тип, довжину та версію.
        </p>
      </div>

      <a class="head-link" href="<?php echo esc_url(home_url('/catalog/')); ?>">
        Весь каталог <span class="arr">→</span>
      </a>
    </div>

    <!-- FILTER -->
    <div class="filter-bar" id="filterBar" data-filter="multimedia-cables"></div>
    <p class="filter-empty muted" id="filterEmpty" hidden>Нічого не знайдено.</p>

    <!-- PRODUCTS -->
    <div class="product-grid" id="products" style="margin-top:14px;">

      <!-- CARD 1 -->
      <article class="p-card"
        data-cable-type="hdmi"
        data-length="1"
        data-version="2.0"
        data-price="199">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cable-1.png'); ?>"
            alt="HDMI Cable 1m v2.0"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">HDMI 2.0 (1 м)</h3>
          <p class="p-desc">HDMI • 1m • v2.0 • 4K</p>

          <div class="p-meta">
            <span class="pill">HDMI</span>
            <span class="pill pill-outline">1m</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">199 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="HDMI 2.0 (1 м)"
              data-price="199 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cable-1.png'); ?>"
              data-desc="Базовий HDMI кабель для ТВ/монітора. Підтримка 4K."
              data-specs="Тип: HDMI|Довжина: 1м|Версія: 2.0"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 2 -->
      <article class="p-card"
        data-cable-type="hdmi"
        data-length="3"
        data-version="2.1"
        data-price="499">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cable-2.png'); ?>"
            alt="HDMI Cable 3m v2.1"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">HDMI 2.1 (3 м)</h3>
          <p class="p-desc">HDMI • 3m • v2.1 • 8K/120Hz</p>

          <div class="p-meta">
            <span class="pill">HDMI 2.1</span>
            <span class="pill pill-outline">3m</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">499 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="HDMI 2.1 (3 м)"
              data-price="499 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cable-2.png'); ?>"
              data-desc="Для PS5/Series X та сучасних ТВ: висока пропускна здатність."
              data-specs="Тип: HDMI|Довжина: 3м|Версія: 2.1"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 3 -->
      <article class="p-card"
        data-cable-type="dp"
        data-length="1.5"
        data-version="1.4"
        data-price="349">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cable-3.png'); ?>"
            alt="DisplayPort Cable 1.5m v1.4"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">DisplayPort 1.4 (1.5 м)</h3>
          <p class="p-desc">DP • 1.5m • v1.4 • 4K/144Hz</p>

          <div class="p-meta">
            <span class="pill">DP</span>
            <span class="pill pill-outline">1.5m</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">349 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="DisplayPort 1.4 (1.5 м)"
              data-price="349 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cable-3.png'); ?>"
              data-desc="Ідеально для ігрових моніторів: висока частота та стабільність."
              data-specs="Тип: DisplayPort|Довжина: 1.5м|Версія: 1.4"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 4 -->
      <article class="p-card"
        data-cable-type="dp"
        data-length="3"
        data-version="2.0"
        data-price="699">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cable-4.png'); ?>"
            alt="DisplayPort Cable 3m v2.0"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">DisplayPort 2.0 (3 м)</h3>
          <p class="p-desc">DP • 3m • v2.0 • High Bandwidth</p>

          <div class="p-meta">
            <span class="pill">DP 2.0</span>
            <span class="pill pill-outline">3m</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">699 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="DisplayPort 2.0 (3 м)"
              data-price="699 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cable-4.png'); ?>"
              data-desc="Для вимогливих конфігурацій та високих роздільних здатностей."
              data-specs="Тип: DisplayPort|Довжина: 3м|Версія: 2.0"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 5 -->
      <article class="p-card"
        data-cable-type="usb-c"
        data-length="1"
        data-version="3.2"
        data-price="299">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cable-5.png'); ?>"
            alt="USB-C Cable 1m v3.2"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">USB-C 3.2 (1 м)</h3>
          <p class="p-desc">USB-C • 1m • 3.2 • Data/Charge</p>

          <div class="p-meta">
            <span class="pill">USB-C</span>
            <span class="pill pill-outline">1m</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">299 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="USB-C 3.2 (1 м)"
              data-price="299 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cable-5.png'); ?>"
              data-desc="Для швидкої передачі даних та зарядки пристроїв."
              data-specs="Тип: USB-C|Довжина: 1м|Версія: 3.2"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 6 -->
      <article class="p-card"
        data-cable-type="usb-c"
        data-length="2"
        data-version="4"
        data-price="899">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cable-6.png'); ?>"
            alt="USB-C Cable 2m v4"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">USB-C (2 м) Thunderbolt/USB4</h3>
          <p class="p-desc">USB-C • 2m • USB4 • Premium</p>

          <div class="p-meta">
            <span class="pill">USB4</span>
            <span class="pill pill-outline">2m</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">899 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="USB-C (2 м) Thunderbolt/USB4"
              data-price="899 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cable-6.png'); ?>"
              data-desc="Преміум кабель для док-станцій, моніторів та швидких SSD."
              data-specs="Тип: USB-C|Довжина: 2м|Версія: USB4"
            >Детальніше</button>
          </div>
        </div>
      </article>

    </div><!-- /product-grid -->

  </div><!-- /container -->
</section>

<?php get_footer(); ?>
