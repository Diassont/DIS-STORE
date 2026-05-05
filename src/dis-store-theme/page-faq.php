<?php get_header(); ?>

<?php
  $title    = get_field('faq_title');
  $subtitle = get_field('faq_subtitle');
  $items    = get_field('faq_items');
?>

<section class="container section">
  <?php if ($title): ?>
    <h1 class="page-title"><?php echo esc_html($title); ?></h1>
  <?php endif; ?>

  <?php if ($subtitle): ?>
    <p class="muted"><?php echo nl2br(esc_html($subtitle)); ?></p>
  <?php endif; ?>

  <?php if (is_array($items) && count($items)): ?>
    <div style="margin-top:20px;display:flex;flex-direction:column;gap:12px;">
      <?php foreach ($items as $it): ?>
        <?php
          $icon = $it['icon'] ?? '❓';
          $q    = $it['question'] ?? '';
          $a    = $it['answer'] ?? '';
        ?>

        <?php if ($q): ?>
          <div class="faq-box" style="flex-direction:column;align-items:flex-start;gap:10px;">
            <strong style="font-size:15px;"><?php echo esc_html($icon . ' ' . $q); ?></strong>
            <?php if ($a): ?>
              <p class="muted" style="margin:0;font-size:14px;line-height:1.6;"><?php echo nl2br(esc_html($a)); ?></p>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</section>

<?php get_footer(); ?>
