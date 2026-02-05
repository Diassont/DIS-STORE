document.addEventListener("DOMContentLoaded", () => {
  const bar = document.getElementById("filterBar");
  const grid = document.getElementById("products");
  if (!bar || !grid) return;

  const cards = Array.from(grid.querySelectorAll(".p-card"));
  const empty = document.getElementById("filterEmpty");

  const FILTERS = {

    // 1) Ноутбуки
    laptops: [
      { key: "brand",  label: "Бренд", type: "select" },
      { key: "ram",    label: "RAM",   type: "select" },
      { key: "screen", label: "Екран", type: "select" },
      { key: "price",  label: "Ціна",  type: "price"  },
    ],

    // 2) Комп’ютери
    computers: [
      { key: "brand", label: "Бренд", type: "select" },
      { key: "cpu",   label: "CPU",   type: "select" },
      { key: "gpu",   label: "GPU",   type: "select" },
      { key: "ram",   label: "RAM",   type: "select" },
      { key: "ssd",   label: "SSD",   type: "select" },
      { key: "price", label: "Ціна",  type: "price"  },
    ],

    // 3) Клавіатури
    keyboards: [
      { key: "brand",      label: "Бренд",       type: "select" },
      { key: "type",       label: "Тип",         type: "select" },     
      { key: "connection", label: "Підключення", type: "select" },    
      { key: "layout",     label: "Розкладка",   type: "select" },    
      { key: "backlight",  label: "Підсвітка",   type: "select" },     
      { key: "price",      label: "Ціна",        type: "price"  },
    ],

    // 4) Мишки
    mice: [
      { key: "brand",      label: "Бренд",        type: "select" },
      { key: "type",       label: "Тип",          type: "select" },     
      { key: "connection", label: "Підключення",  type: "select" },     
      { key: "sensor",     label: "Сенсор",       type: "select" },    
      { key: "dpi",        label: "DPI",          type: "select" },
      { key: "price",      label: "Ціна",         type: "price"  },
    ],

    // 5) Навушники
    headphones: [
      { key: "brand", label: "Бренд", type: "select" },
      { key: "type",  label: "Тип", type: "select" },        
      { key: "form",  label: "Форма", type: "select" },      
      { key: "mic",   label: "Мікрофон", type: "select" },   
      { key: "anc",   label: "ANC", type: "select" },        
      { key: "price", label: "Ціна", type: "price" },
    ],

    // 6) Мікрофони
    microphones: [
      { key: "type",       label: "Тип",        type: "select" }, 
      { key: "connection", label: "Зв’язок",    type: "select" }, 
      { key: "pattern",    label: "Спрям.",     type: "select" }, 
      { key: "price",      label: "Ціна",       type: "price" },
    ],

    // 7) Монітори
    monitors: [
      { key: "brand",  label: "Бренд", type: "select" },
      { key: "size",   label: "Діагональ", type: "select" },
      { key: "refresh",label: "Hz", type: "select" },
      { key: "panel",  label: "Матриця", type: "select" },
      { key: "price",  label: "Ціна", type: "price" },
    ],

    // 8) Материнські плати
    motherboards: [
      { key: "socket",  label: "Socket",      type: "select" },
      { key: "chipset", label: "Чипсет",      type: "select" }, 
      { key: "form",    label: "Форм-фактор", type: "select" }, 
      { key: "price",   label: "Ціна",        type: "price"  },
    ],

    // 9) Процесори
    processors: [
      { key: "brand",  label: "Бренд",  type: "select" },
      { key: "socket", label: "Socket", type: "select" }, 
      { key: "cores",  label: "Ядра",   type: "select" }, 
      { key: "price",  label: "Ціна",   type: "price"  },
    ],

    // 10) Відеокарти
    "graphics-cards": [
      { key: "brand",  label: "Бренд",   type: "select" },
      { key: "vram",   label: "VRAM",    type: "select" },
      { key: "series", label: "Серія",   type: "select" },
      { key: "price",  label: "Ціна",    type: "price"  },
    ],

    // 11) ОЗП
    ram: [
      { key: "type",  label: "Тип",     type: "select" }, 
      { key: "size",  label: "Обсяг",   type: "select" },
      { key: "mhz",   label: "Частота", type: "select" }, 
      { key: "price", label: "Ціна",    type: "price" },
    ],

    // 12) Накопичувачі
    storage: [
      { key: "type",  label: "Тип",       type: "select" }, 
      { key: "size",  label: "Обсяг",     type: "select" }, 
      { key: "iface", label: "Інтерфейс", type: "select" }, 
      { key: "price", label: "Ціна",      type: "price"  },
    ],

    // 13) Блоки живлення
    "power-supplies": [
      { key: "watt",  label: "Потужність",  type: "select" }, 
      { key: "cert",  label: "Сертифікат",  type: "select" }, 
      { key: "mod",   label: "Модульність", type: "select" }, 
      { key: "price", label: "Ціна",        type: "price"  },
    ],

    // 14) Системи охолодження
    "cooling-systems": [
      { key: "type",   label: "Тип",    type: "select" }, 
      { key: "socket", label: "Socket", type: "select" }, 
      { key: "size",   label: "Розмір", type: "select" }, 
      { key: "price",  label: "Ціна",   type: "price"  },
    ],

    // 15) Корпуси
    "pc-cases": [
      { key: "form",  label: "Форм-фактор", type: "select" }, 
      { key: "size",  label: "Розмір",      type: "select" }, 
      { key: "glass", label: "Скло",        type: "select" }, 
      { key: "price", label: "Ціна",        type: "price"  },
    ],

    // 16) Кабелі мультимедійні
    "multimedia-cables": [
      { key: "cableType", label: "Тип",        type: "select", dataKey: "cable-type" }, 
      { key: "length",    label: "Довжина (м)", type: "select" },                         
      { key: "version",   label: "Версія",     type: "select" },                      
      { key: "price",     label: "Ціна",       type: "price" },
    ],

    // 17) Принтери
    printers: [
      { key: "type",   label: "Тип",    type: "select" },
      { key: "color",  label: "Колір",  type: "select" }, 
      { key: "format", label: "Формат", type: "select" },
      { key: "price",  label: "Ціна",   type: "price"  },
    ],

    // 18) Акустичні системи
    "acoustic-systems": [
      { key: "type",       label: "Тип",     type: "select" }, 
      { key: "connection", label: "Зв’язок", type: "select" }, 
      { key: "power",      label: "Потужн.", type: "select" }, 
      { key: "price",      label: "Ціна",    type: "price"  },
    ],

    // 19) Портативні системи
    "portable-systems": [
      { key: "type",       label: "Тип",     type: "select" }, 
      { key: "battery",    label: "Батарея", type: "select" },
      { key: "connection", label: "Зв’язок", type: "select" },
      { key: "price",      label: "Ціна",    type: "price"  },
    ],
  };

  const type = bar.dataset.filter || "laptops";
  const config = FILTERS[type] || FILTERS.laptops;

  // Helpers
  const el = (tag, cls) => {
    const x = document.createElement(tag);
    if (cls) x.className = cls;
    return x;
  };

  // Build UI
  bar.innerHTML = "";
  bar.style.display = "grid";

  // Search always
  const search = el("input", "filter-input");
  search.type = "search";
  search.placeholder = "Пошук (назва/модель)...";
  search.id = "fSearch";
  bar.appendChild(search);

  const controls = [];

  config.forEach(f => {
    if (f.type === "price") {
      const sel = el("select", "filter-select");
      sel.innerHTML = `
        <option value="">${f.label}: будь-яка</option>
        <option value="0-25000">до 25 000</option>
        <option value="25000-40000">25 000 – 40 000</option>
        <option value="40000-999999">від 40 000</option>
      `;
      sel.dataset.key = "price";
      bar.appendChild(sel);
      controls.push(sel);
      return;
    }

    if (f.type === "select") {
      const sel = el("select", "filter-select");
      sel.dataset.key = f.dataKey || f.key; 
      sel.innerHTML = `<option value="">${f.label}: всі</option>`;
      bar.appendChild(sel);
      controls.push(sel);
    }
  });

  const reset = el("button", "btn btn-outline");
  reset.type = "button";
  reset.textContent = "Скинути";
  bar.appendChild(reset);

  // Fill selects from cards (auto options)
  controls.forEach(sel => {
    const key = sel.dataset.key;
    if (key === "price") return;

    const values = new Set();
    cards.forEach(card => {
      const jsKey = key.replace(/-([a-z])/g, (_, a) => a.toUpperCase());
      const v = (card.dataset[jsKey] || "").trim();
      if (v) values.add(v);
    });

    Array.from(values).sort().forEach(v => {
      const opt = document.createElement("option");
      opt.value = v;
      opt.textContent = v.toUpperCase();
      sel.appendChild(opt);
    });
  });

  const inPriceRange = (price, range) => {
    if (!range) return true;
    const [min, max] = range.split("-").map(Number);
    return price >= min && price <= max;
  };

  function apply() {
    const q = search.value.trim().toLowerCase();
    let shown = 0;

    cards.forEach(card => {
      const title = (card.querySelector(".p-title")?.textContent || "").toLowerCase();
      const desc  = (card.querySelector(".p-desc")?.textContent || "").toLowerCase();
      const brand = (card.dataset.brand || "").toLowerCase();
      const price = Number(card.dataset.price || "0");

      // шукаємо по бренду/назві/опису
      const hay = `${brand} ${title} ${desc}`;
      let ok = !q || hay.includes(q);



      controls.forEach(sel => {
        if (!ok) return;

        const key = sel.dataset.key;
        const val = sel.value;

        if (key === "price") {
          ok = inPriceRange(price, val);
          return;
        }

        const jsKey = key.replace(/-([a-z])/g, (_, a) => a.toUpperCase());
        const cardVal = (card.dataset[jsKey] || "").trim();

        if (val) ok = cardVal === val;
      });

      card.style.display = ok ? "" : "none";
      if (ok) shown++;
    });

    if (empty) empty.hidden = shown !== 0;
  }

  // events
  search.addEventListener("input", apply);
  controls.forEach(sel => sel.addEventListener("change", apply));

  reset.addEventListener("click", () => {
    search.value = "";
    controls.forEach(sel => sel.value = "");
    apply();
  });

  // initial
  apply();
});
