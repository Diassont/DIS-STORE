<?php
/*
Template Name: Catalog — Storage
*/
get_header();
?>

<section class="section hero" style="padding-top:16px;">
  <div class="container">

    <div class="section-head">
      <div>
        <h1 class="page-title" style="margin-bottom:6px;">Накопичувачі</h1>
        <p class="muted" style="margin:0;">
          SSD / NVMe / HDD — обери обсяг, інтерфейс та ціну.
        </p>
      </div>

      <a class="head-link" href="<?php echo esc_url(home_url('/catalog/')); ?>">
        Весь каталог <span class="arr">→</span>
      </a>
    </div>

    <!-- FILTER -->
    <div class="filter-bar" id="filterBar" data-filter="storage"></div>
    <p class="filter-empty muted" id="filterEmpty" hidden>Нічого не знайдено.</p>

    <!-- PRODUCTS -->
    <div class="product-grid" id="products" style="margin-top:14px;">

      <!-- CARD 1 -->
      <article class="p-card"
        data-type="ssd"
        data-size="512"
        data-iface="sata"
        data-price="1499">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/storage-1.png'); ?>"
            alt="Kingston A400 512GB"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Kingston A400 512GB</h3>
          <p class="p-desc">SSD • SATA • 512GB • Budget</p>

          <div class="p-meta">
            <span class="pill">SSD</span>
            <span class="pill pill-outline">SATA</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">1 499 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Kingston A400 512GB"
              data-price="1 499 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/storage-1.png'); ?>"
              data-desc="Доступний SSD для прискорення Windows та програм."
              data-specs="Тип: SSD|Обсяг: 512GB|Інтерфейс: SATA|Призначення: апгрейд"
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
        data-type="nvme"
        data-size="2000"
        data-iface="m2"
        data-price="4999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/storage-3.png'); ?>"
            alt="WD Black SN770 2TB"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">WD Black SN770 2TB</h3>
          <p class="p-desc">NVMe • M.2 • 2TB • Gaming</p>

          <div class="p-meta">
            <span class="pill">Gaming</span>
            <span class="pill pill-outline">2TB</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">4 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="WD Black SN770 2TB"
              data-price="4 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/storage-3.png'); ?>"
              data-desc="Великий обсяг та швидкість — ідеально для бібліотеки ігор."
              data-specs="Тип: NVMe|Обсяг: 2TB|Інтерфейс: M.2|Призначення: Gaming"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 4 -->
      <article class="p-card"
        data-type="hdd"
        data-size="2000"
        data-iface="sata"
        data-price="1999">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/storage-4.png'); ?>"
            alt="Seagate Barracuda 2TB"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Seagate Barracuda 2TB</h3>
          <p class="p-desc">HDD • SATA • 2TB • Storage</p>

          <div class="p-meta">
            <span class="pill">HDD</span>
            <span class="pill pill-outline">2TB</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">1 999 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Seagate Barracuda 2TB"
              data-price="1 999 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/storage-4.png'); ?>"
              data-desc="Класичний HDD для файлів, фото, відео та резервних копій."
              data-specs="Тип: HDD|Обсяг: 2TB|Інтерфейс: SATA|Призначення: зберігання"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 5 -->
      <article class="p-card"
        data-type="ssd"
        data-size="1000"
        data-iface="sata"
        data-price="2499">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/storage-5.png'); ?>"
            alt="Crucial MX500 1TB"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Crucial MX500 1TB</h3>
          <p class="p-desc">SSD • SATA • 1TB • Reliable</p>

          <div class="p-meta">
            <span class="pill">SSD</span>
            <span class="pill pill-outline">1TB</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">2 499 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Crucial MX500 1TB"
              data-price="2 499 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/storage-5.png'); ?>"
              data-desc="Надійний SATA SSD з хорошою швидкістю та ресурсом."
              data-specs="Тип: SSD|Обсяг: 1TB|Інтерфейс: SATA|Клас: надійний"
            >Детальніше</button>
          </div>
        </div>
      </article>

      <!-- CARD 6 -->
      <article class="p-card"
        data-type="nvme"
        data-size="512"
        data-iface="m2"
        data-price="1699">

        <div class="p-imgwrap">
          <img class="p-img"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/storage-6.png'); ?>"
            alt="Kingston NV2 500GB"
            loading="lazy">
        </div>

        <div class="p-body">
          <h3 class="p-title">Kingston NV2 500GB</h3>
          <p class="p-desc">NVMe • M.2 • 512GB • Fast бюджет</p>

          <div class="p-meta">
            <span class="pill">NVMe</span>
            <span class="pill pill-outline">512GB</span>
          </div>

          <div class="p-bottom">
            <div class="p-price">
              <div class="price">1 699 грн</div>
              <div class="muted">в наявності</div>
            </div>

            <button class="btn btn-outline p-more"
              data-title="Kingston NV2 500GB"
              data-price="1 699 грн"
              data-stock="В наявності • відправка 1–2 дні"
              data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/storage-6.png'); ?>"
              data-desc="Доступний NVMe SSD для швидкого запуску системи та ігор."
              data-specs="Тип: NVMe|Обсяг: 512GB|Інтерфейс: M.2|Призначення: система/ігри"
            >Детальніше</button>
          </div>
        </div>
      </article>

    </div><!-- /product-grid -->

  </div><!-- /container -->
</section>

<?php get_footer(); ?>
