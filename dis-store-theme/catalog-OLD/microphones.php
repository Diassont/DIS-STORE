<?php
/*
Template Name: Catalog — Microphones
*/
get_header();
?>

<section class="section hero" style="padding-top:16px;">
  <div class="container">

    <div class="section-head">
      <div>
        <h1 class="page-title" style="margin-bottom:6px;">Мікрофони</h1>
        <p class="muted" style="margin:0;">
          Студійні, стрімінгові та ігрові мікрофони — обери потрібний формат.
        </p>
      </div>

      <a class="head-link" href="<?php echo esc_url(home_url('/catalog/')); ?>">
        Весь каталог <span class="arr">→</span>
      </a>
    </div>

    <!-- FILTER -->
    <div class="filter-bar" id="filterBar" data-filter="microphones"></div>
    <p class="filter-empty muted" id="filterEmpty" hidden>Нічого не знайдено.</p>

    <!-- PRODUCTS -->
    <div class="product-grid" id="products" style="margin-top:14px;">

      <!-- CARD 1 -->
      <article class="p-card"
        data-type="condenser"
        data-connection="usb"
        data-pattern="cardioid"
        data-price="3999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mic-1.png'); ?>"
            alt="HyperX SoloCast"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">HyperX SoloCast</h3>
          <p class="p-desc">USB • Condenser • Cardioid</p>

          <div class="p-meta">
            <span class="pill">Streaming</span>
            <span class="pill pill-outline">USB</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">3 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="HyperX SoloCast"
              data-price="3 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mic-1.png'); ?>"
              data-desc="Компактний USB-мікрофон для стримів, ігор та подкастів."
              data-specs="Тип: Condenser|Підключення: USB|Спрямованість: Cardioid"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 2 -->
      <article class="p-card"
        data-type="condenser"
        data-connection="usb"
        data-pattern="cardioid"
        data-price="5499">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mic-2.png'); ?>"
            alt="Blue Yeti Nano"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Blue Yeti Nano</h3>
          <p class="p-desc">USB • Condenser • Premium</p>

          <div class="p-meta">
            <span class="pill">Studio</span>
            <span class="pill pill-outline">USB</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">5 499 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Blue Yeti Nano"
              data-price="5 499 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mic-2.png'); ?>"
              data-desc="Якісний студійний звук у компактному корпусі."
              data-specs="Тип: Condenser|Підключення: USB|Спрямованість: Cardioid"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 3 -->
      <article class="p-card"
        data-type="dynamic"
        data-connection="xlr"
        data-pattern="cardioid"
        data-price="6999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mic-3.png'); ?>"
            alt="Shure SM58"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Shure SM58</h3>
          <p class="p-desc">XLR • Dynamic • Cardioid</p>

          <div class="p-meta">
            <span class="pill">Stage</span>
            <span class="pill pill-outline">XLR</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">6 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Shure SM58"
              data-price="6 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mic-3.png'); ?>"
              data-desc="Легендарний динамічний мікрофон для сцени та вокалу."
              data-specs="Тип: Dynamic|Підключення: XLR|Спрямованість: Cardioid"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 4 -->
      <article class="p-card"
        data-type="condenser"
        data-connection="xlr"
        data-pattern="cardioid"
        data-price="4799">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mic-4.png'); ?>"
            alt="Audio-Technica AT2020"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Audio-Technica AT2020</h3>
          <p class="p-desc">XLR • Condenser • Studio</p>

          <div class="p-meta">
            <span class="pill">Recording</span>
            <span class="pill pill-outline">XLR</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">4 799 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Audio-Technica AT2020"
              data-price="4 799 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mic-4.png'); ?>"
              data-desc="Популярний студійний мікрофон для вокалу та інструментів."
              data-specs="Тип: Condenser|Підключення: XLR|Спрямованість: Cardioid"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 5 -->
      <article class="p-card"
        data-type="dynamic"
        data-connection="usb"
        data-pattern="cardioid"
        data-price="3499">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mic-5.png'); ?>"
            alt="Fifine K669B"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Fifine K669B</h3>
          <p class="p-desc">USB • Dynamic • Budget</p>

          <div class="p-meta">
            <span class="pill">Budget</span>
            <span class="pill pill-outline">USB</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">3 499 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Fifine K669B"
              data-price="3 499 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mic-5.png'); ?>"
              data-desc="Доступний мікрофон для навчання, дзвінків та стримів."
              data-specs="Тип: Dynamic|Підключення: USB|Спрямованість: Cardioid"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 6 -->
      <article class="p-card"
        data-type="condenser"
        data-connection="usb"
        data-pattern="cardioid"
        data-price="6199">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mic-6.png'); ?>"
            alt="RØDE NT-USB Mini"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">RØDE NT-USB Mini</h3>
          <p class="p-desc">USB • Condenser • Compact</p>

          <div class="p-meta">
            <span class="pill">Podcast</span>
            <span class="pill pill-outline">USB</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">6 199 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="RØDE NT-USB Mini"
              data-price="6 199 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mic-6.png'); ?>"
              data-desc="Компактний USB-мікрофон з професійною якістю звуку."
              data-specs="Тип: Condenser|Підключення: USB|Спрямованість: Cardioid"
            >Детальніше</button>
          </div>
        </div>
      </article>

    </div>
  </div>
</section>

<?php get_footer(); ?>
