/* =========================================================
   DISSTORE — CATALOG JS  (catalog.js)
   Об'єднує: burger/menu, catalog filter, wishlist, compare
   ========================================================= */

(() => {
  'use strict';

  const BREAKPOINT = 980;
  const isDesktop  = () => window.innerWidth > BREAKPOINT;
  const isMobile   = () => window.innerWidth <= BREAKPOINT;
  const setBodyLock = (cls, lock) => document.body.classList.toggle(cls, !!lock);

  /* ══════════════════════════════════════════════════════
     1. BURGER + MOBILE MENU
  ══════════════════════════════════════════════════════ */
  (() => {
    const burger     = document.querySelector('.burger');
    const mobileMenu = document.getElementById('mobileMenu');
    if (!burger || !mobileMenu) return;

    const isOpen    = () => burger.getAttribute('aria-expanded') === 'true';
    const openMenu  = () => { mobileMenu.hidden = false; burger.setAttribute('aria-expanded', 'true');  setBodyLock('menu-open', true);  };
    const closeMenu = () => {
      mobileMenu.hidden = true;
      burger.setAttribute('aria-expanded', 'false');
      setBodyLock('menu-open', false);
      mobileMenu.querySelectorAll('li.is-open').forEach(li => li.classList.remove('is-open'));
    };

    burger.addEventListener('click', e => { e.preventDefault(); isOpen() ? closeMenu() : openMenu(); });
    document.addEventListener('keydown', e => { if (e.key === 'Escape' && isOpen()) closeMenu(); });
    document.addEventListener('click', e => {
      if (!isOpen()) return;
      if (!e.target.closest('.burger') && !e.target.closest('#mobileMenu')) closeMenu();
    });
    mobileMenu.addEventListener('click', e => { if (e.target.closest('a')) closeMenu(); });
    window.addEventListener('resize', () => { if (isDesktop() && isOpen()) closeMenu(); });
  })();

  /* ══════════════════════════════════════════════════════
     2. MOBILE NAV SUBMENU TOGGLE
  ══════════════════════════════════════════════════════ */
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

  /* ══════════════════════════════════════════════════════
     3. CLICKABLE PRODUCT CARDS
  ══════════════════════════════════════════════════════ */
  document.querySelectorAll('.p-card-clickable').forEach(card => {
    card.style.cursor = 'pointer';
    card.addEventListener('click', e => {
      if (e.target.closest('a, button, select, input, form')) return;
      const href = card.dataset.href;
      if (href) window.location.href = href;
    });
  });

  /* ══════════════════════════════════════════════════════
     4. DROPDOWN СОРТУВАННЯ
  ══════════════════════════════════════════════════════ */
  (() => {
    const sortSelect = document.getElementById('filterSort');
    const dropBtn    = document.getElementById('sortDropdownBtn');
    const dropMenu   = document.getElementById('sortDropdownMenu');
    const dropLabel  = document.getElementById('sortDropdownLabel');
    if (!dropBtn || !dropMenu) return;

    const dropItems = Array.from(dropMenu.querySelectorAll('.dis-dropdown-item'));
    const isOpen    = () => dropMenu.classList.contains('is-open');

    const openDrop  = () => { dropMenu.classList.add('is-open');    dropBtn.setAttribute('aria-expanded', 'true');  };
    const closeDrop = () => { dropMenu.classList.remove('is-open'); dropBtn.setAttribute('aria-expanded', 'false'); };

    dropBtn.addEventListener('click', e => { e.stopPropagation(); isOpen() ? closeDrop() : openDrop(); });

    dropItems.forEach(item => {
      item.addEventListener('click', () => {
        dropItems.forEach(i => { i.classList.remove('is-selected'); i.setAttribute('aria-selected', 'false'); });
        item.classList.add('is-selected');
        item.setAttribute('aria-selected', 'true');

        // Оновлюємо label кнопки
        const labelEl = item.querySelector('.dis-item-label');
        if (dropLabel) dropLabel.textContent = item.dataset.label || (labelEl ? labelEl.textContent : '');

        // Синхронізуємо прихований select → тригеримо change для фільтру
        if (sortSelect) {
          sortSelect.value = item.dataset.value || '';
          sortSelect.dispatchEvent(new Event('change'));
        }
        closeDrop();
      });
    });

    // Закрити при кліку поза dropdown
    document.addEventListener('click', e => { if (!e.target.closest('#sortDropdown')) closeDrop(); });

    // Клавіатура
    dropBtn.addEventListener('keydown', e => {
      if (e.key === 'Escape') closeDrop();
      if (e.key === 'ArrowDown') { e.preventDefault(); openDrop(); dropItems[0]?.focus(); }
    });
    dropMenu.addEventListener('keydown', e => {
      if (e.key === 'Escape') { closeDrop(); dropBtn.focus(); }
    });
  })();

  /* ══════════════════════════════════════════════════════
     5. CLIENT-SIDE ФІЛЬТР (пошук / ціна / сорт)
  ══════════════════════════════════════════════════════ */
  (() => {
    const grid     = document.getElementById('productGrid');
    if (!grid) return;

    const searchEl = document.getElementById('filterSearch');
    const minEl    = document.getElementById('filterPriceMin');
    const maxEl    = document.getElementById('filterPriceMax');
    const sortEl   = document.getElementById('filterSort');
    const resetBtn = document.getElementById('filterReset');
    const noRes    = grid.querySelector('.js-noresult');

    // Всі картки в початковому порядку
    const allCards  = Array.from(grid.querySelectorAll('.p-card'));
    const origOrder = allCards.slice();

    const getPrice = card => parseFloat(card.dataset.price) || 0;
    const getName  = card => card.dataset.name   || '';
    const getText  = card => card.dataset.search || card.dataset.name || '';

    function run() {
      const q    = searchEl ? searchEl.value.toLowerCase().trim() : '';
      const minP = (minEl && minEl.value !== '') ? parseFloat(minEl.value) : 0;
      const maxP = (maxEl && maxEl.value !== '') ? parseFloat(maxEl.value) : Infinity;
      const sort = sortEl ? sortEl.value : '';

      const visible = [];
      origOrder.forEach(card => {
        const p  = getPrice(card);
        const ok = (!q || getText(card).includes(q)) && p >= minP && p <= maxP;
        card.style.display = ok ? '' : 'none';
        if (ok) visible.push(card);
      });

      // Сортування
      if (sort && visible.length > 1) {
        visible.sort((a, b) => {
          if (sort === 'price_asc')  return getPrice(a) - getPrice(b);
          if (sort === 'price_desc') return getPrice(b) - getPrice(a);
          if (sort === 'name_asc')   return getName(a).localeCompare(getName(b), 'uk');
          if (sort === 'name_desc')  return getName(b).localeCompare(getName(a), 'uk');
          return 0;
        });
        visible.forEach(card => grid.appendChild(card));
      }

      if (noRes) noRes.style.display = visible.length === 0 ? 'flex' : 'none';
    }

    if (resetBtn) {
      resetBtn.addEventListener('click', () => {
        if (searchEl) searchEl.value = '';
        if (minEl)    minEl.value    = '';
        if (maxEl)    maxEl.value    = '';
        if (sortEl)   sortEl.value   = '';

        // Скинути dropdown UI
        const dropItems = document.querySelectorAll('#sortDropdownMenu .dis-dropdown-item');
        const dropLabel = document.getElementById('sortDropdownLabel');
        dropItems.forEach(i => { i.classList.remove('is-selected'); i.setAttribute('aria-selected', 'false'); });
        if (dropItems[0]) { dropItems[0].classList.add('is-selected'); dropItems[0].setAttribute('aria-selected', 'true'); }
        if (dropLabel) dropLabel.textContent = 'Сортування';

        // Закрити dropdown
        const dropMenu = document.getElementById('sortDropdownMenu');
        if (dropMenu) dropMenu.classList.remove('is-open');

        // Відновити порядок карток
        origOrder.forEach(card => { card.style.display = ''; grid.appendChild(card); });
        if (noRes) noRes.style.display = 'none';
      });
    }

    let debounceTimer;
    const debounce = fn => { clearTimeout(debounceTimer); debounceTimer = setTimeout(fn, 200); };

    if (searchEl) searchEl.addEventListener('input',  () => debounce(run));
    if (minEl)    minEl.addEventListener('input',     run);
    if (maxEl)    maxEl.addEventListener('input',     run);
    if (sortEl)   sortEl.addEventListener('change',   run);
  })();

  /* ══════════════════════════════════════════════════════
     6. DROPDOWN АТРИБУТІВ
  ══════════════════════════════════════════════════════ */
  document.querySelectorAll('.dis-attr-dropdown').forEach(dd => {
    const btn   = dd.querySelector('.dis-attr-dd-btn');
    const menu  = dd.querySelector('.dis-attr-dd-menu');
    const label = dd.querySelector('.dis-attr-dd-label');
    const items = Array.from(dd.querySelectorAll('.dis-attr-dd-item'));
    const hiddenSelect = dd.closest('.dis-attr-col')?.querySelector('.dis-attr-hidden-select');

    if (!btn || !menu) return;

    const isOpen    = () => menu.classList.contains('is-open');
    const openAttr  = () => { menu.classList.add('is-open');    btn.setAttribute('aria-expanded', 'true');  };
    const closeAttr = () => { menu.classList.remove('is-open'); btn.setAttribute('aria-expanded', 'false'); };

    btn.addEventListener('click', e => {
      e.stopPropagation();
      // Закрити всі інші attr dropdown
      document.querySelectorAll('.dis-attr-dd-menu.is-open').forEach(m => {
        if (m !== menu) {
          m.classList.remove('is-open');
          m.closest('.dis-attr-dropdown')?.querySelector('.dis-attr-dd-btn')?.setAttribute('aria-expanded', 'false');
        }
      });
      // Закрити sort dropdown якщо відкритий
      document.getElementById('sortDropdownMenu')?.classList.remove('is-open');
      document.getElementById('sortDropdownBtn')?.setAttribute('aria-expanded', 'false');

      isOpen() ? closeAttr() : openAttr();
    });

    items.forEach(item => {
      item.addEventListener('click', () => {
        const val = item.dataset.value || '';

        // Оновити UI
        items.forEach(i => i.classList.remove('is-selected'));
        item.classList.add('is-selected');

        // Оновити label і стан кнопки
        label.textContent = val ? (item.dataset.label || val) : 'Будь-який';
        btn.classList.toggle('has-value', !!val);

        // Оновити прихований select і відправити форму
        if (hiddenSelect) {
          hiddenSelect.value = val;
          hiddenSelect.closest('form')?.submit();
        }

        closeAttr();
      });
    });

    // Закрити при кліку поза
    document.addEventListener('click', e => {
      if (!e.target.closest('.dis-attr-dropdown')) closeAttr();
    });

    btn.addEventListener('keydown', e => { if (e.key === 'Escape') { closeAttr(); btn.focus(); } });
    menu.addEventListener('keydown', e => { if (e.key === 'Escape') { closeAttr(); btn.focus(); } });
  });

  /* Lucide icons init */
  if (typeof lucide !== 'undefined') lucide.createIcons();

})();

/* =========================================================
   WISHLIST + COMPARE AJAX
   (поза IIFE, але self-contained)
   ========================================================= */
(function () {
  'use strict';

  const ajaxUrl = (typeof disStoreData !== 'undefined') ? disStoreData.ajaxUrl : '/wp-admin/admin-ajax.php';
  const nonce   = (typeof disStoreData !== 'undefined') ? disStoreData.nonce   : '';

  /* --- Лічильник в шапці --- */
  function updateCount(id, count) {
    const el = document.getElementById(id);
    if (!el) return;
    el.textContent = count;
    el.style.display = count > 0 ? '' : 'none';
  }

  /* --- Анімація кнопок --- */
  function animateBtn(btn, cls) {
    btn.classList.remove(cls);
    void btn.offsetWidth; // reflow
    btn.classList.add(cls);
    btn.addEventListener('animationend', () => btn.classList.remove(cls), { once: true });
  }

  /* --- Синхронізуємо всі кнопки одного товару --- */
  function syncButtons(selector, productId, isActive, labelActive, labelInactive) {
    document.querySelectorAll(`${selector}[data-product-id="${productId}"]`).forEach(btn => {
      btn.classList.toggle('is-active', isActive);
      const lbl = isActive ? labelActive : labelInactive;
      btn.setAttribute('aria-label', lbl);
      btn.setAttribute('title', lbl);
      const span = btn.querySelector('span');
      if (span) span.textContent = lbl;
    });
  }

  /* ══════════════════════════════════════════════════════
     WISHLIST — WP AJAX
  ══════════════════════════════════════════════════════ */
  document.addEventListener('click', function (e) {
    const btn = e.target.closest('.wishlist-btn');
    if (!btn) return;
    e.preventDefault();

    const productId = btn.dataset.productId;
    if (!productId) return;

    const isActive = btn.classList.contains('is-active');

    // Оптимістичне оновлення
    syncButtons('.wishlist-btn', productId, !isActive, 'В обраному', 'В обране');
    animateBtn(btn, 'heart-pop');

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
          // Відкат
          syncButtons('.wishlist-btn', productId, isActive, 'В обраному', 'В обране');
        }
      })
      .catch(() => syncButtons('.wishlist-btn', productId, isActive, 'В обраному', 'В обране'));
  });

  /* ══════════════════════════════════════════════════════
     COMPARE — YITH WooCompare AJAX
  ══════════════════════════════════════════════════════ */

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
      ? disStoreData.compareCookieName
      : 'yith_woocompare_products_list';
    const escaped = cookieName.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
    const match   = document.cookie.match(new RegExp('(?:^|; )' + escaped + '=([^;]*)'));
    if (!match) return 0;
    try { return JSON.parse(decodeURIComponent(match[1])).length; } catch { return 0; }
  }

  document.addEventListener('click', function (e) {
    const btn = e.target.closest('.compare-btn');
    if (!btn) return;
    e.preventDefault();

    const productId = btn.dataset.productId;
    if (!productId) return;

    const isActive = btn.classList.contains('is-active');
    const action   = isActive ? 'yith-woocompare-remove-product' : 'yith-woocompare-add-product';
    const security = isActive ? getCompareNonce('remove') : getCompareNonce('add');

    // Оптимістичне оновлення
    syncButtons('.compare-btn', productId, !isActive, 'В порівнянні', 'Порівняти');
    animateBtn(btn, 'compare-pop');

    fetch(getCompareEndpoint(action), {
      method: 'POST',
      credentials: 'same-origin',
      headers: { 'X-Requested-With': 'XMLHttpRequest' },
      body: new URLSearchParams({ id: productId, security }),
    })
      .then(r => r.json())
      .then(data => {
        // Плагін повертає {added: true} або {removed: true}
        const ok = isActive
          ? (data.removed === true || data.removed === 1)
          : (data.added   === true || data.added   === 1);

        if (ok) {
          syncButtons('.compare-btn', productId, !isActive, 'В порівнянні', 'Порівняти');
        } else if (!isActive && data.added === false) {
          // Товар вже був у списку — залишаємо is-active
          syncButtons('.compare-btn', productId, true, 'В порівнянні', 'Порівняти');
        } else {
          // Відкат
          syncButtons('.compare-btn', productId, isActive, 'В порівнянні', 'Порівняти');
        }
        setTimeout(() => updateCount('compare-count', readCompareCount()), 150);
      })
      .catch(() => {
        syncButtons('.compare-btn', productId, isActive, 'В порівнянні', 'Порівняти');
      });
  });

})();