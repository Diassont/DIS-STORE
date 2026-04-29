/* =========================================================
   DISSTORE — CLEAN UI JS
   ========================================================= */

(() => {
  const BREAKPOINT = 980;

  const isDesktop = () => window.innerWidth > BREAKPOINT;
  const isMobile = () => window.innerWidth <= BREAKPOINT;

  /* -------------------------
     Helpers
     ------------------------- */
  const setBodyLock = (className, lock) => {
    document.body.classList.toggle(className, !!lock);
  };

  const lockMenuScroll = (lock) => setBodyLock("menu-open", lock);
  const lockModalScroll = (lock) => setBodyLock("modal-open", lock);

  /* ========================================================
     1) Burger + Mobile Menu
     ======================================================== */
  (() => {
    const burger = document.querySelector(".burger");
    const mobileMenu = document.getElementById("mobileMenu");

    if (!burger || !mobileMenu) return;

    const isOpen = () => burger.getAttribute("aria-expanded") === "true";

    const closeSubmenus = () => {
      mobileMenu
        .querySelectorAll("li.is-open")
        .forEach((li) => li.classList.remove("is-open"));
    };

    const openMenu = () => {
      mobileMenu.hidden = false;
      burger.setAttribute("aria-expanded", "true");
      lockMenuScroll(true);
    };

    const closeMenu = () => {
      closeSubmenus();
      mobileMenu.hidden = true;
      burger.setAttribute("aria-expanded", "false");
      lockMenuScroll(false);
    };

    const toggleMenu = () => {
      isOpen() ? closeMenu() : openMenu();
    };

    burger.addEventListener("click", (e) => {
      e.preventDefault();
      toggleMenu();
    });

    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape" && isOpen()) {
        closeMenu();
      }
    });

    document.addEventListener("click", (e) => {
      if (!isOpen()) return;

      const clickedBurger = e.target.closest(".burger");
      const clickedInsideMenu = e.target.closest("#mobileMenu");

      if (!clickedBurger && !clickedInsideMenu) {
        closeMenu();
      }
    });

    mobileMenu.addEventListener("click", (e) => {
      const link = e.target.closest("a");
      if (link) {
        closeMenu();
      }
    });

    window.addEventListener("resize", () => {
      if (isDesktop() && isOpen()) {
        closeMenu();
      }
    });
  })();

  /* ========================================================
     2) Product Modal
     ======================================================== */
  (() => {
    const modal = document.getElementById("productModal");
    if (!modal) return;

    const titleEl = document.getElementById("modalTitle");
    const priceEl = document.getElementById("modalPrice");
    const stockEl = document.getElementById("modalStock");
    const descEl = document.getElementById("modalDesc");
    const imgEl = document.getElementById("modalImg");
    const specsUl = document.getElementById("modalSpecs");
    const modalContent = modal.querySelector(".modal__content");

    let lastFocus = null;
    let scrollY = 0;

    const fillSpecs = (specsRaw) => {
      if (!specsUl) return;
      specsUl.innerHTML = "";

      specsRaw.split("|").forEach((line) => {
        const text = line.trim();
        if (!text) return;

        const li = document.createElement("li");
        li.textContent = text;
        specsUl.appendChild(li);
      });
    };

    const openModal = (btn) => {
      lastFocus = document.activeElement;
      scrollY = window.scrollY || document.documentElement.scrollTop || 0;

      const title = btn.dataset.title || "";
      const price = btn.dataset.price || "";
      const stock = btn.dataset.stock || "";
      const img = btn.dataset.img || "";
      const desc = btn.dataset.desc || "";
      const specsRaw = btn.dataset.specs || "";

      if (titleEl) titleEl.textContent = title;
      if (priceEl) priceEl.textContent = price;
      if (stockEl) stockEl.textContent = stock;
      if (descEl) descEl.textContent = desc;

      if (imgEl) {
        imgEl.src = img;
        imgEl.alt = title;
      }

      fillSpecs(specsRaw);

      modal.classList.add("is-open");
      modal.setAttribute("aria-hidden", "false");
      lockModalScroll(true);

      if (modalContent) {
        modalContent.scrollTop = 0;
      }

      const closeBtn = modal.querySelector("[data-close]");
      if (closeBtn) {
        closeBtn.focus({ preventScroll: true });
      }
    };

    const closeModal = () => {
      if (!modal.classList.contains("is-open")) return;

      modal.classList.remove("is-open");
      modal.setAttribute("aria-hidden", "true");
      lockModalScroll(false);

      window.scrollTo(0, scrollY);

      if (lastFocus && typeof lastFocus.focus === "function") {
        lastFocus.focus({ preventScroll: true });
      }

      lastFocus = null;
    };

    document.addEventListener("click", (e) => {
      const btn = e.target.closest(".p-more");
      if (!btn) return;

      e.preventDefault();
      openModal(btn);
    });

    document.addEventListener("click", (e) => {
      if (!modal.classList.contains("is-open")) return;

      const clickedClose =
        e.target.matches("[data-close]") || e.target.closest("[data-close]");
      const clickedOverlay = e.target.classList.contains("modal__overlay");

      if (clickedClose || clickedOverlay) {
        e.preventDefault();
        closeModal();
      }
    });

    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") {
        closeModal();
      }
    });

    modal.addEventListener(
      "touchmove",
      (e) => {
        if (!modal.classList.contains("is-open")) return;
        if (!modalContent) return;

        const insideContent = e.target.closest(".modal__content");
        if (!insideContent) {
          e.preventDefault();
        }
      },
      { passive: false }
    );
  })();

  /* ========================================================
     3) Mobile Nav Submenu Toggle
     ======================================================== */
  (() => {
    const mobileNav = document.querySelector(".mobile-nav");
    if (!mobileNav) return;

    const items = mobileNav.querySelectorAll("li.menu-item-has-children");

    items.forEach((li) => {
      const link = li.querySelector(":scope > a");
      const sub = li.querySelector(":scope > .sub-menu");

      if (!link || !sub) return;
      if (li.querySelector(":scope > .submenu-toggle")) return;

      const btn = document.createElement("button");
      btn.type = "button";
      btn.className = "submenu-toggle";
      btn.setAttribute("aria-label", "Відкрити підменю");
      btn.setAttribute("aria-expanded", "false");

      link.insertAdjacentElement("afterend", btn);

      btn.addEventListener("click", (e) => {
        if (!isMobile()) return;

        e.preventDefault();
        e.stopPropagation();

        const isNowOpen = li.classList.contains("is-open");

        mobileNav.querySelectorAll("li.is-open").forEach((item) => {
          item.classList.remove("is-open");
          const toggle = item.querySelector(":scope > .submenu-toggle");
          if (toggle) toggle.setAttribute("aria-expanded", "false");
        });

        if (!isNowOpen) {
          li.classList.add("is-open");
          btn.setAttribute("aria-expanded", "true");

          requestAnimationFrame(() => {
            li.scrollIntoView({
              block: "nearest",
              behavior: "smooth",
            });
          });
        }
      });
    });

    window.addEventListener("resize", () => {
      if (isDesktop()) {
        mobileNav.querySelectorAll("li.is-open").forEach((li) => {
          li.classList.remove("is-open");
          const toggle = li.querySelector(":scope > .submenu-toggle");
          if (toggle) toggle.setAttribute("aria-expanded", "false");
        });
      }
    });
  })();
})();

lucide.createIcons();

(function() {
  const search   = document.getElementById('filterSearch');
  const priceMin = document.getElementById('filterPriceMin');
  const priceMax = document.getElementById('filterPriceMax');
  const sort     = document.getElementById('filterSort');
  const reset    = document.getElementById('filterReset');
  const grid     = document.querySelector('.product-grid');

  if (!grid) return;

  function getCards() {
    return Array.from(grid.querySelectorAll('.p-card'));
  }

  function getRawPrice(card) {
    const el = card.querySelector('.woocommerce-Price-amount');
    if (!el) return 0;
    return parseFloat(el.textContent.replace(/[^\d,]/g, '').replace(',', '.')) || 0;
  }

  function applyFilter() {
    const q       = search ? search.value.toLowerCase().trim() : '';
    const min     = priceMin ? parseFloat(priceMin.value) || 0 : 0;
    const max     = priceMax ? parseFloat(priceMax.value) || Infinity : Infinity;
    const sortVal = sort ? sort.value : '';

    let cards = getCards();

    // Показати/сховати по пошуку і ціні
    cards.forEach(card => {
      const title = card.querySelector('.p-title')?.textContent.toLowerCase() || '';
      const price = getRawPrice(card);
      const matchQ = !q || title.includes(q);
      const matchP = price >= min && price <= max;
      card.style.display = matchQ && matchP ? '' : 'none';
    });

    // Сортування
    const visible = cards.filter(c => c.style.display !== 'none');

    visible.sort((a, b) => {
      const pa = getRawPrice(a);
      const pb = getRawPrice(b);
      const na = a.querySelector('.p-title')?.textContent.trim() || '';
      const nb = b.querySelector('.p-title')?.textContent.trim() || '';

      if (sortVal === 'price_asc')  return pa - pb;
      if (sortVal === 'price_desc') return pb - pa;
      if (sortVal === 'name_asc')   return na.localeCompare(nb, 'uk');
      if (sortVal === 'name_desc')  return nb.localeCompare(na, 'uk');
      return 0;
    });

    visible.forEach(card => grid.appendChild(card));

    // Показати повідомлення якщо нічого не знайдено
    let empty = grid.querySelector('.filter-empty');
    if (!empty) {
      empty = document.createElement('p');
      empty.className = 'filter-empty';
      empty.textContent = 'Нічого не знайдено. Спробуйте змінити фільтри.';
      grid.appendChild(empty);
    }
    empty.style.display = visible.length === 0 ? 'block' : 'none';
  }

  // Скинути фільтри
  if (reset) {
    reset.addEventListener('click', () => {
      if (search)   search.value   = '';
      if (priceMin) priceMin.value = '';
      if (priceMax) priceMax.value = '';
      if (sort)     sort.value     = '';
      applyFilter();
    });
  }

  if (search)   search.addEventListener('input', applyFilter);
  if (priceMin) priceMin.addEventListener('input', applyFilter);
  if (priceMax) priceMax.addEventListener('input', applyFilter);
  if (sort)     sort.addEventListener('change', applyFilter);
})();