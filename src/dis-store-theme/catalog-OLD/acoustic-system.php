<?php
/*
Template Name: Catalog — Acoustic Systems
*/
get_header();
?>

<section class="section hero" style="padding-top:16px;">
  <div class="container">

    <div class="section-head">
      <div>
        <h1 class="page-title" style="margin-bottom:6px;">Акустичні системи</h1>
        <p class="muted" style="margin:0;">
          Колонки 2.0 / 2.1, саундбари та 5.1 — обери тип, підключення та потужність.
        </p>
      </div>

      <a class="head-link" href="<?php echo esc_url(home_url('/catalog/')); ?>">
        Весь каталог <span class="arr">→</span>
      </a>
    </div>

    <!-- FILTER -->
    <div class="filter-bar" id="filterBar" data-filter="acoustic-systems"></div>
    <p class="filter-empty muted" id="filterEmpty" hidden>Нічого не знайдено.</p>

    <!-- PRODUCTS -->
    <div class="product-grid" id="products" style="margin-top:14px;">

      <!-- CARD 1 -->
      <article class="p-card"
        data-type="2.0"
        data-connection="aux"
        data-power="10"
        data-price="899">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/speaker-1.png'); ?>"
            alt="Genius SP-HF180 2.0"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Genius SP-HF180</h3>
          <p class="p-desc">2.0 • AUX • 10W • бюджет</p>

          <div class="p-meta">
            <span class="pill">2.0</span>
            <span class="pill pill-outline">AUX</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">899 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Genius SP-HF180"
              data-price="899 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/speaker-1.png'); ?>"
              data-desc="Прості колонки 2.0 для ПК та навчання. Підключення через AUX."
              data-specs="Тип: 2.0|Зв’язок: AUX|Потужність: 10W"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 2 -->
      <article class="p-card"
        data-type="2.1"
        data-connection="aux"
        data-power="50"
        data-price="2499">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/speaker-2.png'); ?>"
            alt="Logitech Z313 2.1"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Logitech Z313</h3>
          <p class="p-desc">2.1 • AUX • 50W • сабвуфер</p>

          <div class="p-meta">
            <span class="pill">2.1</span>
            <span class="pill pill-outline">50W</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">2 499 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Logitech Z313"
              data-price="2 499 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/speaker-2.png'); ?>"
              data-desc="Компактна 2.1 система з сабвуфером для ігор та фільмів."
              data-specs="Тип: 2.1|Зв’язок: AUX|Потужність: 50W"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 3 -->
      <article class="p-card"
        data-type="soundbar"
        data-connection="bt"
        data-power="20"
        data-price="1999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/speaker-3.png'); ?>"
            alt="Soundbar BT 20W"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Soundbar BT 20W</h3>
          <p class="p-desc">Soundbar • Bluetooth • 20W</p>

          <div class="p-meta">
            <span class="pill">Soundbar</span>
            <span class="pill pill-outline">BT</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">1 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Soundbar BT 20W"
              data-price="1 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/speaker-3.png'); ?>"
              data-desc="Саундбар для ТВ/ПК з Bluetooth — мінімум дротів, хороший звук."
              data-specs="Тип: Soundbar|Зв’язок: BT|Потужність: 20W"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 4 -->
      <article class="p-card"
        data-type="2.0"
        data-connection="usb"
        data-power="20"
        data-price="1299">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/speaker-4.png'); ?>"
            alt="USB Speakers 2.0 20W"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">USB Speakers 2.0</h3>
          <p class="p-desc">2.0 • USB • 20W • прості</p>

          <div class="p-meta">
            <span class="pill">USB</span>
            <span class="pill pill-outline">2.0</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">1 299 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="USB Speakers 2.0"
              data-price="1 299 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/speaker-4.png'); ?>"
              data-desc="Живлення і звук через USB — зручно для ноутбука та роботи."
              data-specs="Тип: 2.0|Зв’язок: USB|Потужність: 20W"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 5 -->
      <article class="p-card"
        data-type="5.1"
        data-connection="aux"
        data-power="100"
        data-price="6999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/speaker-5.png'); ?>"
            alt="Home Theater 5.1 100W"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Home Theater 5.1</h3>
          <p class="p-desc">5.1 • AUX • 100W • кіно</p>

          <div class="p-meta">
            <span class="pill">5.1</span>
            <span class="pill pill-outline">100W</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">6 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Home Theater 5.1"
              data-price="6 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/speaker-5.png'); ?>"
              data-desc="Об’ємний звук 5.1 для фільмів та ігор."
              data-specs="Тип: 5.1|Зв’язок: AUX|Потужність: 100W"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 6 -->
      <article class="p-card"
        data-type="soundbar"
        data-connection="bt"
        data-power="50"
        data-price="3999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/speaker-6.png'); ?>"
            alt="Soundbar BT 50W"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Soundbar BT 50W</h3>
          <p class="p-desc">Soundbar • Bluetooth • 50W • Bass</p>

          <div class="p-meta">
            <span class="pill">Soundbar</span>
            <span class="pill pill-outline">50W</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">3 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Soundbar BT 50W"
              data-price="3 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/speaker-6.png'); ?>"
              data-desc="Потужніший саундбар з Bluetooth для кімнати/ТВ."
              data-specs="Тип: Soundbar|Зв’язок: BT|Потужність: 50W"
            >Детальніше</button>
          </div>
        </div>
      </article>

    </div><!-- /product-grid -->

  </div><!-- /container -->
</section>

<?php get_footer(); ?>
