<?php
/*
Template Name: Catalog — Motherboards
*/
get_header();
?>

<section class="section hero" style="padding-top:16px;">
  <div class="container">

    <div class="section-head">
      <div>
        <h1 class="page-title" style="margin-bottom:6px;">Материнські плати</h1>
        <p class="muted" style="margin:0;">
          Обирай плату під свій процесор: Socket, чипсет і форм-фактор — усе у фільтрі.
        </p>
      </div>

      <a class="head-link" href="<?php echo esc_url(home_url('/catalog/')); ?>">
        Весь каталог <span class="arr">→</span>
      </a>
    </div>

    <!-- FILTER -->
    <div class="filter-bar" id="filterBar" data-filter="motherboards"></div>
    <p class="filter-empty muted" id="filterEmpty" hidden>Нічого не знайдено.</p>

    <!-- PRODUCTS -->
    <div class="product-grid" id="products" style="margin-top:14px;">

      <!-- CARD 1 -->
      <article class="p-card"
        data-socket="am4"
        data-chipset="b550"
        data-form="atx"
        data-price="5499">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mb-1.png'); ?>"
            alt="ASUS TUF GAMING B550-PLUS"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">ASUS TUF GAMING B550-PLUS</h3>
          <p class="p-desc">AM4 • B550 • ATX • Gaming</p>

          <div class="p-meta">
            <span class="pill">Gaming</span>
            <span class="pill pill-outline">ATX</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">5 499 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="ASUS TUF GAMING B550-PLUS"
              data-price="5 499 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mb-1.png'); ?>"
              data-desc="Надійна плата під Ryzen AM4 з хорошим живленням та охолодженням VRM."
              data-specs="Socket: AM4|Чипсет: B550|Форм-фактор: ATX|PCIe: 4.0|Призначення: Gaming"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 2 -->
      <article class="p-card"
        data-socket="am4"
        data-chipset="x570"
        data-form="atx"
        data-price="7999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mb-2.png'); ?>"
            alt="MSI MPG X570 GAMING PLUS"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">MSI MPG X570 GAMING PLUS</h3>
          <p class="p-desc">AM4 • X570 • ATX • PCIe 4.0</p>

          <div class="p-meta">
            <span class="pill">TOP</span>
            <span class="pill pill-outline">X570</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">7 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="MSI MPG X570 GAMING PLUS"
              data-price="7 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mb-2.png'); ?>"
              data-desc="Чипсет X570 — для потужних Ryzen та максимальної кількості ліній PCIe."
              data-specs="Socket: AM4|Чипсет: X570|Форм-фактор: ATX|PCIe: 4.0|Охолодження: посилене"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 3 -->
      <article class="p-card"
        data-socket="am5"
        data-chipset="b650"
        data-form="atx"
        data-price="8999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mb-3.png'); ?>"
            alt="Gigabyte B650 AORUS ELITE AX"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Gigabyte B650 AORUS ELITE AX</h3>
          <p class="p-desc">AM5 • B650 • ATX • Wi-Fi</p>

          <div class="p-meta">
            <span class="pill">New</span>
            <span class="pill pill-outline">AM5</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">8 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Gigabyte B650 AORUS ELITE AX"
              data-price="8 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mb-3.png'); ?>"
              data-desc="Сучасна плата під Ryzen AM5 з підтримкою DDR5 та хорошим набором інтерфейсів."
              data-specs="Socket: AM5|Чипсет: B650|Форм-фактор: ATX|Памʼять: DDR5|Wi-Fi: так"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 4 -->
      <article class="p-card"
        data-socket="am5"
        data-chipset="b650"
        data-form="matx"
        data-price="6999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mb-4.png'); ?>"
            alt="ASRock B650M Pro RS"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">ASRock B650M Pro RS</h3>
          <p class="p-desc">AM5 • B650 • mATX • DDR5</p>

          <div class="p-meta">
            <span class="pill">mATX</span>
            <span class="pill pill-outline">DDR5</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">6 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="ASRock B650M Pro RS"
              data-price="6 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mb-4.png'); ?>"
              data-desc="Компактна AM5 плата під збірку в корпусі mATX."
              data-specs="Socket: AM5|Чипсет: B650|Форм-фактор: mATX|Памʼять: DDR5|Призначення: універсальна"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 5 -->
      <article class="p-card"
        data-socket="lga1700"
        data-chipset="b760"
        data-form="atx"
        data-price="6299">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mb-5.png'); ?>"
            alt="MSI PRO B760-P WIFI"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">MSI PRO B760-P WIFI</h3>
          <p class="p-desc">LGA1700 • B760 • ATX • Wi-Fi</p>

          <div class="p-meta">
            <span class="pill">Work</span>
            <span class="pill pill-outline">Wi-Fi</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">6 299 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="MSI PRO B760-P WIFI"
              data-price="6 299 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mb-5.png'); ?>"
              data-desc="Плата під Intel LGA1700: стабільна, зручна для роботи та навчання."
              data-specs="Socket: LGA1700|Чипсет: B760|Форм-фактор: ATX|Wi-Fi: так|Памʼять: DDR4/DDR5 (залежить від версії)"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 6 -->
      <article class="p-card"
        data-socket="lga1700"
        data-chipset="z790"
        data-form="atx"
        data-price="12999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mb-6.png'); ?>"
            alt="ASUS ROG STRIX Z790-F GAMING"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">ASUS ROG STRIX Z790-F GAMING</h3>
          <p class="p-desc">LGA1700 • Z790 • ATX • High-End</p>

          <div class="p-meta">
            <span class="pill">High-End</span>
            <span class="pill pill-outline">Z790</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">12 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="ASUS ROG STRIX Z790-F GAMING"
              data-price="12 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mb-6.png'); ?>"
              data-desc="Топова плата під Intel для потужних збірок та розгону."
              data-specs="Socket: LGA1700|Чипсет: Z790|Форм-фактор: ATX|Клас: Gaming/OC|Інтерфейси: розширені"
            >Детальніше</button>
          </div>
        </div>
      </article>

    </div><!-- /product-grid -->

  </div><!-- /container -->
</section>

<?php get_footer(); ?>
