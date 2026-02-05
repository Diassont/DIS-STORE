<?php
/*
Template Name: Catalog — Portable Systems
*/
get_header();
?>

<section class="section hero" style="padding-top:16px;">
  <div class="container">

    <div class="section-head">
      <div>
        <h1 class="page-title" style="margin-bottom:6px;">Портативні системи</h1>
        <p class="muted" style="margin:0;">
          Портативні колонки, радіо та party-системи — обери тип, батарею та підключення.
        </p>
      </div>

      <a class="head-link" href="<?php echo esc_url(home_url('/catalog/')); ?>">
        Весь каталог <span class="arr">→</span>
      </a>
    </div>

    <!-- FILTER -->
    <div class="filter-bar" id="filterBar" data-filter="portable-systems"></div>
    <p class="filter-empty muted" id="filterEmpty" hidden>Нічого не знайдено.</p>

    <!-- PRODUCTS -->
    <div class="product-grid" id="products" style="margin-top:14px;">

      <!-- CARD 1 -->
      <article class="p-card"
        data-type="speaker"
        data-battery="6h"
        data-connection="bt"
        data-price="1299">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/portable-1.png'); ?>"
            alt="Mini BT Speaker 6h"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Mini BT Speaker</h3>
          <p class="p-desc">Speaker • BT • 6h • компактна</p>

          <div class="p-meta">
            <span class="pill">BT</span>
            <span class="pill pill-outline">6h</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">1 299 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Mini BT Speaker"
              data-price="1 299 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/portable-1.png'); ?>"
              data-desc="Легка колонка для дому та прогулянок. Підключення Bluetooth."
              data-specs="Тип: Speaker|Батарея: 6h|Зв’язок: BT"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 2 -->
      <article class="p-card"
        data-type="speaker"
        data-battery="10h"
        data-connection="bt"
        data-price="2199">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/portable-2.png'); ?>"
            alt="Outdoor Speaker 10h"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Outdoor Speaker 10h</h3>
          <p class="p-desc">Speaker • BT • 10h • для вулиці</p>

          <div class="p-meta">
            <span class="pill">Outdoor</span>
            <span class="pill pill-outline">10h</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">2 199 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Outdoor Speaker 10h"
              data-price="2 199 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/portable-2.png'); ?>"
              data-desc="Колонка з підвищеною автономністю для подорожей та пікніків."
              data-specs="Тип: Speaker|Батарея: 10h|Зв’язок: BT"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 3 -->
      <article class="p-card"
        data-type="radio"
        data-battery="10h"
        data-connection="aux"
        data-price="1499">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/portable-3.png'); ?>"
            alt="Portable Radio AUX 10h"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Portable Radio</h3>
          <p class="p-desc">Radio • AUX • 10h • класика</p>

          <div class="p-meta">
            <span class="pill">Radio</span>
            <span class="pill pill-outline">AUX</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">1 499 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Portable Radio"
              data-price="1 499 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/portable-3.png'); ?>"
              data-desc="Портативне радіо для дому/дачі, з AUX для підключення телефону."
              data-specs="Тип: Radio|Батарея: 10h|Зв’язок: AUX"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 4 -->
      <article class="p-card"
        data-type="party"
        data-battery="6h"
        data-connection="usb"
        data-price="4999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/portable-4.png'); ?>"
            alt="Party Speaker USB 6h"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Party Speaker USB</h3>
          <p class="p-desc">Party • USB • 6h • гучна</p>

          <div class="p-meta">
            <span class="pill">Party</span>
            <span class="pill pill-outline">USB</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">4 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Party Speaker USB"
              data-price="4 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/portable-4.png'); ?>"
              data-desc="Party-система для вечірок: відтворення з флешки та потужний звук."
              data-specs="Тип: Party|Батарея: 6h|Зв’язок: USB"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 5 -->
      <article class="p-card"
        data-type="speaker"
        data-battery="20h"
        data-connection="bt"
        data-price="3999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/portable-5.png'); ?>"
            alt="LongPlay Speaker 20h"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">LongPlay Speaker 20h</h3>
          <p class="p-desc">Speaker • BT • 20h • автономність</p>

          <div class="p-meta">
            <span class="pill">20h</span>
            <span class="pill pill-outline">BT</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">3 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="LongPlay Speaker 20h"
              data-price="3 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/portable-5.png'); ?>"
              data-desc="Колонка з максимальною автономністю — ідеально в дорогу."
              data-specs="Тип: Speaker|Батарея: 20h|Зв’язок: BT"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 6 -->
      <article class="p-card"
        data-type="party"
        data-battery="10h"
        data-connection="bt"
        data-price="8999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/portable-6.png'); ?>"
            alt="Party System BT 10h"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Party System BT</h3>
          <p class="p-desc">Party • BT • 10h • потужна</p>

          <div class="p-meta">
            <span class="pill">Party</span>
            <span class="pill pill-outline">10h</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">8 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Party System BT"
              data-price="8 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/portable-6.png'); ?>"
              data-desc="Велика party-система з Bluetooth та довгою роботою від батареї."
              data-specs="Тип: Party|Батарея: 10h|Зв’язок: BT"
            >Детальніше</button>
          </div>
        </div>
      </article>

    </div><!-- /product-grid -->

  </div><!-- /container -->
</section>

<?php get_footer(); ?>
