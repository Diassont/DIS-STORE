<?php
/*
Template Name: Catalog — RAM
*/
get_header();
?>

<section class="section hero" style="padding-top:16px;">
  <div class="container">

    <div class="section-head">
      <div>
        <h1 class="page-title" style="margin-bottom:6px;">Оперативна памʼять (RAM)</h1>
        <p class="muted" style="margin:0;">
          DDR4 та DDR5 — для ігор, роботи та апгрейду ПК.
        </p>
      </div>

      <a class="head-link" href="<?php echo esc_url(home_url('/catalog/')); ?>">
        Весь каталог <span class="arr">→</span>
      </a>
    </div>

    <!-- FILTER -->
    <div class="filter-bar" id="filterBar" data-filter="ram"></div>
    <p class="filter-empty muted" id="filterEmpty" hidden>Нічого не знайдено.</p>

    <!-- PRODUCTS -->
    <div class="product-grid" id="products" style="margin-top:14px;">

      <!-- CARD 1 -->
      <article class="p-card"
        data-type="ddr4"
        data-size="16"
        data-mhz="3200"
        data-price="1799">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/ram-1.png'); ?>"
            alt="Kingston Fury Beast 16GB DDR4"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Kingston Fury Beast 16GB</h3>
          <p class="p-desc">DDR4 • 3200 MHz • Gaming</p>

          <div class="p-meta">
            <span class="pill">DDR4</span>
            <span class="pill pill-outline">16GB</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">1 799 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Kingston Fury Beast 16GB DDR4"
              data-price="1 799 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/ram-1.png'); ?>"
              data-desc="Надійна оперативна памʼять для ігор та повсякденних задач."
              data-specs="Тип: DDR4|Обсяг: 16GB|Частота: 3200 MHz"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 2 -->
      <article class="p-card"
        data-type="ddr4"
        data-size="32"
        data-mhz="3600"
        data-price="3299">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/ram-2.png'); ?>"
            alt="Corsair Vengeance LPX 32GB"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Corsair Vengeance LPX 32GB</h3>
          <p class="p-desc">DDR4 • 3600 MHz • Performance</p>

          <div class="p-meta">
            <span class="pill">DDR4</span>
            <span class="pill pill-outline">32GB</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">3 299 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Corsair Vengeance LPX 32GB"
              data-price="3 299 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/ram-2.png'); ?>"
              data-desc="Висока частота та стабільність для продуктивних систем."
              data-specs="Тип: DDR4|Обсяг: 32GB|Частота: 3600 MHz"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 3 -->
      <article class="p-card"
        data-type="ddr5"
        data-size="16"
        data-mhz="5200"
        data-price="2499">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/ram-3.png'); ?>"
            alt="Kingston Fury Beast DDR5 16GB"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Kingston Fury Beast 16GB</h3>
          <p class="p-desc">DDR5 • 5200 MHz • New Gen</p>

          <div class="p-meta">
            <span class="pill">DDR5</span>
            <span class="pill pill-outline">16GB</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">2 499 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Kingston Fury Beast 16GB DDR5"
              data-price="2 499 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/ram-3.png'); ?>"
              data-desc="DDR5 памʼять для нових платформ Intel та AMD."
              data-specs="Тип: DDR5|Обсяг: 16GB|Частота: 5200 MHz"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 4 -->
      <article class="p-card"
        data-type="ddr5"
        data-size="32"
        data-mhz="6000"
        data-price="4999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/ram-4.png'); ?>"
            alt="G.Skill Trident Z5 32GB"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">G.Skill Trident Z5 32GB</h3>
          <p class="p-desc">DDR5 • 6000 MHz • Premium</p>

          <div class="p-meta">
            <span class="pill">DDR5</span>
            <span class="pill pill-outline">32GB</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">4 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="G.Skill Trident Z5 32GB"
              data-price="4 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/ram-4.png'); ?>"
              data-desc="Топова DDR5 памʼять для ентузіастів."
              data-specs="Тип: DDR5|Обсяг: 32GB|Частота: 6000 MHz"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 5 -->
      <article class="p-card"
        data-type="ddr4"
        data-size="8"
        data-mhz="2666"
        data-price="899">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/ram-5.png'); ?>"
            alt="Crucial 8GB DDR4"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Crucial 8GB</h3>
          <p class="p-desc">DDR4 • 2666 MHz • Budget</p>

          <div class="p-meta">
            <span class="pill">DDR4</span>
            <span class="pill pill-outline">8GB</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">899 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Crucial 8GB DDR4"
              data-price="899 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/ram-5.png'); ?>"
              data-desc="Доступна оперативна памʼять для офісних ПК."
              data-specs="Тип: DDR4|Обсяг: 8GB|Частота: 2666 MHz"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 6 -->
      <article class="p-card"
        data-type="ddr5"
        data-size="64"
        data-mhz="5600"
        data-price="8999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/ram-6.png'); ?>"
            alt="Corsair Dominator Platinum 64GB"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Corsair Dominator Platinum 64GB</h3>
          <p class="p-desc">DDR5 • 5600 MHz • Workstation</p>

          <div class="p-meta">
            <span class="pill">DDR5</span>
            <span class="pill pill-outline">64GB</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">8 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Corsair Dominator Platinum 64GB"
              data-price="8 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/ram-6.png'); ?>"
              data-desc="Максимальний обсяг памʼяті для важких задач."
              data-specs="Тип: DDR5|Обсяг: 64GB|Частота: 5600 MHz"
            >Детальніше</button>
          </div>
        </div>
      </article>

    </div>
  </div>
</section>

<?php get_footer(); ?>
