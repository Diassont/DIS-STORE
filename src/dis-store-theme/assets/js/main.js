/* =========================================================
   DISSTORE — CLEAN UI JS
   ========================================================= */

(() => {
  const BREAKPOINT = 980;
  const isDesktop = () => window.innerWidth > BREAKPOINT;
  const isMobile  = () => window.innerWidth <= BREAKPOINT;

  const setBodyLock = (cls, lock) => document.body.classList.toggle(cls, !!lock);
  const lockMenuScroll  = (lock) => setBodyLock('menu-open', lock);
  const lockModalScroll = (lock) => setBodyLock('modal-open', lock);

  /* ========================================================
     1) Burger + Mobile Menu
     ======================================================== */
  (() => {
    const burger     = document.querySelector('.burger');
    const mobileMenu = document.getElementById('mobileMenu');
    if (!burger || !mobileMenu) return;

    const isOpen     = () => burger.getAttribute('aria-expanded') === 'true';
    const openMenu   = () => { mobileMenu.hidden = false; burger.setAttribute('aria-expanded', 'true');  lockMenuScroll(true);  };
    const closeMenu  = () => { mobileMenu.hidden = true;  burger.setAttribute('aria-expanded', 'false'); lockMenuScroll(false); mobileMenu.querySelectorAll('li.is-open').forEach(li => li.classList.remove('is-open')); };
    const toggleMenu = () => isOpen() ? closeMenu() : openMenu();

    burger.addEventListener('click', e => { e.preventDefault(); toggleMenu(); });
    document.addEventListener('keydown', e => { if (e.key === 'Escape' && isOpen()) closeMenu(); });
    document.addEventListener('click', e => {
      if (!isOpen()) return;
      if (!e.target.closest('.burger') && !e.target.closest('#mobileMenu')) closeMenu();
    });
    mobileMenu.addEventListener('click', e => { if (e.target.closest('a')) closeMenu(); });
    window.addEventListener('resize', () => { if (isDesktop() && isOpen()) closeMenu(); });
  })();

  /* ========================================================
     2) Mobile Nav Submenu Toggle
     ======================================================== */
  (() => {
    const mobileNav = document.querySelector('.mobile-nav');
    if (!mobileNav) return;

    mobileNav.querySelectorAll('li.menu-item-has-children').forEach(li => {
      const link = li.querySelector(':scope > a');
      const sub  = li.querySelector(':scope > .sub-menu');
      if (!link || !sub || li.querySelector(':scope > .submenu-toggle')) return;

      const btn = document.createElement('button');
      btn.type = 'button';
      btn.className = 'submenu-toggle';
      btn.setAttribute('aria-label', 'Відкрити підменю');
      btn.setAttribute('aria-expanded', 'false');
      link.insertAdjacentElement('afterend', btn);

      btn.addEventListener('click', e => {
        if (!isMobile()) return;
        e.preventDefault(); e.stopPropagation();
        const wasOpen = li.classList.contains('is-open');
        mobileNav.querySelectorAll('li.is-open').forEach(item => {
          item.classList.remove('is-open');
          const t = item.querySelector(':scope > .submenu-toggle');
          if (t) t.setAttribute('aria-expanded', 'false');
        });
        if (!wasOpen) {
          li.classList.add('is-open');
          btn.setAttribute('aria-expanded', 'true');
          requestAnimationFrame(() => li.scrollIntoView({ block: 'nearest', behavior: 'smooth' }));
        }
      });
    });

    window.addEventListener('resize', () => {
      if (isDesktop()) {
        mobileNav.querySelectorAll('li.is-open').forEach(li => {
          li.classList.remove('is-open');
          const t = li.querySelector(':scope > .submenu-toggle');
          if (t) t.setAttribute('aria-expanded', 'false');
        });
      }
    });
  })();
})();

/* Lucide icons init */
if (typeof lucide !== 'undefined') lucide.createIcons();

/* =========================================================
   Filter (каталог)
   ========================================================= */
(function () {
  const search   = document.getElementById('filterSearch');
  const priceMin = document.getElementById('filterPriceMin');
  const priceMax = document.getElementById('filterPriceMax');
  const sort     = document.getElementById('filterSort');
  const reset    = document.getElementById('filterReset');
  const grid     = document.querySelector('.product-grid');
  if (!grid) return;

  function getRawPrice(card) {
    const el = card.querySelector('.woocommerce-Price-amount');
    if (!el) return 0;
    return parseFloat(el.textContent.replace(/[^\d,]/g, '').replace(',', '.')) || 0;
  }

  function applyFilter() {
    const q       = search   ? search.value.toLowerCase().trim() : '';
    const min     = priceMin ? parseFloat(priceMin.value) || 0 : 0;
    const max     = priceMax ? parseFloat(priceMax.value) || Infinity : Infinity;
    const sortVal = sort     ? sort.value : '';
    const cards   = Array.from(grid.querySelectorAll('.p-card'));

    cards.forEach(card => {
      const title  = card.querySelector('.p-title')?.textContent.toLowerCase() || '';
      const price  = getRawPrice(card);
      card.style.display = (!q || title.includes(q)) && price >= min && price <= max ? '' : 'none';
    });

    const visible = cards.filter(c => c.style.display !== 'none');
    visible.sort((a, b) => {
      const pa = getRawPrice(a), pb = getRawPrice(b);
      const na = a.querySelector('.p-title')?.textContent.trim() || '';
      const nb = b.querySelector('.p-title')?.textContent.trim() || '';
      if (sortVal === 'price_asc')  return pa - pb;
      if (sortVal === 'price_desc') return pb - pa;
      if (sortVal === 'name_asc')   return na.localeCompare(nb, 'uk');
      if (sortVal === 'name_desc')  return nb.localeCompare(na, 'uk');
      return 0;
    });
    visible.forEach(card => grid.appendChild(card));

    let empty = grid.querySelector('.filter-empty');
    if (!empty) {
      empty = document.createElement('p');
      empty.className = 'filter-empty muted';
      empty.style.gridColumn = '1/-1';
      empty.textContent = 'Нічого не знайдено. Спробуйте змінити фільтри.';
      grid.appendChild(empty);
    }
    empty.style.display = visible.length === 0 ? 'block' : 'none';
  }

  if (reset) reset.addEventListener('click', () => {
    if (search)   search.value   = '';
    if (priceMin) priceMin.value = '';
    if (priceMax) priceMax.value = '';
    if (sort)     sort.value     = '';
    applyFilter();
  });
  if (search)   search.addEventListener('input',  applyFilter);
  if (priceMin) priceMin.addEventListener('input', applyFilter);
  if (priceMax) priceMax.addEventListener('input', applyFilter);
  if (sort)     sort.addEventListener('change',   applyFilter);
})();

/* =========================================================
   Wishlist + Compare AJAX
   ========================================================= */
(function () {

  const ajaxUrl = (typeof disStoreData !== 'undefined') ? disStoreData.ajaxUrl : '/wp-admin/admin-ajax.php';
  const nonce   = (typeof disStoreData !== 'undefined') ? disStoreData.nonce   : '';

  /* --- Лічильник в шапці --- */
  function updateCount(id, count) {
    const el = document.getElementById(id);
    if (!el) return;
    el.textContent = count;
    el.style.display = count > 0 ? '' : 'none';
  }

  /* --- Анімація серця --- */
  function animateHeart(btn) {
    btn.classList.remove('heart-pop');
    void btn.offsetWidth;
    btn.classList.add('heart-pop');
    btn.addEventListener('animationend', () => btn.classList.remove('heart-pop'), { once: true });
  }

  /* --- Анімація порівняння --- */
  function animateCompare(btn) {
    btn.classList.remove('compare-pop');
    void btn.offsetWidth;
    btn.classList.add('compare-pop');
    btn.addEventListener('animationend', () => btn.classList.remove('compare-pop'), { once: true });
  }

  /* --- Синхронізуємо всі кнопки одного товару --- */
  function syncButtons(selector, productId, isActive, labelActive, labelInactive) {
    document.querySelectorAll(`${selector}[data-product-id="${productId}"]`).forEach(btn => {
      btn.classList.toggle('is-active', isActive);
      btn.setAttribute('aria-label', isActive ? labelActive : labelInactive);
      btn.setAttribute('title',      isActive ? labelActive : labelInactive);
      const span = btn.querySelector('span');
      if (span) span.textContent = isActive ? labelActive : labelInactive;
    });
  }

  /* =====================================================
     WISHLIST — через наш WP AJAX
     ===================================================== */
  document.addEventListener('click', function (e) {
    const btn = e.target.closest('.wishlist-btn');
    if (!btn) return;
    e.preventDefault();

    const productId = btn.dataset.productId;
    if (!productId) return;

    const isActive = btn.classList.contains('is-active');
    syncButtons('.wishlist-btn', productId, !isActive, 'В обраному', 'В обране');
    animateHeart(btn);

    fetch(ajaxUrl, {
      method: 'POST',
      credentials: 'same-origin',
      headers: { 'X-Requested-With': 'XMLHttpRequest' },
      body: new URLSearchParams({ action: 'dis_wishlist_toggle', nonce, product_id: productId }),
    })
      .then(r => r.json())
      .then(data => {
        if (data.success) {
          syncButtons('.wishlist-btn', productId, data.data.active, 'В обраному', 'В обране');
          updateCount('wishlist-count', data.data.count);
        } else {
          syncButtons('.wishlist-btn', productId, isActive, 'В обраному', 'В обране');
        }
      })
      .catch(() => syncButtons('.wishlist-btn', productId, isActive, 'В обраному', 'В обране'));
  });

  /* =====================================================
     COMPARE — через нативний WC AJAX плагіну
     ===================================================== */

  function getCompareEndpoint(action) {
    if (typeof yith_woocompare !== 'undefined' && yith_woocompare.ajaxurl) {
      return yith_woocompare.ajaxurl.replace('%%endpoint%%', action);
    }
    return '/?wc-ajax=' + action;
  }

  function getCompareNonce(type) {
    if (typeof yith_woocompare !== 'undefined' && yith_woocompare.nonces) {
      return yith_woocompare.nonces[type] || '';
    }
    return '';
  }

  function readCompareCount() {
    const cookieName = (typeof disStoreData !== 'undefined' && disStoreData.compareCookieName)
      ? disStoreData.compareCookieName : 'yith_woocompare_products_list';
    const esc  = cookieName.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
    const match = document.cookie.match(new RegExp('(?:^|; )' + esc + '=([^;]*)'));
    if (!match) return 0;
    try { return JSON.parse(decodeURIComponent(match[1])).length; } catch (e) { return 0; }
  }

  document.addEventListener('click', function (e) {
    const btn = e.target.closest('.compare-btn');
    if (!btn) return;
    e.preventDefault();

    const productId = btn.dataset.productId;
    if (!productId) return;

    const isActive = btn.classList.contains('is-active');
    syncButtons('.compare-btn', productId, !isActive, 'В порівнянні', 'Порівняти');
    animateCompare(btn);

    const action   = isActive ? 'yith-woocompare-remove-product' : 'yith-woocompare-add-product';
    const security = isActive ? getCompareNonce('remove') : getCompareNonce('add');

    fetch(getCompareEndpoint(action), {
      method: 'POST',
      credentials: 'same-origin',
      headers: { 'X-Requested-With': 'XMLHttpRequest' },
      body: new URLSearchParams({ id: productId, security }),
    })
      .then(r => r.json())
      .then(data => {
        // Плагін повертає {added: true/false} або {removed: true/false}
        const ok = isActive ? (data.removed === true || data.removed === 1)
                            : (data.added   === true || data.added   === 1);

        if (ok) {
          syncButtons('.compare-btn', productId, !isActive, 'В порівнянні', 'Порівняти');
          // Рахуємо з cookie — плагін вже оновив його
          setTimeout(() => updateCount('compare-count', readCompareCount()), 150);
        } else {
          // Якщо added=false — товар вже був у списку, вважаємо успіхом
          // і залишаємо is-active
          if (!isActive && data.added === false) {
            syncButtons('.compare-btn', productId, true, 'В порівнянні', 'Порівняти');
          } else {
            syncButtons('.compare-btn', productId, isActive, 'В порівнянні', 'Порівняти');
          }
          setTimeout(() => updateCount('compare-count', readCompareCount()), 150);
        }
      })
      .catch(() => syncButtons('.compare-btn', productId, isActive, 'В порівнянні', 'Порівняти'));
  });

})();
