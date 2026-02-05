<?php
/*
Template Name: Catalog — Keyboards
*/
get_header();
?>

<section class="section hero" style="padding-top:16px;">
  <div class="container">

    <div class="section-head">
      <div>
        <h1 class="page-title" style="margin-bottom:6px;">Клавіатури</h1>
        <p class="muted" style="margin:0;">
          Механіка чи мембрана, дротова або бездротова — обирай клавіатуру під свій стиль. Фільтр допоможе швидко знайти потрібну.
        </p>
      </div>

      <a class="head-link" href="<?php echo esc_url(home_url('/catalog/')); ?>">
        Весь каталог <span class="arr">→</span>
      </a>
    </div>

    <!-- ✅ FILTER (генерується JS по data-filter) -->
    <div class="filter-bar" id="filterBar" data-filter="keyboards"></div>
    <p class="filter-empty muted" id="filterEmpty" hidden>Нічого не знайдено за фільтром.</p>

    <!-- ✅ PRODUCTS -->
    <div class="product-grid" id="products" style="margin-top:14px;">

      <!-- CARD 1 -->
      <article class="p-card" data-brand="logitech" data-type="mechanical" data-layout="ua" data-connection="wireless" data-backlight="rgb" data-price="4499">
        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/keyboard-1.png'); ?>"
            alt="Logitech MX Mechanical"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Logitech MX Mechanical</h3>
          <p class="p-desc">Механічна • Wireless • RGB • UA/EN</p>

          <div class="p-meta">
            <span class="pill">ТОП</span>
            <span class="pill pill-outline">Work</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">4 499 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Logitech MX Mechanical"
              data-price="4 499 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/keyboard-1.png'); ?>"
              data-desc="Комфортна механіка для роботи: тихий хід, якісна збірка та зручне підключення без дротів."
              data-specs="Тип: механічна|Підключення: wireless|Підсвітка: RGB|Розкладка: UA/EN|Призначення: Work"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 2 -->
      <article class="p-card" data-brand="hyperx" data-type="mechanical" data-layout="us" data-connection="wired" data-backlight="rgb" data-price="3199">
        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/keyboard-2.png'); ?>"
            alt="HyperX Alloy Origins"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">HyperX Alloy Origins</h3>
          <p class="p-desc">Механічна • Wired • RGB • Gaming</p>

          <div class="p-meta">
            <span class="pill">Хіт</span>
            <span class="pill pill-outline">Gaming</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">3 199 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="HyperX Alloy Origins"
              data-price="3 199 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/keyboard-2.png'); ?>"
              data-desc="Надійна ігрова механіка: міцний корпус, стабільні свічі та яскраве RGB."
              data-specs="Тип: механічна|Підключення: wired|Підсвітка: RGB|Розкладка: US|Призначення: Gaming"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 3 -->
      <article class="p-card" data-brand="razer" data-type="mechanical" data-layout="us" data-connection="wired" data-backlight="rgb" data-price="5999">
        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/keyboard-3.png'); ?>"
            alt="Razer BlackWidow V3"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Razer BlackWidow V3</h3>
          <p class="p-desc">Механічна • Wired • RGB • eSports</p>

          <div class="p-meta">
            <span class="pill">PRO</span>
            <span class="pill pill-outline">eSports</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">5 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Razer BlackWidow V3"
              data-price="5 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/keyboard-3.png'); ?>"
              data-desc="Швидка механіка для геймінгу: точні натискання, RGB-підсвітка та фірмовий стиль."
              data-specs="Тип: механічна|Підключення: wired|Підсвітка: RGB|Розкладка: US|Клас: eSports"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 4 -->
      <article class="p-card" data-brand="a4tech" data-type="membrane" data-layout="ua" data-connection="wired" data-backlight="none" data-price="699">
        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/keyboard-4.png'); ?>"
            alt="A4Tech Office Keyboard"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">A4Tech Office Keyboard</h3>
          <p class="p-desc">Мембранна • Wired • UA/EN • Тиха</p>

          <div class="p-meta">
            <span class="pill">Бюджет</span>
            <span class="pill pill-outline">Office</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">699 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="A4Tech Office Keyboard"
              data-price="699 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/keyboard-4.png'); ?>"
              data-desc="Проста й надійна клавіатура для офісу та навчання: тихий набір і класичний формат."
              data-specs="Тип: мембранна|Підключення: wired|Підсвітка: немає|Розкладка: UA/EN|Призначення: Office"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 5 -->
      <article class="p-card" data-brand="redragon" data-type="mechanical" data-layout="us" data-connection="wired" data-backlight="rgb" data-price="1799">
        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/keyboard-5.png'); ?>"
            alt="Redragon Kumara"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Redragon Kumara</h3>
          <p class="p-desc">Механічна • Wired • RGB • Компакт</p>

          <div class="p-meta">
            <span class="pill">Хіт</span>
            <span class="pill pill-outline">Budget</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">1 799 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Redragon Kumara"
              data-price="1 799 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/keyboard-5.png'); ?>"
              data-desc="Компактна механічна клавіатура з хорошим відгуком і RGB — топ за свої гроші."
              data-specs="Тип: механічна|Підключення: wired|Підсвітка: RGB|Формат: TKL|Призначення: Gaming"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 6 -->
      <article class="p-card" data-brand="keychron" data-type="mechanical" data-layout="us" data-connection="wireless" data-backlight="white" data-price="3899">
        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/keyboard-6.png'); ?>"
            alt="Keychron K2"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Keychron K2</h3>
          <p class="p-desc">Механічна • Wireless • White backlight</p>

          <div class="p-meta">
            <span class="pill">ТОП</span>
            <span class="pill pill-outline">Work</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">3 899 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Keychron K2"
              data-price="3 899 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/keyboard-6.png'); ?>"
              data-desc="Механіка для роботи/навчання: Bluetooth, компактний формат і приємний хід клавіш."
              data-specs="Тип: механічна|Підключення: wireless|Підсвітка: біла|Формат: 75%|Розкладка: US"
            >Детальніше</button>
          </div>
        </div>
      </article>

    </div><!-- /product-grid -->

  </div><!-- /container -->
</section>

<?php get_footer(); ?>
