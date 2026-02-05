<?php get_header(); ?>

<?php
  $title    = get_field('dp_title');
  $subtitle = get_field('dp_subtitle');
  $cards    = get_field('dp_cards'); 
?>

<section class="container section">
  <?php if ($title): ?>
    <h1 class="page-title"><?php echo esc_html($title); ?></h1>
  <?php endif; ?>

  <?php if ($subtitle): ?>
    <p class="muted"><?php echo nl2br(esc_html($subtitle)); ?></p>
  <?php endif; ?>

  <?php if (is_array($cards) && count($cards)): ?>
    <div class="grid" style="margin-top:20px;">
      <?php foreach ($cards as $card): ?>
        <div class="card">
          <strong>
            <?php echo esc_html(($card['icon'] ?? '') . ' ' . ($card['title'] ?? '')); ?>
          </strong>

          <?php if (!empty($card['text'])): ?>
            <div class="muted" style="margin-top:8px;">
              <?php echo nl2br(esc_html($card['text'])); ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</section>

<?php get_footer(); ?>
