<?php get_header(); ?>

<?php
  $title    = get_field('ab_title');
  $subtitle = get_field('ab_subtitle');
  $content  = get_field('ab_content'); 
  $cards    = get_field('ab_cards');   
?>

<section class="container section">
  <?php if ($title): ?>
    <h1 class="page-title"><?php echo esc_html($title); ?></h1>
  <?php endif; ?>

  <?php if ($subtitle): ?>
    <p class="muted"><?php echo nl2br(esc_html($subtitle)); ?></p>
  <?php endif; ?>

  <?php if ($content): ?>
    <div class="content" style="margin-top:16px;">
      <?php echo wp_kses_post($content); ?>
    </div>
  <?php endif; ?>

  <?php if (is_array($cards) && count($cards)): ?>
    <div class="grid" style="margin-top:22px;">
      <?php foreach ($cards as $c): ?>
        <div class="card">
          <strong>
            <?php echo esc_html(($c['icon'] ?? '') . ' ' . ($c['title'] ?? '')); ?>
          </strong>

          <?php if (!empty($c['text'])): ?>
            <div class="muted" style="margin-top:8px;">
              <?php echo wp_kses_post($c['text']); ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</section>

<?php get_footer(); ?>
