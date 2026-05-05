<?php
/*
Template Name: Catalog — Power Supplies
*/
get_header();
?>

<section class="section hero" style="padding-top:16px;">
  <div class="container">

    <div class="section-head">
      <div>
        <h1 class="page-title" style="margin-bottom:6px;">Блоки живлення</h1>
        <p class="muted" style="margin:0;">
          Надійні блоки живлення для офісних, ігрових та потужних ПК.
        </p>
      </div>

      <a class="head-link" href="<?php echo esc_url(home_url('/catalog/')); ?>">
        Весь каталог <span class="arr">→</span>
      </a>
    </div>

    <!-- FILTER -->
    <div class="filter-bar" id="filterBar" data-filter="power-supplies"></div>
    <p class="filter-empty muted" id="filterEmpty" hidden>Нічого не знайдено.</p>

    <!-- PRODUCTS -->
    <div class="product-grid" id="products" style="margin-top:14px;">

      <!-- CARD 1 -->
      <article class="p-card"
        data-watt="500"
        data-cert="bronze"
        data-mod="no"
        data-price="1699">

        <div class="p-imgwrap">
          <img class="p-img" src="<?php echo esc_url(get_template_directory_uri().'/assets/img/psu-1.png'); ?>" alt="Chieftec Proton 500W">
        </div>

        <div class="p-body">
          <h3 class="p-title">Chieftec Proton 500W</h3>
          <p class="p-desc">500W • 80+ Bronze • Non-Modular</p>

          <div class="p-meta">
            <span class="pill">Bronze</span>
            <span class="pill pill-outline">500W</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">1 699 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Chieftec Proton 500W"
              data-price="1 699 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri().'/assets/img/psu-1.png'); ?>"
              data-desc="Надійний блок живлення для офісних та домашніх ПК."
              data-specs="Потужність: 500W|Сертифікат: 80+ Bronze|Модульність: Ні"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 2 -->
      <article class="p-card"
        data-watt="650"
        data-cert="bronze"
        data-mod="yes"
        data-price="2499">

        <div class="p-imgwrap">
          <img class="p-img" src="<?php echo esc_url(get_template_directory_uri().'/assets/img/psu-2.png'); ?>" alt="Corsair CX650M">
        </div>

        <div class="p-body">
          <h3 class="p-title">Corsair CX650M</h3>
          <p class="p-desc">650W • 80+ Bronze • Semi-Modular</p>

          <div class="p-meta">
            <span class="pill">650W</span>
            <span class="pill pill-outline">Semi-Mod</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">2 499 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Corsair CX650M"
              data-price="2 499 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri().'/assets/img/psu-2.png'); ?>"
              data-desc="Популярний блок живлення з частковою модульністю."
              data-specs="Потужність: 650W|Сертифікат: 80+ Bronze|Модульність: Так"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 3 -->
      <article class="p-card"
        data-watt="750"
        data-cert="gold"
        data-mod="yes"
        data-price="3999">

        <div class="p-imgwrap">
          <img class="p-img" src="<?php echo esc_url(get_template_directory_uri().'/assets/img/psu-3.png'); ?>" alt="Seasonic Focus GX-750">
        </div>

        <div class="p-body">
          <h3 class="p-title">Seasonic Focus GX-750</h3>
          <p class="p-desc">750W • 80+ Gold • Full Modular</p>

          <div class="p-meta">
            <span class="pill">Gold</span>
            <span class="pill pill-outline">750W</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">3 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Seasonic Focus GX-750"
              data-price="3 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri().'/assets/img/psu-3.png'); ?>"
              data-desc="Преміальний блок живлення з повною модульністю."
              data-specs="Потужність: 750W|Сертифікат: 80+ Gold|Модульність: Так"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 4 -->
      <article class="p-card"
        data-watt="850"
        data-cert="gold"
        data-mod="yes"
        data-price="4699">

        <div class="p-imgwrap">
          <img class="p-img" src="<?php echo esc_url(get_template_directory_uri().'/assets/img/psu-4.png'); ?>" alt="be quiet! Pure Power 12 M 850W">
        </div>

        <div class="p-body">
          <h3 class="p-title">be quiet! Pure Power 12 M 850W</h3>
          <p class="p-desc">850W • 80+ Gold • ATX 3.0</p>

          <div class="p-meta">
            <span class="pill">ATX 3.0</span>
            <span class="pill pill-outline">850W</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">4 699 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="be quiet! Pure Power 12 M 850W"
              data-price="4 699 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri().'/assets/img/psu-4.png'); ?>"
              data-desc="Сучасний блок живлення для RTX 40-серії."
              data-specs="Потужність: 850W|Сертифікат: 80+ Gold|Модульність: Так"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 5 -->
      <article class="p-card"
        data-watt="600"
        data-cert="bronze"
        data-mod="no"
        data-price="1899">

        <div class="p-imgwrap">
          <img class="p-img" src="<?php echo esc_url(get_template_directory_uri().'/assets/img/psu-5.png'); ?>" alt="Deepcool PK600D">
        </div>

        <div class="p-body">
          <h3 class="p-title">Deepcool PK600D</h3>
          <p class="p-desc">600W • 80+ Bronze • Budget</p>

          <div class="p-meta">
            <span class="pill">Budget</span>
            <span class="pill pill-outline">600W</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">1 899 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Deepcool PK600D"
              data-price="1 899 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri().'/assets/img/psu-5.png'); ?>"
              data-desc="Недорогий блок живлення для базових систем."
              data-specs="Потужність: 600W|Сертифікат: 80+ Bronze|Модульність: Ні"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 6 -->
      <article class="p-card"
        data-watt="1000"
        data-cert="gold"
        data-mod="yes"
        data-price="6999">

        <div class="p-imgwrap">
          <img class="p-img" src="<?php echo esc_url(get_template_directory_uri().'/assets/img/psu-6.png'); ?>" alt="MSI MPG A1000G">
        </div>

        <div class="p-body">
          <h3 class="p-title">MSI MPG A1000G</h3>
          <p class="p-desc">1000W • 80+ Gold • Full Modular</p>

          <div class="p-meta">
            <span class="pill">1000W</span>
            <span class="pill pill-outline">Gold</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">6 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="MSI MPG A1000G"
              data-price="6 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri().'/assets/img/psu-6.png'); ?>"
              data-desc="Потужний блок живлення для топових конфігурацій."
              data-specs="Потужність: 1000W|Сертифікат: 80+ Gold|Модульність: Так"
            >Детальніше</button>
          </div>
        </div>
      </article>

    </div>
  </div>
</section>

<?php get_footer(); ?>
