<?php
/*
Template Name: Catalog — Laptops
*/
get_header();
?>

<section class="section hero" style="padding-top:16px;">
  <div class="container">

    <div class="section-head">
      <div>
        <h1 class="page-title" style="margin-bottom:6px;">Ноутбуки</h1>
        <p class="muted" style="margin:0;">Обери ноутбук під навчання, роботу або ігри — зручний фільтр допоможе швидко знайти потрібне.</p>
      </div>

      <a class="head-link" href="<?php echo esc_url(home_url('/catalog/')); ?>">
        Весь каталог <span class="arr">→</span>
      </a>
    </div>

    <!-- ✅ FILTER (генерується JS по data-filter) -->
    <div class="filter-bar" id="filterBar" data-filter="laptops"></div>
    <p class="filter-empty muted" id="filterEmpty" hidden>Нічого не знайдено за фільтром.</p>

    <!-- ✅ PRODUCTS -->
    <div class="product-grid" id="products" style="margin-top:14px;">

      <!-- CARD 1 -->
<article class="p-card" data-brand="asus" data-ram="16" data-screen="15.6" data-price="38999">
  <div class="p-imgwrap">
    <img class="p-img"
      src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/laptop-1.png'); ?>"
      alt="ASUS TUF A15"
      loading="lazy">
  </div>

  <div class="p-body">
    <h3 class="p-title">ASUS TUF A15</h3>
    <p class="p-desc">RTX 4060 • Ryzen • 16GB • 512GB • 144Hz</p>

    <div class="p-meta">
      <span class="pill">ТОП</span>
      <span class="pill pill-outline">Gaming</span>
    </div>

    <div class="p-bottom">
      <div class="p-price">
        <div class="price">38 999 грн</div>
        <div class="muted">в наявності</div>
      </div>

      <button class="btn btn-outline p-more"
        data-title="ASUS TUF A15"
        data-price="38 999 грн"
        data-stock="В наявності • відправка 1–2 дні"
        data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/laptop-1.png'); ?>"
        data-desc="Надійний ігровий ноутбук із хорошим охолодженням. Ідеально для 1080p/1440p та роботи."
        data-specs="Екран: 15.6&quot; 144Hz|GPU: RTX 4060|CPU: Ryzen|RAM: 16GB|SSD: 512GB"
      >Детальніше</button>
    </div>
  </div>
</article>

<!-- CARD 2 -->
<article class="p-card" data-brand="lenovo" data-ram="16" data-screen="15.6" data-price="32999">
  <div class="p-imgwrap">
    <img class="p-img"
      src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/laptop-2.png'); ?>"
      alt="Lenovo LOQ 15"
      loading="lazy">
  </div>

  <div class="p-body">
    <h3 class="p-title">Lenovo LOQ 15</h3>
    <p class="p-desc">RTX 4050 • Core i5 • 16GB • 512GB</p>

    <div class="p-meta">
      <span class="pill">Хіт</span>
      <span class="pill pill-outline">Gaming</span>
    </div>

    <div class="p-bottom">
      <div class="p-price">
        <div class="price">32 999 грн</div>
        <div class="muted">в наявності</div>
      </div>

      <button class="btn btn-outline p-more"
        data-title="Lenovo LOQ 15"
        data-price="32 999 грн"
        data-stock="В наявності • відправка 1–2 дні"
        data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/laptop-2.png'); ?>"
        data-desc="Збалансований ноутбук для ігор і навчання. Хороший екран та продуктивність."
        data-specs="Екран: 15.6&quot;|GPU: RTX 4050|CPU: Core i5|RAM: 16GB|SSD: 512GB"
      >Детальніше</button>
    </div>
  </div>
</article>

<!-- CARD 3 -->
<article class="p-card" data-brand="hp" data-ram="16" data-screen="14" data-price="26999">
  <div class="p-imgwrap">
    <img class="p-img"
      src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/laptop-3.png'); ?>"
      alt="HP Pavilion 14"
      loading="lazy">
  </div>

  <div class="p-body">
    <h3 class="p-title">HP Pavilion 14</h3>
    <p class="p-desc">Core i5 • 16GB • 512GB • компактний</p>

    <div class="p-meta">
      <span class="pill">Офіс</span>
      <span class="pill pill-outline">Study</span>
    </div>

    <div class="p-bottom">
      <div class="p-price">
        <div class="price">26 999 грн</div>
        <div class="muted">в наявності</div>
      </div>

      <button class="btn btn-outline p-more"
        data-title="HP Pavilion 14"
        data-price="26 999 грн"
        data-stock="В наявності • відправка 1–2 дні"
        data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/laptop-3.png'); ?>"
        data-desc="Універсальний ноутбук для навчання та офісу. Компактний 14&quot; формат."
        data-specs="Екран: 14&quot;|CPU: Core i5|RAM: 16GB|SSD: 512GB|Вага: ~1.5кг"
      >Детальніше</button>
    </div>
  </div>
</article>

<!-- CARD 4 -->
<article class="p-card" data-brand="asus" data-ram="16" data-screen="14" data-price="41999">
  <div class="p-imgwrap">
    <img class="p-img"
      src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/laptop-5.png'); ?>"
      alt="ASUS Zenbook 14 OLED"
      loading="lazy">
  </div>

  <div class="p-body">
    <h3 class="p-title">ASUS Zenbook 14 OLED</h3>
    <p class="p-desc">OLED • 16GB • 1TB • преміум</p>

    <div class="p-meta">
      <span class="pill">OLED</span>
      <span class="pill pill-outline">Premium</span>
    </div>

    <div class="p-bottom">
      <div class="p-price">
        <div class="price">41 999 грн</div>
        <div class="muted">в наявності</div>
      </div>

      <button class="btn btn-outline p-more"
        data-title="ASUS Zenbook 14 OLED"
        data-price="41 999 грн"
        data-stock="В наявності • відправка 1–2 дні"
        data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/laptop-5.png'); ?>"
        data-desc="Преміальний ноутбук з OLED-екраном для дизайну, навчання та роботи."
        data-specs="Екран: 14&quot; OLED|RAM: 16GB|SSD: 1TB|Корпус: metal|Автономність: висока"
      >Детальніше</button>
    </div>
  </div>
</article>

<!-- CARD 5 -->
<article class="p-card" data-brand="lenovo" data-ram="8" data-screen="14" data-price="23999">
  <div class="p-imgwrap">
    <img class="p-img"
      src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/laptop-6.png'); ?>"
      alt="Lenovo ThinkPad 14"
      loading="lazy">
  </div>

  <div class="p-body">
    <h3 class="p-title">Lenovo ThinkPad 14</h3>
    <p class="p-desc">Надійний • 8GB • 512GB • бізнес</p>

    <div class="p-meta">
      <span class="pill">Business</span>
      <span class="pill pill-outline">Work</span>
    </div>

    <div class="p-bottom">
      <div class="p-price">
        <div class="price">23 999 грн</div>
        <div class="muted">в наявності</div>
      </div>

      <button class="btn btn-outline p-more"
        data-title="Lenovo ThinkPad 14"
        data-price="23 999 грн"
        data-stock="В наявності • відправка 1–2 дні"
        data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/laptop-6.png'); ?>"
        data-desc="Класика бізнес-ноутбуків: надійність, клавіатура, стабільність."
        data-specs="Екран: 14&quot;|RAM: 8GB|SSD: 512GB|Серія: ThinkPad|Міцність: підвищена"
      >Детальніше</button>
    </div>
  </div>
</article>

<!-- CARD 6 -->
<article class="p-card" data-brand="hp" data-ram="16" data-screen="16" data-price="44999">
  <div class="p-imgwrap">
    <img class="p-img"
      src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/laptop-7.png'); ?>"
      alt="HP Victus 16"
      loading="lazy">
  </div>

  <div class="p-body">
    <h3 class="p-title">HP Victus 16</h3>
    <p class="p-desc">RTX 4060 • 16GB • 1TB • 16&quot;</p>

    <div class="p-meta">
      <span class="pill">Хіт</span>
      <span class="pill pill-outline">Gaming</span>
    </div>

    <div class="p-bottom">
      <div class="p-price">
        <div class="price">44 999 грн</div>
        <div class="muted">в наявності</div>
      </div>

      <button class="btn btn-outline p-more"
        data-title="HP Victus 16"
        data-price="44 999 грн"
        data-stock="В наявності • відправка 1–2 дні"
        data-img="<?php echo esc_url(get_template_directory_uri() . '/assets/img/laptop-7.png'); ?>"
        data-desc="Потужний ноутбук для геймінгу та важких задач із 16&quot; екраном."
        data-specs="Екран: 16&quot;|GPU: RTX 4060|RAM: 16GB|SSD: 1TB|Клас: Gaming"
      >Детальніше</button>
    </div>
  </div>
</article>
    </div><!-- /product-grid -->
  </div><!-- /container -->
</section>

<?php get_footer(); ?>
