<?php get_header(); ?>

<section class="container section">
  <div class="section-head">
    <div>
      <h1 class="page-title" style="margin-bottom:8px;">Каталог</h1>
      <p class="muted" style="margin:0;">Оберіть категорію або перегляньте популярні позиції.</p>
    </div>

    <a class="head-link" href="<?php echo esc_url(home_url('/contacts')); ?>">
      Підібрати під бюджет <span class="arr">→</span>
    </a>
  </div>

  <h2 class="section-title" style="margin-top:22px;">Категорії</h2>
  <div class="grid grid-4">
    <a class="card cat-card" href="<?php echo esc_url(home_url('/monitors')); ?>">
      <div class="cat-emoji">🖥️</div>
      <strong>Монітори</strong>
    </a>

    <a class="card cat-card" href="<?php echo esc_url(home_url('/mice')); ?>">
      <div class="cat-emoji">🖱️</div>
      <strong>Миші</strong>
    </a>

    <a class="card cat-card" href="<?php echo esc_url(home_url('/keyboards')); ?>">
      <div class="cat-emoji">⌨️</div>
      <strong>Клавіатури</strong>
    </a>

    <a class="card cat-card" href="<?php echo esc_url(home_url('/headphones')); ?>">
      <div class="cat-emoji">🎧</div>
      <strong>Навушники</strong>
    </a>
  </div>

  <h2 class="section-title" style="margin-top:28px;">Популярні товари</h2>

  <div class="product-grid" style="margin-top:12px;">

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
      <article class="p-card"
        data-type="nvme"
        data-size="1000"
        data-iface="m2"
        data-price="2999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/storage-2.png'); ?>"
            alt="Samsung 980 1TB NVMe"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Samsung 980 1TB NVMe</h3>
          <p class="p-desc">NVMe • M.2 • 1TB • Fast</p>

          <div class="p-meta">
            <span class="pill">NVMe</span>
            <span class="pill pill-outline">1TB</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">2 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Samsung 980 1TB NVMe"
              data-price="2 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/storage-2.png'); ?>"
              data-desc="Швидкий NVMe SSD для ігор та системи."
              data-specs="Тип: NVMe|Обсяг: 1TB|Інтерфейс: M.2|Клас: швидкий"
            >Детальніше</button>
          </div>
        </div>
      </article>

  <!-- CARD 3 -->
      <article class="p-card"
        data-brand="logitech"
        data-type="gaming"
        data-connection="wireless"
        data-sensor="optical"
        data-dpi="25600"
        data-price="3999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mouse-1.png'); ?>"
            alt="Logitech G Pro X Superlight"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Logitech G Pro X Superlight</h3>
          <p class="p-desc">Wireless • 25600 DPI • Ultra Light</p>

          <div class="p-meta">
            <span class="pill">PRO</span>
            <span class="pill pill-outline">eSports</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">3 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Logitech G Pro X Superlight"
              data-price="3 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mouse-1.png'); ?>"
              data-desc="Надлегка професійна миша для кіберспорту з максимально точним сенсором."
              data-specs="Тип: Gaming|Підключення: Wireless|DPI: 25600|Сенсор: Optical|Вага: ~63г"
            >Детальніше</button>
          </div>
        </div>
      </article>

  <!-- CARD 4 -->
      <article class="p-card"
        data-brand="hyperx"
        data-type="wired"
        data-form="over-ear"
        data-mic="yes"
        data-anc="no"
        data-price="3299">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/headphones-2.png'); ?>"
            alt="HyperX Cloud II"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">HyperX Cloud II</h3>
          <p class="p-desc">Wired • Gaming • 7.1 • Mic</p>

          <div class="p-meta">
            <span class="pill">Хіт</span>
            <span class="pill pill-outline">Gaming</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">3 299 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="HyperX Cloud II"
              data-price="3 299 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/headphones-2.png'); ?>"
              data-desc="Легендарні ігрові навушники з комфортною посадкою та якісним мікрофоном."
              data-specs="Тип: Wired|Форма: Over-Ear|7.1: так|Мікрофон: є|Призначення: Gaming"
            >Детальніше</button>
          </div>
        </div>
      </article>

  </div>
</section>

<!-- MODAL -->
<div class="modal" id="productModal" aria-hidden="true">
  <div class="modal__overlay" data-close></div>

  <div class="modal__dialog" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
    <button class="modal__close" type="button" data-close aria-label="Закрити">✕</button>

    <div class="modal__grid">
      <div class="modal__media">
        <img id="modalImg" src="" alt="" loading="lazy">
      </div>

      <div class="modal__content">
        <h2 id="modalTitle" class="modal__title"></h2>
        <div class="modal__price" id="modalPrice"></div>
        <div class="muted" id="modalStock" style="margin-top:6px;"></div>

        <p class="modal__desc muted" id="modalDesc"></p>

        <div class="modal__specs">
          <div class="modal__specTitle">Характеристики</div>
          <ul id="modalSpecs"></ul>
        </div>

        <div class="modal__actions">
          <a class="btn" id="buyBtn" href="<?php echo esc_url(home_url('/contacts')); ?>">Придбати</a>
          <button class="btn btn-outline" type="button" data-close>Закрити</button>
        </div>

        <div class="muted" style="margin-top:10px; font-size:13px;">
          Натисни “Придбати” — і ми уточнимо наявність та доставку.
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
