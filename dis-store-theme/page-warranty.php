<?php get_header(); ?>

<?php
  $subtitle   = get_field('subtitle');
  $content    = get_field('content');
  $info_cards = get_field('info_cards'); 
?>

<section class="container section">
  <h1 class="page-title"><?php the_title(); ?></h1>

  <?php if ($subtitle): ?>
    <p class="muted"><?php echo esc_html($subtitle); ?></p>
  <?php endif; ?>

  <?php if ($content): ?>
    <div class="content" style="margin-top:16px;">
      <?php echo wp_kses_post($content); ?>
    </div>
  <?php endif; ?>

  <?php if (is_array($info_cards) && count($info_cards)): ?>
    <div class="grid" style="margin-top:22px;">
      <?php foreach ($info_cards as $card): ?>
        <div class="card">
          <strong>
            <?php echo esc_html(($card['icon'] ?? '') . ' ' . ($card['title'] ?? '')); ?>
          </strong>
          <?php if (!empty($card['desc'])): ?>
            <div class="muted" style="margin-top:8px;">
              <?php echo esc_html($card['desc']); ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</section>

<?php get_footer(); ?>
