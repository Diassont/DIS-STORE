<?php
/*
Template Name: Catalog — Graphics Cards
*/
get_header();
?>

<section class="section hero" style="padding-top:16px;">
  <div class="container">

    <div class="section-head">
      <div>
        <h1 class="page-title" style="margin-bottom:6px;">Відеокарти</h1>
        <p class="muted" style="margin:0;">
          Обери відеокарту під свій бюджет та продуктивність – ігор та роботи.
        </p>
      </div>

      <a class="head-link" href="<?php echo esc_url(home_url('/catalog/')); ?>">
        Весь каталог <span class="arr">→</span>
      </a>
    </div>

    <!-- FILTER -->
    <div class="filter-bar" id="filterBar" data-filter="graphics-cards"></div>
    <p class="filter-empty muted" id="filterEmpty" hidden>Нічого не знайдено.</p>

    <!-- PRODUCTS -->
    <div class="product-grid" id="products" style="margin-top:14px;">

      <!-- CARD 1 -->
      <article class="p-card"
        data-brand="nvidia"
        data-vram="8"
        data-series="rtx30"
        data-price="18999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/vga-1.png'); ?>"
            alt="NVIDIA GeForce RTX 3060"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">NVIDIA GeForce RTX 3060</h3>
          <p class="p-desc">8GB • Ampere • 1080p/1440p Gaming</p>

          <div class="p-meta">
            <span class="pill">Gaming</span>
            <span class="pill pill-outline">8GB</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">18 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="NVIDIA GeForce RTX 3060"
              data-price="18 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/vga-1.png'); ?>"
              data-desc="RTX 3060 — чудовий вибір для Full HD/1440p ігор."
              data-specs="Бренд: NVIDIA|VRAM: 8GB|Серія: RTX30|Призначення: Gaming"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 2 -->
      <article class="p-card"
        data-brand="nvidia"
        data-vram="12"
        data-series="rtx30"
        data-price="24999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/vga-2.png'); ?>"
            alt="NVIDIA GeForce RTX 3060 Ti"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">NVIDIA GeForce RTX 3060 Ti</h3>
          <p class="p-desc">12GB • Ampere • 1440p Gaming</p>

          <div class="p-meta">
            <span class="pill">Gaming</span>
            <span class="pill pill-outline">12GB</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">24 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="NVIDIA GeForce RTX 3060 Ti"
              data-price="24 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/vga-2.png'); ?>"
              data-desc="RTX 3060 Ti — відмінна карта для 1440p із високою продуктивністю."
              data-specs="Бренд: NVIDIA|VRAM: 12GB|Серія: RTX30|Призначення: Gaming"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 3 -->
      <article class="p-card"
        data-brand="amd"
        data-vram="8"
        data-series="rx7000"
        data-price="21999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/vga-3.png'); ?>"
            alt="AMD Radeon RX 6700 XT"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">AMD Radeon RX 6700 XT</h3>
          <p class="p-desc">8GB • RDNA 2 • 1440p Performance</p>

          <div class="p-meta">
            <span class="pill">Performance</span>
            <span class="pill pill-outline">8GB</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">21 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="AMD Radeon RX 6700 XT"
              data-price="21 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/vga-3.png'); ?>"
              data-desc="RX 6700 XT — збалансована карта AMD для 1440p."
              data-specs="Бренд: AMD|VRAM: 8GB|Серія: RX7000|Призначення: Performance"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 4 -->
      <article class="p-card"
        data-brand="nvidia"
        data-vram="24"
        data-series="rtx40"
        data-price="59999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/vga-4.png'); ?>"
            alt="NVIDIA GeForce RTX 4090"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">NVIDIA GeForce RTX 4090</h3>
          <p class="p-desc">24GB • Ada Lovelace • 4K Ultimate</p>

          <div class="p-meta">
            <span class="pill">Flagship</span>
            <span class="pill pill-outline">24GB</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">59 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="NVIDIA GeForce RTX 4090"
              data-price="59 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/vga-4.png'); ?>"
              data-desc="RTX 4090 — найпотужніша відеокарта для 4K і AI."
              data-specs="Бренд: NVIDIA|VRAM: 24GB|Серія: RTX40|Призначення: Ultimate"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 5 -->
      <article class="p-card"
        data-brand="amd"
        data-vram="16"
        data-series="rx7000"
        data-price="42999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/vga-5.png'); ?>"
            alt="AMD Radeon RX 7800 XT"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">AMD Radeon RX 7800 XT</h3>
          <p class="p-desc">16GB • RDNA 3 • High Performance</p>

          <div class="p-meta">
            <span class="pill">High Performance</span>
            <span class="pill pill-outline">16GB</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">42 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="AMD Radeon RX 7800 XT"
              data-price="42 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/vga-5.png'); ?>"
              data-desc="RX 7800 XT — велика VRAM і висока продуктивність."
              data-specs="Бренд: AMD|VRAM: 16GB|Серія: RX7000|Призначення: High Performance"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 6 -->
      <article class="p-card"
        data-brand="nvidia"
        data-vram="12"
        data-series="rtx40"
        data-price="34999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/vga-6.png'); ?>"
            alt="NVIDIA GeForce RTX 4070 Ti"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">NVIDIA GeForce RTX 4070 Ti</h3>
          <p class="p-desc">12GB • Ada • 1440p/4K</p>

          <div class="p-meta">
            <span class="pill">Gaming</span>
            <span class="pill pill-outline">12GB</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">34 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="NVIDIA GeForce RTX 4070 Ti"
              data-price="34 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/vga-6.png'); ?>"
              data-desc="RTX 4070 Ti — відмінна опція для 1440p з гарним балансом."
              data-specs="Бренд: NVIDIA|VRAM: 12GB|Серія: RTX40|Призначення: Gaming"
            >Детальніше</button>
          </div>
        </div>
      </article>

    </div><!-- /product-grid -->

  </div><!-- /container -->
</section>

<?php get_footer(); ?>
