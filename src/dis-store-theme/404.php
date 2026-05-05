<?php get_header(); ?>

<section class="container section">
  <h1 class="page-title">404 — Не знайдено</h1>
  <p class="muted">Такої сторінки немає. Повернись на головну.</p>
  <a class="btn btn-outline" href="<?php echo esc_url(home_url('/')); ?>" style="margin-top:12px;display:inline-flex;">← На головну</a>
</section>

<?php get_footer(); ?>
