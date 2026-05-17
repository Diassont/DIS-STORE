<?php get_header(); ?>
<?php
wp_enqueue_style(
    'dis-page-contacts',
    get_template_directory_uri() . '/assets/css/contacts.css',
    ['dis-main'],
    wp_get_theme()->get('Version')
);
?>


<?php
/* ============================================================
   CONTACT.PHP — DIS STORE
   ACF: ct_title, ct_subtitle, ct_cards (icon/title/value),
        ct_form_title, ct_form_id
   ============================================================ */
$title      = get_field('ct_title')      ?: 'Контакти';
$subtitle   = get_field('ct_subtitle')   ?: 'Звʼяжіться з нами зручним способом — відповімо протягом 5 хвилин.';
$cards      = get_field('ct_cards');
$form_title = get_field('ct_form_title') ?: 'Напишіть нам';
$form_id    = get_field('ct_form_id');
?>

<!-- ═══ HERO ═══ -->
<section class="ct-hero">
  <div class="container ct-hero-inner">
    <div>
      <div class="ct-hero-badge"><span class="ct-badge-dot"></span>Підтримка DIS STORE</div>
      <h1 class="ct-hero-title"><?php echo esc_html($title); ?></h1>
      <p class="ct-hero-sub"><?php echo nl2br(esc_html($subtitle)); ?></p>
    </div>
    <div class="ct-hero-icon">
      <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
    </div>
  </div>
</section>

<div class="ct-line"></div>

<!-- ═══ CONTACT CARDS ═══ -->
<section class="ct-cards-section container">
  <div class="ct-cards-grid">
    <?php if (is_array($cards) && count($cards)):
      foreach ($cards as $i => $c): ?>
        <div class="ct-acf-card fp-r fp-d<?php echo min($i+1,4); ?>">
          <strong><?php echo esc_html(trim(($c['icon']??'').' '.($c['title']??''))); ?></strong>
          <?php if (!empty($c['value'])): ?><div class="muted" style="font-size:13px;"><?php echo esc_html($c['value']); ?></div><?php endif; ?>
        </div>
    <?php endforeach; else: ?>
      <a class="ct-card fp-r fp-d1" href="tel:+380XXXXXXXXX">
        <div class="ct-card-icon"><svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.68A2 2 0 012 .82h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 8.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg></div>
        <div class="ct-card-label">Телефон</div>
        <div class="ct-card-val">+380 XX XXX XX XX</div>
      </a>
      <a class="ct-card fp-r fp-d2" href="mailto:info@disstore.ua">
        <div class="ct-card-icon"><svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></div>
        <div class="ct-card-label">Email</div>
        <div class="ct-card-val">info@disstore.ua</div>
      </a>
      <div class="ct-card fp-r fp-d3">
        <div class="ct-card-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
        <div class="ct-card-label">Режим роботи</div>
        <div class="ct-card-val">Пн–Пт: 9:00–18:00</div>
      </div>
      <div class="ct-card fp-r fp-d4">
        <div class="ct-card-icon"><svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg></div>
        <div class="ct-card-label">Відповідь</div>
        <div class="ct-card-val">до 5 хвилин</div>
      </div>
    <?php endif; ?>
  </div>
</section>

<div class="ct-line"></div>

<!-- ═══ FORM + MAP ═══ -->
<section class="ct-main-section container">
  <div class="ct-section-head fp-r">
    <h2 class="ct-section-title">Зв'яжіться з нами</h2>
  </div>
  <div class="ct-main-grid">

    <!-- ФОРМА -->
    <div class="ct-form-card fp-r fp-d1">
      <div class="ct-form-title"><?php echo esc_html($form_title); ?></div>

      <?php if ($form_id): ?>
        <?php echo do_shortcode('[wpforms id="' . esc_attr($form_id) . '" title="false"]'); ?>
      <?php else: ?>
        <!-- ── Власна демо-форма з повною валідацією ── -->
        <div class="ct-custom-form" id="ctForm" novalidate>

          <div class="ct-field-row">
            <div class="ct-field">
              <label class="ct-label" for="ct_first">Ім'я</label>
              <input class="ct-input" type="text" id="ct_first" name="first_name"
                     placeholder="Іван" autocomplete="given-name">
              <div class="ct-field-hint" id="ct_first_hint"></div>
            </div>
            <div class="ct-field">
              <label class="ct-label" for="ct_last">Прізвище</label>
              <input class="ct-input" type="text" id="ct_last" name="last_name"
                     placeholder="Петренко" autocomplete="family-name">
              <div class="ct-field-hint" id="ct_last_hint"></div>
            </div>
          </div>

          <div class="ct-field">
            <label class="ct-label" for="ct_phone">Телефон <span>*</span></label>
            <input class="ct-input" type="tel" id="ct_phone" name="phone"
                   placeholder="+380 XX XXX XX XX"
                   maxlength="17" autocomplete="tel" inputmode="tel">
            <div class="ct-field-hint" id="ct_phone_hint"></div>
          </div>

          <div class="ct-field">
            <label class="ct-label" for="ct_email">Email <span>*</span></label>
            <input class="ct-input" type="email" id="ct_email" name="email"
                   placeholder="email@example.com" autocomplete="email" inputmode="email">
            <div class="ct-field-hint" id="ct_email_hint"></div>
          </div>

          <div class="ct-field">
            <label class="ct-label" for="ct_msg">Коментар або повідомлення</label>
            <textarea class="ct-textarea" id="ct_msg" name="message"
                      placeholder="Ваше запитання або коментар..."></textarea>
          </div>

          <button class="ct-submit-btn" type="button" id="ctSubmit">
            <svg viewBox="0 0 24 24"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
            Надіслати
          </button>

        </div><!-- /ct-custom-form -->
      <?php endif; ?>
    </div>

    <!-- MAP + ADDRESS -->
    <div class="ct-right fp-r fp-d2">
      <div class="ct-map-wrap">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2535.4!2d34.542991!3d49.587830!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d82f59e8823d53%3A0x91f5c28b30326bbf!2sPoltava%20Polytechnic%20College!5e0!3m2!1suk!2sua!4v1700000000000!5m2!1suk!2sua"
          allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
        <div class="ct-map-badge">
          <span class="ct-map-badge-dot"></span>
          Полтавський Політехнічний Коледж
        </div>
      </div>

      <div class="ct-addr-card">
        <div class="ct-addr-row">
          <div class="ct-addr-icon"><svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg></div>
          <div>
            <div class="ct-addr-label">Адреса</div>
            <div class="ct-addr-val">вул. Юліана Матвійчука 83а,<br>м. Полтава, 36000</div>
          </div>
        </div>
        <div class="ct-divider"></div>
        <div class="ct-addr-row">
          <div class="ct-addr-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
          <div>
            <div class="ct-addr-label">Режим роботи</div>
            <div class="ct-addr-val">Пн–Пт: 09:00 – 18:00<br><span style="color:var(--muted);font-size:13px;">Сб–Нд: вихідний</span></div>
          </div>
        </div>
        <div class="ct-divider"></div>
        <div>
          <div class="ct-addr-label" style="margin-bottom:10px;">Ми в месенджерах</div>
          <div class="ct-social-row">
            <a class="ct-social-btn" href="#"><svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>Telegram</a>
            <a class="ct-social-btn" href="#"><svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.68A2 2 0 012 .82h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 8.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>Viber</a>
            <a class="ct-social-btn" href="#"><svg viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>Instagram</a>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<script>
/* ── Scroll Reveal ── */
(function(){
  var els=document.querySelectorAll('.fp-r');
  if(!els.length)return;
  var io=new IntersectionObserver(function(e){
    e.forEach(function(x){ if(x.isIntersecting){x.target.classList.add('fp-on');io.unobserve(x.target);} });
  },{threshold:.07,rootMargin:'0px 0px -30px 0px'});
  els.forEach(function(el){io.observe(el);});
}());

/* ════════════════════════════════════════
   ВАЛІДАЦІЯ ФОРМИ
   ════════════════════════════════════════ */
(function(){

  /* ── Допоміжні функції ── */
  var ICON_OK  = '<svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>';
  var ICON_ERR = '<svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>';

  function hint(id, type, msg) {
    var el = document.getElementById(id);
    if (!el) return;
    el.className = 'ct-field-hint' + (type ? ' ' + type : '');
    el.innerHTML = msg ? (type === 'ok' ? ICON_OK : ICON_ERR) + msg : '';
  }
  function markInput(el, type) {
    el.classList.remove('ct-err','ct-ok');
    if (type) el.classList.add('ct-' + type);
  }

  /* ── Телефон: тільки цифри, +, пробіли, дужки ── */
  var phoneEl = document.getElementById('ct_phone');
  if (phoneEl) {
    /* Блокуємо введення нецифрових символів крім + ( ) - пробіл */
    phoneEl.addEventListener('keydown', function(e){
      var allowed = ['Backspace','Delete','ArrowLeft','ArrowRight','ArrowUp','ArrowDown','Tab','Home','End'];
      if (allowed.indexOf(e.key) !== -1) return;
      /* Дозволяємо: цифри, +, (, ), -, пробіл */
      if (!/^[\d\+\(\)\-\s]$/.test(e.key)) {
        e.preventDefault();
      }
    });
    /* Paste — чистимо від сміття */
    phoneEl.addEventListener('paste', function(e){
      e.preventDefault();
      var pasted = (e.clipboardData || window.clipboardData).getData('text');
      var clean  = pasted.replace(/[^\d\+\(\)\-\s]/g,'');
      var pos    = this.selectionStart;
      var val    = this.value;
      this.value = val.slice(0,pos) + clean + val.slice(this.selectionEnd);
    });
    /* Авто-форматування: +380 XX XXX XX XX */
    phoneEl.addEventListener('input', function(){
      var digits = this.value.replace(/\D/g,'');
      var formatted = '';
      /* Якщо починається з 380 або 0 — форматуємо як UA */
      if (digits.startsWith('380')) {
        digits = digits.substring(3);
        formatted = '+380';
      } else if (digits.startsWith('0')) {
        digits = digits.substring(1);
        formatted = '+380';
      } else if (digits.length > 0) {
        formatted = '+380';
      }
      if (digits.length > 0) formatted += ' ' + digits.substring(0,2);
      if (digits.length > 2) formatted += ' ' + digits.substring(2,5);
      if (digits.length > 5) formatted += ' ' + digits.substring(5,7);
      if (digits.length > 7) formatted += ' ' + digits.substring(7,9);
      this.value = formatted;
    });
    /* Валідація при blur */
    phoneEl.addEventListener('blur', function(){
      var digits = this.value.replace(/\D/g,'');
      if (!this.value.trim()) {
        hint('ct_phone_hint','err','Введіть номер телефону');
        markInput(this,'err');
      } else if (digits.length < 10 || digits.length > 12) {
        hint('ct_phone_hint','err','Невірний формат: +380 XX XXX XX XX');
        markInput(this,'err');
      } else {
        hint('ct_phone_hint','ok','Номер введено вірно');
        markInput(this,'ok');
      }
    });
    phoneEl.addEventListener('focus', function(){
      hint('ct_phone_hint','','');
      markInput(this,'');
    });
  }

  /* ── Email: перевірка regexp ── */
  var emailEl = document.getElementById('ct_email');
  if (emailEl) {
    function isEmail(v) {
      /* RFC-5322 спрощений: має бути вигляду a@b.c */
      return /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(v.trim());
    }
    emailEl.addEventListener('blur', function(){
      var v = this.value.trim();
      if (!v) {
        hint('ct_email_hint','err','Введіть email адресу');
        markInput(this,'err');
      } else if (!isEmail(v)) {
        hint('ct_email_hint','err','Невірний формат: example@domain.com');
        markInput(this,'err');
      } else {
        hint('ct_email_hint','ok','Email введено вірно');
        markInput(this,'ok');
      }
    });
    emailEl.addEventListener('focus', function(){
      hint('ct_email_hint','','');
      markInput(this,'');
    });
  }

  /* ── Submit ── */
  var submitBtn = document.getElementById('ctSubmit');
  if (submitBtn) {
    submitBtn.addEventListener('click', function(){
      var valid = true;

      /* Перевіряємо телефон */
      if (phoneEl) {
        var digits = phoneEl.value.replace(/\D/g,'');
        if (!phoneEl.value.trim() || digits.length < 10 || digits.length > 12) {
          hint('ct_phone_hint','err',!phoneEl.value.trim() ? 'Введіть номер телефону' : 'Невірний формат: +380 XX XXX XX XX');
          markInput(phoneEl,'err');
          valid = false;
        }
      }

      /* Перевіряємо email */
      if (emailEl) {
        var ev = emailEl.value.trim();
        if (!ev) {
          hint('ct_email_hint','err','Введіть email адресу');
          markInput(emailEl,'err');
          valid = false;
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(ev)) {
          hint('ct_email_hint','err','Невірний формат: example@domain.com');
          markInput(emailEl,'err');
          valid = false;
        }
      }

      if (!valid) {
        /* Скролимо до першої помилки */
        var firstErr = document.querySelector('.ct-input.ct-err');
        if (firstErr) firstErr.scrollIntoView({behavior:'smooth',block:'center'});
        return;
      }

      /* Успіх — тут можна додати AJAX або просто показати повідомлення */
      submitBtn.disabled = true;
      submitBtn.innerHTML = '<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg> Надіслано!';
      submitBtn.style.background = 'linear-gradient(135deg,#22c55e,#16a34a)';
    });
  }

  /* ── WPForms: стилізація focus/blur через JS (на випадок якщо форма з ACF) ── */
  document.querySelectorAll('.ct-form-card input, .ct-form-card textarea').forEach(function(el){
    el.addEventListener('focus', function(){
      this.style.borderColor='rgba(255,106,0,.5)';
      this.style.boxShadow='0 0 0 3px rgba(255,106,0,.12)';
      this.style.background='rgba(255,106,0,.04)';
    });
    el.addEventListener('blur', function(){
      this.style.borderColor='rgba(255,255,255,.12)';
      this.style.boxShadow='none';
      this.style.background='rgba(255,255,255,.05)';
    });
  });

  /* ── WPForms: phone — блокуємо літери + форматуємо + валідуємо ── */
  document.querySelectorAll('.ct-form-card input[type="tel"]').forEach(function(tel){
    tel.addEventListener('keydown', function(e){
      var ok=['Backspace','Delete','ArrowLeft','ArrowRight','ArrowUp','ArrowDown','Tab','Home','End'];
      if(ok.indexOf(e.key)!==-1)return;
      if(!/^[\d\+\(\)\-\s]$/.test(e.key)) e.preventDefault();
    });
    tel.addEventListener('paste',function(e){
      e.preventDefault();
      var pasted=(e.clipboardData||window.clipboardData).getData('text');
      var clean=pasted.replace(/[^\d\+\(\)\-\s]/g,'');
      var pos=this.selectionStart, v=this.value;
      this.value=v.slice(0,pos)+clean+v.slice(this.selectionEnd);
    });
    tel.addEventListener('input',function(){
      var digits=this.value.replace(/\D/g,'');
      var fmt='';
      if(digits.startsWith('380'))      { digits=digits.substring(3); fmt='+380'; }
      else if(digits.startsWith('0'))   { digits=digits.substring(1); fmt='+380'; }
      else if(digits.length>0)          { fmt='+380'; }
      if(digits.length>0) fmt+=' '+digits.substring(0,2);
      if(digits.length>2) fmt+=' '+digits.substring(2,5);
      if(digits.length>5) fmt+=' '+digits.substring(5,7);
      if(digits.length>7) fmt+=' '+digits.substring(7,9);
      this.value=fmt;
    });
    tel.addEventListener('blur',function(){
      var digits=this.value.replace(/\D/g,'');
      if(!this.value.trim()||digits.length<10||digits.length>12){
        this.style.borderColor='rgba(248,113,113,.6)';
        this.style.boxShadow='0 0 0 3px rgba(248,113,113,.1)';
      } else {
        this.style.borderColor='rgba(34,197,94,.4)';
        this.style.boxShadow='none';
      }
    });
    tel.addEventListener('focus',function(){
      this.style.borderColor='rgba(255,106,0,.5)';
      this.style.boxShadow='0 0 0 3px rgba(255,106,0,.12)';
      this.style.background='rgba(255,106,0,.04)';
    });
  });

  /* ── WPForms: email — live feedback ── */
  document.querySelectorAll('.ct-form-card input[type="email"]').forEach(function(el){
    el.addEventListener('blur',function(){
      var v=this.value.trim();
      if(v && !/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(v)){
        this.style.borderColor='rgba(248,113,113,.6)';
        this.style.boxShadow='0 0 0 3px rgba(248,113,113,.1)';
      }
    });
  });

}());
</script>

<?php get_footer(); ?>