<?php
/*
Template Name: Catalog — Computers
*/
get_header();
?>

<section class="section hero" style="padding-top:16px;">
  <div class="container">

    <div class="section-head">
      <div>
        <h1 class="page-title" style="margin-bottom:6px;">Компʼютери</h1>
        <p class="muted" style="margin:0;">
          Готові ПК для ігор, навчання та роботи — обери конфігурацію через фільтр і швидко знайди потрібний варіант.
        </p>
      </div>

      <a class="head-link" href="<?php echo esc_url(home_url('/catalog/')); ?>">
        Весь каталог <span class="arr">→</span>
      </a>
    </div>

    <!-- ✅ FILTER (генерується JS по data-filter) -->
    <div class="filter-bar" id="filterBar" data-filter="computers"></div>
    <p class="filter-empty muted" id="filterEmpty" hidden>Нічого не знайдено за фільтром.</p>

    <!-- ✅ PRODUCTS -->
    <div class="product-grid" id="products" style="margin-top:14px;">

      <!-- CARD 1 -->
      <article class="p-card" data-brand="dis" data-cpu="ryzen5" data-gpu="rtx4060" data-ram="16" data-ssd="1000" data-price="45999">
        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/pc-1.png'); ?>"
            alt="DIS PC Gaming R5 / RTX 4060"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">DIS PC Gaming R5 / RTX 4060</h3>
          <p class="p-desc">Ryzen 5 • RTX 4060 • 16GB • 1TB SSD</p>

          <div class="p-meta">
            <span class="pill">ТОП</span>
            <span class="pill pill-outline">Gaming</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">45 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="DIS PC Gaming R5 / RTX 4060"
              data-price="45 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/pc-1.png'); ?>"
              data-desc="Збалансований ігровий ПК для 1080p/1440p: висока продуктивність і запас на майбутнє."
              data-specs="CPU: Ryzen 5|GPU: RTX 4060|RAM: 16GB|SSD: 1TB|PSU: 650W|Корпус: Airflow"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 2 -->
      <article class="p-card" data-brand="dis" data-cpu="i5" data-gpu="rtx4050" data-ram="16" data-ssd="512" data-price="39999">
        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/pc-2.png'); ?>"
            alt="DIS PC Core i5 / RTX 4050"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">DIS PC Core i5 / RTX 4050</h3>
          <p class="p-desc">Core i5 • RTX 4050 • 16GB • 512GB SSD</p>

          <div class="p-meta">
            <span class="pill">Хіт</span>
            <span class="pill pill-outline">Gaming</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">39 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="DIS PC Core i5 / RTX 4050"
              data-price="39 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/pc-2.png'); ?>"
              data-desc="Гарний старт для ігор і повсякденної роботи: продуктивний процесор та сучасна відеокарта."
              data-specs="CPU: Core i5|GPU: RTX 4050|RAM: 16GB|SSD: 512GB|PSU: 600W|Wi-Fi: є"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 3 -->
      <article class="p-card" data-brand="dis" data-cpu="ryzen7" data-gpu="rtx4070" data-ram="32" data-ssd="1000" data-price="69999">
        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/pc-3.png'); ?>"
            alt="DIS PC Pro R7 / RTX 4070"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">DIS PC Pro R7 / RTX 4070</h3>
          <p class="p-desc">Ryzen 7 • RTX 4070 • 32GB • 1TB SSD</p>

          <div class="p-meta">
            <span class="pill">PRO</span>
            <span class="pill pill-outline">Creator</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">69 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="DIS PC Pro R7 / RTX 4070"
              data-price="69 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/pc-3.png'); ?>"
              data-desc="Для монтажу, 3D і важких задач: 32GB RAM та RTX 4070 дають серйозний запас потужності."
              data-specs="CPU: Ryzen 7|GPU: RTX 4070|RAM: 32GB|SSD: 1TB|Охолодження: tower|PSU: 750W"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 4 -->
      <article class="p-card" data-brand="dis" data-cpu="i3" data-gpu="integrated" data-ram="16" data-ssd="512" data-price="21999">
        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/pc-4.png'); ?>"
            alt="DIS PC Office i3"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">DIS PC Office i3</h3>
          <p class="p-desc">Core i3 • iGPU • 16GB • 512GB SSD</p>

          <div class="p-meta">
            <span class="pill">Офіс</span>
            <span class="pill pill-outline">Work</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">21 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="DIS PC Office i3"
              data-price="21 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/pc-4.png'); ?>"
              data-desc="Тихий ПК для офісу, навчання та дому: швидкий SSD і достатньо RAM для багатозадачності."
              data-specs="CPU: Core i3|Графіка: інтегрована|RAM: 16GB|SSD: 512GB|PSU: 450W|Корпус: compact"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 5 -->
      <article class="p-card" data-brand="dis" data-cpu="ryzen5" data-gpu="rx7600" data-ram="16" data-ssd="1000" data-price="42999">
        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/pc-5.png'); ?>"
            alt="DIS PC Ryzen 5 / RX 7600"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">DIS PC Ryzen 5 / RX 7600</h3>
          <p class="p-desc">Ryzen 5 • RX 7600 • 16GB • 1TB SSD</p>

          <div class="p-meta">
            <span class="pill">AMD</span>
            <span class="pill pill-outline">Gaming</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">42 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="DIS PC Ryzen 5 / RX 7600"
              data-price="42 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/pc-5.png'); ?>"
              data-desc="Відмінна ціна/продуктивність для 1080p: сучасна AMD-збірка з великим SSD."
              data-specs="CPU: Ryzen 5|GPU: RX 7600|RAM: 16GB|SSD: 1TB|PSU: 650W|Охолодження: tower"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 6 -->
      <article class="p-card" data-brand="dis" data-cpu="ryzen9" data-gpu="rtx4080" data-ram="32" data-ssd="2000" data-price="129999">
        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/pc-6.png'); ?>"
            alt="DIS PC Ultra R9 / RTX 4080"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">DIS PC Ultra R9 / RTX 4080</h3>
          <p class="p-desc">Ryzen 9 • RTX 4080 • 32GB • 2TB SSD</p>

          <div class="p-meta">
            <span class="pill">ULTRA</span>
            <span class="pill pill-outline">4K</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">129 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="DIS PC Ultra R9 / RTX 4080"
              data-price="129 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/pc-6.png'); ?>"
              data-desc="Максимальна потужність для 4K-геймінгу та професійних задач: топова відеокарта та швидкий SSD."
              data-specs="CPU: Ryzen 9|GPU: RTX 4080|RAM: 32GB|SSD: 2TB|PSU: 850W|Охолодження: AIO"
            >Детальніше</button>
          </div>
        </div>
      </article>

    </div><!-- /product-grid -->

  </div><!-- /container -->
</section>

<?php get_footer(); ?>
