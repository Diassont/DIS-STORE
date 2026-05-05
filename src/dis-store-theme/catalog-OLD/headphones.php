<?php
/*
Template Name: Catalog — Headphones
*/
get_header();
?>

<section class="section hero" style="padding-top:16px;">
  <div class="container">

    <div class="section-head">
      <div>
        <h1 class="page-title" style="margin-bottom:6px;">Навушники</h1>
        <p class="muted" style="margin:0;">
          Ігрові, бездротові, для музики або роботи — обери навушники під свої задачі.
        </p>
      </div>

      <a class="head-link" href="<?php echo esc_url(home_url('/catalog/')); ?>">
        Весь каталог <span class="arr">→</span>
      </a>
    </div>

    <!-- ✅ FILTER -->
    <div class="filter-bar" id="filterBar" data-filter="headphones"></div>
    <p class="filter-empty muted" id="filterEmpty" hidden>Нічого не знайдено за фільтром.</p>

    <!-- ✅ PRODUCTS -->
    <div class="product-grid" id="products" style="margin-top:14px;">

      <!-- CARD 1 -->
      <article class="p-card"
        data-brand="sony"
        data-type="wireless"
        data-form="over-ear"
        data-mic="yes"
        data-anc="yes"
        data-price="7999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/headphones-1.png'); ?>"
            alt="Sony WH-1000XM5"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Sony WH-1000XM5</h3>
          <p class="p-desc">Wireless • ANC • Over-Ear • Hi-Res</p>

          <div class="p-meta">
            <span class="pill">ТОП</span>
            <span class="pill pill-outline">Music</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">7 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Sony WH-1000XM5"
              data-price="7 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/headphones-1.png'); ?>"
              data-desc="Преміальні бездротові навушники з найкращим активним шумопоглинанням."
              data-specs="Тип: Wireless|Форма: Over-Ear|ANC: є|Мікрофон: є|Hi-Res: так"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 2 -->
      <article class="p-card"
        data-brand="hyperx"
        data-type="wired"
        data-form="over-ear"
        data-mic="yes"
        data-anc="no"
        data-price="3299">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/headphones-2.png'); ?>"
            alt="HyperX Cloud II"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">HyperX Cloud II</h3>
          <p class="p-desc">Wired • Gaming • 7.1 • Mic</p>

          <div class="p-meta">
            <span class="pill">Хіт</span>
            <span class="pill pill-outline">Gaming</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">3 299 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="HyperX Cloud II"
              data-price="3 299 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/headphones-2.png'); ?>"
              data-desc="Легендарні ігрові навушники з комфортною посадкою та якісним мікрофоном."
              data-specs="Тип: Wired|Форма: Over-Ear|7.1: так|Мікрофон: є|Призначення: Gaming"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 3 -->
      <article class="p-card"
        data-brand="apple"
        data-type="wireless"
        data-form="in-ear"
        data-mic="yes"
        data-anc="yes"
        data-price="6499">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/headphones-3.png'); ?>"
            alt="Apple AirPods Pro"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Apple AirPods Pro</h3>
          <p class="p-desc">TWS • ANC • Spatial Audio</p>

          <div class="p-meta">
            <span class="pill">Apple</span>
            <span class="pill pill-outline">Premium</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">6 499 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Apple AirPods Pro"
              data-price="6 499 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/headphones-3.png'); ?>"
              data-desc="Компактні бездротові навушники з ANC та просторовим звучанням."
              data-specs="Тип: TWS|Форма: In-Ear|ANC: є|Мікрофон: є|Audio: Spatial"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 4 -->
      <article class="p-card"
        data-brand="jbl"
        data-type="wireless"
        data-form="on-ear"
        data-mic="yes"
        data-anc="no"
        data-price="1999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/headphones-4.png'); ?>"
            alt="JBL Tune 510BT"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">JBL Tune 510BT</h3>
          <p class="p-desc">Wireless • On-Ear • Bass</p>

          <div class="p-meta">
            <span class="pill">Бюджет</span>
            <span class="pill pill-outline">Music</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">1 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="JBL Tune 510BT"
              data-price="1 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/headphones-4.png'); ?>"
              data-desc="Легкі бездротові навушники з фірмовим JBL-басом."
              data-specs="Тип: Wireless|Форма: On-Ear|ANC: немає|Мікрофон: є"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 5 -->
      <article class="p-card"
        data-brand="steelseries"
        data-type="wireless"
        data-form="over-ear"
        data-mic="yes"
        data-anc="no"
        data-price="5599">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/headphones-5.png'); ?>"
            alt="SteelSeries Arctis 7"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">SteelSeries Arctis 7</h3>
          <p class="p-desc">Wireless • Gaming • DTS</p>

          <div class="p-meta">
            <span class="pill">Gaming</span>
            <span class="pill pill-outline">Wireless</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">5 599 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="SteelSeries Arctis 7"
              data-price="5 599 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/headphones-5.png'); ?>"
              data-desc="Комфортна ігрова гарнітура з чистим звуком і стабільним бездротовим зʼєднанням."
              data-specs="Тип: Wireless|Форма: Over-Ear|Мікрофон: є|Звук: DTS"
            >Детальніше</button>
          </div>
        </div>
      </article>

    <!-- CARD 6 -->
    <article class="p-card"
        data-brand="bose"
        data-type="wireless"
        data-form="over-ear"
        data-mic="yes"
        data-anc="yes"
        data-price="7499">

        <div class="p-imgwrap">
            <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/headphones-6.png'); ?>"
            alt="Bose QuietComfort 45"
            loading="lazy">
        </div>

        <div class="p-body">
            <h3 class="p-title">Bose QuietComfort 45</h3>
            <p class="p-desc">Wireless • ANC • Over-Ear • Comfort</p>

            <div class="p-meta">
            <span class="pill">COMFORT</span>
            <span class="pill pill-outline">Music</span>
            </div>

            <div class="p-bottom">
            <div class="p-price">
                <div class="price">7 499 грн</div>
                <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
                data-title="Bose QuietComfort 45"
                data-price="7 499 грн"
                data-stock="В наявності • відправка 1–2 дні"
                data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/headphones-6.png'); ?>"
                data-desc="Максимальний комфорт та фірмове активне шумопоглинання від Bose — ідеальні для подорожей."
                data-specs="Тип: Wireless|Форма: Over-Ear|ANC: є|Мікрофон: є|Комфорт: максимум"
            >Детальніше</button>
            </div>
        </div>
    </article>


    </div><!-- /product-grid -->

  </div><!-- /container -->
</section>

<?php get_footer(); ?>
