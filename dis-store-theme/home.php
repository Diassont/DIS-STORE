<?php get_header(); ?>

<section class="container section">
  <h1 class="page-title">Блог</h1>

  <?php if (have_posts()): ?>
    <div class="grid">
      <?php while (have_posts()): the_post(); ?>
        <a class="card" href="<?php the_permalink(); ?>">
          <strong><?php the_title(); ?></strong>
          <div class="muted" style="margin-top:8px;">
            <?php echo wp_trim_words(get_the_excerpt(), 18); ?>
          </div>
        </a>
      <?php endwhile; ?>
    </div>

    <div style="margin-top:18px;">
      <?php the_posts_pagination(); ?>
    </div>
  <?php else: ?>
    <p class="muted">Поки записів немає.</p>
  <?php endif; ?>
</section>

<?php get_footer(); ?>
