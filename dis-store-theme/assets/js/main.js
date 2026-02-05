/* =========================================================
   DISSTORE — UI JS (stable for PC / Laptop / Tablet / Phone)
   ========================================================= */

(() => {
  const BREAKPOINT = 980;

  const isDesktop = () => window.innerWidth > BREAKPOINT;
  const isMobile = () => window.innerWidth <= BREAKPOINT;

  /* -------------------------
     Helpers: body scroll lock
     ------------------------- */
  const lockScrollForMenu = (lock) => {
    document.body.classList.toggle("menu-open", !!lock);
  };

  const lockScrollForModal = (lock) => {
    document.body.classList.toggle("modal-open", !!lock);
  };

  /* ========================================================
   1) Burger + Mobile Menu  
   ======================================================== */
(() => {
  const burger = document.querySelector(".burger");
  const mobileMenu = document.getElementById("mobileMenu");
  if (!burger || !mobileMenu) return;

  const overlay = mobileMenu.querySelector("[data-menu-overlay]"); // overlay всередині меню

  const isOpen = () => burger.getAttribute("aria-expanded") === "true";

  const closeSubmenus = () => {
    mobileMenu.querySelectorAll("li.is-open").forEach((li) => li.classList.remove("is-open"));
  };

  const open = () => {
    mobileMenu.hidden = false;
    burger.setAttribute("aria-expanded", "true");
    document.body.classList.add("menu-open");
  };

  const close = () => {
    closeSubmenus();
    mobileMenu.hidden = true;
    burger.setAttribute("aria-expanded", "false");
    document.body.classList.remove("menu-open");
  };

  burger.addEventListener("click", (e) => {
    e.preventDefault();
    isOpen() ? close() : open();
  });

  // ESC
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && isOpen()) close();
  });

  if (overlay) {
    overlay.addEventListener("click", (e) => {
      if (!isOpen()) return;
      e.preventDefault();
      close();
    });
  }

  document.addEventListener("click", (e) => {
    if (!isOpen()) return;

    const clickedBurger = e.target.closest(".burger");
    const clickedMenu = e.target.closest("#mobileMenu");

    if (!clickedBurger && !clickedMenu) close();
  });

  mobileMenu.addEventListener("click", (e) => {
    const link = e.target.closest("a");
    if (link) close();
  });

  mobileMenu.addEventListener("click", (e) => {
    if (!isOpen()) return;

    // якщо клік по клікабельним елементам — не закриваємо
    const interactive = e.target.closest(
      "a, button, input, textarea, select, label, .submenu-toggle"
    );
    if (interactive) return;

    // якщо клік був по області підменю (і ти хочеш, щоб просто закривало все меню теж)
    // закриваємо меню повністю:
    close();
  });

  window.addEventListener("resize", () => {
    if (window.innerWidth > 980 && isOpen()) close();
  });
})();


  /* ========================================================
     2) Product Modal (open/close) — mobile scroll fixes
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

      if (specsUl) {
        specsUl.innerHTML = "";
        specsRaw.split("|").forEach((line) => {
          const t = line.trim();
          if (!t) return;
          const li = document.createElement("li");
          li.textContent = t;
          specsUl.appendChild(li);
        });
      }

      modal.classList.add("is-open");
      modal.setAttribute("aria-hidden", "false");
      lockScrollForModal(true);

      // reset internal scroll to top
      if (modalContent) modalContent.scrollTop = 0;
      requestAnimationFrame(() => {
        if (modalContent) modalContent.scrollTop = 0;
      });

      const closeBtn = modal.querySelector("[data-close]");
      if (closeBtn) closeBtn.focus({ preventScroll: true });
    };

    const closeModal = () => {
      if (!modal.classList.contains("is-open")) return;

      modal.classList.remove("is-open");
      modal.setAttribute("aria-hidden", "true");
      lockScrollForModal(false);

      // return page scroll position
      window.scrollTo(0, scrollY);

      if (lastFocus && lastFocus.focus) {
        lastFocus.focus({ preventScroll: true });
      }
      lastFocus = null;
    };

    // allow scroll only inside .modal__content on touch devices
    modal.addEventListener(
      "touchmove",
      (e) => {
        if (!modal.classList.contains("is-open")) return;
        if (!modalContent) return;

        const insideContent = e.target.closest(".modal__content");
        if (!insideContent) e.preventDefault();
      },
      { passive: false }
    );

    // open: click on .p-more
    document.addEventListener("click", (e) => {
      const btn = e.target.closest(".p-more");
      if (!btn) return;
      e.preventDefault();
      openModal(btn);
    });

    // close: overlay or [data-close]
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

    // ESC closes modal
    document.addEventListener("keydown", (e) => {
      if (e.key !== "Escape") return;
      closeModal();
    });
  })();

  /* ========================================================
     3) Desktop Nav Submenu (Catalog mega menu)
     ======================================================== */
  (() => {
    const desktopNav = document.querySelector(".desktop-nav");
    if (!desktopNav) return;

    const items = [...desktopNav.querySelectorAll("li.menu-item-has-children")];
    if (!items.length) return;

    const closeAll = () => items.forEach((li) => li.classList.remove("is-open"));

    const openOne = (li) => {
      items.forEach((x) => x !== li && x.classList.remove("is-open"));
      li.classList.add("is-open");
    };

    items.forEach((li) => {
      li.addEventListener("mouseenter", () => {
        if (!isDesktop()) return;
        openOne(li);
      });

      li.addEventListener("mouseleave", () => {
        if (!isDesktop()) return;
        setTimeout(() => {
          if (!li.matches(":hover")) li.classList.remove("is-open");
        }, 180);
      });
    });

    document.addEventListener("click", (e) => {
      if (!isDesktop()) return;

      const anyOpen = desktopNav.querySelector("li.is-open");
      if (!anyOpen) return;

      const clickedInsideNav = e.target.closest(".desktop-nav");
      const clickedInsideSub = e.target.closest(".desktop-nav .sub-menu");
      if (!clickedInsideNav && !clickedInsideSub) closeAll();
    });

    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") closeAll();
    });

    window.addEventListener("resize", () => {
      if (!isDesktop()) closeAll();
    });
  })();

  /* ========================================================
     4) Mobile Nav Submenu Toggle (arrow button)
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

      link.insertAdjacentElement("afterend", btn);

      btn.addEventListener("click", (e) => {
        if (!isMobile()) return;
        e.preventDefault();
        e.stopPropagation();

        // close others
        mobileNav.querySelectorAll("li.is-open").forEach((x) => {
          if (x !== li) x.classList.remove("is-open");
        });

        li.classList.toggle("is-open");

        // when opened — scroll into view smoothly (nice on phone)
        if (li.classList.contains("is-open")) {
          requestAnimationFrame(() => {
            li.scrollIntoView({ block: "nearest", behavior: "smooth" });
          });
        }
      });
    });

    window.addEventListener("resize", () => {
      if (!isMobile()) {
        mobileNav
          .querySelectorAll("li.is-open")
          .forEach((li) => li.classList.remove("is-open"));
      }
    });
  })();
})();
