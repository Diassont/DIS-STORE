<?php
/*
Template Name: Catalog — Printers
*/
get_header();
?>

<section class="section hero" style="padding-top:16px;">
  <div class="container">

    <div class="section-head">
      <div>
        <h1 class="page-title" style="margin-bottom:6px;">Принтери</h1>
        <p class="muted" style="margin:0;">
          Лазерні та струменеві — чорно-білі або кольорові. Обери потрібний формат.
        </p>
      </div>

      <a class="head-link" href="<?php echo esc_url(home_url('/catalog/')); ?>">
        Весь каталог <span class="arr">→</span>
      </a>
    </div>

    <!-- FILTER -->
    <div class="filter-bar" id="filterBar" data-filter="printers"></div>
    <p class="filter-empty muted" id="filterEmpty" hidden>Нічого не знайдено.</p>

    <!-- PRODUCTS -->
    <div class="product-grid" id="products" style="margin-top:14px;">

      <!-- CARD 1 -->
      <article class="p-card"
        data-type="laser"
        data-color="mono"
        data-format="a4"
        data-price="4199">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/printer-1.png'); ?>"
            alt="HP Laser 107a"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">HP Laser 107a</h3>
          <p class="p-desc">Laser • Mono • A4 • компактний</p>

          <div class="p-meta">
            <span class="pill">Laser</span>
            <span class="pill pill-outline">A4</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">4 199 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="HP Laser 107a"
              data-price="4 199 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/printer-1.png'); ?>"
              data-desc="Надійний монохромний лазерний принтер для дому та офісу."
              data-specs="Тип: Laser|Колір: Mono|Формат: A4"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 2 -->
      <article class="p-card"
        data-type="laser"
        data-color="mono"
        data-format="a4"
        data-price="6999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/printer-2.png'); ?>"
            alt="Brother HL-L2350DW"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Brother HL-L2350DW</h3>
          <p class="p-desc">Laser • Mono • A4 • Wi-Fi</p>

          <div class="p-meta">
            <span class="pill">Wi-Fi</span>
            <span class="pill pill-outline">Mono</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">6 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Brother HL-L2350DW"
              data-price="6 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/printer-2.png'); ?>"
              data-desc="Швидкий моно принтер із Wi-Fi та автоматичним двостороннім друком."
              data-specs="Тип: Laser|Колір: Mono|Формат: A4"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 3 -->
      <article class="p-card"
        data-type="inkjet"
        data-color="color"
        data-format="a4"
        data-price="5799">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/printer-3.png'); ?>"
            alt="Epson EcoTank L1250"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Epson EcoTank L1250</h3>
          <p class="p-desc">Inkjet • Color • A4 • EcoTank</p>

          <div class="p-meta">
            <span class="pill">EcoTank</span>
            <span class="pill pill-outline">Color</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">5 799 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Epson EcoTank L1250"
              data-price="5 799 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/printer-3.png'); ?>"
              data-desc="Струменевий принтер з економною системою чорнил для частого друку."
              data-specs="Тип: Inkjet|Колір: Color|Формат: A4"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 4 -->
      <article class="p-card"
        data-type="laser"
        data-color="color"
        data-format="a4"
        data-price="12999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/printer-4.png'); ?>"
            alt="HP Color Laser 150a"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">HP Color Laser 150a</h3>
          <p class="p-desc">Laser • Color • A4 • офіс</p>

          <div class="p-meta">
            <span class="pill">Color</span>
            <span class="pill pill-outline">Laser</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">12 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="HP Color Laser 150a"
              data-price="12 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/printer-4.png'); ?>"
              data-desc="Кольоровий лазерний принтер для офісних документів та графіки."
              data-specs="Тип: Laser|Колір: Color|Формат: A4"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 5 -->
      <article class="p-card"
        data-type="inkjet"
        data-color="color"
        data-format="a4"
        data-price="3899">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/printer-5.png'); ?>"
            alt="Canon PIXMA TS3340"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Canon PIXMA TS3340</h3>
          <p class="p-desc">Inkjet • Color • A4 • домашній</p>

          <div class="p-meta">
            <span class="pill">Home</span>
            <span class="pill pill-outline">A4</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">3 899 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Canon PIXMA TS3340"
              data-price="3 899 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/printer-5.png'); ?>"
              data-desc="Доступний кольоровий струменевий принтер для дому та навчання."
              data-specs="Тип: Inkjet|Колір: Color|Формат: A4"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 6 -->
      <article class="p-card"
        data-type="laser"
        data-color="mono"
        data-format="a3"
        data-price="18999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/printer-6.png'); ?>"
            alt="Kyocera A3 Mono Printer"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Kyocera A3 Mono</h3>
          <p class="p-desc">Laser • Mono • A3 • для бізнесу</p>

          <div class="p-meta">
            <span class="pill">A3</span>
            <span class="pill pill-outline">Business</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">18 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Kyocera A3 Mono"
              data-price="18 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/printer-6.png'); ?>"
              data-desc="Монохромний лазерний принтер формату A3 для офісів та поліграфії."
              data-specs="Тип: Laser|Колір: Mono|Формат: A3"
            >Детальніше</button>
          </div>
        </div>
      </article>

    </div><!-- /product-grid -->

  </div><!-- /container -->
</section>

<?php get_footer(); ?>
