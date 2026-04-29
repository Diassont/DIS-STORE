<?php
/*
Template Name: Catalog — Cooling Systems
*/
get_header();
?>

<section class="section hero" style="padding-top:16px;">
  <div class="container">

    <div class="section-head">
      <div>
        <h1 class="page-title" style="margin-bottom:6px;">Системи охолодження</h1>
        <p class="muted" style="margin:0;">
          Повітряні кулери та водянки (AIO) — обери під свій сокет і бюджет.
        </p>
      </div>

      <a class="head-link" href="<?php echo esc_url(home_url('/catalog/')); ?>">
        Весь каталог <span class="arr">→</span>
      </a>
    </div>

    <!-- FILTER -->
    <div class="filter-bar" id="filterBar" data-filter="cooling-systems"></div>
    <p class="filter-empty muted" id="filterEmpty" hidden>Нічого не знайдено.</p>

    <!-- PRODUCTS -->
    <div class="product-grid" id="products" style="margin-top:14px;">

      <!-- CARD 1 -->
      <article class="p-card"
        data-type="air"
        data-socket="am4"
        data-size="tower"
        data-price="1399">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cool-1.png'); ?>"
            alt="Deepcool GAMMAXX 400"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Deepcool GAMMAXX 400</h3>
          <p class="p-desc">Air • Tower • AM4 • бюджетний</p>

          <div class="p-meta">
            <span class="pill">Air</span>
            <span class="pill pill-outline">Tower</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">1 399 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Deepcool GAMMAXX 400"
              data-price="1 399 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cool-1.png'); ?>"
              data-desc="Надійний баштовий кулер для повсякденних задач та ігор."
              data-specs="Тип: Air|Розмір: Tower|Socket: AM4"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 2 -->
      <article class="p-card"
        data-type="air"
        data-socket="lga1700"
        data-size="tower"
        data-price="3299">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cool-2.png'); ?>"
            alt="be quiet! Pure Rock 2"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">be quiet! Pure Rock 2</h3>
          <p class="p-desc">Air • Tower • LGA1700 • тихий</p>

          <div class="p-meta">
            <span class="pill">Quiet</span>
            <span class="pill pill-outline">Air</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">3 299 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="be quiet! Pure Rock 2"
              data-price="3 299 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cool-2.png'); ?>"
              data-desc="Тихий кулер з хорошим запасом під i5/i7 та Ryzen."
              data-specs="Тип: Air|Розмір: Tower|Socket: LGA1700"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 3 -->
      <article class="p-card"
        data-type="aio"
        data-socket="am5"
        data-size="240"
        data-price="4599">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cool-3.png'); ?>"
            alt="Deepcool LS520 240mm"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Deepcool LS520 (240mm)</h3>
          <p class="p-desc">AIO • 240mm • AM5 • performance</p>

          <div class="p-meta">
            <span class="pill">AIO</span>
            <span class="pill pill-outline">240mm</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">4 599 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Deepcool LS520 (240mm)"
              data-price="4 599 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cool-3.png'); ?>"
              data-desc="Водяне охолодження 240mm для потужних CPU та тихої роботи."
              data-specs="Тип: AIO|Розмір: 240mm|Socket: AM5"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 4 -->
      <article class="p-card"
        data-type="aio"
        data-socket="lga1700"
        data-size="360"
        data-price="6299">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cool-4.png'); ?>"
            alt="Arctic Liquid Freezer II 360"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Arctic Liquid Freezer II (360)</h3>
          <p class="p-desc">AIO • 360mm • LGA1700 • топ</p>

          <div class="p-meta">
            <span class="pill">AIO</span>
            <span class="pill pill-outline">360mm</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">6 299 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Arctic Liquid Freezer II (360)"
              data-price="6 299 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cool-4.png'); ?>"
              data-desc="Потужна 360mm AIO для гарячих процесорів і розгону."
              data-specs="Тип: AIO|Розмір: 360mm|Socket: LGA1700"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 5 -->
      <article class="p-card"
        data-type="air"
        data-socket="am5"
        data-size="tower"
        data-price="5299">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cool-5.png'); ?>"
            alt="Noctua NH-U12S"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Noctua NH-U12S</h3>
          <p class="p-desc">Air • Tower • AM5 • premium</p>

          <div class="p-meta">
            <span class="pill">Premium</span>
            <span class="pill pill-outline">Air</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">5 299 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Noctua NH-U12S"
              data-price="5 299 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cool-5.png'); ?>"
              data-desc="Один із найкращих повітряних кулерів по тиші та якості."
              data-specs="Тип: Air|Розмір: Tower|Socket: AM5"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 6 -->
      <article class="p-card"
        data-type="aio"
        data-socket="am4"
        data-size="120"
        data-price="2999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cool-6.png'); ?>"
            alt="Cooler Master ML120L"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Cooler Master ML120L</h3>
          <p class="p-desc">AIO • 120mm • AM4 • compact</p>

          <div class="p-meta">
            <span class="pill">AIO</span>
            <span class="pill pill-outline">120mm</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">2 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Cooler Master ML120L"
              data-price="2 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cool-6.png'); ?>"
              data-desc="Компактна водянка 120mm — коли башта не влазить у корпус."
              data-specs="Тип: AIO|Розмір: 120mm|Socket: AM4"
            >Детальніше</button>
          </div>
        </div>
      </article>

    </div><!-- /product-grid -->

  </div><!-- /container -->
</section>

<?php get_footer(); ?>
