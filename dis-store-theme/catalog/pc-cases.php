<?php
/*
Template Name: Catalog — PC Cases
*/
get_header();
?>

<section class="section hero" style="padding-top:16px;">
  <div class="container">

    <div class="section-head">
      <div>
        <h1 class="page-title" style="margin-bottom:6px;">Корпуси</h1>
        <p class="muted" style="margin:0;">
          ATX / mATX / ITX — обери розмір, наявність скла та ціну.
        </p>
      </div>

      <a class="head-link" href="<?php echo esc_url(home_url('/catalog/')); ?>">
        Весь каталог <span class="arr">→</span>
      </a>
    </div>

    <!-- FILTER -->
    <div class="filter-bar" id="filterBar" data-filter="pc-cases"></div>
    <p class="filter-empty muted" id="filterEmpty" hidden>Нічого не знайдено.</p>

    <!-- PRODUCTS -->
    <div class="product-grid" id="products" style="margin-top:14px;">

      <!-- CARD 1 -->
      <article class="p-card"
        data-form="atx"
        data-size="mid"
        data-glass="yes"
        data-price="2799">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/case-1.png'); ?>"
            alt="NZXT H5 Flow"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">NZXT H5 Flow</h3>
          <p class="p-desc">ATX • Mid Tower • Скло • Airflow</p>

          <div class="p-meta">
            <span class="pill">Airflow</span>
            <span class="pill pill-outline">ATX</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">2 799 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="NZXT H5 Flow"
              data-price="2 799 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/case-1.png'); ?>"
              data-desc="Корпус з хорошим продувом та сучасним дизайном."
              data-specs="Форм-фактор: ATX|Розмір: Mid|Скло: Так"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 2 -->
      <article class="p-card"
        data-form="matx"
        data-size="mini"
        data-glass="yes"
        data-price="1899">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/case-2.png'); ?>"
            alt="Deepcool MATREXX 40"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Deepcool MATREXX 40</h3>
          <p class="p-desc">mATX • Mini Tower • Скло</p>

          <div class="p-meta">
            <span class="pill">mATX</span>
            <span class="pill pill-outline">Glass</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">1 899 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Deepcool MATREXX 40"
              data-price="1 899 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/case-2.png'); ?>"
              data-desc="Компактний корпус під mATX з боковою скляною панеллю."
              data-specs="Форм-фактор: mATX|Розмір: Mini|Скло: Так"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 3 -->
      <article class="p-card"
        data-form="atx"
        data-size="full"
        data-glass="yes"
        data-price="4999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/case-3.png'); ?>"
            alt="Lian Li O11 Dynamic"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Lian Li O11 Dynamic</h3>
          <p class="p-desc">ATX • Full Tower • Скло • Premium</p>

          <div class="p-meta">
            <span class="pill">Premium</span>
            <span class="pill pill-outline">Full</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">4 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Lian Li O11 Dynamic"
              data-price="4 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/case-3.png'); ?>"
              data-desc="Стильний корпус для потужних збірок та водяного охолодження."
              data-specs="Форм-фактор: ATX|Розмір: Full|Скло: Так"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 4 -->
      <article class="p-card"
        data-form="itx"
        data-size="mini"
        data-glass="no"
        data-price="2599">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/case-4.png'); ?>"
            alt="Cooler Master NR200"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Cooler Master NR200</h3>
          <p class="p-desc">ITX • Mini • Без скла • SFF</p>

          <div class="p-meta">
            <span class="pill">SFF</span>
            <span class="pill pill-outline">ITX</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">2 599 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Cooler Master NR200"
              data-price="2 599 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/case-4.png'); ?>"
              data-desc="Компактний ITX корпус для маленьких і потужних збірок."
              data-specs="Форм-фактор: ITX|Розмір: Mini|Скло: Ні"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 5 -->
      <article class="p-card"
        data-form="atx"
        data-size="mid"
        data-glass="no"
        data-price="1599">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/case-5.png'); ?>"
            alt="Zalman S2"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Zalman S2</h3>
          <p class="p-desc">ATX • Mid Tower • Без скла • бюджет</p>

          <div class="p-meta">
            <span class="pill">Budget</span>
            <span class="pill pill-outline">ATX</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">1 599 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Zalman S2"
              data-price="1 599 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/case-5.png'); ?>"
              data-desc="Недорогий корпус для базових збірок з нормальним продувом."
              data-specs="Форм-фактор: ATX|Розмір: Mid|Скло: Ні"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 6 -->
      <article class="p-card"
        data-form="matx"
        data-size="mid"
        data-glass="yes"
        data-price="2299">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/case-6.png'); ?>"
            alt="MSI MAG Forge 100R"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">MSI MAG Forge 100R</h3>
          <p class="p-desc">mATX • Mid Tower • Скло • RGB</p>

          <div class="p-meta">
            <span class="pill">RGB</span>
            <span class="pill pill-outline">mATX</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">2 299 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="MSI MAG Forge 100R"
              data-price="2 299 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/case-6.png'); ?>"
              data-desc="Корпус зі склом та RGB-вентиляторами для красивої збірки."
              data-specs="Форм-фактор: mATX|Розмір: Mid|Скло: Так"
            >Детальніше</button>
          </div>
        </div>
      </article>

    </div><!-- /product-grid -->

  </div><!-- /container -->
</section>

<?php get_footer(); ?>
