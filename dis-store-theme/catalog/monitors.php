<?php
/*
Template Name: Catalog — Monitors
*/
get_header();
?>

<section class="section hero" style="padding-top:16px;">
  <div class="container">

    <div class="section-head">
      <div>
        <h1 class="page-title" style="margin-bottom:6px;">Монітори</h1>
        <p class="muted" style="margin:0;">
          Обери монітор для ігор, навчання або роботи — фільтр допоможе швидко відсіяти зайве.
        </p>
      </div>

      <a class="head-link" href="<?php echo esc_url(home_url('/catalog/')); ?>">
        Весь каталог <span class="arr">→</span>
      </a>
    </div>

    <!-- ✅ FILTER (генерується JS по data-filter) -->
    <div class="filter-bar" id="filterBar" data-filter="monitors"></div>
    <p class="filter-empty muted" id="filterEmpty" hidden>Нічого не знайдено за фільтром.</p>

    <!-- ✅ PRODUCTS -->
    <div class="product-grid" id="products" style="margin-top:14px;">

      <!-- CARD 1 -->
      <article class="p-card" data-brand="samsung" data-size="27" data-refresh="165" data-panel="ips" data-price="9999">
        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/monitor-1.png'); ?>"
            alt="Samsung Odyssey 27&quot;"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Samsung Odyssey 27"</h3>
          <p class="p-desc">27" • IPS • 165Hz • 1ms • QHD</p>

          <div class="p-meta">
            <span class="pill">Хіт</span>
            <span class="pill pill-outline">Gaming</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">9 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Samsung Odyssey 27&quot;"
              data-price="9 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/monitor-1.png'); ?>"
              data-desc="Ігровий монітор з високою частотою оновлення та чіткою картинкою. Підійде для FPS і роботи з графікою."
              data-specs="Діагональ: 27&quot;|Матриця: IPS|Роздільна здатність: QHD|Частота: 165Hz|Відгук: 1ms"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 2 -->
      <article class="p-card" data-brand="lg" data-size="24" data-refresh="75" data-panel="ips" data-price="5499">
        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/monitor-2.png'); ?>"
            alt="LG 24&quot; IPS"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">LG 24" IPS</h3>
          <p class="p-desc">24" • IPS • 75Hz • Full HD</p>

          <div class="p-meta">
            <span class="pill">Офіс</span>
            <span class="pill pill-outline">Work</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">5 499 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="LG 24&quot; IPS"
              data-price="5 499 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/monitor-2.png'); ?>"
              data-desc="Надійний монітор для навчання та офісу: хороші кути огляду, комфорт для очей."
              data-specs="Діагональ: 24&quot;|Матриця: IPS|Роздільна здатність: Full HD|Частота: 75Hz|Призначення: Office"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 3 -->
      <article class="p-card" data-brand="aoc" data-size="24" data-refresh="144" data-panel="va" data-price="6999">
        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/monitor-3.png'); ?>"
            alt="AOC 24&quot; 144Hz"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">AOC 24" 144Hz</h3>
          <p class="p-desc">24" • VA • 144Hz • 1ms • Full HD</p>

          <div class="p-meta">
            <span class="pill">Gaming</span>
            <span class="pill pill-outline">FPS</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">6 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="AOC 24&quot; 144Hz"
              data-price="6 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/monitor-3.png'); ?>"
              data-desc="Оптимальний варіант для ігор: висока плавність та контрастна VA-матриця."
              data-specs="Діагональ: 24&quot;|Матриця: VA|Роздільна здатність: Full HD|Частота: 144Hz|Відгук: 1ms"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 4 -->
      <article class="p-card" data-brand="dell" data-size="27" data-refresh="60" data-panel="ips" data-price="8999">
        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/monitor-4.png'); ?>"
            alt="Dell 27&quot; QHD"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Dell 27" QHD</h3>
          <p class="p-desc">27" • IPS • QHD • 60Hz • sRGB</p>

          <div class="p-meta">
            <span class="pill">Дизайн</span>
            <span class="pill pill-outline">Color</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">8 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Dell 27&quot; QHD"
              data-price="8 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/monitor-4.png'); ?>"
              data-desc="Комфортна діагональ та висока чіткість QHD — для роботи, навчання й контенту."
              data-specs="Діагональ: 27&quot;|Матриця: IPS|Роздільна здатність: QHD|Частота: 60Hz|Кольори: sRGB"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 5 -->
      <article class="p-card" data-brand="msi" data-size="32" data-refresh="165" data-panel="va" data-price="12999">
        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/monitor-5.png'); ?>"
            alt="MSI 32&quot; Curved"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">MSI 32" Curved</h3>
          <p class="p-desc">32" • VA • 165Hz • Curved • QHD</p>

          <div class="p-meta">
            <span class="pill">WOW</span>
            <span class="pill pill-outline">Immersive</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">12 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="MSI 32&quot; Curved"
              data-price="12 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/monitor-5.png'); ?>"
              data-desc="Великий вигнутий монітор: геймінг і робота в кількох вікнах стають реально зручними."
              data-specs="Діагональ: 32&quot;|Матриця: VA|Роздільна здатність: QHD|Частота: 165Hz|Форма: Curved"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 6 -->
      <article class="p-card" data-brand="asus" data-size="24" data-refresh="240" data-panel="ips" data-price="10999">
        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/monitor-6.png'); ?>"
            alt="ASUS 24&quot; 240Hz"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">ASUS 24" 240Hz</h3>
          <p class="p-desc">24" • IPS • 240Hz • 1ms • Full HD</p>

          <div class="p-meta">
            <span class="pill">PRO</span>
            <span class="pill pill-outline">eSports</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">10 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="ASUS 24&quot; 240Hz"
              data-price="10 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/monitor-6.png'); ?>"
              data-desc="Максимальна плавність для кіберспорту: 240Hz та швидка матриця."
              data-specs="Діагональ: 24&quot;|Матриця: IPS|Роздільна здатність: Full HD|Частота: 240Hz|Відгук: 1ms"
            >Детальніше</button>
          </div>
        </div>
      </article>

    </div><!-- /product-grid -->

  </div><!-- /container -->
</section>

<?php get_footer(); ?>
