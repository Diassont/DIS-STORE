<?php get_header(); ?>

<?php
  $title      = get_field('ct_title');
  $subtitle   = get_field('ct_subtitle');
  $cards      = get_field('ct_cards'); // repeater: icon, title, value
  $form_title = get_field('ct_form_title');
  $form_id    = get_field('ct_form_id');
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
      <?php foreach ($cards as $c): ?>
        <?php
          $icon  = $c['icon'] ?? '';
          $t     = $c['title'] ?? '';
          $val   = $c['value'] ?? '';
        ?>
        <div class="card">
          <strong><?php echo esc_html(trim($icon . ' ' . $t)); ?></strong>
          <?php if ($val): ?>
            <div class="muted" style="margin-top:8px;"><?php echo esc_html($val); ?></div>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <?php if ($form_id): ?>
    <div class="card" style="margin-top:24px;">
      <?php if ($form_title): ?>
        <h3 style="margin-top:0;"><?php echo esc_html($form_title); ?></h3>
      <?php endif; ?>

      <?php echo do_shortcode('[wpforms id="' . esc_attr($form_id) . '" title="false"]'); ?>
    </div>
  <?php endif; ?>
</section>

<?php get_footer(); ?>
