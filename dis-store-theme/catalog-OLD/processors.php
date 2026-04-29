<?php
/*
Template Name: Catalog — Processors
*/
get_header();
?>

<section class="section hero" style="padding-top:16px;">
  <div class="container">

    <div class="section-head">
      <div>
        <h1 class="page-title" style="margin-bottom:6px;">Процесори</h1>
        <p class="muted" style="margin:0;">
          Обери CPU під свою платформу: бренд, socket, кількість ядер і бюджет.
        </p>
      </div>

      <a class="head-link" href="<?php echo esc_url(home_url('/catalog/')); ?>">
        Весь каталог <span class="arr">→</span>
      </a>
    </div>

    <!-- FILTER -->
    <div class="filter-bar" id="filterBar" data-filter="processors"></div>
    <p class="filter-empty muted" id="filterEmpty" hidden>Нічого не знайдено.</p>

    <!-- PRODUCTS -->
    <div class="product-grid" id="products" style="margin-top:14px;">

      <!-- CARD 1 -->
      <article class="p-card"
        data-brand="amd"
        data-socket="am4"
        data-cores="6"
        data-price="4499">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cpu-1.png'); ?>"
            alt="AMD Ryzen 5 5600"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">AMD Ryzen 5 5600</h3>
          <p class="p-desc">AM4 • 6 ядер • 12 потоків • Gaming/Work</p>

          <div class="p-meta">
            <span class="pill">Хіт</span>
            <span class="pill pill-outline">AM4</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">4 499 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="AMD Ryzen 5 5600"
              data-price="4 499 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cpu-1.png'); ?>"
              data-desc="Оптимальний 6-ядерний Ryzen для ігор та повсякденної роботи."
              data-specs="Бренд: AMD|Socket: AM4|Ядра: 6|Потоки: 12|Клас: універсальний"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 2 -->
      <article class="p-card"
        data-brand="amd"
        data-socket="am4"
        data-cores="8"
        data-price="7399">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cpu-2.png'); ?>"
            alt="AMD Ryzen 7 5800X"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">AMD Ryzen 7 5800X</h3>
          <p class="p-desc">AM4 • 8 ядер • 16 потоків • Performance</p>

          <div class="p-meta">
            <span class="pill">Performance</span>
            <span class="pill pill-outline">8C/16T</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">7 399 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="AMD Ryzen 7 5800X"
              data-price="7 399 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cpu-2.png'); ?>"
              data-desc="Потужний 8-ядерник для ігор, монтажу та важких задач."
              data-specs="Бренд: AMD|Socket: AM4|Ядра: 8|Потоки: 16|Клас: продуктивний"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 3 -->
      <article class="p-card"
        data-brand="amd"
        data-socket="am5"
        data-cores="8"
        data-price="10999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cpu-3.png'); ?>"
            alt="AMD Ryzen 7 7700"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">AMD Ryzen 7 7700</h3>
          <p class="p-desc">AM5 • 8 ядер • DDR5 • New Platform</p>

          <div class="p-meta">
            <span class="pill">New</span>
            <span class="pill pill-outline">AM5</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">10 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="AMD Ryzen 7 7700"
              data-price="10 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cpu-3.png'); ?>"
              data-desc="Сучасний Ryzen під AM5: сильна продуктивність та запас на майбутнє."
              data-specs="Бренд: AMD|Socket: AM5|Ядра: 8|Памʼять: DDR5|Клас: нове покоління"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 4 -->
      <article class="p-card"
        data-brand="amd"
        data-socket="am5"
        data-cores="12"
        data-price="17999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cpu-4.png'); ?>"
            alt="AMD Ryzen 9 7900X"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">AMD Ryzen 9 7900X</h3>
          <p class="p-desc">AM5 • 12 ядер • 24 потоки • Creator</p>

          <div class="p-meta">
            <span class="pill">Creator</span>
            <span class="pill pill-outline">12C/24T</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">17 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="AMD Ryzen 9 7900X"
              data-price="17 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cpu-4.png'); ?>"
              data-desc="Для рендеру, монтажу та важких робочих задач — багато ядер і потужність."
              data-specs="Бренд: AMD|Socket: AM5|Ядра: 12|Потоки: 24|Клас: робочий"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 5 -->
      <article class="p-card"
        data-brand="intel"
        data-socket="lga1700"
        data-cores="10"
        data-price="8999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cpu-5.png'); ?>"
            alt="Intel Core i5-13600K"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Intel Core i5-13600K</h3>
          <p class="p-desc">LGA1700 • 14 ядер (P+E) • Gaming</p>

          <div class="p-meta">
            <span class="pill">Gaming</span>
            <span class="pill pill-outline">Intel</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">8 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Intel Core i5-13600K"
              data-price="8 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cpu-5.png'); ?>"
              data-desc="Топовий i5 для ігор: висока частота та сильна продуктивність."
              data-specs="Бренд: Intel|Socket: LGA1700|Ядра: 14 (P+E)|Клас: Gaming|Серія: Core i5"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 6 -->
      <article class="p-card"
        data-brand="intel"
        data-socket="lga1700"
        data-cores="16"
        data-price="21999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cpu-6.png'); ?>"
            alt="Intel Core i9-13900K"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Intel Core i9-13900K</h3>
          <p class="p-desc">LGA1700 • 24 ядер (P+E) • High-End</p>

          <div class="p-meta">
            <span class="pill">High-End</span>
            <span class="pill pill-outline">i9</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">21 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Intel Core i9-13900K"
              data-price="21 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cpu-6.png'); ?>"
              data-desc="Максимальна продуктивність для топових збірок, ігор та важких задач."
              data-specs="Бренд: Intel|Socket: LGA1700|Ядра: 24 (P+E)|Клас: High-End|Серія: Core i9"
            >Детальніше</button>
          </div>
        </div>
      </article>

    </div><!-- /product-grid -->

  </div><!-- /container -->
</section>

<?php get_footer(); ?>
